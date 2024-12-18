<style>
    /* Custom Font */
    /* body {
        font-family: 'Poppins', sans-serif;
    } */

    /* Container Box */
    .c_box {
        margin: 5% auto;
        padding: 3%;
        background: #f9f9f9;
        border-radius: 12px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .form-label {
        margin-right: auto;
    }

    /* Heading */
    .packages_info h3 {
        font-size: 1.8rem;
        color: #4e73df;
        margin-bottom: 1.5rem;
        font-weight: 600;
    }

    /* Package Item Styling */
    .packages_item::before {
        content: "✔";
        color: #28a745;
        margin-right: 10px;
    }

    .packages_item {
        font-size: 1.5rem;
        color: #555;
        line-height: 1.5;
        margin-bottom: 10px;
    }

    /* Form Styling */
    .form-control {
        border-radius: 10px;
        border: 1px solid #ddd;
        padding: 12px;
        font-size: 1.5rem;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        border-color: #4e73df;
        box-shadow: 0 0 8px rgba(78, 115, 223, 0.6);
    }

    /* Button Styling */
    .btn-primary {
        background-color: #4e73df;
        border-color: #4e73df;
        padding: 12px 25px;
        font-size: 1.5rem;
        border-radius: 30px;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #2e59d9;
        border-color: #2e59d9;
    }

    /* Section Layout */
    .packages_purchase {
        background-color: #ffffff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    /* Add space between columns */
    .row.g-4 {
        margin-top: 20px;
    }

    /* Column Styling */
    .col-md-6 {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    /* Responsive Layout */
    @media (max-width: 767px) {
        .col-md-6 {
            margin-bottom: 20px;
        }
    }
</style>

<div class="content-area">
    <div class="c_box">

        <section class="page-section with-sidebar">
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                    <a class="close" data-dismiss="alert">&times;</a>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <a class="close" data-dismiss="alert">&times;</a>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('credentials')): ?>
                <div class="alert alert-success">
                    <a class="close" data-dismiss="alert">&times;</a>
                    <?php echo $this->session->flashdata('credentials'); ?>
                </div>
            <?php endif; ?>
            <div class="packages_purchase p-4 shadow-sm rounded bg-light">
                <div class="row g-4">
                    <!-- Package Information -->
                    <div class="col-md-6 packages_info text-left" style="border-right: 3px solid black;">
                        <h1>Package Information</h1>
                        <h2 class="text-primary mb-3"><?= $package_info->packages_name ?></h2>
                        <p class="text-muted"><?= $package_info->description ?></p>
                        <div class="mt-3" style="width: 80%;">
                            <ul class="list-unstyled">
                                <div style="display: flex; justify-content: space-between; font-size: 14px; font-weight: bold;">
                                    <h4 style="font-size: 14px; font-weight: bold;">S. Name</h4>
                                    <h4 style="font-size: 14px; font-weight: bold;">M. Price</h4>
                                    <h4 style="font-size: 14px; font-weight: bold;">R. Price</h4>
                                </div>
    
                                <?php
                                $item = json_decode($package_info->packages_item);
                                $total_market_price = 0; // Initialize
                                $total_regular_price = 0; // Initialize
                                foreach ($item as $key => $value) {
                                    $market_price = (float) $value->market_price;
                                    $regular_price = (float) $value->regular_price;
    
                                    // Add to totals
                                    $total_market_price += $market_price;
                                    $total_regular_price += $regular_price;
    
                                    echo '<li>
                                        <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                                            <div style="width:33%; text-align:start">' . $value->name . '</div>
                                            <div style="width:33%; text-align:center">' . number_format($market_price, 2) . '</div>
                                            <div style="width:33%; text-align:end">' . number_format($regular_price, 2) . '</div>
                                        </div>
                                    </li>';
                                }
                                ?>
                            </ul>
                            <div class="card-p-footer" style="border-top: 1px solid #ddd; padding-top: 10px;">
                                <div style="display: flex; justify-content: space-between; font-weight: bold;">
                                    <span>Total Price:</span>
                                    <span><?= number_format($total_market_price, 2) ?></span>
                                    <span>
                                        <?php
                                        if ($package_info->amount > 0) {
                                            // Display total regular price with a strikethrough
                                            echo '<span style="text-decoration: line-through;">' . number_format($total_regular_price, 2) . '</span>';
                                        } else {
                                            echo number_format($total_regular_price, 2);
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <div class="card-p-footer">
                                <?php
                                // Calculate discounted price using percentage
                                if ($package_info->amount > 0) {
                                    $discount_percentage = $package_info->amount; // Assume $row->amount is the discount percentage
                                    $discounted_price = $total_regular_price - ($total_regular_price * $discount_percentage / 100);
                                } else {
                                    $discounted_price = $total_regular_price;
                                }
                                ?>
                                <h3>
                                    ৳ <?= number_format($discounted_price, 2) ?>
                                    <?php if ($package_info->amount > 0): ?>
                                        <span style="color: red; font-weight: bold; font-size: 12px;">(Discounted Price)</span>
                                    <?php endif; ?>
                                </h3>
    
                            </div>
                        </div>
                    </div>
                    <!-- Purchase Form -->
                    <div class="col-md-6 packages_form">
                        <?php echo form_open('site/payment_process', 'class="form-horizontal bg-white p-4 rounded shadow"'); ?>
                        <?php if ($user_info != null) { ?>
                            <input type="hidden" name="user_id" value="<?= $user_info->id ?>">
                        <?php } ?>
                        <input type="hidden" name="package_id" value="<?= $package_info->id ?>">
                        <div class="col-md-12">
                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="first_name" id="firstName" value="<?= $user_info != null ? $user_info->first_name : "" ?>"
                                    placeholder="Enter your first name" required aria-label="Domain Name">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="lastName"
                                    placeholder="Enter your last name" required aria-label="Domain Name" value="<?= $user_info != null ? $user_info->last_name : "" ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="<?= $user_info != null ? $user_info->email : "" ?>"
                                    placeholder="Enter your email" required aria-label="Email">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="number" class="form-label">Number</label>
                                <input type="text" class="form-control" name="number" id="number" value="<?= $user_info != null ?  $user_info->phone : "" ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Enter your email" required aria-label="Email">
                            </div> -->
                            <div class="mb-3 col-md-6">
                                <label for="amount" class="form-label">Price</label>
                                <input type="text" class="form-control" name="amount" id="amount"
                                    value="<?= $discounted_price ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary">Purchase</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>