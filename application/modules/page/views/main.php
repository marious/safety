<div class="inner-banner">
    <div class="container">
        <h1><?= transText($page->name, 'en') ?></h1>
    </div>
</div>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><?= transText($page->name, 'en') ?></h2>
                <?= transText($page->content, 'en');?>
            </div>
        </div>
    </div>
</section>
