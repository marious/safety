<div class="inner-banner">
    <div class="container">
        <h1></h1>
    </div>
</div>

<section class="campaigns-section">
    <div class="container">
        <h2><?= transText($category->name, 'en') ?></h2>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="detail-page">
                        <img src="<?= site_url($category->image); ?>" alt="<?= transText($category->name, 'en') ?>" class="center-image">

                    <hr>

                    <p><?= transText($category->description, 'en'); ?></p>

                    <hr>

                    <div class="row">
                        <h3><b><?= lang('products_of_category') ?></b></h3>
                        <?php
                        $this->load->module('products');
                        $products = $this->products->Product_model->get_by(['category_id' => $category->id]);
                        ?>
                        <div class="row">

                            <?php if (is_array($products) && count($products)): ?>
                            <?php foreach ($products as $product): ?>
                            <div class="col-md-3 col-sm-6 arDir">
                                <div class="box">
                                    <div class="frame">
                                        <a href="<?= site_url('categories/product/' . transText($product->slug, 'en')) ?>">
                                            <img src="<?= site_url($product->image) ?>" alt="img">
                                        </a>
                                    </div>
                                    <h3>
                                        <a href="<?= site_url('categories/product/' . transText($product->slug, 'en')) ?>">
                                            <?= transText($product->name, 'en') ?>
                                        </a>
                                    </h3>
                                    <p>
                                       <?= shortDescrip(transText($product->description, 'en'), 20) ?>
                                    </p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>