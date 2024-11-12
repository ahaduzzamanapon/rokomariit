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
          <a href="<?=base_url('admin/packages/all')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> All Service</a>
          <a href="<?=base_url('admin/packages/details/'.$info->id)?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> Details Service</a>
          <a href="<?=base_url('admin/packages/add')?>" class="btn btn-info btn-xs pull-right"> Add Service</a> 
        </div>        
        <?php echo form_open_multipart("admin/packages/edit/".$info->id);?>
          <div class="box-body">            
            <?php if($this->session->flashdata('success')):?>
                <div class="alert alert-success">
                    <a class="close" data-dismiss="alert">&times;</a>
                    <?php echo $this->session->flashdata('success');;?>
                </div>
            <?php endif; ?>

            <div class="row">
              <div class="col-md-7">
                <div class="form-group">
                  <label>Service Name</label>
                  <div><?php echo form_error('name'); ?></div>
                  <input type="text" class="form-control" name="name" value="<?=set_value('name', $info->name)?>">
                </div>

                <div class="form-group">
                  <label>Short Description</label>
                  <div><?php echo form_error('short_desc'); ?></div>
                  <textarea class="form-control" rows="3" name="short_desc" placeholder="Short Description Maximum 255 character"><?=set_value('short_desc', $info->short_desc)?></textarea>
                </div>

                <div class="form-group">
                  <label>Details Description</label>
                  <div><?php echo form_error('description'); ?></div>
                  <textarea id="editor1" name="description" rows="10" cols="80"><?=set_value('description', $info->description)?></textarea>
                </div>
              </div>

              <div class="col-md-5">
              <div class="form-group">
                  <label>Icon Image</label>
                  <div><?php echo form_error('fa_icon'); ?></div>
                  <input type="file" name="fa_icon">   
                  <label style="color:red">Image Size: Width:600px, Height: 400px</label>                
                  <p class="help-block">File type png and maximun file size 1 MB.</p>
                  <?php 
                  $img_path = base_url().'service_img/icon_img/';
                  if($info->image_file != NULL){
                          $src= $img_path.$info->fa_icon;
                          echo "<img src='$src'>";
                      }
                  ?>

                </div>

                <!-- <div class="form-group">
                    <label>Fontawesome Icon</label>
                    <div><?php echo form_error('fa_icon'); ?></div>
                    <input type="text" class="form-control" name="fa_icon" value="<?=set_value('fa_icon', $info->fa_icon)?>" placeholder="e.g. fa-camera-retro">
                </div> -->

                <div class="form-group">
                  <label>Meta Keywords</label>
                  <textarea class="form-control" rows="3" name="meta_keys" placeholder="tag1, tag2, tag3, tag4, tag5"><?=set_value('meta_keys', $info->meta_keys)?></textarea>
                </div>                

                <div class="form-group">
                  <label class="form-label required">Display Home</label> <br>
                  <input type="radio" name="display_home" value="1" <?=set_value('display_home', $info->display_home)=='1'?'checked':'';?>> Yes 
                  <input type="radio" name="display_home" value="0" <?=set_value('display_home', $info->display_home)=='0'?'checked':'';?>> No
                </div>

                <div class="form-group">
                  <label class="form-label required">Status</label> <br>
                  <input type="radio" name="status" value="1" <?=set_value('status', $info->status)=='1'?'checked':'';?>> Yes 
                  <input type="radio" name="status" value="0" <?=set_value('status', $info->status)=='0'?'checked':'';?>> No
                </div>

                <div class="form-group">
                  <label>Image Upload</label>
                  <div><?php echo form_error('userfile'); ?></div>
                  <input type="file" name="userfile">   
                  <label style="color:red">Image Size: Width:600px, Height: 400px</label>                
                  <p class="help-block">File type jpg, png, jpeg, gif and maximun file size 1 MB.</p>
                  <?php 
                  $img_path = base_url().'service_img/';
                  if($info->image_file != NULL){
                          $src= $img_path.$info->image_file;
                          echo "<img src='$src'>";
                      }
                  ?>

                </div>

              </div>
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">    
            <?php //echo form_input($user_id);?>        
            <?php echo form_submit('submit', 'Save Update', "class='btn btn-primary pull-right'"); ?>
          </div>
        <?php echo form_close();?>
      </div>
      <!-- /.box -->
    </div>
  </div>
  <!-- /.row -->

</section>
<!-- /.content -->
