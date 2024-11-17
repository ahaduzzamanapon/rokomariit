     <!-- CONTENT AREA -->
     <div class="content-area">

<!-- BREADCRUMBS -->
<section class="page-section breadcrumbs text-center header-banner">
<!-- <section class="page-section breadcrumbs text-center" style="background: #006aa2;"> -->
    <div class="container">
        <div class="page-header">
            <h1><?=$meta_title?></h1>
        </div>
        <ul class="breadcrumb">
            <li class="home"><a href="<?=base_url()?>">Home</a></li>
            <li><a  class="active" href="javascript:void()"><?=$meta_title?></a></li>
        </ul>
    </div>
</section>
<!-- /BREADCRUMBS -->

<!-- PAGE -->
<section class="page-section color">
    <div class="container">

        <div class="row" style="margin-left:10px; margin-right:10px;">
          <div class="col-lg-8 col-md-8 col-sm-8" style="padding:20px; margin-top:-30px;">
                <h2><span style="color:#0a0909"><b><?=$info->name?></b></span></h2>
                <p><?=$info->description;?> </p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4">
    
                <div class="row content-page">
                <h2 style="color:#fbfbfb; text-align:center;">
                    <span><b>OUR SERVICES</b></span>
                </h2>
                <div class="separator small-separator-white"></div>
                <p class="service-content">
                    Professionally managed Software Development Company servicing clients all over the Bangladesh and offshore Market. <strong>Rakomari IT Ltd.</strong> was formed with a clear goal to provide quality software development services.
                </p>
                </div>

                    <div class="row" >
                        <?php $contactpage_services=$this->Site_model->get_homepage_show('services'); ?>
                       
                       <?php foreach ($contactpage_services as $item) { ?>
                       
                       <div class="servicelist service-dox">
                       <img src="<?=base_url()?>service_img/icon_img/<?=$item->fa_icon;?>" alt="" style="height:10%;width:10%; margin-left:5px;">
                       <a href="<?=base_url()?>service/<?=$item->slug?>"><?=$item->name;?></a>
                       </div>
                      
                       <?php } ?>


                    

                    <div class=" col-lg-12 col-md-12 col-sm-12 service-video-bg-other">
                        <img src="<?=base_url();?>setting_img/video-play.png" responsive>
                    </div>

                  
             

            </div>
       
          </div>
        </div>

    </div>
</section>


<section class="page-section" style="border-top:1px solid #d3cecd;margin-left: 10px;margin-right: 10px;">
            <div class="container section1">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4" style="float:left;">
                   
                     <a href="<?=base_url();?>"><img src="<?=base_url();?>setting_img/<?=$setting->image_file?>" alt="Rokomari IT Ltd" width="100px" height="70px"/></a>
                        
                        <h5 style="color:black; font-family: 'Roboto', sans-serif;"><i class="fa fa-map-marker" style="color:black;"></i>&nbsp;&nbsp;&nbsp;Raisa & Shikdhar Tower,3/8<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;North Pirerbag, Dhaka-1216</p></h5>
                        <h5 style="color:black; font-family: 'Roboto', sans-serif;"><i class="fa fa-phone"  style="color:black;"></i>&nbsp;&nbsp; +8801775015791<p>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;+8801913036591</p> </h5>
                        <h5 style="color:black; font-family: 'Roboto', sans-serif;"><i class="fa fa-envelope"  style="color:black;"></i>&nbsp;&nbsp; info@rokomariit.com, rokomariit@gmail.com</h5>
                        <h3 style="color:black; font-family: 'Roboto', sans-serif;line-height: 37px;">A Sister Company of <a href="https://mysoftheaven.com/" style="color: #318af8;">Mysoftheaven(BD) LTD</a></h3>
                        
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4" style="float:left;">
                        <h3 class="service" style="color:black;font-family: 'Roboto', sans-serif;"><b><a>OUR S</a>ERVICES</b></h3>
                        <?php $contactpage_services=$this->Site_model->get_homepage_show('services'); ?>
                       
                        <?php foreach ($contactpage_services as $item) { ?>
                        
                        <div class="servicelist">
                        <a href="<?=base_url()?>service/<?=$item->slug?>"><?=$item->name;?></a>
                        </div>
                       
                        <?php } ?>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4" style="float:left;">
                    <h3 class="service" style="color:black;font-family: 'Roboto', sans-serif;"><b><a >GOOG</a>LE MAP</b></h3>
                    
                    <div class="mapouter"><div class="gmap_canvas"><iframe width="350" height="250" id="gmap_canvas" src="https://maps.google.com/maps?q=rokomari%20it&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org"></a><br><style>.mapouter{position:relative;text-align:right;height:250px;width:350px;}</style><a href="https://www.embedgooglemap.net">embedgooglemap.net</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:250px;width:350px;}</style></div></div>
                </div>
                </div>

            </div>
        </section>
<!-- /PAGE -->

<!-- PAGE -->
 <!-- <section class="page-section no-padding no-bottom-space-off">
    <div class ="container full-width">

        
        <?=$setting->google_map?>
      

    </div>
</section>  -->
<!-- /PAGE -->
</div>
<!-- /CONTENT AREA -->