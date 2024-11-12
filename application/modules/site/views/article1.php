<style type="text/css">
.article img{
        width: 30%;
        float: left;
        padding-right: 25px;
        /*padding-bottom: 25px;*/
    }
    .article{
        float: right;
    }
</style>
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
        <section class="page-section testimonials">
            <div class="container">
                    <div class="row">
                        
                        <!-- <div class="col-md-4 wow fadeInRight" data-wow-offset="200" data-wow-delay="300ms">
                            <?php 
                                 $img_path = base_url().'article_img/';
                                 if($info->image_file != NULL){
                                    $src= $img_path.$info->image_file;
                                    echo "<div class='img-box'><img src='$src' alt='$info->name' class='img-responsive'></div>";
                                 }
                            ?>
                          
                        </div>
                        <div class="col-md-8 wow fadeInLeft" data-wow-offset="200" data-wow-delay="100ms">
                            <h2 class="section-title text-left">
                                <span><?=$info->name?></span>
                            </h2>
                            <p><?=$info->description;?> </p>
                           
                        </div> -->


                        <div class="article col-md-12">

                            <?php 
                                 $img_path = base_url().'article_img/';
                                 if($info->image_file != NULL){
                                    $src= $img_path.$info->image_file;
                                    echo "<div class='img-box'><img src='$src' alt='$info->name' class='img-responsive'></div>";
                                 }
                            ?>

                            <h2 class="section-title text-left">
                                <span><?=$info->name?></span>
                            </h2>
                            <p><?=$info->description;?> </p>

                        </div>

                    </div>   
            </div>
        </section>
        <!-- /PAGE -->

    </div>
    <!-- /CONTENT AREA -->