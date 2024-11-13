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
                    <h3 class="box-title"><?=$meta_title; ?></h3>
                    <!-- <a href="<?=base_url('admin/product/add')?>" class="btn btn-info btn-xs pull-right"> Add Product</a>           -->
                </div>

                <div class="box-body">
                    <div id="infoMessage"><?php //echo $message;?></div>
                    <?php if($this->session->flashdata('success')):?>
                    <div class="alert alert-success">
                        <a class="close" data-dismiss="alert">&times;</a>
                        <?php echo $this->session->flashdata('success');?>
                    </div>
                    <?php endif; ?>
                    <table id="example1" class="table table-bordered table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Package Name</th>
                                <th>User name</th>
                                <th>Price</th>
                                <th>Payment Status</th>
                                <th>Transaction</th>
                                <th>Progress Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                              foreach ($results as $key=>$row) { 
                            ?>
                            <tr>
                                <td><?=$key+1;?></td>
                                <td><?=$row->packages_name;?></td>
                                <td><?=$row->first_name.' '.$row->last_name;?></td>
                                <td><?=$row->amount;?></td>
                                <td><?=$row->status_title;?></td>
                                <td><?=$row->transaction_id;?></td>
                                <td>
                                  <div class="form-group">
                                      <select name="" onchange="changeStatus(<?=$row->purchase_id?>,this.value)" class="form-control"    <?=  $this->ion_auth->in_group([4])?'disabled  ':'' ?>      >
                                        <option <?= ($row->purchase_status==1)?'selected':''?> value="1">Pending</option>
                                        <option <?= ($row->purchase_status==2)?'selected':''?> value="2">Processing</option>
                                        <option <?= ($row->purchase_status==3)?'selected':''?> value="3">Completed</option>
                                      </select>
                                  </div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success btn-xs">Action</button>
                                        <button type="button" class="btn btn-success btn-xs dropdown-toggle"
                                            data-toggle="dropdown" aria-expanded="true">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="<?=base_url('admin/purchase_history/details/'.$row->purchase_id)?>">Details</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php 
                                }
                              ?>
                        </tbody>
                    </table>
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

<?php
 if(!$this->ion_auth->in_group([4])){?>
  <script>
    function changeStatus(id,status){
      $.ajax({
        url: '<?=base_url('admin/purchase_history/changeStatus');?>',
        type: 'POST',
        data: {id:id,status:status},
        success: function(data){
          //location.reload();
        }
      });
    }
  </script>
 <?php } ?>
<!-- /.content -->