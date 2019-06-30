<header id="header">
  <section class="header-section-1">
    <div class="container">
      <div class="left-box">
        <span class="title">
          <?php if (get_current_lang() == 'ar'): ?>
          <a href=""> AR
            <img src="<?= site_url('assets/images/country-flag-Egypt.png') ?>" alt="ar-lang">
          </a>
<?php else: ?>
  <a href="">EN
  <img src="<?= site_url('assets/images/united-kingdom-flag-1-.png') ?>" alt="en-lang">
  </a>
<?php endif; ?>
        </span>
      </div><!-- ./left-box -->
      <div class="header-social">
        <span class="title"><?= lang('be_social'); ?></span>
        <ul>
          <li><a href="<?= setting('facebook'); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
          <li><a href="<?= setting('twitter'); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
          <li><a href="<?= setting('youtube'); ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
          <li><a href="<?= setting('linkedin'); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
        </ul>
      </div>
    </div><!-- ./container -->
  </section>

  <!-- logo row -->
  <section class="logo-row">
    <div class="container">
      <span class="logo">
        <a href=""></a>
        <img src="<?= site_url(setting('logo')); ?>" alt="Logo Image">
      </span>
      <div class="dial-box">
        <span><i class="fa fa-phone"></i> <?=lang('call_us')?>:</span>
        <span class="phone-number"><?= setting('contact_phone') ?> </span>
      </div>
      <div class="email-box">
        <span><?=lang('email_us');?>: </span>
        <a href="mailto:<?=setting('contact_email')?>"><?=setting('contact_email')?></a>
      </div>
    </div><!-- ./container -->
  </section>

  <!-- Navigation -->
  <div class="clearfix"></div>

    <?php
    $menus = Modules::run('menu/get_menu');
    ?>

  <section class="navigation-row">
    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right" id="nav">
            <li class="active">
              <a href="<?=site_url()?>">Home</a>
            </li>
            <?php if (is_array($menus) && count($menus)): ?>
            <?php foreach ($menus as $menu): ?>
            <li>
              <a href="<?= site_url('page/' . Modules::run('pages/get_page_slug', $menu['page'])) ?>"><?= $menu['menu_name'] ?>
              <?php if (is_array($menu['childs']) && count($menu['childs'])): ?>
              <i class="fa fa-caret-down" aria-hidden="true"></i>
<?php endif; ?>
              </a>
              <?php if (is_array($menu['childs']) && count($menu['childs'])): ?>
              <ul>
              <?php foreach ($menu['childs'] as $menu2): ?>
              <li><a href="<?= site_url('page/'.Modules::run('pages/get_page_slug', $menu2['page'])) ?>"><?= $menu2['menu_name'] ?>
                <?php if (is_array($menu2['childs']) && count($menu2['childs'])): ?>
              <i class="fa fa-caret-right" aria-hidden="true"></i>
<?php endif; ?>
                </a>
                <?php if (is_array($menu2['childs']) && count($menu2['childs'])): ?>
                <ul>
                  <?php foreach ($menu2['childs'] as $menu3): ?>
                  <li><a href="<?= site_url('page/'.Modules::run('pages/get_page_slug', $menu['page'])) ?>"><?= $menu3['menu_name'] ?></a></li>
<?php endforeach; ?>
                </ul>
<?php endif; ?>
              </li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
            </li>
<?php endforeach; ?>
<?php endif; ?>


            
           
            
         
       
          </ul>
        </div>
      </div>
    </nav>
  </section>

</header>
