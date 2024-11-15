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
          <h3 class="box-title">Add Product</h3>
          <a href="<?=base_url('admin/product/all')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> All Product</a>          
        </div>        
        <?php echo form_open_multipart("admin/product/add");?>
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
                    <label>Product Name</label>
                    <div><?php echo form_error('name'); ?></div>
                    <input type="text" class="form-control" name="name" value="<?=set_value('name')?>">
                  </div>
                  
                  <div class="form-group">
                    <label>Product Model</label>
                    <div><?php echo form_error('model'); ?></div>
                    <input type="text" class="form-control" name="model" value="<?=set_value('model')?>">
                  </div>

                  <div class="form-group">
                      <label>Product Brand</label>
                      <div><?php echo form_error('category'); ?></div>
                       <select  class="form-control" name="category">
                          <option value=""> -- Select Product Name -- </option>
                          <?php foreach($category as $list) {
                            echo '<option value='.$list->slug.'>'.$list->cat_name.'</option>';
                          } ?>
                      </select>
                  </div>

                  <div class="form-group">
                    <label>Overview</label>
                    <div><?php echo form_error('overview'); ?></div>
                    <textarea id="editor1" name="overview" rows="10" cols="80"><?=set_value('overview')?></textarea>
                  </div>

              </div>

              <div class="col-md-5">
                <div class="form-group">
                    <label>Fontawesome Icon</label>
                    <div><?php echo form_error('fa_icon'); ?></div>
                    <input type="text" class="form-control" name="fa_icon" value="<?=set_value('fa_icon')?>" placeholder="e.g. fa-camera-retro">
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
                  <label style="color:red">Image Size: Width:600px, Height: 400px</label> 
                  <p class="help-block">File type jpg, png, jpeg, gif and maximun file size 1 MB.</p>
                </div>

                <div class="form-group">
                  <label>Meta Keywords</label>
                  <textarea class="form-control" rows="3" name="meta_keys" placeholder="tag1, tag2, tag3, tag4, tag5"><?=set_value('meta_keys')?></textarea>
                </div>
                <div class="form-group">
                  <label>Short Description</label>
                  <div><?php echo form_error('short_desc'); ?></div>
                  <textarea class="form-control" rows="3" name="short_desc" placeholder="Short Description Maximum 255 character"><?=set_value('short_desc')?></textarea>
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
