<style>
    #pages_description img {

        width: calc(100% - 2%);

        height: auto;

    }
</style>


<div role="main" class="main">

    <!-- BREADCRUMBS -->
    <section class="page-section breadcrumbs text-center header-banner" style="z-index: 0!important;">
             <!-- <section class="page-section breadcrumbs text-center" style="background: #006aa2;"> -->
             <div class="container">
                 <div class="page-header">
                     <h1><?= $meta_title ?></h1>
                 </div>
                 <ul class="breadcrumb">
                     <li class="home"><a href="<?= base_url() ?>">Home</a></li>
                     <li><a class="active" href="javascript:void()"><?= $meta_title ?></a></li>
                 </ul>
             </div>
         </section>
         <!-- /BREADCRUMBS -->



    <div class="container">

        <hr class="tall_slim">
        <div class="col-md-12">
			<div style="display: flex; justify-content: start; align-items: center; flex-wrap: wrap; gap: 10px;">
				<?php
				$name_links = json_decode($info->name_link, true); // Decode JSON data
				if (!empty($name_links)) {
					foreach ($name_links as $item) {
						echo '<a href="' . htmlspecialchars($item['link']) . '" target="_blank" class="btn btn-primary">'
							. htmlspecialchars($item['name']) . '</a>';
					}
				} else {
					echo '<p>No links available.</p>';
				}
				?>
			</div>
		</div>
        <div class="col-md-12" id="pages_description">

            <?= htmlspecialchars_decode($info->description) ?>

        </div>

        <hr class="tall">

    </div>

</div>


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