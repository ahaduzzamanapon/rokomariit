     <!-- CONTENT AREA -->
    <div class="content-area">

        <!-- BREADCRUMBS -->
        <!-- <section class="page-section breadcrumbs text-center" style="background-image:url(<?=base_url()?>fwedget/assets/img/slide-1.jpg);"> -->
        <section class="page-section breadcrumbs text-center" style="background: #006aa2;">
            <div class="container">
                <div class="page-header">
                    <h1><?=$meta_title?></h1>
                </div>
                <ul class="breadcrumb">
                    <li><a href="<?=base_url()?>">Home</a></li>
                    <li><a href="javascript:void()"><?=$meta_title?></a></li>
                </ul>
            </div>
        </section>
        <!-- /BREADCRUMBS -->

        <!-- PAGE -->
        <section class="page-section color">
            <div class="container">

                <div class="row">

                    <div class="col-md-4">
                        <div class="contact-info">

                            <h2 class="block-title"><span>Contact Us</span></h2>

                            <?php $i=1; foreach ($contact as $item): $i++;?>
                                <div class="media-list">
                                    <div class="media">
                                        <div class="media-body">
                                            <?=$item->title?>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <i class="pull-left fa fa-home"></i>
                                        <div class="media-body">
                                            <strong>Address:</strong><br>
                                            <? //=$item->address?>  Raisa & Shikder Tower, 3/8, North Pirerbag, Dhaka-1207.
                                        </div>
                                    </div>
                                    <div class="media">
                                        <i class="pull-left fa fa-phone"></i>
                                        <div class="media-body">
                                            <strong>Phone:</strong><br>
                                            <? //=$item->phone?>  +8801775-015791, +8801913-036591
                                        </div>
                                    </div>
                                    <div class="media">
                                        <i class="pull-left fa fa-envelope-o"></i>
                                        <div class="media-body">
                                            <strong>Email:</strong><br>
                                            <?=$item->email?>
                                        </div>
                                    </div>
                                    
                                </div>
                            <?php endforeach ?>

                        </div>
                    </div>

                    <div class="col-md-8 text-left">

                        <h2 class="block-title"><span>Contact Form</span></h2>

                        <!-- Contact form -->
                        <form  action="<?=base_url().'site/sendemail'?>" method="post">

                            <div class="outer required">
                                <div class="form-group af-inner">
                                    <label class="sr-only" for="name">Name</label>
                                    <input
                                            type="text" name="name" id="name" placeholder="Name" value="" size="30"
                                            data-toggle="tooltip" title="Name is required"
                                            class="form-control placeholder" required/>
                                </div>
                            </div>

                            <div class="outer required">
                                <div class="form-group af-inner">
                                    <label class="sr-only" for="email">Email</label>
                                    <input
                                            type="text" name="email" id="email" placeholder="Email" value="" size="30"
                                            data-toggle="tooltip" title="Email is required"
                                            class="form-control placeholder" required/>
                                </div>
                            </div>

                            <div class="outer required">
                                <div class="form-group af-inner">
                                    <label class="sr-only" for="subject">Subject</label>
                                    <input
                                            type="text" name="subject" id="subject" placeholder="Subject" value="" size="30"
                                            data-toggle="tooltip" title="Subject is required"
                                            class="form-control placeholder" required/>
                                </div>
                            </div>

                            <div class="form-group af-inner">
                                <label class="sr-only" for="input-message">Message</label>
                                <textarea
                                        name="message" id="input-message" placeholder="Message" rows="4" cols="50"
                                        data-toggle="tooltip" title="Message is required"
                                        class="form-control placeholder" required></textarea>
                            </div>

                            <div class="outer required">
                                <div class="form-group af-inner">
                                    <input type="submit" name="submit" class="form-button form-button-submit btn btn-theme btn-theme-dark" id="submit_btn" value="Send message" />
                                </div>
                            </div>

                        </form>
                        <!-- /Contact form -->

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