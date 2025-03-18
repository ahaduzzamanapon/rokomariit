<section class="content-header">
    <h1> <?= $meta_title; ?> </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><?= $meta_title; ?></li>
    </ol>
</section>



<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Gateway</h3>
                    <a href="<?= base_url('admin/PaymentGateway/index') ?>" class="btn btn-info btn-xs pull-right">Back to All Gateways</a>
                </div>
                <?php echo form_open("admin/PaymentGateway/update/{$bkash->id}"); ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="bkash_app_key">BKash App Key</label>
                        <input type="text" class="form-control" id="bkash_app_key" name="bkash_app_key" value="<?= set_value('bkash_app_key', $bkash->bkash_app_key) ?>" placeholder="Enter app key">
                        <small class="text-danger"><?php echo form_error('bkash_app_key'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="bkash_app_secret">BKash App Secret</label>
                        <input type="text" class="form-control" id="bkash_app_secret" name="bkash_app_secret" placeholder="Enter bkash_app_secret" value="<?= set_value('bkash_app_secret', $bkash->bkash_app_secret) ?>">
                        <small class="text-danger"><?php echo form_error('bkash_app_secret'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="bkash_username">BKash Username</label>
                        <input type="text" class="form-control" id="bkash_username" name="bkash_username" value="<?= set_value('bkash_username', $bkash->bkash_username) ?>" placeholder="Enter Discount">
                        <small class="text-danger"><?php echo form_error('bkash_username'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="bkash_password">BKash Password</label>
                        <input type="text" class="form-control" id="bkash_password" name="bkash_password" value="<?= set_value('bkash_password', $bkash->bkash_password) ?>" placeholder="Enter Discount">
                        <small class="text-danger"><?php echo form_error('bkash_password'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="bkash_mode">Bkash Mode</label>
                        <select class="form-control" id="bkash_mode" name="bkash_mode">
                            <option value="1" <?= set_select('bkash_mode', 'sandbox', $bkash->bkash_mode == 'sandbox') ?>>Sandbox</option>
                            <option value="2" <?= set_select('bkash_mode', 'live', $bkash->bkash_mode == 'live') ?>>Live</option>
                        </select>
                        <small class="text-danger"><?php echo form_error('bkash_mode'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="bkash_status">Bkash status</label>
                        <select class="form-control" id="bkash_status" name="bkash_status">
                            <option value="1" <?= set_select('bkash_status', 'enabled', $bkash->bkash_status == 'enabled') ?>>Enabled</option>
                            <option value="2" <?= set_select('bkash_status', 'disabled', $bkash->bkash_status == 'disabled') ?>>Disabled</option>
                        </select>
                        <small class="text-danger"><?php echo form_error('bkash_status'); ?></small>
                    </div>
                </div>
                <div class="box-footer">
                    <?php echo form_submit('submit', 'Update', "class='btn btn-primary pull-right'"); ?>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section>





<!-- /.content -->