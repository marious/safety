<section class="blog">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="post-item">
            <div class="image-holder image-holder-single">
									<img class="img-responsive news-item-img" src="<?= site_url($news->image) ?>" alt="<?= transText($news->name, 'en') ?>">
              </div>
              <div class="text text-single">
									<h3><?= transText($news->name, 'en') ?></h3>
									<ul class="status">
										<li><i class="fa fa-calendar"></i><?= lang('date') ?> <?= date('n, Y', strtotime($news->created_at)) ?></li>
									</ul>
									<p>
                    <?= transText($news->description, 'en') ?>
                  </p>
								</div>
        </div>
      </div>
    </div>
  </div>
</section>