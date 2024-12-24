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
          <a href="<?=base_url('admin/script/all')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> All script</a>
          <a href="<?=base_url('admin/script/add')?>" class="btn btn-info btn-xs pull-right"> Add script</a> 
        </div>        
        <?php echo form_open_multipart("admin/script/edit/".$info->id);?>
          <div class="box-body">            
            <?php if($this->session->flashdata('success')):?>
                <div class="alert alert-success">
                    <a class="close" data-dismiss="alert">&times;</a>
                    <?php echo $this->session->flashdata('success');;?>
                </div>
            <?php endif; ?>

            <div class="row">
              <div class="col-md-7">
                  <div class="form-group col-md-6">
                    <label>Script Type</label>
                    <div><?php echo form_error('type'); ?></div>
                    <select name="type" id="" class="form-control">
                      <option value="">Select</option>
                      <option <?= ($info->type == 1) ? 'selected' : ''?> value="1">All Page</option>
                      <option <?= ($info->type == 2) ? 'selected' : ''?> value="2">Specific Page</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Page Link</label>
                    <div><?php echo form_error('page_link'); ?></div>
                    <input type="text" class="form-control" name="page_link" value="<?=$info->page_link?>">
                  </div>
              </div>
              <div class="col-md-7">
                  <div class="form-group col-md-12">
                    <label>Script</label>
                    <div><?php echo form_error('script'); ?></div>
                    <textarea class="form-control" name="script"> <?=$info->script?></textarea>
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
