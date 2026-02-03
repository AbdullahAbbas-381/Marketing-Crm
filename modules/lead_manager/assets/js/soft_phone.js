"use strict";

let device = null;
let outGoingCall = null;
let _connection = null;
let callProgress = false;
let holdStatus = false;
let confrenceStatus = false;
let incomingCallFrom = '';
let twilioToken = null; // 🔐 Store token globally
const hangupCall = () => device.disconnectAll();
let hours = 0, mins = 0, seconds = 0, timex = null;
function startTimer() {
  timex = setTimeout(() => {
    seconds++;
    if (seconds > 59) { seconds = 0; mins++; }
    if (mins > 59) { mins = 0; hours++; }
    $("#hours").text(hours < 10 ? '0' + hours + ':' : hours + ':');
    $("#mins").text(mins < 10 ? '0' + mins + ':' : mins + ':');
    $("#seconds").text(seconds < 10 ? '0' + seconds : seconds);
    startTimer();
  }, 1000);
}
function resetTimer() {
  clearTimeout(timex);
  hours = mins = seconds = 0;
  $("#hours").text('00:');
  $("#mins").text('00:');
  $("#seconds").text('00');
}
function setupClient() {
  $.post(admin_url + 'lead_manager/generateClientToken', {
    forPage: window.location.pathname,
  }).done(data => {
    data = JSON.parse(data);
    twilioToken = data.token;

    device = new Twilio.Device(twilioToken, {
      logLevel: 4,
      allowIncomingWhileBusy: true,
      enableImprovedSignalingErrorPrecision: true,
      tokenRefreshMs: 60000,
      debug: true
    });

    device.register().then(() => {
      console.log("Twilio Device registered");
    }).catch(err => {
      console.error("Device registration failed:", err);
    });

    setupHandlers(device);
  }).fail(err => {
    console.error("Token fetch failed:", err);
    updateCallStatus("Could not get a token from server!");
  });
}
function setupHandlers(device) {
  device.on('tokenWillExpire', () => {
    updateCallStatus("Token will expire soon. Refreshing...");
    refreshTwilioToken();
  });

  device.on('registered', () => {
    console.log("Twilio Device is ready");
    updateCallStatus('Device is ready');
  });

  device.on('error', error => {
    if (error.code === 20104) {
      updateCallStatus("Token expired. Attempting refresh...");
      refreshTwilioToken();
    } else {
      alert_float('danger', 'Twilio error: ' + error.message);
      dropLiveCall();
    }
  });

  device.on('connect', connection => {
    callProgress = true;
    _connection = connection;
    setTimeout(() => {
      if (connection.status() === "open") {
        startTimer();
        const toNumber = connection.parameters.To || 'Unknown';
        updateCallStatus("In call with " + toNumber);
        acceptedDialledCall(toNumber);
      }
    }, 1000);
    bindCallControls(connection);
  });

  device.on('disconnect', () => {
    hangupCall();
    dropLiveCall();
    table_lead_manager.DataTable().ajax.reload(null, false);
  });
  device.on('incoming', async (call) => {
    try {
      const edge = device.edge;
      const options = { edge };
      const newDevice = new Twilio.Device(twilioToken, options);

      await newDevice.register();
      const forwardedCall = await newDevice.connect({ connectToken: call.connectToken });

      handleIncomingCall(forwardedCall);

      forwardedCall.on('disconnect', () => {
        newDevice.destroy();
      });
    } catch (err) {
      console.error("Error handling forwarded call:", err);
    }
  });
}
async function dialPhone(e) {
  const to = $(e).data('to');
  const from = $(e).data('from');
  const leadId = $(e).data('id');
  const clientId = $(e).data('client_id');
  const isLead = $(e).data('is_lead');

  try {
    outGoingCall = await device.connect({
      params: { To: to, From: from, leadId, clientId, isLead }
    });

    outGoingCall.on('accept', connection => {
      _connection = connection;
      updateCallStatus('Call has been answered!');
      startTimer();
      const toNumber = connection.parameters.To || 'Unknown';
      acceptedDialledCall(toNumber);
      bindCallControls(connection);
    });

    callProgress = true;
    $("#dialing-soft-phone .details span").text(to);
    $("#dialing-soft-phone").show();
  } catch (err) {
    console.error('Call failed to connect:', err);
    alert_float('danger', 'Call connection failed');
  }
}
function bindCallControls(connection) {
  $(".sound").off("click").on("click", () => {
    const mute = connection.isMuted();
    connection.mute(!mute);
    onMuteChange(mute);
  });

  $("#drop").off("click").on("click", () => {
    connection.disconnect();
    dropLiveCall();
    dropRingingCall();
    $("#dialer_modal").hide();
  });

  $("#hold-btn").off("click").on("click", () => {
    onHoldClick($("#hold-btn"), connection.parameters.CallSid);
  });

  $("#confrence-btn").off("click").on("click", () => {
    onClickConfrence($("#confrence-btn"), connection.parameters.CallSid);
  });
}
function handleIncomingCall(connection) {
  _connection = connection;
  const fromNumber = connection.parameters.From || 'Unknown';
  incomingCallFrom = fromNumber;

  $("#ringing-soft-phone .details span").text(fromNumber);
  $("#ringing-soft-phone").show();

  $("#accept").off("click").on("click", () => {
    connection.accept();
    acceptCall(fromNumber);
    updateCallStatus("Call accepted from " + fromNumber);
    bindCallControls(connection);
  });

  $("#refuse").off("click").on("click", () => {
    connection.reject();
    dropRingingCall();
    updateCallStatus("Call rejected by agent");
  });

  connection.on('disconnect', () => {
    dropLiveCall();
    dropRingingCall();
    updateCallStatus("Call disconnected");
    table_lead_manager.DataTable().ajax.reload(null, false);
  });

  connection.on('ignore', () => {
    dropRingingCall();
    updateCallStatus("Call ignored");
  });

  console.log("Incoming CallSid:", connection.parameters.CallSid);
}
function updateCallStatus(status) {
  console.log(status);
}

function acceptedDialledCall(phoneNumber) {
  $(".dialing").removeClass("-dialing").addClass("-flip");
  $("#speaking-soft-phone").addClass("show_cut_btn");
  $(".speaking").removeClass("flipback");
  $("#caller-info").html(phoneNumber);
}

function acceptCall(phoneNumber) {
  $(".ringing").removeClass("-ringing").addClass("-flip");
  $("#speaking-soft-phone").addClass("show_cut_btn");
  $(".speaking").removeClass("flipback");
  $("#caller-info").html(phoneNumber);
}

function dropLiveCall() {
  resetTimer();
  holdStatus = false;
  confrenceStatus = false;
  $(".speaking").addClass("-drop");
  setTimeout(() => {
    $("#speaking-soft-phone").removeClass("show_cut_btn");
    $(".speaking").addClass("flipback").removeClass("hold -drop");
  }, 2000);
  $("#confrence-btn").removeClass("confrence").addClass("_confrence");
  $(".conference_list ul").html("");
  callProgress = false;
}

function dropRingingCall() {
  $(".ringing").addClass("-drop");
  setTimeout(() => {
    $(".ringing").removeClass("-drop").css('display', '');
  }, 2000);
}

function refreshTwilioToken() {
  return $.post(admin_url + 'lead_manager/generateClientToken', {
    forPage: window.location.pathname,
  }).then(data => {
    data = JSON.parse(data);
    twilioToken = data.token;
    if (device) {
      device.updateToken(twilioToken);
      updateCallStatus("Twilio token refreshed");
    }
  }).catch(err => {
    alert_float("danger", "Failed to refresh Twilio token:" + err);
    updateCallStatus("Token refresh failed");
  });
}
$(document).ready(() => {
  setupClient();
});
