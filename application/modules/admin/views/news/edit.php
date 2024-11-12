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
          <a href="<?=base_url('admin/news/all')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> All News</a>
         
          <a href="<?=base_url('admin/news/add')?>" class="btn btn-info btn-xs pull-right"> Add Event</a> 
        </div>        
        <?php echo form_open_multipart("admin/news/edit/".$info->id);?>
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
                  <label>Event Title</label>
                  <div><?php echo form_error('title'); ?></div>
                  <input type="text" class="form-control" name="title" 
                  value="<?=set_value('title', $info->title)?>">
                </div>

                <div class="form-group">
                    <label>Details</label>
                    <div><?php echo form_error('details'); ?></div>
                    <textarea id="editor1" name="details" rows="10" cols="80"><?=set_value('details', $info->details)?></textarea>
                </div>
              </div>
              <div class="col-md-5">
                
                <div class="form-group">
                  <label class="form-label required">Status</label> <br>
                  <input type="radio" name="status" value="1" <?=set_value('status', $info->status)=='1'?'checked':'';?>> Yes 
                  <input type="radio" name="status" value="0" <?=set_value('status', $info->status)=='0'?'checked':'';?>> No
                </div>

                <div class="form-group">
                  <label>Image Upload</label>
                  <div><?php echo form_error('userfile'); ?></div>
                  <input type="file" name="userfile"> 
                  <label style="color:red">Image Size: Width:340px, Height: 400px</label>                  
                  <p class="help-block">File type jpg, png, jpeg, gif and maximun file size 1 MB.</p>
                  <?php 
                  $img_path = base_url().'news_img/';
                  if($info->image_file != NULL){
                          $src= $img_path.$info->image_file;
                          echo "<img src='$src' class='img-responsive'>";
                      }
                  ?>

                </div>


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