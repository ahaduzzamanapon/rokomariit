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
                    <li><a href="javascipt:void()"><?=$meta_title?></a></li>
                </ul>
            </div>
        </section>
        <!-- /BREADCRUMBS -->

         <section class="page-section" style="min-height: 350px;">
            <div class="container">

                <div class="row">
                    <div class="col-md-12 wow fadeInLeft" data-wow-offset="200" data-wow-delay="200ms">
                        <!-- FAQ -->
                        <div class="panel-group accordion" id="accordion" role="tablist" aria-multiselectable="true">
                            <?php 
                            $i=0;

                            foreach ($events_data as $info) {
                                $i=$i+1;                 
                                ?>
                                <!-- faq1 -->
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading1">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#<?=$i?>" aria-expanded="true" aria-controls="<?=$info->slug?>">
                                                <span class="dot"></span> <?=$info->title?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="<?=$i?>" class="panel-collapse collapse <?php if($i==1){ echo 'in';} ?>" role="tabpanel" aria-labelledby="heading1">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-8 wow fadeInLeft" data-wow-offset="200" data-wow-delay="100ms">
                                                    <h2 class="section-title text-left">
                                                        <!-- <span><?=$info->title?></span> -->
                                                    </h2>
                                                    <p><?=$info->details;?> </p>
                                                   
                                                </div>
                                                <div class="col-md-4 wow fadeInRight" data-wow-offset="200" data-wow-delay="300ms">
                                                    <?php 
                                                         $img_path = base_url().'news_img/';
                                                         if($info->image_file != NULL){
                                                            $src= $img_path.$info->image_file;
                                                            echo "<div class='img-box'><img src='$src' alt='$info->title' class='img-responsive'></div>";
                                                         }
                                                    ?>
                                                  
                                                </div>
                                            </div>   
                                        </div>
                                    </div>
                                </div>
                                <!-- /faq1 -->
                                
                            <?php } ?>
                        </div>
                        <!-- /FAQ -->
                    </div>
                </div>

            </div>
        </section>

    </div>
    <!-- /CONTENT AREA -->
