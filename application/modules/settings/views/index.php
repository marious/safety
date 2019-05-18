<div class="row">
  <div class="col-md-12">
    <div class="box- box-primary">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
              <li class="<?php if (!isset($_SESSION['active_tab'])) echo 'active'; ?>"><a href="#tab_1" data-toggle="tab" aria-expanded="false"><?= lang('global_settings') ?></a></li>
              <li class="<?= active_tab('logo') ?>"><a href="#tab_2" data-toggle="tab" aria-expanded="false"><?= lang('logo') ?></a></li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane <?php if (!isset($_SESSION['active_tab'])) echo 'active'; ?>" id="tab_1">
              <?php $this->load->view('_includes/global_settings'); ?>
            </div><!-- ./tab-bane -->
              <div class="tab-pane <?= active_tab('logo') ?>" id="tab_2">
                    <?php $this->load->view('_includes/logo'); ?>
              </div>
          </div><!-- ./tab-content -->

        </div><!-- ./nav-tabs-custom -->
    </div>
  </div>
</div>
<?php unset($_SESSION['active_tab']); ?>