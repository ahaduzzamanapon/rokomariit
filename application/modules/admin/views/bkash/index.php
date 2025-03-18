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
          <h3 class="box-title"><?= $meta_title; ?></h3>
          <a href="<?= base_url('admin/PaymentGateway/create') ?>" class="btn btn-info btn-xs pull-right"> Add Gateway</a>
        </div>

        <div class="box-body">
          <div id="infoMessage"><?php //echo $message;
                                ?></div>
          <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
              <a class="close" data-dismiss="alert">&times;</a>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php endif; ?>
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>App Key</th>
                  <th>App Secret</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Mode</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($bkash_payments) {
                  foreach ($bkash_payments as $key => $row) {
                ?>
                    <tr>
                      <td><?= $key + 1; ?></td>
                      <td><?= $row->bkash_app_key; ?></td>
                      <td><?= $row->bkash_app_secret; ?></td>
                      <td><?= $row->bkash_username; ?></td>
                      <td><?= $row->bkash_password; ?></td>
                      <td><?= $row->bkash_mode; ?></td>
                      <td><?= $row->bkash_status; ?></td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-success btn-xs">Action</button>
                          <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="<?= base_url('admin/PaymentGateway/edit/' . $row->id) ?>">Edit</a></li>
                            <li><a href="<?= base_url('admin/PaymentGateway/delete/' . $row->id) ?>" onclick="return confirm('Are you sure you want to delete this service?');">Delete</a></li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                <?php
                  }
                }
                ?>
              </tbody>
            </table>
          </div> <!-- End .table-responsive -->
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
        </div>
      </div>
      <!-- /.box -->
    </div>
  </div>
  <!-- /.row -->

</section>
<!-- /.content -->