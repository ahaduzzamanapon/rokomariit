 <!-- FOOTER -->

 
    <footer class="footer">
        <div class="footer-meta">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="copyright">© Copyright <?=date('Y')?> All Rights Reserved by <b>Rokomari IT Ltd.</b> |<a href="<?=base_url()?>terms" target="_blank"> Terms & Conditions</a> |<a href="<?=base_url()?>privacy-policy" target="_blank"> Privacy Policy</a>
                        <!-- <a href=""> <i class="fa-brands fa-twitter"></i></a> -->
                    
                        <ul class="social-icon-footer pull-right hidden-xs">
                        <?php foreach ($social as $item): ?>
                             <li><a href="<?=$item->url?>" ><i class="fa <?=$item->icon?>"></i></a></li>
                        <?php endforeach ?>  
                    </ul>
                        
                    </div>
                            <!-- <p class="btn-row text-center">
                            <a href="#" class="btn btn-theme ripple-effect btn-icon-left facebook wow fadeInDown" data-wow-offset="20" data-wow-delay="100ms"><i class="fa fa-facebook"></i>FACEBOOK</a>
                            <a href="#" class="btn btn-theme btn-icon-left ripple-effect twitter wow fadeInDown" data-wow-offset="20" data-wow-delay="200ms"><i class="fa fa-twitter"></i>TWITTER</a>
                            <a href="#" class="btn btn-theme btn-icon-left ripple-effect pinterest wow fadeInDown" data-wow-offset="20" data-wow-delay="300ms"><i class="fa fa-pinterest"></i>PINTEREST</a>
                            <a href="#" class="btn btn-theme btn-icon-left ripple-effect google wow fadeInDown" data-wow-offset="20" data-wow-delay="400ms"><i class="fa fa-google"></i>GOOGLE</a>
                        </p> -->
                  
                  
                      
                    </div>

                      

                </div>
            </div>
        </div>
    </footer>
    <!-- /FOOTER -->

    <!-- <div id="to-top" class="to-top"><i class="fa fa-angle-up"></i></div> -->
    
</div>
<!-- /WRAPPER -->


<!-- JS Global -->
<script src="<?=base_url();?>fwedget/assets/plugins/jquery/jquery-1.11.1.min.js"></script>
<script src="<?=base_url();?>fwedget/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>fwedget/assets/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
<script src="<?=base_url();?>fwedget/assets/plugins/superfish/js/superfish.min.js"></script>
<script src="<?=base_url();?>fwedget/assets/plugins/prettyphoto/js/jquery.prettyPhoto.js"></script>
<script src="<?=base_url();?>fwedget/assets/plugins/owl-carousel2/owl.carousel.min.js"></script>
<script src="<?=base_url();?>fwedget/assets/plugins/jquery.sticky.min.js"></script>
<script src="<?=base_url();?>fwedget/assets/plugins/jquery.easing.min.js"></script>
<script src="<?=base_url();?>fwedget/assets/plugins/jquery.smoothscroll.min.js"></script>
<!--<script src="assets/plugins/smooth-scrollbar.min.js"></script>-->
<!--<script src="assets/plugins/wow/wow.min.js"></script>-->
<script>
    // WOW - animated content
    //new WOW().init();
</script>
<script src="<?=base_url();?>fwedget/assets/plugins/swiper/js/swiper.jquery.min.js"></script>
<script src="<?=base_url();?>fwedget/assets/plugins/datetimepicker/js/moment-with-locales.min.js"></script>
<script src="<?=base_url();?>fwedget/assets/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

<!-- JS Page Level -->
<script src="<?=base_url();?>fwedget/assets/js/theme-ajax-mail.js"></script>
<script src="<?=base_url();?>fwedget/assets/js/theme.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>

<script>
function loadservice() {
 var videoservice = document.getElementsByTagName('video')[0];
 var sourceservice = videoservice.getElementsByTagName('source')[0];
 sourceservice.src = 'https://www.youtube.com/watch?v=b37nXCRrvW0';
 videoservice.load();
}
</script>

<script>

// $(document).ready(function(){
  
    
//         // jQuery.get('<?php print base_url().'index'; ?>', function(data) {
//         // jQuery('#show_captcha').html(data);
 
//         // var id = $(this).attr('id');
//         $.ajax({
//             url: "captcha/index",
//             succes: function (data) {
//                 jQuery('#show_captcha').html(data);
//              }
//         });
//     });
});
//     $(document).ready(function(){	
// 	$('#show_captcha').load('captcha.php');
// });
</script>
<script>
$(document).ready(function() {
    $('.media-link').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,

        fixedContentPos: false
    });
});
</script>

</body>

</html>