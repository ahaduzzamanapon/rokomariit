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
          <a href="<?=base_url('admin/social/all')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> All Social</a>
          <a href="<?=base_url('admin/social/add')?>" class="btn btn-info btn-xs pull-right"> Add Social</a> 
        </div>        
        <?php echo form_open_multipart("admin/social/edit/".$info->id);?>
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
                        <label>Fontawesome Icon</label>
                        <div><?php echo form_error('icon'); ?></div>
                        <input type="text" class="form-control" name="icon" value="<?=set_value('title', $info->icon)?>" placeholder="e.g. fa-camera-retro">
                    </div>

                    <div class="form-group">
                        <label>URL</label>
                        <div><?php echo form_error('url'); ?></div>
                        <textarea  class="form-control" name="url" > <?= $info->url?></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label required">Status</label> <br>
                        <input type="radio" name="status" value="1" <?=set_value('status', $info->status)=='1'?'checked':'';?>> Yes 
                        <input type="radio" name="status" value="0" <?=set_value('status', $info->status)=='0'?'checked':'';?>> No
                    </div>

                    <div class="box-footer">    
                        <?php //echo form_input($user_id);?>        
                        <?php echo form_submit('submit', 'Save Update', "class='btn btn-primary pull-right'"); ?>
                    </div>
                </div>

                
                
              </div>
            </div>
          </div>
          <!-- /.box-body -->

          
        <?php echo form_close();?>
      </div>
      <!-- /.box -->
    </div>
  </div>
  <!-- /.row -->

</section>
<!-- /.content -->
