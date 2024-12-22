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
          <h3 class="box-title">Details package</h3>
          <a href="<?=base_url('admin/packages/edit/'.$package->id)?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> Edit package</a>          
        </div>        
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
              <div class="col-md-8">
                <table class="table table-bordered table-striped table-responsive">
                  <tr>
                    <td class="col-md-2">Package Name</td>
                    <td class="col-md-1">:</td>
                    <td class="col-md-4"><?=$package->packages_name;?></td>
                  </tr>
                  <tr>
                    <td class="col-md-2">Discription</td>
                    <td class="col-md-1">:</td>
                    <td class="col-md-4"><?=$package->description;?></td>
                  </tr>
                  <tr>
                    <td class="col-md-2">Discount</td>
                    <td class="col-md-1">:</td>
                    <td class="col-md-4"><?=$package->amount;?>%</td>
                  </tr>
                  <tr>
                    <td class="col-md-2">Package Item</td>
                    <td class="col-md-1">:</td>
                    <td class="col-md-4">
                    <?php if (!empty($package_items)): ?>
                                <?php foreach ($package_items as $key => $item): ?>
                                    <div class="item-row" style="margin-bottom: 10px;">
                                        <input type="text" class="form-control" name="packages_item[<?= $key ?>][name]" value="<?= $item['name'] ?>" readonly placeholder="Item Name" style="display:inline-block; width:32%; margin-right:1%;">
                                        <input type="number" class="form-control" name="packages_item[<?= $key ?>][regular_price]" value="<?= $item['regular_price'] ?>" readonly placeholder="Regular Price" style="display:inline-block; width:32%; margin-right:1%;">
                                        <input type="number" class="form-control" name="packages_item[<?= $key ?>][market_price]" value="<?= $item['market_price'] ?>" readonly placeholder="Market Price" style="display:inline-block; width:32%;">
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="col-md-2">Status</td>
                    <td class="col-md-1">:</td>
                    <td class="col-md-4"><?=$package->status == 1 ? 'Active' : 'Inactive';?></td>
                  </tr>
                </table>
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
