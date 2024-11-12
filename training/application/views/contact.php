
    <!-- Breadcumb area start -->
    <section class="breadcumb_area">
    <img src="assets/img/bg-pattern/Header-banner.jpg" alt="">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcumb_section">
                        <!-- Breadcumb page title start -->
                        <div class="page_title">
                            <h2>CONTACT US</h2>
                        </div>
                        <!-- Breadcumb page pagination start -->
                        <div class="page_pagination">
                            <ul>
                                <li><a href="index.php"><b>HOME</b></a></li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                <li style="color: #f42524"><b>CONTACT US</b></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcumb area end -->

    <!-- ==================== Message Now Area Start ==================== -->
    <section class="message_now_area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-md-12 col-sm-12 col-lg-12" style="padding-bottom: 20px;">
                    <img src="assets/img/contact_img/cta-bg.png" alt="">
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-md-12 col-sm-12 col-lg-12">
                <p>

                <?php 

                if($this->session->flashdata('error') != '')

                {

                echo $this->session->flashdata('error');

                }

                ?>

                </p>
                    <form action="mail.php" method="post" id="main_contact_form">
                        <!-- Message Input Area Start -->
                        <div class="contact_input_area">
                            <div id="success_fail_info"></div>
                            <div class="row">
                                <!-- Single Input Area Start -->
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Name *">
                                    </div>
                                </div>
                                <!-- Single Input Area Start -->
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="E-mail *" required>
                                    </div>
                                </div>
                                <!-- Single Input Area Start -->
                                <!-- <div class="col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="subject" class="form-control" id="subject" placeholder="Your Subject *" required>
                                    </div>
                                </div> -->
                                <!-- Single Input Area Start -->
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <input type="number" name="number" class="form-control" id="number" placeholder="Your Number *" required>
                                    </div>
                                </div>

                                <!-- Single Input Area Start -->
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <textarea name="message" id="message" class="form-control" cols="30" rows="10" placeholder="Your Message *" required></textarea>
                                    </div>
                                </div>
                                <!-- Single Input Area Start -->
                              
                                <div class="col-md-6 col-sm-6 col-lg-6 col-md-12 col-sm-12 col-lg-12">
                               
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
                                </div>
                       
                                <div class="col-md-6 col-sm-6 col-lg-6 col-md-12 col-sm-12 col-lg-12">
                                <button type="submit" class="form-control" class="button btn btn-default">SUBMIT</button>
                                </div>
                            </div>
                        </div>
                        <!-- Message Input Area End -->
                    </form>
                </div>
            </div>
            <!-- .end row -->
        </div>
        <!-- .end container -->
    </section>
    <!-- ==================== Message Now Area Start ==================== -->

    <!-- ==================== Map and Contact Area Start ==================== -->
    <div class="map_contact_address_area">
        <!-- Map Area Start -->
        <div class="mapouter"><div class="gmap_canvas">
            <iframe width="1680" height="285" id="gmap_canvas" src="https://maps.google.com/maps?q=rokomari%20it&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            <a href="https://www.embedgooglemap.net/blog/divi-discount-code-elegant-themes-coupon/"></a><br><style>.mapouter{position:relative;text-align:right;height:285px;width:1680px;}</style><a href="https://www.embedgooglemap.net">embedgooglemap.net</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:285px;width:1680px;}</style></div></div>
    </div>
    <!-- ==================== Map and Contact Area End ==================== -->

    <!-- ===================== Newsletter Area Start ===================== -->
    <!-- <div class="newsletter_area wow fadeInUp" data-wow-delay="0.2s">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="newsletter_text">
                        <h4>Subcribe weekly newsletter</h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="newsletter_from">
                        <form action="#">
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" placeholder="Enter Your E-mail" required>
                            </div>
                            <button type="submit" class="btn btn-default"><i class="fa fa-paper-plane"></i>Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- ===================== Newsletter Area End ===================== -->

   <!-- GOOGLE MAPS -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDk9KNSL1jTv4MY9Pza6w8DJkpI_nHyCnk" type="text/javascript"></script>
    <script type="text/javascript">
        var map;
        var latlng = new google.maps.LatLng(41.901630, 12.460245);
        var stylez = [{
            featureType: "all",
            elementType: "all",
            stylers: [{
                saturation: -100
            }]
        }];
        var mapOptions = {
            zoom: 14,
            center: latlng,
            scrollwheel: false,
            scaleControl: false,
            disableDefaultUI: true,
            mapTypeControlOptions: {
                mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'gMap']
            }
        };
        map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);
        var geocoder_map = new google.maps.Geocoder();
        var address = 'Shyamoli, Dhaka';
        geocoder_map.geocode({
            'address': address
        }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    icon: 'assets/img/core-img/22.png',
                    position: map.getCenter()
                });
            } else {
                // alert("Geocode was not successful for the following reason: " + status);
            }
        });
        var mapType = new google.maps.StyledMapType(stylez, {
            name: "Grayscale"
        });
        map.mapTypes.set('gMap', mapType);
        map.setMapTypeId('gMap');
    </script> -->