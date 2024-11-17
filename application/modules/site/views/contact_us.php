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

        <div class="row">
            <div class="contact-info">
                <div class="col-lg-4">
                    <img src="<?=base_url()?>gallery_img/location.png" alt="" style="height:35%;width:35%; margin-top:40px;margin-bottom:-10px;">
                   <p style="color:black;"> Raisa & Shikdhar Tower,3/8 <br> North Pirerbag, Dhaka-1207</p>               

                </div>
                <div class="col-lg-4">
                    <img src="<?=base_url()?>gallery_img/phone.png" alt="" style="height:35%;width:35%; margin-top:40px;margin-bottom:-10px;">
                    <p style="color:#f95a01;">+8801775015791 <br> +8801913036591</p>                    
                </div>
                <div class="col-lg-4">
                    <img src="<?=base_url()?>gallery_img/email.png" alt="" style="height:35%;width:35%; margin-top:40px;margin-bottom:-10px;">
                    <p style="color:black;">info@rokomariit.com <br> rokomariit@gmail.com</p>                    
                </div>
            </div>
           
                    <!-- <div class="box-part text-center">
                                       
                                        <div class="caption-icon">
                                               
                                        </div>
                                            
                                            <div class="title text-center">
                                            <a href="<?=base_url()?>service/<?=$item->slug?>">  <h5 style="color:black;"><b>


                                            </b></h5></a>
                                            
                                            </div>
                 
                                                                            
                    </div> -->
        </div>

    </div>
</section>

<section class="page-section color" style="margin-top:-5%;">
    <div class="container">

        <div class="row contact-form-bg">
                   <div class="col-lg-6 col-md-12 col-sm-12" style="text-align:center;">
                   <div class="contact-form-content">
                   <h1 style="color:white;"><b> <strong>GET IN</strong> TOUCH</b>
                        <p>
                        Want to get in touch? We would love to hear you. Let us know how we can help.
                        </p>
                    </h1>
                
                   </div>
                        
                   </div>         
                   <div class="col-lg-6 col-md-12 col-sm-12">
                   
                    <form class="form contact-form" action="<?=base_url().'site/sendemail'?>" method="post">
                                
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-sm-12">
                                        <input style="border-radius: 5px" type="text" name="name" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-sm-12">
                                    <input style="border-radius: 5px" type="text" name="phone" class="form-control" placeholder="Phone">
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-sm-12">
                                    <input style="border-radius: 5px" type="text" name="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-sm-12">
                                    <textarea style="border-radius: 5px" name="" id="" name="message" cols="30" rows="5" placeholder="Message" class="form-control"></textarea>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                    <div class="form-group">

                                        <div class="input-group">
                                            <span class="input-group-addon"><?php echo $captcha_image;?></span>
                                            <input type="text" name="captcha" class="form-control" id="captcha" placeholder="Enter The code *" required>
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

                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                    <input type="submit" class="form-control contact-btn" value="SUBMIT">
                                    </div>
                                    
                                </div>
                    </form>
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