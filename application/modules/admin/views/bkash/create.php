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
                    <h3 class="box-title"> Payment Gateway</h3>
                    <a href="<?= base_url('admin/PaymentGateway/index') ?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> All packages</a>
                </div>
                <?php echo form_open_multipart("admin/PaymentGateway/save"); ?>
                <div class="box-body">
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success">
                            <a class="close" data-dismiss="alert">&times;</a>
                            <?php echo $this->session->flashdata('success');; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger">
                            <a class="close" data-dismiss="alert">&times;</a>
                            <?php echo $this->session->flashdata('error');; ?>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bkash_app_key">BKash App Key</label>
                                <input type="text" class="form-control" id="bkash_app_key" name="bkash_app_key" value="<?= set_value('bkash_app_key') ?>" placeholder="Enter package name" required>
                                <small class="text-danger"><?php echo form_error('bkash_app_key'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="bkash_app_secret">BKash App Secret</label>
                                <input type="text" class="form-control" id="bkash_app_secret" name="bkash_app_secret" placeholder="Enter Secret" value="<?= set_value('bkash_app_secret') ?>" required>
                                <small class="text-danger"><?php echo form_error('bkash_app_secret'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="bkash_username">BKash Username</label>
                                <input type="text" class="form-control" id="bkash_username" name="bkash_username" value="<?= set_value('bkash_username') ?>" placeholder="Enter username" required>
                                <small class="text-danger"><?php echo form_error('bkash_username'); ?></small>
                            </div>


                            <div class="box-footer">
                                <?php echo form_submit('submit', 'Save', "class='btn btn-primary pull-right'"); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bkash_password">BKash Password</label>
                                <input type="password" class="form-control" id="bkash_password" name="bkash_password" value="<?= set_value('bkash_password') ?>" placeholder="Enter password" required>
                                <small class="text-danger"><?php echo form_error('bkash_password'); ?></small>
                            </div>

                            <div class="form-group">
                                <label for="bkash_mode">Bkash Mode</label>
                                <select class="form-control" id="bkash_mode" name="bkash_mode">
                                    <option value="1" <?= set_select('bkash_mode', 'sandbox') ?>>Sandbox</option>
                                    <option value="2" <?= set_select('bkash_mode', 'live') ?>>Live</option>
                                </select>
                                <small class="text-danger"><?php echo form_error('bkash_mode'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="bkash_status">BKash Status</label>
                                <select class="form-control" id="bkash_status" name="bkash_status">
                                    <option value="1" <?= set_select('bkash_status', 'enable') ?>>Active</option>
                                    <option value="2" <?= set_select('bkash_status', 'disable') ?>>Deactive</option>
                                </select>
                                <small class="text-danger"><?php echo form_error('bkash_status'); ?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->

</section>

<!-- /.content -->