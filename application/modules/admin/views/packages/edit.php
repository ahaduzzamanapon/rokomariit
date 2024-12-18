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
                    <h3 class="box-title">Edit Package</h3>
                    <a href="<?= base_url('admin/packages/all') ?>" class="btn btn-info btn-xs pull-right">Back to All Packages</a>
                </div>
                <?php echo form_open("admin/packages/update/{$package->id}"); ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="package-name">Package Name</label>
                        <input type="text" class="form-control" id="package-name" name="packages_name" value="<?= set_value('packages_name', $package->packages_name) ?>" placeholder="Enter package name">
                        <small class="text-danger"><?php echo form_error('packages_name'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Enter description"><?= set_value('description', $package->description) ?></textarea>
                        <small class="text-danger"><?php echo form_error('description'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="amount">Discount</label>
                        <input type="number" class="form-control" id="amount" name="amount" value="<?= set_value('amount', $package->amount) ?>" placeholder="Enter Discount">
                        <small class="text-danger"><?php echo form_error('amount'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="1" <?= set_select('status', '1', $package->status == 1) ?>>Active</option>
                            <option value="2" <?= set_select('status', '2', $package->status == 2) ?>>Inactive</option>
                        </select>
                        <small class="text-danger"><?php echo form_error('status'); ?></small>
                    </div>
                    <div class="form-group">
                        <label>Package Items</label>
                        <div id="item-list">
                            <?php if (!empty($package_items)): ?>
                                <?php foreach ($package_items as $key => $item): ?>
                                    <div class="item-row" style="margin-bottom: 10px;">
                                        <input type="text" class="form-control" name="packages_item[<?= $key ?>][name]" value="<?= $item['name'] ?>" placeholder="Item Name" style="display:inline-block; width:32%; margin-right:1%;">
                                        <input type="number" class="form-control" name="packages_item[<?= $key ?>][regular_price]" value="<?= $item['regular_price'] ?>" placeholder="Regular Price" style="display:inline-block; width:32%; margin-right:1%;">
                                        <input type="number" class="form-control" name="packages_item[<?= $key ?>][market_price]" value="<?= $item['market_price'] ?>" placeholder="Market Price" style="display:inline-block; width:32%;">
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <button type="button" class="btn btn-sm btn-primary" onclick="addItem()">Add Item</button>
                    </div>
                </div>
                <div class="box-footer">
                    <?php echo form_submit('submit', 'Update', "class='btn btn-primary pull-right'"); ?>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section>

<script>
    var itemCount = <?= count($package_items) ?>; // Start count from existing items

    function addItem() {
        var html = `
            <div class="item-row" style="margin-bottom: 10px;">
                <input type="text" class="form-control" name="packages_item[` + itemCount + `][name]" placeholder="Item Name" style="display:inline-block; width:32%; margin-right:1%;">
                <input type="number" class="form-control" name="packages_item[` + itemCount + `][regular_price]" placeholder="Regular Price" style="display:inline-block; width:32%; margin-right:1%;">
                <input type="number" class="form-control" name="packages_item[` + itemCount + `][market_price]" placeholder="Market Price" style="display:inline-block; width:32%;">
            </div>`;
        document.getElementById('item-list').insertAdjacentHTML('beforeend', html);
        itemCount++;
    }
</script>


<!-- /.content -->
