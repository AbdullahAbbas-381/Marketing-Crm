<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="panel_s">
          <div class="panel-body">
            <h4 class="no-margin"><?php echo _l('khurram'); ?></h4>
            <hr class="hr-panel-heading" />
            <?php echo form_open(admin_url('khurram')); ?>

            <div class="row">
              <div class="col-md-6">
                <?php
                $client_options = [];
                foreach ($clients as $client) {
                    $client_options[] = [
                        'id'   => $client['userid'],
                        'name' => $client['company'],
                    ];
                }
                echo render_select('clientid', $client_options, ['id', 'name'], 'khurram_customer');
                ?>
              </div>
              <div class="col-md-6">
                <?php echo render_textarea('remarks', 'khurram_remarks'); ?>
              </div>
            </div>

            <button type="submit" class="btn btn-primary"><?php echo _l('submit'); ?></button>

            <?php echo form_close(); ?>

            <hr />

            <h4><?php echo _l('khurram_entries'); ?></h4>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th><?php echo _l('id'); ?></th>
                    <th><?php echo _l('khurram_customer'); ?></th>
                    <th><?php echo _l('khurram_remarks'); ?></th>
                    <th><?php echo _l('khurram_date_added'); ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($items as $item) { ?>
                  <tr>
                    <td><?php echo $item['id']; ?></td>
                    <td>
                      <?php
                      foreach ($clients as $client) {
                          if ($client['userid'] == $item['clientid']) {
                              echo $client['company'];
                              break;
                          }
                      }
                      ?>
                    </td>
                    <td><?php echo $item['remarks']; ?></td>
                    <td><?php echo _dt($item['date_added']); ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php init_tail(); ?>
