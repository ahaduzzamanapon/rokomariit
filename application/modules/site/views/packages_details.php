<style>
    /* Custom Font */
    /* body {
        font-family: 'Poppins', sans-serif;
    } */

    /* Container Box */
    .c_box {
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

    .packages_info {
        background-color: #F8F5FF;
        margin-bottom: 20px;
        padding: 20px;
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

    .packages_video {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 30px;
        margin-bottom: 30px;
    }

    .video_title {
        margin-top: 55px;
        margin-bottom: 55px;
        /* font-weight: 700; */
    }

    iframe {
        width: 95%;
        height: 680px;
        border-radius: 15px;
    }

    /* Responsive Layout */
    @media (max-width: 767px) {
        .col-md-6 {
            margin-bottom: 20px;
        }
    }

    @media (min-width: 360px) and (max-width: 425px) {
        .video_title h1 {
            font-size: 22px;
            line-height: 30px;
            padding: 5px;
        }

        .video_title h3 {
            font-size: 18px;
            line-height: 30px;
            padding: 5px;
        }

        .video_title {
            margin-top: 25px;
            margin-bottom: 2px;
            /* font-weight: 700; */
        }

        iframe {
            width: 95%;
            height: 350px;
            border-radius: 15px;
        }

        .packages_info{
            padding: 10px !important;
        }

        .item-details {
            width: 100% !important;
        }

        .list-unstyled {
            font-size: 13px !important;
        }

        .empty_div{
            margin: 0px !important;
        }

    }
</style>

<?php
$package_info = $package_info;
$packages_items = json_decode($package_info->packages_item, true);
$total_market_price = 0;
$total_regular_price = 0;
foreach ($packages_items as $key => $value) {
    // dd($value['market_price']);
    $total_market_price += $value['market_price'];
    $total_regular_price += $value['regular_price'];
}

if ($package_info->amount > 0) {
    $discount_percentage = $package_info->amount; // Assume $row->amount is the discount percentage
    $discounted_price = $total_regular_price - ($total_regular_price * $discount_percentage / 100);
} else {
    $discounted_price = $total_regular_price;
}

// $user = $this->session->userdata();

$user_id = $this->session->user_id;
$user_obj = $this->db->where('id', $user_id)->get('users')->row();

if (!empty($user_obj)) {
    $firstName = $user_obj->first_name;
    $lastName = $user_obj->last_name;
    $email = $user_obj->email;
    $phone = $user_obj->phone;
} else {
    // Default values for non-logged-in users
    $firstName = '';
    $lastName = '';
    $email =  '';
    $phone = '';
}

$ip = ($_SERVER['REMOTE_ADDR'] === '::1') ? '103.73.199.12' : $_SERVER['REMOTE_ADDR']; // Replace with the user's IP address
$apiToken = 'e7c866514030b4'; // Replace with your actual token
$url = "https://ipinfo.io/{$ip}/json?token={$apiToken}";

$response = file_get_contents($url);
$locationData = json_decode($response, true);
?>

<script>
    dataLayer.push({
        event: "view_item",
        name: "<?= $firstName . ' ' . $lastName ?>",
        phone_number: "<?= $phone ?>",
        email: "<?= $email ?>",
        visitor_type: "Customer",
        city: "<?= $locationData['city'] ? $locationData['city'] : 'Unknown' ?>",
        zip_code: "<?= $locationData['postal'] ? $locationData['postal'] : 'Unknown' ?>",
        country: "<?= $locationData['country'] ? $locationData['country'] : 'Unknown' ?>",
        items: [{
            item_id: "<?= $package_info->id ?>",
            item_name: "<?= $package_info->packages_name ?>",
            affiliation: "Google Merchandise Store",
            coupon: "SUMMER_FUN",
            discount: <?= $package_info->amount ?>,
            location_id: "<?= $_SERVER['REMOTE_ADDR'] ?>",
            regular_price: <?= $total_regular_price ?>,
            market_price_price: <?= $total_market_price ?>,
            discounted_price: <?= $discounted_price ?>,
            quantity: 1,
            packages_item: [
                <?php
                $packages_items = json_decode($package_info->packages_item, true); // Decode the JSON
                foreach ($packages_items as $item): ?> {
                        name: "<?= $item['name'] ?>",
                        regular_price: "<?= $item['regular_price'] ?>",
                        market_price: "<?= $item['market_price'] ?>"
                    },
                <?php endforeach; ?>
            ]
        }]
    });
</script>

<div class="content-area">
    <div class="c_box">

        <section class=" with-sidebar">
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
            <div class="packages_purchase  ">
                <div class="row">
                    <div class="text-center video_title">
                        <h1 class="text-center" style="font-weight: bold; line-height: 42px;"><?= $package_info->package_video_title_1 ?></h1>
                    </div>
                    <div class="packages_video">
                        <iframe
                            src="https://www.youtube.com/embed/<?= $package_info->package_video ?>?playlist=<?= $package_info->package_video ?>&loop=1"
                            frameborder="0"
                            allowfullscreen>
                        </iframe>

                    </div>
                    <div style="display: flex; justify-content: center;">
                        <button type="button" class="btn btn-primary text-center" id="registrationButton" data-toggle="modal" data-target="#videoModal">রেজিস্ট্রেশন করুন</button>
                    </div>

                    <div class="text-center video_title">
                        <h3 class="text-center" style="font-weight: 600; line-height: 42px;"><?= $package_info->package_video_title_2 ?></h3>
                    </div>

                </div>
                <div class="row g-4">
                    <div class="col-md-3 empty_div"></div>
                    <!-- Package Information -->
                    <div class="col-md-6 packages_info text-left">
                        <h1 class="text-center" style="font-weight: bold;">Package Information</h1>
                        <h2 class="text-primary text-center mb-3" style="font-weight: bold;"><?= $package_info->packages_name ?></h2>
                        <p class="text-muted text-center"><?= $package_info->description ?></p>
                        <div class="mt-3 item-details" style="width: 80%;">
                            <ul class="list-unstyled">
                                <div style="display: flex; justify-content: space-between;">
                                    <h4 style="font-size: 14px; font-weight: bold; color: #8544FF;"> Name</h4>
                                    <h4 style="font-size: 14px; font-weight: bold; color: #8544FF;">Market Price</h4>
                                    <h4 style="font-size: 14px; font-weight: bold; color: #8544FF;">RIT Price</h4>
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

                                    echo '<li style="border-bottom: 1px dotted #8544FF;">
                                            <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; ">
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

                        <?php
                        if ($package_info->user_payment > 0) {
                            // dd($row->user_payment);
                            $user_payment = $package_info->user_payment;
                            $payment = (float) $discounted_price * (float) $user_payment / 100;
                            // dd($payment);
                        } else {
                            $payment = $discounted_price;
                        }

                        ?>

                        <a href="<?= base_url('site/purchase_create/' . rawurlencode($package_info->packages_name)) ?>" class="btn btn-primary btn-block">Submit Work Order ( <?= number_format($package_info->user_payment)  ?>%) ( <?= number_format($payment, 2) ?>৳)</a>
                    </div>

                    <div class="col-md-3"></div>
                </div>
            </div>
        </section>
    </div>

    <script>
        document.getElementById('registrationButton').addEventListener('click', function() {
            const targetDiv = document.querySelector('.card-p-footer');
            targetDiv.scrollIntoView({
                behavior: 'smooth', // Smooth scrolling animation
                block: 'center' // Aligns the div to the center of the viewport
            });
        });
    </script>

    <section class="page-section" style="border-top:1px solid #d3cecd;margin-left: 10px;margin-right: 10px;">
        <div class="container section1">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4" style="float:left;">

                    <a href="<?= base_url(); ?>"><img src="<?= base_url(); ?>setting_img/<?= $setting->image_file ?>" alt="Rokomari IT Ltd" width="100px" height="70px" /></a>

                    <h5 style="color:black; font-family: 'Roboto', sans-serif;"><i class="fa fa-map-marker" style="color:black;"></i>&nbsp;&nbsp;&nbsp;Raisa & Shikdhar Tower,3/8<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;North Pirerbag, Dhaka-1216</p>
                    </h5>
                    <h5 style="color:black; font-family: 'Roboto', sans-serif;"><i class="fa fa-phone" style="color:black;"></i>&nbsp;&nbsp; +8801775015791<p>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;+8801913036591</p>
                    </h5>
                    <h5 style="color:black; font-family: 'Roboto', sans-serif;"><i class="fa fa-envelope" style="color:black;"></i>&nbsp;&nbsp; info@rokomariit.com, rokomariit@gmail.com</h5>
                    <h3 style="color:black; font-family: 'Roboto', sans-serif;line-height: 37px;">A Sister Company of <a href="https://mysoftheaven.com/" style="color: #318af8;">Mysoftheaven(BD) LTD</a></h3>

                </div>
                <div class="col-lg-4 col-md-4 col-sm-4" style="float:left;">
                    <h3 class="service" style="color:black;font-family: 'Roboto', sans-serif;"><b><a>OUR S</a>ERVICES</b></h3>
                    <?php $contactpage_services = $this->Site_model->get_homepage_show('services'); ?>

                    <?php foreach ($contactpage_services as $item) { ?>

                        <div class="servicelist">
                            <a href="<?= base_url() ?>service/<?= $item->slug ?>"><?= $item->name; ?></a>
                        </div>

                    <?php } ?>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4" style="float:left;">
                    <h3 class="service" style="color:black;font-family: 'Roboto', sans-serif;"><b><a>GOOG</a>LE MAP</b></h3>

                    <div class="mapouter">
                        <div class="gmap_canvas"><iframe width="350" height="250" id="gmap_canvas" src="https://maps.google.com/maps?q=rokomari%20it&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org"></a><br>
                            <style>
                                .mapouter {
                                    position: relative;
                                    text-align: right;
                                    height: 250px;
                                    width: 350px;
                                }
                            </style><a href="https://www.embedgooglemap.net">embedgooglemap.net</a>
                            <style>
                                .gmap_canvas {
                                    overflow: hidden;
                                    background: none !important;
                                    height: 250px;
                                    width: 350px;
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>