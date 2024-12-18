<section class="content-header">
  <h1> <?= $meta_title; ?> </h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><?= $meta_title; ?></li>
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
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success">
                            <?= $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>

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
                        <label>No of Items
                            <button type="button" class="btn btn-link btn-sm" onclick="add_item()">
                                <i class="fa fa-plus"></i> Add Item
                            </button>
                        </label>
                        <div id="item">
                            <?php 
                            if(!empty($package_items)):
                                foreach($package_items as $index => $item): ?>
                                    <div class="item-row" style="margin-bottom: 10px;">
                                        <input type="text" class="form-control" name="packages_item[<?= $index ?>][name]" placeholder="Item Name" value="<?= set_value("packages_item[$index][name]", $item['name']) ?>" style="display:inline-block; width:32%; margin-right:1%;">
                                        <input type="number" class="form-control" name="packages_item[<?= $index ?>][regular_price]" placeholder="Regular Price" value="<?= set_value("packages_item[$index][regular_price]", $item['regular_price']) ?>" style="display:inline-block; width:32%; margin-right:1%;">
                                        <input type="number" class="form-control" name="packages_item[<?= $index ?>][market_price]" placeholder="Market Price" value="<?= set_value("packages_item[$index][market_price]", $item['market_price']) ?>" style="display:inline-block; width:32%;">
                                        <button type="button" class="btn btn-danger btn-sm" onclick="remove_item(this)">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                            <?php 
                                endforeach;
                            endif;
                            ?>
                        </div>
                        <small class="text-danger"><?php echo form_error('packages_item'); ?></small>
                    </div>

                    <script>
                        var count = <?= count($package_items) ?>; // Initialize counter based on existing items

                        function add_item() {
                            var html = '';
                            html += '<div class="item-row" style="margin-bottom: 10px;">';
                            html += '<input type="text" class="form-control" name="packages_item[' + count + '][name]" placeholder="Item Name" style="display:inline-block; width:32%; margin-right:1%;">';
                            html += '<input type="number" class="form-control" name="packages_item[' + count + '][regular_price]" placeholder="Regular Price" style="display:inline-block; width:32%; margin-right:1%;">';
                            html += '<input type="number" class="form-control" name="packages_item[' + count + '][market_price]" placeholder="Market Price" style="display:inline-block; width:32%;">';
                            html += '<button type="button" class="btn btn-danger btn-sm" onclick="remove_item(this)"><i class="fa fa-minus"></i></button>';
                            html += '</div>';

                            $('#item').append(html);
                            count++; // Increment counter for next row
                        }

                        function remove_item(element) {
                            $(element).closest('.item-row').remove();
                        }
                    </script>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="1" <?= set_select('status', '1', $package->status == 1) ?>>Active</option>
                            <option value="2" <?= set_select('status', '2', $package->status == 2) ?>>Inactive</option>
                        </select>
                        <small class="text-danger"><?php echo form_error('status'); ?></small>
                    </div>
                </div>

                <div class="box-footer">
                    <?php echo form_submit('submit', 'Update', "class='btn btn-primary pull-right'"); ?>
                </div>
                <?php echo form_close(); ?>
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->
</section>

<!-- /.content -->