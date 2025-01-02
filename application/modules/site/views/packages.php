<!-- CONTENT AREA -->
<style>
    /* General Styles */
    .content-area {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        color: #333;
    }

    .card_p {
        background: linear-gradient(135deg, #ffffff, #f0f4f8);
        padding: 30px;
        min-height: 420px;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        border-radius: 20px;
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        margin-left: 15px;
        margin-right: 15px;
        margin-bottom: 30px;
        position: relative;
        overflow: hidden;
    }

    .card_p::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0) 70%, rgba(0, 106, 162, 0.15) 100%);
        transition: all 0.4s ease;
        z-index: 0;
    }

    .card_p:hover {
        transform: scale(1.03);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
    }

    .card_p:hover::before {
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    /* Card Header */
    .card-p-header {
        text-align: center;
        padding-bottom: 15px;
        border-bottom: 1px solid #e0e0e0;
        color: #006aa2;
        position: relative;
        z-index: 1;
    }

    .card-p-header h3 {
        font-size: 20px;
        margin-bottom: 8px;
        font-weight: bold;
    }

    .card-p-header p {
        font-size: 15px;
        color: #777;
    }

    /* Card Body */
    .card-p-body {
        padding: 20px 0;
        position: relative;
        z-index: 1;
    }

    .card-p-body ul {
        list-style: none;
        padding: 0;
        height: 280px !important;
        overflow-y: scroll !important;
        /* Hide scrollbar */
        scrollbar-width: none;
        /* Firefox */
        -ms-overflow-style: none;
        /* IE and Edge */
    }

    .card-p-body ul::-webkit-scrollbar {
        display: none;
        /* Chrome, Safari, and Opera */
    }

    .card-p-body ul li {
        font-size: 16px;
        padding: 8px 0;
        color: #555;
        display: flex;
        align-items: center;
    }

    .card-p-body ul li::before {
        content: "✔";
        color: #006aa2;
        margin-right: 12px;
        font-size: 18px;
        font-weight: bold;
    }

    /* Card Footer */
    .card-p-footer {
        text-align: center;
        padding-top: 15px;
        border-top: 1px solid #e0e0e0;
        position: relative;
        z-index: 1;
        font-family: sans-serif;
    }

    .card-p-footer h3 {
        font-size: 30px;
        color: #444;
        margin-bottom: 15px;
        font-weight: bold;
    }

    /* Button */
    .btn-primary {
        background: linear-gradient(135deg, #006aa2, #004f7c);
        color: #fff;
        padding: 12px 30px;
        border-radius: 10px;
        transition: background 0.3s ease, transform 0.3s ease;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        font-weight: bold;
        box-shadow: 0 4px 8px rgba(0, 106, 162, 0.2);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #004f7c, #006aa2);
        transform: translateY(-3px);
        color: #ffffff;
    }

    .custom-col-width {
        flex: 0 0 47%;
        /* 31% approximates 3.9 columns */
        max-width: 47%;
    }

    /* Breadcrumbs Styling */


    @media (max-width: 768px) {


        .col-md-3 {
            width: 100%;
            margin-bottom: 20px;
        }

        .btn-primary {
            width: 100%;
            padding: 12px 0;
        }


    }

    @media (max-width: 425px) {
        .custom-col-width {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }
</style>



<?php

$this->db->select('*');
$this->db->from('packages');
$this->db->where('status', '1');
$query = $this->db->get();
// dd($this->session->userdata() );
// dd($query->result());
$total_market_price = 0;
$total_regular_price = 0;
foreach ($query->result() as $row) {
    $packages_items = json_decode($row->packages_item, true);
    foreach ($packages_items as $key => $value) {
        // dd($value['market_price']);
        $total_market_price += $value['market_price'];
        $total_regular_price += $value['regular_price'];
    }
}

// dd($total_regular_price);
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
    // $visitor_type = 'Customer';

}


// $firstName = isset($user) ? $user['first_name'] : 'Customer';
// $lastName = isset($user) ? $user['last_name'] : '';

$ip = ($_SERVER['REMOTE_ADDR'] === '::1') ? '103.73.199.12' : $_SERVER['REMOTE_ADDR']; // Replace with the user's IP address
$apiToken = 'e7c866514030b4'; // Replace with your actual token
$url = "https://ipinfo.io/{$ip}/json?token={$apiToken}";

$response = file_get_contents($url);
$locationData = json_decode($response, true);

?>


<script>
    dataLayer.push({
        event: "view_item_list",
        name: "<?= $firstName . ' ' . $lastName ?>",
        phone_number: "<?= $phone ?>",
        email: "<?= $email ?>",
        visitor_type: "Customer",
        city: "<?= $locationData['city'] ? $locationData['city'] : 'Unknown' ?>",
        zip_code: "<?= $locationData['postal'] ? $locationData['postal'] : 'Unknown' ?>",
        country: "<?= $locationData['country'] ? $locationData['country'] : 'Unknown' ?>",
        // ecommerce: {
        items: [
            <?php foreach ($query->result() as $row): ?> {
                    <?php
                    if ($row->amount > 0) {
                        $discount_percentage = $row->amount; // Assume $row->amount is the discount percentage
                        $discounted_price = $total_regular_price - ($total_regular_price * $discount_percentage / 100);
                    } else {
                        $discounted_price = $total_regular_price;
                    }
                    ?>
                    item_id: "<?= $row->id ?>",
                        item_name: "<?= $row->packages_name ?>",
                        affiliation: "Google Merchandise Store",
                        coupon: "SUMMER_FUN",
                        discount: <?= $row->amount ?>,
                        location_id: "<?= $_SERVER['REMOTE_ADDR'] ?>",
                        regular_price: <?= $total_regular_price ?>,
                        market_price_price: <?= $total_market_price ?>,
                        discounted_price: <?= $discounted_price ?>,
                        quantity: 1,
                        packages_item: [
                            <?php
                            $packages_items = json_decode($row->packages_item, true); // Decode the JSON
                            foreach ($packages_items as $item): ?> {
                                    name: "<?= $item['name'] ?>",
                                    regular_price: "<?= $item['regular_price'] ?>",
                                    market_price: "<?= $item['market_price'] ?>"
                                },
                            <?php endforeach; ?>
                        ]
                },
            <?php endforeach; ?>
        ]
        // }
    });
</script>






<div class="content-area">
    <section class="page-section with-sidebar">
        <div class="container">
            <div class="row" style=" display: flex; flex-wrap: wrap;">

                <?php
                foreach ($query->result() as $row) {
                    // Initialize totals
                    $total_market_price = 0;
                    $total_regular_price = 0;
                ?>
                    <a href="<?= base_url('site/packages_details/' . rawurlencode($row->packages_name)) ?>" class="">
                        <div class="col-sm-12 col-md-6 custom-col-width card_p">
                            <div class="card-p-header">
                                <h3><?= implode(' ', array_slice(explode(' ',$row->packages_name), 0, 5)) ; ?></h3>
                                <p>
                                    <?= implode(' ', array_slice(explode(' ', $row->description), 0, 10)) . '...'; ?>
                                </p>

                            </div>
                            <div class="card-p-body">
                                <ul class="list-unstyled">
                                    <div style="display: flex; justify-content: space-between; font-size: 14px; font-weight: bold;">
                                        <h4 style="font-size: 14px; font-weight: bold; padding-left:30px"> Name</h4>
                                        <h4 style="font-size: 14px; font-weight: bold; padding-left:30px">Market Price</h4>
                                        <h4 style="font-size: 14px; font-weight: bold;">RIT Price</h4>
                                    </div>

                                    <?php
                                    $item = json_decode($row->packages_item);
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
                            </div>
                            <div class="card-p-footer" style="border-top: 1px solid #ddd; padding-top: 10px;">
                                <div style="display: flex; justify-content: space-between; color: #000; font-weight: bold;">
                                    <span>Total Price:</span>
                                    <span><?= number_format($total_market_price, 2) ?></span>
                                    <span>
                                        <?php
                                        if ($row->amount > 0) {
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
                                if ($row->amount > 0) {
                                    $discount_percentage = $row->amount; // Assume $row->amount is the discount percentage
                                    $discounted_price = $total_regular_price - ($total_regular_price * $discount_percentage / 100);
                                } else {
                                    $discounted_price = $total_regular_price;
                                }
                                ?>
                                <h3>
                                    ৳ <?= number_format($discounted_price, 2) ?>
                                    <?php if ($row->amount > 0): ?>
                                        <span style="color: red; font-weight: bold; font-size: 12px;">(Discounted Price)</span>
                                    <?php endif; ?>
                                </h3>

                                <?php 
                                    if ($row->user_payment > 0) {
                                        // dd($row->user_payment);
                                        $user_payment = $row->user_payment;
                                        $payment = (float) $discounted_price * (float) $user_payment / 100;
                                        // dd($payment);
                                    }else{
                                        $payment = $discounted_price;
                                    }
                                    
                                ?>

                                <a href="<?= base_url('site/purchase_create/' . rawurlencode($row->packages_name)) ?>" class="btn btn-primary btn-block">Submit Work Order ( <?= number_format($row->user_payment)  ?>%) ( <?= number_format($payment, 2) ?>৳)</a>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </section>

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