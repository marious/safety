<?php require('_includes/head.php'); ?>

<div id="wrapper">
  <?php require('_includes/header.php'); ?>

</div>

<div class="clearfix"></div>

<!-- <div class="banner">
  <div class="" id="home-banner"> -->
    <?php
    $sliders = Modules::run('slider/get_all');
    ?>
    <?php if (is_array($sliders) && count($sliders)): ?>
    <section id="mainSlider">
    <div id="owl-main" class="owl-carousel height-md owl-inner-nav owl-ui-lg">


    <?php foreach ($sliders as $slider): ?>
    
      <?php
      $class = '';
      $pos = '';
      if ($slider->position) {
        $pos = strtolower($slider->position);
        switch ($slider->position) {
          case 'Left':
            $class = 'fadeInLeft-1';
            break;
          case 'Right':
            $class = 'fadeInRight-1';
          break;
          case 'Center':
            $class = 'fadeInDown-1';
        }
      }
      ?>

					
        <div class="item" style="background-image: url(<?= site_url($slider->image) ?>);">
          <div class="container">
            <div class="caption vertical-center text-<?= $pos; ?>">
              
              <h1 class="<?=$class?> light-color"> <?= transText($slider->heading, 'en') ?> </h1>
              <p class="<?=$class . '-2'?> light-color"><?= transText($slider->content, 'en') ?></p>
              <div class="<?= $class . '-3'; ?>">
                <a href="<?= $slider->button_url; ?>" class="btn btn-large"><?= transText($slider->button_text, 'en') ?></a>
              </div><!-- /.fadeIn -->
              
            </div><!-- /.caption -->
          </div><!-- /.container -->
        </div><!-- /.item -->


<?php endforeach; ?>
  </div>	

</section>

<?php endif; ?>


<!-- Service Start -->
<section class="service-v1">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading wow fadeInUp">
					<h2>Our Services</h2>
					<p>Check Out All Our Services</p>
				</div>
			</div>
		</div>
		<div class="row">
			<?php
			$services = Modules::run('services/get_all');
			if (is_array($services) && count($services)) {							
			foreach ($services as $service) {
				?>
				<div class="col-sm-6 col-md-4 ser-item wow fadeInUp">
					<div class="item">
						<div class="photo" style="background-image:url(<?php echo site_url($service->image); ?>);">
						</div>
						<div class="text">
							<h3><a href="<?= site_url('services/' . transText($service->slug, 'en')); ?>"><?php echo transText($service->name, 'en'); ?></a></h3>
							<p>
								<?php echo shortDescrip(transText($service->description, 'en'), 20) ?>
							</p>
						</div>
					</div>
				</div>
				<?php
			}	
			}
			?>
		</div>
	</div>
</section>
<!-- Service End -->

<!-- categories -->
<section class="categories-v1">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading wow fadeInUp">
						<h2>Our Categories</h2>
						<p>Check Out Our Categories</p>
					</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="categories-carousel">
					<?php
					$categoreis = Modules::run('categories/get_all');
					?>
					<?php if (is_array($categoreis) && count($categoreis)): ?>
					<?php foreach ($categoreis as $category): ?>
						<div class="item wow fadeInUp">
								<div class="thumb">
									<div class="photo" style="background-image:url(<?php echo site_url($category->image) ?>);"></div>
									<div class="overlay"></div>
								</div>
								<div class="text">
								<h3><a href="<?php echo site_url('categories/' . transText($category->slug, 'en')) ?>"><?php echo transText($category->name, 'en'); ?></a></h3>
								<p><?php echo shortDescrip(transText($category->description, 'en'), 10); ?></p>
								</div>
						</div>
					<?php endforeach; ?>
					<?php endif; ?>
				</div><!-- categories-carousel -->
			</div>
		
		</div>

	</div>
</section>
<!-- Categories End -->

<!-- News Section -->

<section class="news-v1">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading wow fadeInUp">
					<h2>Latest News</h2>
					<p>See All Our Updated and Latest News</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				
				<!-- News Carousel Start -->
				<div class="news-carousel">

					<?php
					$i=0;
					$news = Modules::run('news/get_latest');
					if (is_array($news) && count($news))					
					foreach ($news as $row) {
						$i++;
						if($i>20) {break;}
						?>
						<div class="item wow fadeInUp">
							<div class="thumb">
								<div class="photo" style="background-image:url(<?php echo site_url($row->image) ?>);"></div>
							</div>
							<div class="text">
								<h3><a href="<?php echo BASE_URL.URL_NEWS.$row['news_slug']; ?>"><?php echo $row['news_title']; ?></a></h3>
								<?php echo substr($row['news_content'],0,120).' ...'; ?>
							</div>
						</div>
						<?php
					}
					}
					?>
					
				</div>
				<!-- News Carousel End -->

			</div>
		</div>
	</div>
</section>

<!-- END News Section -->

<?php require('_includes/footer.php'); ?>