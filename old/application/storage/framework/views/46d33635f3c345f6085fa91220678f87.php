<div class="splash-image" id="updatePasswordSplash">
    <img src="<?php echo e(url('/')); ?>/public/images/notifications.png" alt="404 - Not found" />
</div>
<div class="splash-text">
    <?php echo app('translator')->get('lang.notify_me_about_these_events'); ?>
</div>
<div class="splash-subtext">
    <?php echo app('translator')->get('lang.events_such_as'); ?>
</div>

<!--notifications_new_assignement-->
<?php if(auth()->user()->is_team): ?>
<div class="form-group form-group-checkbox row">
    <label class="col-5 col-form-label text-left"><?php echo app('translator')->get('lang.new_assignment'); ?></label>
    <div class="col-7 text-right p-t-5">
        <select class="select2-basic form-control form-control-sm text-left" id="notifications_new_assignement"
            data-allow-clear="false" name="notifications_new_assignement">
            <option value="yes" <?php echo e(runtimePreselected('yes', auth()->user()->notifications_new_assignement)); ?>>
                <?php echo app('translator')->get('lang.notification_only'); ?></option>
            <option value="yes_email"
                <?php echo e(runtimePreselected('yes_email', auth()->user()->notifications_new_assignement)); ?>>
                <?php echo app('translator')->get('lang.notification_and_email'); ?></option>
            <option value="no" <?php echo e(runtimePreselected('no', auth()->user()->notifications_new_assignement)); ?>>
                <?php echo app('translator')->get('lang.nothing'); ?></option>
        </select>
    </div>
</div>
<?php endif; ?>


<!--notifications_billing_activity-->
<?php if(auth()->user()->is_team): ?>
<div class="form-group form-group-checkbox row">
    <label class="col-5 col-form-label text-left"><?php echo app('translator')->get('lang.billing'); ?></label>
    <div class="col-7 text-right p-t-5">
        <select class="select2-basic form-control form-control-sm text-left" id="notifications_billing_activity"
            data-allow-clear="false" name="notifications_billing_activity">
            <option value="yes" <?php echo e(runtimePreselected('yes', auth()->user()->notifications_billing_activity)); ?>>
                <?php echo app('translator')->get('lang.notification_only'); ?></option>
            <option value="yes_email"
                <?php echo e(runtimePreselected('yes_email', auth()->user()->notifications_billing_activity)); ?>>
                <?php echo app('translator')->get('lang.notification_and_email'); ?></option>
            <option value="no" <?php echo e(runtimePreselected('no', auth()->user()->notifications_billing_activity)); ?>>
                <?php echo app('translator')->get('lang.nothing'); ?></option>
        </select>
    </div>
</div>
<?php endif; ?>


<!--notifications_new_project-->
<?php if(auth()->user()->is_client): ?>
<div class="form-group form-group-checkbox row">
    <label class="col-5 col-form-label text-left"><?php echo app('translator')->get('lang.new_project'); ?></label>
    <div class="col-7 text-right p-t-5">
        <select class="select2-basic form-control form-control-sm text-left" id="notifications_new_project"
            data-allow-clear="false" name="notifications_new_project">
            <option value="yes_email" <?php echo e(runtimePreselected('yes_email', auth()->user()->notifications_new_project)); ?>>
                <?php echo app('translator')->get('lang.notification_and_email'); ?></option>
            <option value="no" <?php echo e(runtimePreselected('no', auth()->user()->notifications_new_project)); ?>>
                <?php echo app('translator')->get('lang.nothing'); ?></option>
        </select>
    </div>
</div>
<?php endif; ?>

<!--notifications_projects_activity-->
<div class="form-group form-group-checkbox row">
    <label class="col-5 col-form-label text-left"><?php echo app('translator')->get('lang.projects'); ?> <span
        class="align-middle text-info font-16 hidden" data-toggle="tooltip" title="<?php echo app('translator')->get('lang.info_general_activity'); ?>"
        data-placement="top"><i class="ti-info-alt"></i></span></label>
    <div class="col-7 text-right p-t-5">
        <select class="select2-basic form-control form-control-sm text-left" id="notifications_projects_activity"
            data-allow-clear="false" name="notifications_projects_activity">
            <option value="yes" <?php echo e(runtimePreselected('yes', auth()->user()->notifications_projects_activity)); ?>>
                <?php echo app('translator')->get('lang.notification_only'); ?></option>
            <option value="yes_email"
                <?php echo e(runtimePreselected('yes_email', auth()->user()->notifications_projects_activity)); ?>>
                <?php echo app('translator')->get('lang.notification_and_email'); ?></option>
            <option value="no" <?php echo e(runtimePreselected('no', auth()->user()->notifications_projects_activity)); ?>>
                <?php echo app('translator')->get('lang.nothing'); ?></option>
        </select>
    </div>
</div>


<!--[future] notifications_projects_comments-->
<div class="form-group form-group-checkbox row hidden">
    <label class="col-5 col-form-label text-left"><?php echo app('translator')->get('lang.projects_comments'); ?></label>
           <div class="col-7 text-right p-t-5">
        <select class="select2-basic form-control form-control-sm text-left" id="notifications_projects_comments"
            data-allow-clear="false" name="notifications_projects_comments">
            <option value="yes" <?php echo e(runtimePreselected('yes', auth()->user()->notifications_projects_comments)); ?>>
                <?php echo app('translator')->get('lang.notification_only'); ?></option>
            <option value="yes_mentions" <?php echo e(runtimePreselected('yes_mentions', auth()->user()->notifications_projects_comments)); ?>>
                <?php echo app('translator')->get('lang.notification_only'); ?> (<?php echo app('translator')->get('lang.mentions_only'); ?>)</option>
            <option value="yes_email"
                <?php echo e(runtimePreselected('yes_email', auth()->user()->notifications_projects_comments)); ?>>
                <?php echo app('translator')->get('lang.notification_and_email'); ?></option>
            <option value="yes_email_mentions"
                <?php echo e(runtimePreselected('yes_email_mentions', auth()->user()->notifications_projects_comments)); ?>>
                <?php echo app('translator')->get('lang.notification_and_email'); ?> (<?php echo app('translator')->get('lang.mentions_only'); ?>)</option>
            <option value="no" <?php echo e(runtimePreselected('no', auth()->user()->notifications_projects_comments)); ?>>
                <?php echo app('translator')->get('lang.nothing'); ?></option>
        </select>
    </div>
</div>



<?php if(auth()->user()->is_team): ?>
<!--notifications_leads_activity-->
<div class="form-group form-group-checkbox row">
    <label class="col-5 col-form-label text-left"><?php echo app('translator')->get('lang.leads_activity'); ?> <span
        class="align-middle text-info font-16 hidden" data-toggle="tooltip" title="<?php echo app('translator')->get('lang.info_general_activity'); ?>"
        data-placement="top"><i class="ti-info-alt"></i></span></label>
            <div class="col-7 text-right p-t-5">
        <select class="select2-basic form-control form-control-sm text-left" id="notifications_leads_activity"
            data-allow-clear="false" name="notifications_leads_activity">
            <option value="yes" <?php echo e(runtimePreselected('yes', auth()->user()->notifications_leads_activity)); ?>>
                <?php echo app('translator')->get('lang.notification_only'); ?></option>
            <option value="yes_email"
                <?php echo e(runtimePreselected('yes_email', auth()->user()->notifications_leads_activity)); ?>>
                <?php echo app('translator')->get('lang.notification_and_email'); ?></option>
            <option value="no" <?php echo e(runtimePreselected('no', auth()->user()->notifications_leads_activity)); ?>>
                <?php echo app('translator')->get('lang.nothing'); ?></option>
        </select>
    </div>
</div>

<!--[future] notifications_leads_comments-->
<div class="form-group form-group-checkbox row hidden">
    <label class="col-5 col-form-label text-left"><?php echo app('translator')->get('lang.leads_comments'); ?></label>
           <div class="col-7 text-right p-t-5">
        <select class="select2-basic form-control form-control-sm text-left" id="notifications_leads_comments"
            data-allow-clear="false" name="notifications_leads_comments">
            <option value="yes" <?php echo e(runtimePreselected('yes', auth()->user()->notifications_leads_comments)); ?>>
                <?php echo app('translator')->get('lang.notification_only'); ?></option>
            <option value="yes_mentions" <?php echo e(runtimePreselected('yes_mentions', auth()->user()->notifications_leads_comments)); ?>>
                <?php echo app('translator')->get('lang.notification_only'); ?> (<?php echo app('translator')->get('lang.mentions_only'); ?>)</option>
            <option value="yes_email"
                <?php echo e(runtimePreselected('yes_email', auth()->user()->notifications_leads_comments)); ?>>
                <?php echo app('translator')->get('lang.notification_and_email'); ?></option>
            <option value="yes_email_mentions"
                <?php echo e(runtimePreselected('yes_email_mentions', auth()->user()->notifications_leads_comments)); ?>>
                <?php echo app('translator')->get('lang.notification_and_email'); ?> (<?php echo app('translator')->get('lang.mentions_only'); ?>)</option>
            <option value="no" <?php echo e(runtimePreselected('no', auth()->user()->notifications_leads_comments)); ?>>
                <?php echo app('translator')->get('lang.nothing'); ?></option>
        </select>
    </div>
</div>
<?php endif; ?>

<!--notifications_tasks_activity-->
<div class="form-group form-group-checkbox row">
    <label class="col-5 col-form-label text-left"><?php echo app('translator')->get('lang.tasks_activity'); ?> <span
            class="align-middle text-info font-16 hidden" data-toggle="tooltip" title="<?php echo app('translator')->get('lang.info_general_activity'); ?>"
            data-placement="top"><i class="ti-info-alt"></i></span></label>
    <div class="col-7 text-right p-t-5">
        <select class="select2-basic form-control form-control-sm text-left" id="notifications_tasks_activity"
            data-allow-clear="false" name="notifications_tasks_activity">
            <option value="yes" <?php echo e(runtimePreselected('yes', auth()->user()->notifications_tasks_activity)); ?>>
                <?php echo app('translator')->get('lang.notification_only'); ?></option>
            <option value="yes_email"
                <?php echo e(runtimePreselected('yes_email', auth()->user()->notifications_tasks_activity)); ?>>
                <?php echo app('translator')->get('lang.notification_and_email'); ?></option>
            <option value="no" <?php echo e(runtimePreselected('no', auth()->user()->notifications_tasks_activity)); ?>>
                <?php echo app('translator')->get('lang.nothing'); ?></option>
        </select>
    </div>
</div>

<!--[future] notifications_tasks_comments-->
<div class="form-group form-group-checkbox row hidden">
    <label class="col-5 col-form-label text-left"><?php echo app('translator')->get('lang.tasks_comments'); ?></label>
    <div class="col-7 text-right p-t-5">
        <select class="select2-basic form-control form-control-sm text-left" id="notifications_tasks_comments"
            data-allow-clear="false" name="notifications_tasks_comments">
            <option value="yes" <?php echo e(runtimePreselected('yes', auth()->user()->notifications_tasks_comments)); ?>>
                <?php echo app('translator')->get('lang.notification_only'); ?></option>
            <option value="yes_mentions" <?php echo e(runtimePreselected('yes_mentions', auth()->user()->notifications_tasks_comments)); ?>>
                <?php echo app('translator')->get('lang.notification_only'); ?> (<?php echo app('translator')->get('lang.mentions_only'); ?>)</option>
            <option value="yes_email"
                <?php echo e(runtimePreselected('yes_email', auth()->user()->notifications_tasks_comments)); ?>>
                <?php echo app('translator')->get('lang.notification_and_email'); ?></option>
            <option value="yes_email_mentions"
                <?php echo e(runtimePreselected('yes_email_mentions', auth()->user()->notifications_tasks_comments)); ?>>
                <?php echo app('translator')->get('lang.notification_and_email'); ?> (<?php echo app('translator')->get('lang.mentions_only'); ?>)</option>
            <option value="no" <?php echo e(runtimePreselected('no', auth()->user()->notifications_tasks_comments)); ?>>
                <?php echo app('translator')->get('lang.nothing'); ?></option>
        </select>
    </div>
</div>

<!--notifications_tickets_activity-->
<div class="form-group form-group-checkbox row">
    <label class="col-5 col-form-label text-left"><?php echo app('translator')->get('lang.support_tickets'); ?></label>
    <div class="col-7 text-right p-t-5">
        <select class="select2-basic form-control form-control-sm text-left" id="notifications_tickets_activity"
            data-allow-clear="false" name="notifications_tickets_activity">
            <option value="yes" <?php echo e(runtimePreselected('yes', auth()->user()->notifications_tickets_activity)); ?>>
                <?php echo app('translator')->get('lang.notification_only'); ?></option>
            <option value="yes_email"
                <?php echo e(runtimePreselected('yes_email', auth()->user()->notifications_tickets_activity)); ?>>
                <?php echo app('translator')->get('lang.notification_and_email'); ?></option>
            <option value="no" <?php echo e(runtimePreselected('no', auth()->user()->notifications_tickets_activity)); ?>>
                <?php echo app('translator')->get('lang.nothing'); ?></option>
        </select>
    </div>
</div>

<!--notifications_reminders-->
<div class="form-group form-group-checkbox row">
    <label class="col-5 col-form-label text-left"><?php echo app('translator')->get('lang.reminders'); ?></label>
    <div class="col-7 text-right p-t-5">
        <select class="select2-basic form-control form-control-sm text-left" id="notifications_reminders"
            data-allow-clear="false" name="notifications_reminders">
            <option value="email" <?php echo e(runtimePreselected('email', auth()->user()->notifications_reminders)); ?>>
                <?php echo app('translator')->get('lang.email'); ?></option>
            <option value="no" <?php echo e(runtimePreselected('no', auth()->user()->notifications_reminders)); ?>>
                <?php echo app('translator')->get('lang.nothing'); ?></option>
        </select>
    </div>
</div>


<!--notifications_system-->
<div class="form-group form-group-checkbox row">
    <label class="col-5 col-form-label text-left"><?php echo app('translator')->get('lang.system_notifications'); ?></label>
    <div class="col-7 text-right p-t-5">
        <select class="select2-basic form-control form-control-sm text-left" id="notifications_system"
            data-allow-clear="false" name="notifications_system">
            <option value="yes" <?php echo e(runtimePreselected('yes', auth()->user()->notifications_system)); ?>>
                <?php echo app('translator')->get('lang.notification_only'); ?></option>
            <option value="yes_email" <?php echo e(runtimePreselected('yes_email', auth()->user()->notifications_system)); ?>>
                <?php echo app('translator')->get('lang.notification_and_email'); ?></option>
            <option value="no" <?php echo e(runtimePreselected('no', auth()->user()->notifications_system)); ?>>
                <?php echo app('translator')->get('lang.nothing'); ?></option>
        </select>
    </div>
</div><?php /**PATH /home/u248167739/domains/accounts.paramountbuilt.co.uk/public_html/application/resources/views/pages/user/modals/update-notifications.blade.php ENDPATH**/ ?>