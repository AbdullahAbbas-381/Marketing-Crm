<div id="bill-form-container">
    <div class="card card-body invoice-wrapper" id="invoice-wrapper">


<div class="">
    <div class="" style="padding: 40px 20px; box-shadow: 3px 5px 18px 5px #c5c5c5; border-radius: 10px; margin-bottom: 20px; height: 1200px; display: flex; flex-direction: column; justify-content: space-between; background-image: url('https://paramountbuilt.co.uk/wp-content/uploads/2025/top_banner_email_template.png'); background-repeat: no-repeat; background-position: center; background-size: cover;">
    	<div class="" style="width: 150px; height: 80px;">
    		<img width="100%" height="100%" src="https://paramountbuilt.co.uk/wp-content/uploads/2025/paramountbuilt_white_logo.png" alt="Paramountbuilt">	
    	</div>
    	<div>
    		<div class="">
    			<div class="" style="padding: 20px; padding-left: 0px;">
    				<h2 style="font-size: 30px; margin: 0px; text-align: center; margin-bottom: 10px;">CLIENT NAME</h2>
    				<h2 style="font-size: 30px; color: #5CC6C4; margin: 0px; text-align: center; margin-bottom: 10px; text-transform: uppercase;">{{ $bill->client_company_name }}</h2>	
    			</div>
    		</div>
    		<div class="" style="display: flex; flex-direction: row; justify-content: space-between; align-items: center; background-color: #5CC6C4; padding: 5px 30px; border-radius: 60px;">
    			<div style="width: 30%;">
    				<p style="font-size: 10px; color: #fff; margin-bottom: 0px;">+44 330 133 9360</p>
    			</div>
    			<div style="width: 30%;">
    				<p style="font-size: 10px; color: #fff; margin-bottom: 0px;">www.paramountbuilt.co.uk</p>
    			</div>
    			<div style="width: 30%;">
    				<p style="font-size: 10px; color: #fff; margin-bottom: 0px;">85 Great Portland St, London W1W 7LT, United Kingdom</p>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="" style="box-shadow: 3px 5px 18px 5px #c5c5c5; border-radius: 10px; margin-bottom: 20px; overflow: hidden;">
		<div style=" padding: 40px 20px; background-image: url('https://paramountbuilt.co.uk/wp-content/uploads/2025/09/template_background.png'); background-size: cover; background-repeat: no-repeat; margin-bottom: 40px;">
			<div style="display: flex; justify-content: end;">
				<div class="" style="width: 150px; height: 80px;">
					<img width="100%" height="100%" src="https://paramountbuilt.co.uk/wp-content/uploads/2025/paramountbuilt_white_logo.png" alt="Paramountbuilt">	
				</div>
			</div>
			<div class="">
				<div class="" style="padding: 20px; padding-left: 0px;">
					<h2 style="font-size: 50px; margin: 0px; color: #fff;">
                		@if($bill->bill_type == 'invoice')
                            INVOICE.
                        @endif
                        @if($bill->bill_type == 'estimate')
                            ESTIMATE.
                        @endif
					</h2>
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<h2 style="font-size: 25px; margin: 0px; text-align: center; color: #fff;">
                            @if($bill->bill_type == 'invoice')
                                #{{ $bill->formatted_bill_invoiceid }}
                            @endif
                            @if($bill->bill_type == 'estimate')
                                #{{ $bill->formatted_bill_estimateid }}
                            @endif
                            
                        </h2>
						<div style="width: 30%;">
							<h2 style="font-size: 20px; margin: 0px; text-align: center; color: #fff; margin-bottom: 10px;">
                                @if($bill->bill_type == 'invoice')
                                    INVOICE DATE
                                @endif
                                @if($bill->bill_type == 'estimate')
                                    ESTIMATE DATE
                                @endif
                            </h2>
							<h2 style="font-size: 20px; margin: 0px; text-align: center; color: #fff; margin-bottom: 10px;">{{ runtimeDate($bill->bill_date) }}</h2>
						</div>
					</div>
				</div>
			</div>
			<div style="display: flex; flex-direction: row; justify-content: space-between; align-items: stretch; width: 100%; padding-top:50px;" >
				<div style="width: 44%; background-color: #fff; border-radius: 20px; padding: 20px;">
					<address>
                        <h3 style="margin: 0px; margin-bottom: 10px;">
                            @if($bill->bill_type == 'invoice')
                                INVOICE FROM.
                            @endif
                            @if($bill->bill_type == 'estimate')
                                ESTIMATE FROM.
                            @endif
                        </h3>
                        <h2 style="font-size: 40px; color: #5CC6C4; margin: 0px; margin-bottom: 10px;">{{ config('system.settings_company_name') }}</h2>
                        <p class="text-muted m-l-5">
                            @if(config('system.settings_company_address_line_1'))
                            {{ config('system.settings_company_address_line_1') }}
                            @endif
                            @if(config('system.settings_company_city'))
                            <br /> {{ config('system.settings_company_city') }}
                            @endif
                            @if(config('system.settings_company_state'))
                            <br />{{ config('system.settings_company_state') }}
                            @endif
                            @if(config('system.settings_company_zipcode'))
                            <br /> {{ config('system.settings_company_zipcode') }}
                            @endif
                            @if(config('system.settings_company_country'))
                            <br /> {{ config('system.settings_company_country') }}
                            @endif

                            <!--custom company fields-->
                            @if(config('system.settings_company_customfield_1') != '')
                            <br /> {{ config('system.settings_company_customfield_1') }}
                            @endif
                            @if(config('system.settings_company_customfield_2') != '')
                            <br /> {{ config('system.settings_company_customfield_2') }}
                            @endif
                            @if(config('system.settings_company_customfield_3') != '')
                            <br /> {{ config('system.settings_company_customfield_3') }}
                            @endif
                            @if(config('system.settings_company_customfield_4') != '')
                            <br /> {{ config('system.settings_company_customfield_4') }}
                            @endif
                        </p>
                    </address>
				</div>
				<div style="width: 34%; background-color: #fff; border-radius: 20px; padding: 20px;">
					<address>
                        <h3 class="">
                            @if($bill->bill_type == 'invoice')
                                INVOICE TO.
                            @endif
                            @if($bill->bill_type == 'estimate')
                                ESTIMATE TO.
                            @endif
                        </h3>
                        <a href="{{ url('clients/'.$bill->client_id) }}">
                            <h4 style="font-size: 40px; color: #5CC6C4; margin: 0px; margin-bottom: 10px;">{{ $bill->client_company_name }}</h4>
                        </a>
                        <p class="text-muted m-l-30">
                            @if($bill->client_billing_street)
                            {{ $bill->client_billing_street }}
                            @endif
                            @if($bill->client_billing_city)
                            <br /> {{ $bill->client_billing_city }}
                            @endif
                            @if($bill->client_billing_state)
                            <br /> {{ $bill->client_billing_state }}
                            @endif
                            @if($bill->client_billing_zip)
                            <br /> {{ $bill->client_billing_zip }}
                            @endif
                            @if($bill->client_billing_country)
                            <br /> {{ $bill->client_billing_country }}
                            @endif

                            <!--custom fields-->
                            @foreach($customfields as $field)
                            @if($field->customfields_show_invoice == 'yes' && $field->customfields_status == 'enabled')
                            @php $key = $field->customfields_name; @endphp
                            @php $customfield = $bill[$key] ?? ''; @endphp
                            @if($customfield != '')
                            <br />{{ $field->customfields_title }}:
                            {{ runtimeCustomFieldsFormat($customfield, $field->customfields_datatype) }}
                            @endif
                            @endif
                            @endforeach
                        </p>
                    </address>
				</div>
				<div style="width: 20%; background-color: #fff; border-radius: 20px; padding: 20px; text-align: center; align-items: center; justify-content: center; display: flex; flex-direction: column;">
					<h3 style="margin: 0px; margin-bottom: 10px;">Balance Due</h3>
					<h2 style="font-size: 40px; color: #5CC6C4 ; margin: 0px;">{!! runtimeMoneyFormatPDF($bill->bill_final_amount) !!}</h2>
				</div>
			</div>

        </div>

        <div  style=" padding: 40px 20px;">

            <!--scheduled for publishing-->
            @if($bill->bill_status == 'draft' && $bill->bill_publishing_type == 'scheduled')
            @if($bill->bill_publishing_scheduled_status == 'pending')
            <div class="alert alert-info m-b-0 m-t-5">@lang('lang.scheduled_publishing_info') :
                {{ runtimeDate($bill->bill_publishing_scheduled_date) }}</div>
            @endif
            @if($bill->bill_publishing_scheduled_status == 'failed')
            <div class="alert alert-danger m-b-0 m-t-5">@lang('lang.scheduled_publishing_failed_info') :
                {{ runtimeDate($bill->bill_publishing_scheduled_date) }}</div>
            @endif
            @endif

            <hr class="billing-mode-only-item">
            <div class="row">
                <!--project title-->
                @if(config('system.settings_invoices_show_project_on_invoice') == 'yes' && $bill->project_title != '')
                <div class="col-12 m-b-10 billing-mode-only-item invoice-project-title">
                    <span class="">@lang('lang.project'):</span> {{ $bill->project_title }}
                </div>
                @endif

                <!--DATES & AMOUNT DUE-->
                @if($bill->bill_type == 'invoice')
                <div class="col-12 m-b-10 billing-mode-only-item" id="invoice-dates-wrapper">
                    @include('pages.bill.components.elements.invoice.dates')
                    @include('pages.bill.components.elements.invoice.payments')
                </div>
                @endif
                @if($bill->bill_type == 'estimate')
                <div class="col-12 m-b-10 billing-mode-only-item" id="invoice-dates-wrapper">
                    @include('pages.bill.components.elements.estimate.dates')
                </div>
                @endif


                <!--INVOICE TABLE-->
                @include('pages.bill.components.elements.main-table')


                <!--[EDITING] INVOICE LINE ITEMS BUTTONS -->
                @if(config('visibility.bill_mode') == 'editing')
                <div class="col-12">
                    @include('pages.bill.components.misc.add-line-buttons')
                </div>
                @endif


                <!-- TOTAL & SUMMARY -->
                @include('pages.bill.components.elements.totals-table')

                <!-- TAXES & DISCOUNTS -->
                @if(config('visibility.bill_mode') == 'editing')
                @include('pages.bill.components.elements.taxes-discounts')
                @endif


                <!--[VIEWING] INVOICE TERMS & MAKE PAYMENT BUTTON-->
                @if(config('visibility.bill_mode') == 'viewing')
                <div class="col-12 billing-mode-only-item">
                    <!--invoice terms-->
                    <div class="text-left">
                        @if($bill->bill_type == 'invoice')
                        <h4>{{ cleanLang(__('lang.invoice_terms')) }}</h4>
                        @else
                        <h4>{{ cleanLang(__('lang.estimate_terms')) }}</h4>
                        @endif
                        <div id="invoice-terms">{!! clean($bill->bill_terms) !!}</div>
                    </div>
                    <!--client - make a payment button-->
                    @if((auth()->check() && auth()->user()->is_client) || config('visibility.public_bill_viewing'))
                    <hr>
                    <div class="p-t-25 invoice-pay" id="invoice-buttons-container">
                        <div class="text-right">
                            <!--[invoice] download pdf-->
                            <span>
                                @if($bill->bill_type == 'invoice')
                                <a class="btn btn-secondary btn-outline"
                                    href="{{ url('/invoices/'.$bill->bill_invoiceid.'/pdf') }}" download>
                                    <span><i class="mdi mdi-download"></i> {{ cleanLang(__('lang.download')) }}</span> </a>
                                @else
                                <!--[estimate] download pdf-->
                                <a class="btn btn-secondary btn-outline"
                                    href="{{ url('/estimates/view/'.$bill->bill_uniqueid.'/pdf') }}">
                                    <span><i class="mdi mdi-download"></i> {{ cleanLang(__('lang.download')) }}</span> </a>
                                @endif
                            </span>

                            <!--[invoice] - make payment-->
                            @if($bill->bill_type == 'invoice' && $bill->invoice_balance > 0)
                            <button class="btn btn-danger" id="invoice-make-payment-button">
                                {{ cleanLang(__('lang.make_a_payment')) }} </button>
                            @endif

                            <!--accept or decline-->
                            @if(in_array($bill->bill_status, ['new', 'revised']))
                            <!--decline-->
                            <button class="buttons-accept-decline btn btn-danger confirm-action-danger"
                                data-confirm-title="{{ cleanLang(__('lang.decline_estimate')) }}"
                                data-confirm-text="{{ cleanLang(__('lang.decline_estimate_confirm')) }}"
                                data-ajax-type="GET" data-url="{{ url('/') }}/estimates/{{ $bill->bill_uniqueid }}/decline">
                                {{ cleanLang(__('lang.decline_estimate')) }} </button>
                            <!--accept-->
                            <button class="buttons-accept-decline btn btn-success confirm-action-success"
                                data-confirm-title="{{ cleanLang(__('lang.accept_estimate')) }}"
                                data-confirm-text="{{ cleanLang(__('lang.accept_estimate_confirm')) }}" data-ajax-type="GET"
                                data-url="{{ url('/') }}/estimates/{{ $bill->bill_uniqueid }}/accept">
                                {{ cleanLang(__('lang.accept_estimate')) }} </button>
                            @endif


                        </div>
                        @endif

                    </div>
                    <!--payment buttons-->
                    @include('pages.pay.buttons')
                    @endif


                    <!--[EDITING] INVOICE TERMS & MAKE PAYMENT BUTTON-->
                    @if(config('visibility.bill_mode') == 'editing')
                    <div class="col-12">
                        <!--invoice terms-->
                        <div class="text-left billing-mode-only-item">
                            @if($bill->bill_type == 'invoice')
                            <h4>{{ cleanLang(__('lang.invoice_terms')) }}</h4>
                            @else
                            <h4>{{ cleanLang(__('lang.estimate_terms')) }}</h4>
                            @endif
                            <textarea class="form-control form-control-sm tinymce-textarea" rows="3" name="bill_terms"
                                id="bill_terms">{!! clean($bill->bill_terms) !!}</textarea>
                        </div>
                        <!--client - make a payment button-->
                        <div class="text-right p-t-25">
                            @if($bill->bill_type == 'invoice')
                            <!--cancel-->
                            <a class="btn btn-secondary btn-sm"
                                href="{{ url('/invoices/'.$bill->bill_invoiceid) }}">@lang('lang.exit_editing_mode')</a>
                            <!--save changes-->
                            <button class="btn btn-danger btn-sm"
                                data-url="{{ url('/invoices/'.$bill->bill_invoiceid.'/edit-invoice') }}" data-type="form"
                                data-form-id="bill-form-container" data-ajax-type="post" id="billing-save-button">
                                @lang('lang.save_changes')
                            </button>
                            @else
                            <a class="btn btn-secondary btn-sm billing-mode-only-item"
                                href="{{ url('/estimates/'.$bill->bill_estimateid) }}">@lang('lang.exit_editing_mode')</a>
                            <!--save changes-->
                            <a class="btn btn-danger btn-sm" href="javascript:void(0);"
                                data-url="{{ url('/estimates/'.$bill->bill_estimateid.'/edit-estimate?estimate_mode='.request('estimate_mode')) }}"
                                data-type="form" data-form-id="bill-form-container" data-ajax-type="post"
                                data-loading-target="documents-side-panel-billing-content" data-loading-class="loading"
                                id="billing-save-button">
                                @lang('lang.save_changes')
                            </a>
                            @endif
                        </div>
                    </div>
                    @endif

                </div>
        
            </div>
        </div>
    </div>

<div class="" style="box-shadow: 3px 5px 18px 5px #c5c5c5; border-radius: 10px; margin-bottom: 20px; overflow: hidden;">
    <div style="background-color: #5CC6C4; margin-bottom: 40px;">
        <div style="display: flex; justify-content: start; padding: 40px 20px 0px 20px;">
            <div class="" style="width: 150px; height: 80px;">
                <img width="100%" height="100%" src="https://paramountbuilt.co.uk/wp-content/uploads/2025/paramountbuilt_white_logo.png" alt="Paramountbuilt">	
            </div>
        </div>
        <div class="" style="padding: 20px;">
            <div class="" style="padding: 20px; padding-left: 0px;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div style="width: 50%;">
                        <h2 style="font-size: 60px; margin: 0px; color: #000; margin-bottom: 10px;">Important Payment</h2>
                        <h2 style="font-size: 60px; margin: 0px; color: #fff; margin-bottom: 10px;">Information</h2>
                    </div>
                    <div style="width: 40%;">
                        <img width="100%" height="100%" src="https://paramountbuilt.co.uk/wp-content/uploads/2025/1-removebg-preview.png" alt="Paramountbuilt">	
                    </div>
                </div>
                <p style="color: #fff;">Please note that UK banks may conduct security checks when processing payments to verify that they are being sent to the correct business account. This is a standard procedure and nothing to be concerned about. </p>
            </div>
        </div>
        <div style="display: flex; flex-direction: row; align-items: center; justify-content: space-between; background-color: #fff; padding: 20px;"> 
            <div style="text-align: center; width: 30%;">
                <div style="">
                    <img width="50%" height="100%" src="https://paramountbuilt.co.uk/wp-content/uploads/2025/sheild.png" alt="Paramountbuilt">	
                </div>
                <p>Our business account is fully verified and registered under ParamountBuilt.</p>
            </div>
            <div style="text-align: center; width: 30%;">
                <div style="">
                    <img width="50%" height="100%" src="https://paramountbuilt.co.uk/wp-content/uploads/2025/dolor_bank.png" alt="Paramountbuilt">	
                </div>
                <p>If your bank requests confirmation, you can proceed with confidence. </p>
            </div>
            <div style="text-align: center; width: 30%;">
                <div style="">
                    <img width="50%" height="100%" src="https://paramountbuilt.co.uk/wp-content/uploads/2025/person_call.png" alt="Paramountbuilt">	
                </div>
                <p>If you have any concerns, please contact us at 03301339001</p>
            </div>
        </div>

        <div style="padding: 20px;">
            <p style="color: #fff;"><b>If you wish to verify the status of <spam style="color: #000;">PARAMOUNTBUILT LTD (Company Number: 15067256), </spam> you may consult your bank for further confirmation. </b></p>
            <p style="color: #fff;"><b>For independent legal guidance, you can also seek advice from the *Citizens Advice Bureau* at <spam  style="color: #000;">(www.citizensadvice.org.uk).</spam></b></p>
            <h2 style="color: #fff;">Thank you for your business and trust in ParamountBuilt.</h2>
        </div>

        <div style="padding: 20px;background-color: #fff;">
            <div class="" style="display: flex; flex-direction: row; justify-content: space-between; align-items: center; background-color: #5CC6C4; padding: 5px 30px; border-radius: 60px; margin-bottom: 20px;">
                <p style="color: #fff; margin-bottom: 0px;"><b>Complimentary Zoom Consultation (Included – No Charge)</b></p>
            </div>
            <div style="padding: 0px 30px;">
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        Free, no-obligation consultation to discuss your project requirements.
                    </p>
                </div>
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        Expert advice on feasibility, structural concerns, and report scope.
                    </p>
                </div>
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        Address preliminary queries before proceeding with the inspection.
                    </p>
                </div>
            </div>
            <div class="" style="display: flex; flex-direction: row; justify-content: space-between; align-items: center; background-color: #5CC6C4; padding: 5px 30px; border-radius: 60px; margin-bottom: 20px;">
                <p style="color: #fff; margin-bottom: 0px;"><b>Site Inspection & Structural Assessment </b></p>
            </div>
            <div style="padding: 0px 30px;">
                <div>
                    <p style="font-size: 12px;">A qualified Chartered Structural Engineer will conduct a meticulous site inspection, covering:</p>
                </div>
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px; ">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        Comprehensive Visual Assessment of all accessible areas, including the roof space, basement, and external elevations.
                    </p>
                </div>
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px; ">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        Structural Evaluation of key elements: foundations, walls, floors, beams, columns, and roof structures.
                    </p>
                </div>
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px; ">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        Defect Identification such as cracking, subsidence, dampness, movement, or timber decay.
                    </p>
                </div>
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px; ">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        Extensive Photographic Documentation with detailed sketches and professional notes.
                    </p>
                </div>
            </div>
            <div class="" style="display: flex; flex-direction: row; justify-content: space-between; align-items: center; background-color: #5CC6C4; padding: 5px 30px; border-radius: 60px; margin-bottom: 20px;">
                <p style="color: #fff; margin-bottom: 0px;"><b>Structural Integrity Report Preparation </b></p>
            </div>
            <div style="padding: 0px 30px;">
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px; ">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        After the site assessment, we will prepare a detailed, professional report, including:
                    </p>
                </div>
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px; ">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        Clear summaries of inspection findings.
                    </p>
                </div>
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px; ">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        Comprehensive descriptions of identified structural concerns, their causes, and impact.
                    </p>
                </div>
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px; ">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        Expert Recommendations on required remedial actions, including cost estimates.
                    </p>
                </div>
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px; ">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        High-quality technical sketches and structural drawings to visually support findings.
                    </p>
                </div>
            </div>
            <div class="" style="display: flex; flex-direction: row; justify-content: space-between; align-items: center; background-color: #5CC6C4; padding: 5px 30px; border-radius: 60px; margin-bottom: 20px;">
                <p style="color: #fff; margin-bottom: 0px;"><b>Report Delivery & Follow-up Consultation </b></p>
            </div>
            <div style="padding: 0px 30px;">
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px; ">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        Final report delivery in digital PDF format.
                    </p>
                </div>
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px; ">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        Follow-up consultation session to review findings, recommendations, and next steps.
                    </p>
                </div>
                <div>
                    <p style="font-size: 12px; display: flex; align-items: center; gap: 5px; ">
                        <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                        Guidance on further actions, including planning applications and contractor engagement.
                    </p>
                </div>
            </div>
            <div class="" style="display: flex; flex-direction: row; justify-content: space-between; align-items: center; background-color: #5CC6C4; padding: 5px 30px; border-radius: 60px;">
                <div style="width: 30%;">
                    <p style="font-size: 10px; color: #fff; margin-bottom: 0px;">+44 330 133 9360</p>
                </div>
                <div style="width: 30%;">
                    <p style="font-size: 10px; color: #fff; margin-bottom: 0px;">www.paramountbuilt.co.uk</p>
                </div>
                <div style="width: 30%;">
                    <p style="font-size: 10px; color: #fff; margin-bottom: 0px;">85 Great Portland St, London W1W 7LT, United Kingdom</p>
                </div>
            </div>
        </div>	
    </div>
</div>

<div class="" style="box-shadow: 3px 5px 18px 5px #c5c5c5; border-radius: 10px; margin-bottom: 20px;">
    <div style=" padding: 40px 20px; background-image: url('https://paramountbuilt.co.uk/wp-content/uploads/2025/09/template_background.png'); background-size: cover; background-repeat: no-repeat;">
        <div style="display: flex; justify-content: end;">
            <div class="" style="display: flex; justify-content: center;" >
                <img width="60%" height="100%" src="https://paramountbuilt.co.uk/wp-content/uploads/2025/paramountbuilt_white_logo.png" alt="Paramountbuilt">	
            </div>
        </div>
        <div class="">
            <div class="" style="padding: 20px; padding-left: 0px; text-align: center;">
                <h2 style="font-size: 30px; margin: 0px; color: #000; margin-bottom: 5px;">Terms and Conditions of</h2>
                <h2 style="font-size: 30px; margin: 0px; color: #000; margin-bottom: 10px;">Service</h2>
                <h2 style="font-size: 30px; margin: 0px; color: #fff; margin-bottom: 10px; line-height: 30px;">(Company Registered in England, No: 15067256)</h2>
            </div>
        </div>
    </div>
    <div style="padding: 20px;">
        <h2 style="margin: 0px;">Definitions</h2>
        <p><spam style="color: #5CC6C4; font-weight: bold;">Company:</spam> Paramountbuilt Ltd. (Company No: 15067256).</p>
        <p><spam style="color: #5CC6C4; font-weight: bold;">Client:</spam> Individual or entity commissioning services.</p>
        <p><spam style="color: #5CC6C4; font-weight: bold;">Proposal:</spam> Written document outlining agreed services, fees, and project scope.</p>
        <p><spam style="color: #5CC6C4; font-weight: bold;">Services:</spam> Architectural design, planning permission, structural calculations, building regulations compliance, party wall, boundary services, inspections, consultations, and related services outlined in the Proposal.</p>

        <h2 style="margin: 0px;">Acceptance of Terms</h2>
        <p>By signing or accepting the Proposal electronically or physically, the Client acknowledges acceptance and agreement to these Terms and Conditions.</p>

        <h2 style="margin: 0px;">Scope of Services</h2>
        <p>The Company shall provide services detailed explicitly within the signed Proposal. Any services outside this agreed scope shall require a separate written agreement.</p>

        <h2 style="margin: 0px;">Fees and Payment Terms</h2>
        <div>
            <div>
                <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                    <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                    Payment terms are clearly defined in the Proposal.
                </p>
            </div>
            <div>
                <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                    <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                    Payment is due upon invoicing or as per agreed milestones.
                </p>
            </div>
            <div>
                <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                    <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                    Late payments may incur statutory interest under the Late Payment of Commercial Debts (Interest) Act 1998.
                </p>
            </div>
        </div>

        <h2 style="margin: 0px;">Client Obligations</h2>
        <p style="font-size: 12px;">The Client shall:</p>
        <div>
            <div>
                <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                    <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                    Provide accurate, complete information and timely cooperation.
                </p>
            </div>
            <div>
                <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                    <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                    Grant necessary access to premises and relevant documentation.
                </p>
            </div>
            <div>
                <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                    <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                    Ensure timely decisions and approvals to avoid project delays.
                </p>
            </div>
        </div>
        <h2 style="margin: 0px;">Amendments and Additional Work</h2>
        <p style="font-size: 12px;">Any additional work or modifications requested beyond the original Proposal must be agreed upon in writing and may incur additional charges and timelines.</p>

        <h2 style="margin: 0px;">Intellectual Property Rights</h2>
        <div>
            <div>
                <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                    <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                    All intellectual property rights related to the provided designs, drawings, calculations, and documents shall remain the exclusive property of Paramountbuilt Ltd. until full payment is received.
                </p>
            </div>
            <div>
                <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                    <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                    Unauthorised usage, duplication, or distribution is prohibited.
                </p>
            </div>
        </div>

        <h2 style="margin: 0px;">Planning Permissions and Building Regulations</h2>
        <div>
            <div>
                <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                    <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                    The Company will prepare and submit required documentation professionally but cannot guarantee approvals from planning councils or building control authorities.
                </p>
            </div>
            <div>
                <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                    <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                    All approval decisions rest exclusively with relevant authorities.
                </p>
            </div>
        </div>

        <h2 style="margin: 0px;">Structural and Inspection Services</h2>
        <div>
            <div>
                <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                    <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                    Structural calculations comply with current British Standards and regulations.
                </p>
            </div>
            <div>
                <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                    <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                    Inspection services provided are visual and non-invasive unless explicitly agreed otherwise.
                </p>
            </div>
        </div>

        <h2 style="margin: 0px;">Party Wall and Boundary Services</h2>
        <div>
            <div>
                <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                    <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                    Party wall services are provided in line with the Party Wall etc. Act 1996.
                </p>
            </div>
            <div>
                <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                    <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                    Boundary consultations do not constitute legal advice; legal representation must be sought separately if required.
                </p>
            </div>
        </div>
        <h2 style="margin: 0px;">Consultations</h2>
        <p style="font-size: 12px;">Consultations (Zoom, phone, or otherwise) are by appointment. Extended sessions beyond agreed durations may incur additional charges.</p>

        <h2 style="margin: 0px;">Liability Limitation</h2>
        <div>
            <div>
                <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                    <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                    Paramountbuilt Ltd.’s total liability shall not exceed the total fees payable for the relevant Services.
                </p>
            </div>
            <div>
                <p style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                    <img src="https://paramountbuilt.co.uk/wp-content/uploads/2025/09/email_template_icon.png" style="width: 15px; height: 15px;" />
                    The Company shall not be liable for consequential or indirect losses or damages.
                </p>
            </div>
        </div>
        <h2 style="margin: 0px;">Indemnity</h2>
        <p style="font-size: 12px;">The Client agrees to indemnify Paramountbuilt Ltd. against all liabilities, costs, claims, or demands arising from the Client’s misuse or unauthorised dissemination of provided documentation or advice.</p>
        <h2 style="margin: 0px;">Confidentiality</h2>
        <p style="font-size: 12px;">Both parties agree to maintain confidentiality of all sensitive and proprietary information relating to the Services unless disclosure is required by law.</p>
        <h2 style="margin: 0px;">Insurance</h2>
        <p style="font-size: 12px;">The Company holds appropriate Professional Indemnity Insurance coverage compliant with UK regulations, details available upon request.</p>
        <h2 style="margin: 0px;">Right to Engage Third Parties</h2>
        <p style="font-size: 12px;">Paramountbuilt Ltd. reserves the right to subcontract or collaborate with third-party consultants or specialists as required, maintaining ultimate responsibility for project delivery quality.</p>
        <h2 style="margin: 0px;">Marketing and Portfolio Use</h2>
        <p style="font-size: 12px;">The Company reserves the right to use completed project materials, images, or descriptions for marketing purposes unless otherwise explicitly agreed in writing.</p>
        <h2 style="margin: 0px;">Force Majeure</h2>
        <p style="font-size: 12px;">Neither party will be liable for delays or failures resulting from circumstances beyond reasonable control, including but not limited to acts of God, strikes, pandemics, governmental regulations, or natural disasters.</p>
        <h2 style="margin: 0px;">Termination</h2>
        <p style="font-size: 12px;">Either party may terminate the agreement upon fourteen (14) days’ written notice. The Client remains liable for all fees incurred up to the termination date.</p>
        <h2 style="margin: 0px;">Dispute Resolution</h2>
        <p style="font-size: 12px;">Any disputes arising shall first be subject to negotiation between the parties. Should this fail, disputes shall proceed to mediation or arbitration according to English law standards.</p>
        <h2 style="margin: 0px;">Governing Law and Jurisdiction</h2>
        <p style="font-size: 12px;">These Terms and Conditions shall be governed by and construed in accordance with English law. Both parties agree to submit exclusively to the jurisdiction of the courts of England and Wales.</p>
        <h2 style="margin: 0px;">Amendments to Terms</h2>
        <p style="font-size: 12px;">The Company reserves the right to amend these Terms and Conditions at its discretion, provided reasonable written notice is given to the Client.</p>
        <h2 style="margin: 0px;">Entire Agreement</h2>
        <p style="font-size: 12px;">These Terms and Conditions, together with the Proposal, constitute the entire understanding and agreement between Paramountbuilt Ltd. and the Client, superseding any previous understandings, negotiations, or agreements.</p>

        <div class="" style="display: flex; flex-direction: row; justify-content: space-between; align-items: center; background-color: #5CC6C4; padding: 5px 30px; border-radius: 60px; margin-top: 100px;">
            <div style="width: 30%;">
                <p style="font-size: 10px; color: #fff; margin-bottom: 0px;">+44 330 133 9360</p>
            </div>
            <div style="width: 30%;">
                <p style="font-size: 10px; color: #fff; margin-bottom: 0px;">www.paramountbuilt.co.uk</p>
            </div>
            <div style="width: 30%;">
                <p style="font-size: 10px; color: #fff; margin-bottom: 0px;">85 Great Portland St, London W1W 7LT, United Kingdom</p>
            </div>
        </div>
    </div>	
</div>
	
        </div>

        <!--ADMIN ONLY NOTES-->
        @if((auth()->check() && auth()->user()->is_team) && !config('visibility.public_bill_viewing'))
        @if(config('visibility.bill_mode') == 'viewing')
        <div class="card card-body invoice-wrapper box-shadow billing-mode-only-item billing-mode-only-item"
            id="invoice-wrapper">
            <h4 class="">{{ cleanLang(__('lang.notes')) }} <span class="align-middle text-themecontrast font-16"
                    data-toggle="tooltip" title="{{ cleanLang(__('lang.not_visisble_to_client')) }}"
                    data-placement="top"><i class="ti-info-alt"></i></span></h4>
            <div>{!! clean($bill->bill_notes) !!}</div>
        </div>
        @endif
        @if(config('visibility.bill_mode') == 'editing')
        <div class="card card-body invoice-wrapper box-shadow billing-mode-only-item" id="invoice-wrapper">
            <h4 class="">{{ cleanLang(__('lang.notes')) }} <span class="align-middle text-themecontrast font-16"
                    data-toggle="tooltip" title="{{ cleanLang(__('lang.not_visisble_to_client')) }}"
                    data-placement="top"><i class="ti-info-alt"></i></span></h4>
            <div><textarea class="form-control form-control-sm tinymce-textarea" rows="3" name="bill_notes"
                    id="bill_notes">{!! clean($bill->bill_notes) !!}</textarea></div>
        </div>
        @endif
        @endif

        <!--INVOICE LOGIC-->
        @if(config('visibility.bill_mode') == 'editing')
        @include('pages.bill.components.elements.logic')
        @endif

    </div>

    <!--ELEMENTS (invoice line item)-->
    @if(config('visibility.bill_mode') == 'editing')
    <table class="hidden" id="billing-line-template-plain">
        @include('pages.bill.components.elements.line-plain')
    </table>
    <table class="hidden" id="billing-estimation-notes-template">
        @include('pages.bill.components.elements.line-estimation-notes')
    </table>
    <table class="hidden" id="billing-line-template-time">
        @include('pages.bill.components.elements.line-time')
    </table>
    <table class="hidden" id="billing-line-template-dimensions">
        @include('pages.bill.components.elements.line-dimensions')
    </table>

    <!--MODALS-->
    @include('pages.bill.components.modals.items')
    @include('pages.bill.components.modals.category-items')
    @include('pages.bill.components.modals.expenses')
    @include('pages.bill.components.timebilling.modal')
    @include('pages.bill.components.modals.bill-tasks')

    <!--[DYNAMIC INLINE SCRIPT] - Get lavarel objects and convert to javascript onject-->
    <script>
        $(document).ready(function () {
            NXINVOICE.DATA.INVOICE = $.parseJSON('{!! $bill->json !!}');
            NXINVOICE.DOM.domState();
        });
    </script>
    @endif