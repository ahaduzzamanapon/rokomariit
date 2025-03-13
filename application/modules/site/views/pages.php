<style>
	.limited-lines {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        /* Limits text to 2 lines */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        /* Adds "..." if text overflows */
        max-height: 3em;
        /* Adjust this based on your font size */
        line-height: 1.5em;
        /* Ensures proper line spacing */
        white-space: normal;
        word-break: break-word;
    }
	.featured-box {
		min-height: auto !important;
		/* padding: 15px !important; */
	}

	.featured-box .box-content {
		min-height: auto !important;
		justify-content: center !important;
	}

	@media screen and (min-width: 360px) and (max-width: 430px) {
		.featured-box {
			min-height: 120px !important;
			/* padding: 15px !important; */
		}

		.featured-box .box-content {
			min-height: 120px !important;
		}
	}
</style>

<div role="main" class="main">
	<section class="page-top">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<h1><?= $meta_title ?></h1>
				</div>
				<div class="col-md-5 text-right">
					<ul class="breadcrumb">
						<li><a href="<?= base_url() ?>">Home</a></li>
						<li class="active"><?= $meta_title ?></li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<div class="container">
		<hr class="tall_slim">

		<div class="row">
			<div class="col-md-12">
				<h2>All <strong>Pages</strong></h2>
				<div class="row featured-boxes">
					<?php foreach ($pages as $item) { ?>
						<div class="col-md-3 col-sm-6">
							<div class="featured-box featured-box-secundary">
								<div class="box-content">
									<a href="<?= base_url() . 'pages/' . $item->page_link; ?>">
										<?php
										// $img_path = base_url() . 'product_img/';
										if ($item->imagelink != NULL) {
											$src = $item->imagelink;
											echo "<img src='$src' alt='' class='img-circle' style='width: 100px; height: 100px;'>";
										}
										?>
										<div class="title">
											<h4 class="limited-lines"><?= $item->title ?></h4>
										</div>
									</a>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>

			</div>
		</div>

		<hr class="tall">
	</div>
</div>