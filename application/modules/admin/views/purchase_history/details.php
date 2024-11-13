<section class="content-header">
    <h1 class="page-title"><?= $meta_title; ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><?= $meta_title; ?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary styled-box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= $meta_title; ?></h3>
                </div>

                <div class="box-body">
                    <div id="infoMessage"></div>
                    <?php if($this->session->flashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('success'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; 
                  
                
                    $userPurchase = $user_purchase_packages;
                    $packageInfo = $package_info;
                    $paymentInfo = $payment_info;
                    ?>
                    <div class="detail-section-wrapper">
                        <!-- User Purchase Details -->
                        <div class="detail-section">
                            <h4 class="section-title">User Purchase Details</h4>
                            <ul class="detail-list">
                                <li><strong>Name:</strong> <?= $userPurchase->first_name . " " . $userPurchase->last_name ?></li>
                                <li><strong>Progress Status:</strong> 
                                    <?php 
                                        if ($userPurchase->purchase_status == 1) {
                                            echo '<span class="label label-warning">Pending</span>';
                                        } elseif ($userPurchase->purchase_status == 2) {
                                            echo '<span class="label label-info">Processing</span>';
                                        } else {
                                            echo '<span class="label label-success">Completed</span>';
                                        }
                                    ?>
                                </li>
                                <li><strong>Payment Status:</strong> <?= $userPurchase->payment_status ?></li>
                                <li><strong>Transaction ID:</strong> <?= $userPurchase->transaction_id ?></li>
                            </ul>
                        </div>

                        <!-- Package Information -->
                        <div class="detail-section">
                            <h4 class="section-title">Package Information</h4>
                            <ul class="detail-list">
                                <li><strong>Name:</strong> <?= $packageInfo->packages_name ?></li>
                                <li><strong>Description:</strong> <?= $packageInfo->description ?></li>
                                <li><strong>Amount:</strong> <?= $packageInfo->amount ?></li>
                                <li><strong>Items:</strong>
                                    <ul class="package-items">
                                        <?php foreach(json_decode($packageInfo->packages_item) as $item): ?>
                                            <li><i class="fa fa-check-circle"></i> <?= $item ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <!-- Payment Information -->
                        <div class="detail-section">
                            <h4 class="section-title">Payment Information</h4>
                            <ul class="detail-list">
                                <li><strong>User ID:</strong> <?= $paymentInfo->user_id ?></li>
                                <li><strong>Package ID:</strong> <?= $paymentInfo->package_id ?></li>
                                <li><strong>PG Transaction ID:</strong> <?= $paymentInfo->pg_txnid ?></li>
                                <li><strong>Customer Name:</strong> <?= $paymentInfo->cus_name ?></li>
                                <li><strong>Customer Email:</strong> <?= $paymentInfo->cus_email ?></li>
                                <li><strong>Customer Phone:</strong> <?= $paymentInfo->cus_phone ?></li>
                                <li><strong>Amount:</strong> <?= $paymentInfo->amount ?></li>
                                <li><strong>Payment Status:</strong> <?= $paymentInfo->pay_status ?></li>
                                <li><strong>Payment Type:</strong> <?= $paymentInfo->payment_type ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CSS for Enhanced Styling -->
<style>
    .page-title {
        color: #4a90e2;
        font-size: 2em;
        font-weight: bold;
        text-align: center;
        padding-bottom: 15px;
        margin-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .styled-box {
        background: linear-gradient(135deg, #f0f4ff, #ffffff);
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.15);
        border-radius: 10px;
        padding: 25px;
        margin-top: 20px;
    }
    .box-header {
        background: #4a90e2;
        color: #fff;
        padding: 15px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }
    .section-title {
        font-size: 1.4em;
        color: #333;
        margin: 0 0 10px;
        border-bottom: 3px solid #4a90e2;
        display: inline-block;
        padding-bottom: 5px;
    }
    .detail-section {
        margin-bottom: 20px;
        background: #f9fbff;
        padding: 20px;
        border-radius: 8px;
    }
    .detail-list {
        list-style: none;
        padding: 0;
        font-size: 1.05em;
    }
    .detail-list li {
        padding: 8px 0;
        border-bottom: 1px dashed #e0e4ec;
    }
    .detail-list li strong {
        color: #4a90e2;
        font-weight: 600;
    }
    .package-items {
        list-style: none;
        padding-left: 0;
    }
    .package-items li {
        color: #4a90e2;
        font-weight: 500;
    }
    .package-items li i {
        color: #28a745;
        margin-right: 5px;
    }
    .alert-success {
        background-color: #e8f5e9;
        border-color: #c8e6c9;
        color: #388e3c;
        font-size: 1.05em;
    }
    .breadcrumb li a {
        color: #4a90e2;
    }
</style>
