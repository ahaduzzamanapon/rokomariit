<section class="content-header">
  <h1> <?=$meta_title; ?> </h1>
  <ol class="breadcrumb">
    <li><a href="<?=base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><?=$meta_title; ?></li>
  </ol>
</section>

<section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Add packages</h3>
          <a href="<?=base_url('admin/packages/all')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> All packages</a>          
        </div>        
        <?php echo form_open_multipart("admin/packages/add");?>
          <div class="box-body">
            <?php if($this->session->flashdata('success')):?>
                <div class="alert alert-success">
                    <a class="close" data-dismiss="alert">&times;</a>
                    <?php echo $this->session->flashdata('success');;?>
                </div>
            <?php endif; ?>
            <?php if($this->session->flashdata('error')):?>
                <div class="alert alert-danger">
                    <a class="close" data-dismiss="alert">&times;</a>
                    <?php echo $this->session->flashdata('error');;?>
                </div>
            <?php endif; ?>
              <div class="row">
                <div class="col-md-7">
                    <div class="form-group">
                      <label for="package-name">Package Name</label>
                      <input type="text" class="form-control" id="package-name" name="packages_name" value="<?=set_value('name')?>" placeholder="Enter package name">
                      <small class="text-danger"><?php echo form_error('name'); ?></small>
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea class="form-control" id="description" name="description" placeholder="Enter description"><?=set_value('description')?></textarea>
                      <small class="text-danger"><?php echo form_error('description'); ?></small>
                    </div>
                    <div class="form-group">
                      <label for="amount">Amount</label>
                      <input type="number" class="form-control" id="amount" name="amount" value="<?=set_value('amount')?>" placeholder="Enter amount">
                      <small class="text-danger"><?php echo form_error('amount'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>No of Items <button type="button" class="btn btn-link btn-sm" onclick="add_item()"><i class="fa fa-plus"></i> Add Item</button></label>
                      <div id="item">

                      </div>
                      <small class="text-danger"><?php echo form_error('packages_item'); ?></small>
                    </div>
                    <script>
                      function add_item(){
                        var html = '';
                        html += '<input type="text" class="form-control" name="packages_item[]" value="" placeholder="Enter item">';
                        $('#item').append(html);
                      }
                    </script>
                    <div class="form-group">
                      <label for="status">Status</label>
                      <select class="form-control" id="status" name="status">
                        <option value="1" <?=set_select('status', '1')?>>Active</option>
                        <option value="2" <?=set_select('status', '2')?>>Deactive</option>
                      </select>
                      <small class="text-danger"><?php echo form_error('status'); ?></small>
                    </div>
                    <div class="box-footer">
                      <?php echo form_submit('submit', 'Save', "class='btn btn-primary pull-right'"); ?>
                    </div>
                </div>
              </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">    
            <?php //echo form_input($user_id);?>        
            <?php echo form_submit('submit', 'Save', "class='btn btn-primary pull-right'"); ?>
          </div>
        <?php echo form_close();?>
      </div>
      <!-- /.box -->
    </div>
  </div>
  <!-- /.row -->

</section>
<!-- /.content -->
