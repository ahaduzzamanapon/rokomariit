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
          <h3 class="box-title"><?=$meta_title?></h3>
          <a href="<?=base_url('admin/gallery/all')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> All Gallery</a>          
        </div>        
        <?php echo form_open_multipart("admin/gallery/add");?>
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
                  <!-- <div class="form-group">
                    <label>Gallery Name</label>
                    <div><?php echo form_error('name'); ?></div>
                    <input type="text" class="form-control" name="name" value="<?=set_value('name')?>">
                  </div> -->

                  <!-- <div class="form-group">
                      <label>URL</label>
                      <div><?php echo form_error('url'); ?></div>
                      <input type="text" class="form-control" name="url" value="<?=set_value('url')?>">
                  </div> -->

                  <div class="form-group">
                    <label>Select Category</label>
                    <div><?php echo form_error('category_id'); ?></div>
                    <?php 
                      $more_attr = 'class="form-control"';
                      echo form_dropdown('category_id', $category, set_value('category_id', $this->input->post('category_id')), $more_attr);
                    ?>
                  </div>

                  <div class="form-group">
                      <label class="form-label required">Display Home</label> <br>
                      <input type="radio" name="display_home" value="1" <?=set_value('display_home')=='1'?'checked':'checked';?>> Yes 
                      <input type="radio" name="display_home" value="0" <?=set_value('display_home')=='0'?'checked':'';?>> No
                  </div>

                  <div class="form-group">
                      <label>Image Upload</label>
                      <div><?php echo form_error('userfile'); ?></div>
                      <input type="file" name="userfile">
                      <label style="color:red">Image Size: Width:400px, Height: 300px</label>
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
