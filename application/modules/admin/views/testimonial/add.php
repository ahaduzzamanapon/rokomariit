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
          <h3 class="box-title">Add Testimonial</h3>
          <a href="<?=base_url('admin/testimonial/all')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> All Testimonial</a>          
        </div>        
        <?php echo form_open_multipart("admin/testimonial/add");?>
          <div class="box-body">
            <div id="infoMessage"><?php //echo $message;?></div>
            <div><?php //echo validation_errors(); ?></div>
            <?php if($this->session->flashdata('success')):?>
                <div class="alert alert-success">
                    <a class="close" data-dismiss="alert">&times;</a>
                    <?php echo $this->session->flashdata('success');;?>
                </div>
            <?php endif; ?>

            <div class="row">
              <div class="col-md-7">
                  <div class="form-group">
                    <label>Client Name</label>
                    <div><?php echo form_error('client_name'); ?></div>
                    <input type="text" class="form-control" name="client_name" value="<?=set_value('client_name')?>">
                  </div>

                  <div class="form-group">
                    <label>Details</label>
                    <div><?php echo form_error('details'); ?></div>
                    <textarea class="form-control" name="details" value="<?=set_value('details')?>"></textarea>
                  </div>
              </div>

              <div class="col-md-5">
                <div class="form-group">
                    <label>Dsignation</label>
                    <div><?php echo form_error('designation'); ?></div>
                    <input type="text" class="form-control" name="designation" value="<?=set_value('designation')?>">
                  </div>

                <div class="form-group">
                  <label>Image Upload</label>
                  <div><?php echo form_error('userfile'); ?></div>
                  <input type="file" name="userfile">
                  <label style="color:red">Image Size: Width:72px, Height: 72px</label>  
                  <p class="help-block">File type jpg, png, jpeg, gif and maximun file size 1 MB.</p>
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
