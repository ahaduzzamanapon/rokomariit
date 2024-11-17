 <!-- CONTENT AREA -->
    <div class="content-area">

        <!-- PAGE -->
        <section class="page-section no-padding slider">
            <div class="container full-width">

                <div class="main-slider">
                    <div class="owl-carousel" id="main-slider">
                        <!-- Slide -->
                        <?php 
                        $i=0;
                       
                        foreach ($slider as $row) { 
                           
                                 $img_path = base_url().'slider_img/';
                                 if($row->image_file != NULL){
                                    $src= $img_path.$row->image_file;
                                 }
                              ?>
                                 <div class="item" style="background-image: url(<?=$src?>);  background-repeat: no-repeat;">
                                    <div class="caption">
                                        <div class="container">
                                            <div class="div-table">
                                                <div class="div-cell">
                                                    <div class="caption-content btn-grad">
                                                         <a href="tel:+8801775-015791"><h3 class="caption-subtitle">Call Now</h3></a>
                                                        <!-- <h2 class="caption-subtitle"> Call Now</h2> -->
                                                        <!-- <p class="caption-text">
                                                            <?=$row->details?></p>  -->                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php

                        } ?> 
                        
                        <!-- /Slide -->

    
                    </div>
                </div>

            </div>
        </section>
        <!-- /PAGE -->

        <!-- PAGE -->
        <section class="page-section">
            <div class="container">
                <h2 class="section-title wow fadeInUp" data-wow-offset="70" data-wow-delay="100ms">
                    <span>Our Services</span>
                </h2>
                <div class="separator small-separator"></div>
                <p class="sub-title-heading" style="text-align:center;">
                    Professionally managed Software Development Company servicing clients all over the Bangladesh and offshore Market. <strong>Rakomari IT Ltd.</strong> was formed with a clear goal to provide quality software development services.
                </p>

                <div class="row" >
                    <?php foreach ($homepage_services as $item) { ?>
                        
                    <!-- <div class="col-md-4 col-sm-12 col-xs-12 wow flipInY" style="" data-wow-offset="70" data-wow-duration="1s">
                           
                        <div class="thumbnail thumbnail-featured no-border no-padding" style="">
                             
                                <div class="media">
                                    <div class="caption">
                                        <div class="caption-wrapper div-table">
                                            <div class="caption-inner div-cell">
                                                <div class="caption-icon"><i class="fa <?=$item->fa_icon;?>"></i></div>
                                                <h4 class="caption-title"><?=$item->name;?></h4>
                                                </br>
                                                <p class="btn-row text-center">
                                                    <a href="<?=base_url()?>service/<?=$item->slug?>" class="btn btn-theme ripple-effect btn-theme-md">See All...</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption hovered">
                                        <a class="media-link" href="<?=base_url()?>service/<?=$item->slug?>">
                                        <div class="caption-wrapper div-table">
                                            <div class="caption-inner div-cell">
                                                <div class="caption-icon">
                                                    <i class="fa <?=$item->fa_icon;?>"></i>
                                                </div>
                                                <h4 class="caption-title"><?=$item->name;?></h4>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            
                        </div>
                        
                    </div> -->

                    <div class="col-lg-4 col-md-12 col-sm-12">
               
                        <div class="box-part text-center">
                            <!-- <a class="media-link" href="<?=base_url()?>service/<?=$item->slug?>"> -->
                            <div class="caption-icon">

                                    <img src="<?=base_url()?>service_img/icon_img/<?=$item->fa_icon;?>" alt="">
                                <!-- <i class="fa <?=$item->fa_icon;?>"></i> -->
                            </div>
                                <!-- <div class="separator" style="background-image:url(<?=base_url() ?>fwedget/images/background/client-bg.jpg);"></div> -->
                                <div class="title text-center">
                                <a href="<?=base_url()?>service/<?=$item->slug?>">  <h3 style="color:black;"><b><?=$item->name;?></b></h3></a>
                                  
                                </div>
                                
                                <div class="text">
                                    <p class="service-short-note"><span><?=$item->short_desc?></span></p>
                                  
                                </div>
                                                                
                        </div>
                    </div>	 
                    
                    <?php } ?>


                    <div class="col-md-12 col-lg-8 col-lg-12 col-sm-12" data-wow-offset="200" data-wow-delay="100ms">

                    <div class="service-video-bg">
                            
                                <img src="<?=base_url();?>setting_img/video-play.png" id="videoservice" onclick="loadservice()">
                                        
                    </div>


                    </div>
                </div>

            </div>
        </section>
        <!-- /PAGE -->

        <!-- PAGE -->
        
        <section class="page-section " style="background-image:url(<?=base_url() ?>fwedget/images/background/client-bg.jpg);">
            <div class="container">
                <!-- <?php foreach ($homepage_article as $item): ?> -->

                    <div class="row welcome">
                        <div class="col-sm-12 col-lg-6 wow fadeInLeft" data-wow-offset="200" data-wow-delay="100ms">

                            <div class='img-box' style="background-image:url(<?=base_url() ?>setting_img/about-us.png);   background-repeat: no-repeat;background-size: 100%;width: 100%;" responsive>
                                <img class="video-play"  src="<?=base_url();?>setting_img/video-play.png" style="margin-left: 20%; margin-top: 8%; height: 350px;"/>
                            </div>

                        </div>


                            <!-- <h2 class="section-title text-left">
                                <small><?=$item->name?></small>
                            </h2>
                            <p style="text-align: justify;"><?=$item->short_desc;?> </p>
                           
                            <p class="btn-row">
                                <a href="<?=base_url()?>article/<?=$item->slug?>" class="btn btn-theme ripple-effect btn-theme-md">See All...</a>
                            </p> -->
                        
                        <div class="col-sm-12 col-lg-6 wow fadeInRight" style="margin: left 20px;" data-wow-offset="200" data-wow-delay="300ms" >
                    
                            <h4 style="color: white; margin-top: 35px; margin-bottom: -10px;"><b>Welcome To</b> </h4>
                            <h1 style="color: white"><b> Rokomari IT LTD</b> </h1>
                            <p style="color: white; text-align:justify;">Rokomari IT Ltd. offers complete software product development in Dhaka.  We have experience in design, develop and maintaining software products and services. According to today's dynamic market situation, product development requires innovation and creativity as well as speed to deliver. Our products developed to the client's vision.</p>
                           
                           
                            <p style="color: white; line-height:2px"><i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                <b>&nbsp;Software Servicers </b>
                            </p> 
                            <p style="color: white; line-height:2px"><i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                <b>&nbsp;Outsource Project Development </b>
                            </p> 
                            <p style="color: white; line-height:2px"><i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                <b>&nbsp;IT Hardware </b>
                            </p> 
                            <p style="color: white; line-height:2px"><i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                <b>&nbsp;ICT Training </b>
                            </p> 
                            <p class="read-more"><a href="<?=base_url().'article/about-rokomari-it'?>"><b>READ MORE</b></a></p>
                    </div>
                </div>
          
                <!-- <?php endforeach ?> -->
            
            </div>
        </section>
        <!-- /PAGE -->



    <!-- page -->
            <section class="page-section ">
                <div class="container">

                <h2 class="section-title wow fadeInUp" data-wow-offset="70" data-wow-delay="100ms">
                        <span>Our Photo Gallery</span>
                    </h2>
                    <div class="separator small-separator"></div>
                    <p class="sub-title-heading">
                        <strong>Rokomari IT Ltd</strong> respects and seeks to maintain the highest standards of Fairness, equality, integrity, and honesty.
                        Our different teams provides their 100% efforts for serving the best to our clients.
                    </p>
                    <div class="tab-content wow fadeInUp photogallery" data-wow-offset="70" data-wow-delay="500ms">
                        
                        <!-- <div class="tab-pane fade active in">

                            <div class="swiper swiper--offers-brand">
                                
                                <div class="swiper-container"> -->
                                    <!-- <div class="col-md-2 col-sm-6 col-xs-12"> -->
                                    <!-- <div class="swiper-wrapper"> -->
                                        <div class="owl-carousel" id="photogallery">
                                        <?php $homepage_gallery=$this->Site_model->get_homepage_show('gallery'); ?>
                                        <?php foreach ($homepage_gallery as $item): ?>

                                                    <?php 
                                                    $img_path = base_url().'gallery_img/';
                                                    
                                                        if($item->image_file != NULL){
                                                            $src= $img_path.$item->image_file;
                                                            $src1=$img_path."view.png";
                                                        }
                                                    ?>
                                            <div class="item">
                                                <div class="thumbnail no-border no-padding thumbnail-car-card">
                                                    <!-- <div class="col-md-2 col-sm-2 col-xs-2" style="border: 2px solid"> -->
                                                    <div class="media">
                                                            <!-- <a class="media-link" data-gal="prettyPhoto" target="_blank" href="<?=$src?>"> -->
                                                                <a class="media-link" data-gal="" href="<?=$src?>">
                                                                <img class="media-img" src="<?=$src?>" alt=""/>
                                                                <span class="icon-view"><strong>
                                                                    <img src="<?=$src1?>" alt="">
                                                                    <!-- <i class="fa fa-plus-circle" aria-hidden="true"></i> -->
                                                            </strong></span>
                                                            </a>
                                                        </div>
                                                    <!-- </div> -->
                                                </div>
                                            </div>
                                                
                                        <?php endforeach ?>
                                    </div>
                                    <!-- </div> -->
                                <!-- </div> -->
                                <!-- <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                                <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div> -->
                            <!-- </div>
                        </div> -->
                    </div>
                </div>
            </section>
            <!-- /PAGE -->

            <section class="page-section " style="background-image:url(<?=base_url() ?>fwedget/images/background/CTA-Bg.jpg);">
                        <div class="container">
                            <!-- <?php foreach ($homepage_article as $item): ?> -->
                            <h2 class="section-title wow fadeInUp" data-wow-offset="70" data-wow-delay="100ms">
                                <span style="color: white">Get In Touch</span>
                            </h2>
                            <div class="separator small-separator-white"></div>
                            <p class="sub-title-heading" style="color: white">
                                Want to get in touch? We would love to hear you. Let us know how we can help.
                            </p>
                                <div class="row">

                                <form class="form" action="<?=base_url().'site/sendemail'?>" method="post" style="padding: 5%; margin-bottom:-50px;">
                                    
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4 col-sm-12">
                                            <input style="border-radius: 5px" type="text" name="name" class="form-control" placeholder="Name">
                                        </div>
                                        <div class="col-md-6 col-lg-4 col-sm-12">
                                        <input style="border-radius: 5px" type="text" name="phone" class="form-control" placeholder="Phone">
                                        </div>
                                        <div class="col-md-6 col-lg-4 col-sm-12">
                                        <input style="border-radius: 5px" type="text" name="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-12">
                                        <textarea style="border-radius: 5px" name="" id="" name="message" cols="30" rows="4" placeholder="Message" class="form-control"></textarea>
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-sm-6 col-md-12 col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><?php echo $captcha_image;?></span>
                                                <input type="text" name="captcha" class="form-control" id="captche" placeholder="Enter The code *" required>
                                            </div>
                                            
                                            <p>

                                            <?php 

                                            if($this->session->flashdata('error') != '')

                                            {

                                            echo $this->session->flashdata('error');

                                            }

                                            ?>

                                            </p>
                                        </div>
                                            <input type="submit" class="button form-control" value="Submit">
                                           
                                    
                                        </div>
                                    
                                    </div>
                                    </form>
                                
                                    
                                </div>
                            </div>
                    
                            <!-- <?php endforeach ?> -->
                        
                        </div>
            </section>


            <!-- PAGE -->
            <section class="page-section testimonials">
                <div class="container wow fadeInUp" data-wow-offset="70" data-wow-delay="500ms">
                    <div class="testimonials-carousel">
                        <div class="owl-carousel" id="testimonials">

                        <?php foreach ($testimonial as $item) { ?>

                                <?php 
                                    $img_path = base_url().'testimonial_img/';
                                    if($item->image_file != NULL){
                                        $src= $img_path.$item->image_file;
                                        $src1=$img_path."quote.png";
                                    }
                                ?>
                                <div class="testimonial">
                                        <div class="media">
                                            <div class="col-lg-6 col-md-12">
                                            <div class="media-body">
                                                <h1 style="color:black;"><b>OUR <br> CLIENTS REVIEW</b></h1>
                                                <img src="<?=$src1?>" alt="" style="width:42px; height:35px">
                                                <div class="testimonial-text"><?=$item->details;?></div>
                                                <!-- <div class="testimonial-name"><?=$item->client_name;?> <span class="testimonial-position"><?=$item->designation;?></span></div> -->
                                            </div>
                                            </div>
                                        
                                            <div class="col-lg-6 col-md-12">
                                            <div class="panel panel-default">
                                            <div class="panel-body"><img src="<?=$src;?>" alt="Testimonial avatar"></div>
                                            <div class="panel-footer"><b><?=$item->client_name;?></b> <br><span class="testimonial-position" style="color:black;  font-size: 13px;"><?=$item->designation;?></span></div>
                                            </div>
                                            <!-- <div class="media-left">
                                                <a href="javascript:void()">
                                                    <img class="media-object" src="<?=$src;?>" alt="Testimonial avatar">
                                                    <div class="testimonial-name grad-tastimonial" style="color:black;"><?=$item->client_name;?> <br><span class="testimonial-position"><?=$item->designation;?></span></div>
                                                </a>
                                            </div> -->
                                            </div>
                                        
                                            
                                        </div>
                                    </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /PAGE -->
    <!-- PAGE -->
        
        <section class="page-section " style="background-image:url(<?=base_url() ?>fwedget/images/background/client-bg.jpg);">
            <div class="container">

                <h2 class="section-title wow fadeInUp" data-wow-offset="70" data-wow-delay="100ms">
                    <span style="color: white">We Are Proud To Serve Our Clients</span>
                </h2>
                <div class="separator small-separator-white"></div>
                <p class="sub-title-heading" style="color: white">
                    <strong>Rokomari IT Ltd</strong> always value their clients and their requirements. Our clear goal is to provide quality software development services with full of clients satisfactory.
                </p>
                <div class="tab-content wow fadeInUp top-products-carousel" data-wow-offset="70" data-wow-delay="500ms">
                    
                    <!-- <div class="tab-pane fade active in">

                        <div class="swiper swiper--offers-brand">
                            
                            <div class="swiper-container"> -->
                                <!-- <div class="col-md-2 col-sm-6 col-xs-12"> -->
                                <!-- <div class="swiper-wrapper"> -->
                                    <div class="owl-carousel" id="top-products-carousel">
                                    <?php foreach ($homepage_client as $item): ?>

                                        <?php 
                                         $img_path = base_url().'client_img/';
                                             if($item->image_file != NULL){
                                                $src= $img_path.$item->image_file;
                                             }
                                        ?>
                                        <div class="item" >
                                            <div class="thumbnail no-border no-padding thumbnail-car-card">
                                                <!-- <div class="col-md-2 col-sm-2 col-xs-2" style="border: 2px solid"> -->
                                                    <div class="media">
                                                        <!-- <a class="media-link" data-gal="prettyPhoto" href="<?=$src?>"> -->
                                                        <a class="media-link" data-gal="" target="_blank" href="<?=$src?>">    
                                                            <img src="<?=$src?>" alt=""/>
                                                        </a>
                                                    </div>
                                                <!-- </div> -->
                                            </div>
                                        </div>
                                            
                                    <?php endforeach ?>
                                </div>
                                <!-- </div> -->
                            <!-- </div> -->
                            <!-- <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                            <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div> -->
                        <!-- </div>
                    </div> -->
                </div>
            </div>
        </section>
        <!-- /PAGE -->
        <!-- PAGE -->
        <section class="page-section" style="margin-left: 10px;margin-right: 10px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                   
                     <a href="<?=base_url();?>"><img src="<?=base_url();?>setting_img/<?=$setting->image_file?>" alt="Rokomari IT Ltd" width="100px" height="70px"/></a>
                        
                        <h5 style="color:black; font-family: 'Roboto', sans-serif;"><i class="fa fa-map-marker" style="color:black;"></i>&nbsp;&nbsp;&nbsp;Raisa & Shikdhar Tower,3/8<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;North Pirerbag, Dhaka-1216</p></h5>
                        <h5 style="color:black; font-family: 'Roboto', sans-serif;"><i class="fa fa-phone"  style="color:black;"></i>&nbsp;&nbsp; +8801775015791<p>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;+8801913036591</p> </h5>
                        <h5 style="color:black; font-family: 'Roboto', sans-serif;"><i class="fa fa-envelope"  style="color:black;"></i>&nbsp;&nbsp; info@rokomariit.com, rokomariit@gmail.com</h5>
                        <h3 style="color:black; font-family: 'Roboto', sans-serif;line-height: 37px;">A Sister Company of <a href="https://mysoftheaven.com/" style="color: #318af8;">Mysoftheaven(BD) LTD</a></h3>

                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <h3 class="service" style="color:black;font-family: 'Roboto', sans-serif;"><b><a>OUR S</a>ERVICES</b></h3>
                        <?php foreach ($homepage_services as $item) { ?>
                        
                        <div class="servicelist">
                        <a href="<?=base_url()?>service/<?=$item->slug?>"><?=$item->name;?></a>
                        </div>
                       
                        <?php } ?>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                    <h3 class="service" style="color:black;font-family: 'Roboto', sans-serif;"><b><a >GOOG</a>LE MAP</b></h3>
                    
                    <div class="mapouter"><div class="gmap_canvas"><iframe width="350" height="250" id="gmap_canvas" src="https://maps.google.com/maps?q=rokomari%20it&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org"></a><br><style>.mapouter{position:relative;text-align:right;height:250px;width:350px;}</style><a href="https://www.embedgooglemap.net">embedgooglemap.net</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:250px;width:350px;}</style></div></div>
                </div>
                </div>

            </div>
        </section>
        <!-- /PAGE -->

        <!-- PAGE -->
        <!--<section class="page-section page-section testimonials">
            <div class="container">

                <div class="row">

                    <div class="col-md-6">
                        <div class="contact-info">

                            <h2 class="block-title"><span>Google Map</span></h2>

                            <?=$setting->google_map?>

                        </div>
                    </div>

                    <div class="col-md-6 text-left">

                        <h2 class="block-title"><span>Contact Form</span></h2>

                        
                        <form  action="<?=base_url().'site/sendemail'?>" method="post">

                            <div class="outer required">
                                <div class="form-group af-inner">
                                    <label class="sr-only" for="name">Name</label>
                                    <input
                                            type="text" name="name"  placeholder="Name" value="" size="30"
                                            data-toggle="tooltip" title="Name is required"
                                            class="form-control placeholder" required/>
                                </div>
                            </div>

                            <div class="outer required">
                                <div class="form-group af-inner">
                                    <label class="sr-only" for="email">Email</label>
                                    <input
                                            type="text" name="email"  placeholder="Email" value="" size="30"
                                            data-toggle="tooltip" title="Email is required"
                                            class="form-control placeholder" required/>
                                </div>
                            </div>

                            <div class="outer required">
                                <div class="form-group af-inner">
                                    <label class="sr-only" for="subject">Subject</label>
                                    <input
                                            type="text" name="subject" placeholder="Subject" value="" size="30"
                                            data-toggle="tooltip" title="Subject is required"
                                            class="form-control placeholder" required/>
                                </div>
                            </div>

                            <div class="form-group af-inner">
                                <label class="sr-only" for="input-message">Message</label>
                                <textarea
                                        name="message"  placeholder="Message" rows="9" cols="50"
                                        data-toggle="tooltip" title="Message is required"
                                        class="form-control placeholder" required></textarea>
                            </div>

                            <div class="outer required">
                                <div class="form-group af-inner">
                                    <input type="submit" name="submit" class="form-button form-button-submit btn btn-theme btn-theme-dark" id="submit_btn" value="Send message" />
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </section>-->
        <!-- /PAGE -->
    </div>
    <!-- /CONTENT AREA -->