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
</header>

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