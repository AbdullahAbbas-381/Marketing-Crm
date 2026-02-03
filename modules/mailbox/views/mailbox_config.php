<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php echo form_open_multipart($this->uri->uri_string().'/config', ['id'=>'mailbox-config-form']); ?>

<div class="row">
    <div class="col-lg-12">
        <br>
        <?php echo _l('mailbox_user_pass_instructions'); ?>
        <br><br>
    </div>
    <div class="col-md-12">
        <h5><?php echo _l('connected_accounts'); ?></h5>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><?php echo _l('mailbox_from_account'); ?></th>
                        <th><?php echo _l('email'); ?></th>
                        <th><?php echo _l('default'); ?></th>
                        <th><?php echo _l('options'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($accounts) && count($accounts) > 0) { foreach ($accounts as $acc) { ?>
                    <tr>
                        <td><?php echo get_staff_full_name($acc['staffid']); ?></td>
                        <td><?php echo $acc['email']; ?></td>
                        <td><?php echo $acc['is_default'] ? _l('settings_yes') : _l('settings_no'); ?></td>
                        <td>
                            <a href="#" class="btn btn-default btn-xs btn-edit-account" data-id="<?php echo $acc['id']; ?>" data-email="<?php echo $acc['email']; ?>" data-signature="<?php echo htmlspecialchars($acc['mail_signature']); ?>"><?php echo _l('edit'); ?></a>
                            <a href="#" class="btn btn-danger btn-xs btn-delete-account" data-id="<?php echo $acc['id']; ?>"><?php echo _l('delete'); ?></a>
                            <?php if (!$acc['is_default']) { ?>
                                <a href="#" class="btn btn-primary btn-xs btn-make-default" data-id="<?php echo $acc['id']; ?>"><?php echo _l('make_default'); ?></a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } } else { ?>
                    <tr><td colspan="4"><?php echo _l('no_connected_accounts'); ?></td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <button type="button" class="btn btn-success" id="btn-add-account" data-toggle="modal" data-target="#mailboxAccountModal"><?php echo _l('add_account'); ?></button>
    </div>
    <div class="col-md-6">
        <?php $value = (isset($member) ? $member->email : ''); ?>
        <?php echo render_input('email', 'staff_add_edit_email', $value, 'email', ['autocomplete'=>'off']); ?>
        
    </div>
    <div class="col-md-6">
        <label for="mail_password" class="control-label"><?php echo _l('mailbox_email_password'); ?></label>
        <div class="input-group">
        	<?php $value = (isset($member) ? $member->mail_password : ''); ?>
	        <input type="password" class="form-control password" name="mail_password" value="<?php echo $value; ?>" autocomplete="new-password">
	        <span class="input-group-addon">
	            <a href="#mail_password" class="show_password" onclick="showPassword('mail_password'); return false;"><i class="fa fa-eye"></i></a>
	        </span>
	    </div>
    </div>
    <div class="col-md-12">
        <label for="signature" class="control-label"><?php echo _l('mailbox_email_signature'); ?></label>
        <div class="input-group">
            <?php $value = (isset($member) ? $member->mail_signature : 'Sent from Perfex'); ?>
            <?php echo render_textarea('mail_signature', '', $value); ?>
	    </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12 center-block">
	    <br>
		<button type="submit" autocomplete="off" data-loading-text="<?php echo _l('wait_text'); ?>" class="btn btn-info">    
            <?php echo _l('save'); ?>
        </button>
	</div>
</div>
<?php echo form_close(); ?>
<!-- Account Modal -->
<div class="modal fade" id="mailboxAccountModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo form_open(admin_url('mailbox/add_account'), ['id'=>'mailbox-account-form']); ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?php echo _l('add_account'); ?></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label><?php echo _l('email'); ?></label>
                    <input type="email" name="email" class="form-control" required />
                </div>
                <div class="form-group">
                    <label><?php echo _l('mailbox_email_password'); ?></label>
                    <input type="password" name="mail_password" class="form-control" />
                </div>
                <div class="form-group">
                    <label><?php echo _l('mailbox_email_signature'); ?></label>
                    <textarea name="mail_signature" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label><input type="checkbox" name="is_default" value="1" /> <?php echo _l('set_as_default_account'); ?></label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _l('close'); ?></button>
                <button type="submit" class="btn btn-primary"><?php echo _l('save'); ?></button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<script>
    (function(){
        var $ = jQuery;
        $(document).on('click', '.btn-edit-account', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var email = $(this).data('email');
            var signature = $(this).data('signature');
            $('#mailbox-account-form').attr('action', '<?php echo admin_url('mailbox/edit_account'); ?>/'+id);
            $('#mailbox-account-form').find('input[name="email"]').val(email);
            $('#mailbox-account-form').find('textarea[name="mail_signature"]').val(signature);
            $('#mailboxAccountModal').modal('show');
        });

        $(document).on('click', '.btn-delete-account', function(e){
            e.preventDefault();
            if (!confirm('<?php echo _l('confirm_action_prompt'); ?>')) return;
            var id = $(this).data('id');
            $.post('<?php echo admin_url('mailbox/delete_account'); ?>', {id: id}).done(function(resp){ location.reload(); });
        });

        $(document).on('click', '.btn-make-default', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            $.post('<?php echo admin_url('mailbox/make_default'); ?>', {id: id}).done(function(){ location.reload(); });
        });

        // Reset modal to add mode when opened from Add Account button
        $('#btn-add-account').on('click', function(){
            $('#mailbox-account-form').attr('action', '<?php echo admin_url('mailbox/add_account'); ?>');
            $('#mailbox-account-form').trigger('reset');
        });
    })();
</script>