<div class="inner-banner">
    <div class="container">
        <h1></h1>
    </div>
</div>

<section class="blog">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				
				<!-- Blog Classic Start -->
				<div class="blog-grid">
					<div class="row">
						<div class="col-md-12">
            

              <?php if (is_array($news) && count($news)): ?>
              <?php foreach ($news as $row): ?>
								<div class="post-item">
									<div class="image-holder">
										<img class="img-responsive" src="<?= site_url($row->image) ?>" alt="<?= transText($row->name, 'en') ?>">
									</div>
									<div class="text">
										<h3><a href="<?= site_url('news/item/' .transText($row->slug, 'en')) ?>"><?= transText($row->name, 'en') ?></a></h3>
										<ul class="status">
											<li><i class="fa fa-calendar"></i><?= lang('date') ?> <?= date('n, Y', strtotime($row->created_at)) ?></li>
										</ul>
                    <p>

                      <?= shortDescrip(transText($row->description, 'en'), 20) ?>

                    </p>
										<p class="button">
											<a href="<?= site_url('news/item/' .transText($row->slug, 'en')) ?>"><?= lang('read_more') ?></a>
										</p>
									</div>
                </div>
<?php endforeach; ?>
<?php endif; ?>
							
							 
		
							
						</div>

						<div class="col-md-12">
              <?=$pagination;?>
            </div>

					</div>
				</div>
				<!-- Blog Classic End -->

			</div>
			<div class="col-md-3">
				
				<!-- Sidebar Container Start -->
<div class="sidebar">

	<div class="widget">
				<h4>Categories</h4>
		<ul>
							<li><a href="http://localhost/consultine/category/commercial">Commercial</a></li>
								<li><a href="http://localhost/consultine/category/economy">Economy</a></li>
								<li><a href="http://localhost/consultine/category/residential">Residential</a></li>
								<li><a href="http://localhost/consultine/category/tools-and-equipment">Tools and Equipment</a></li>
						</ul>
	</div>

</div>
<!-- Sidebar Container End -->			
			</div>

			


		</div>
	</div>
</section>