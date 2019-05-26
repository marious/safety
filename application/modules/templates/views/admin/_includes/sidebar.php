<section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

      <?php if (in_array('show_users', $logged_in_user_permissions)): ?>
          <li class="treeview <?= is_sidebar_menu_active('users'); ?>">
              <a href="#"><i class="fa fa-user"></i> <span><?= lang('users') ?></span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
            <ul class="treeview-menu">
                <li class="<?= is_tree_sidebar_menu_active('users', 'all'); ?>"><a href="<?= site_url('users/all'); ?>"><i class="fa fa-circle-o"></i> <?= lang('all_users'); ?></a></li>
<?php if (in_array('add_users', $logged_in_user_permissions)): ?>
                <li class="<?= is_tree_sidebar_menu_active('users', 'add'); ?>"><a href="<?= site_url('users/add'); ?>"><i class="fa fa-circle-o"></i> <?= lang('add_new'); ?></a></li>
<?php endif; ?>
            </ul>
          </li>
<?php endif; ?>



          <li class="treeview <?= is_sidebar_menu_active('roles'); ?>">
              <a href="#"><i class="fa fa-key"></i> <span><?= lang('roles_and_permissions') ?></span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                  <li class="<?= is_tree_sidebar_menu_active('roles', 'all'); ?>"><a href="<?= site_url('roles/all'); ?>"><i class="fa fa-circle-o"></i> <?= lang('all_roles'); ?></a></li>
                  <li class="<?= is_tree_sidebar_menu_active('roles', 'add'); ?>"><a href="<?= site_url('roles/add'); ?>"><i class="fa fa-circle-o"></i> <?= lang('add_new'); ?></a></li>
              </ul>
          </li>


          <?php if (in_array('show_pages', $logged_in_user_permissions)): ?>
              <li class="treeview <?= is_sidebar_menu_active('pages') ?>">
                  <a href="#">
                      <i class="fa fa-list-alt"></i> <span><?= lang('pages'); ?></span>
                      <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                  </a>
                  <ul class="treeview-menu">
                      <li class="<?= is_tree_sidebar_menu_active('pages', 'all'); ?>"><a href="<?= site_url('pages/all'); ?>"><i class="fa fa-circle-o"></i> <?= lang('all_pages'); ?></a></li>
                      <?php if(in_array('add_pages', $logged_in_user_permissions)): ?>
                          <li class="<?= is_tree_sidebar_menu_active('pages', 'add'); ?>"><a href="<?= site_url('pages/add'); ?>"><i class="fa fa-circle-o"></i> <?= lang('add_new'); ?></a></li>
                      <?php endif; ?>
                  </ul>
              </li>
          <?php endif; ?>

          <!-- <li class="header">MAIN NAVIGATION</li> -->
        <?php if (in_array('show_services', $logged_in_user_permissions)): ?>
        <li class="treeview <?= is_sidebar_menu_active('services'); ?>">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span><?= lang('services'); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?= is_tree_sidebar_menu_active('services', 'all'); ?>"><a href="<?= site_url('services/all'); ?>"><i class="fa fa-circle-o"></i> <?= lang('all_services'); ?></a></li>
            <?php if(in_array('add_services', $logged_in_user_permissions)): ?>
            <li class="<?= is_tree_sidebar_menu_active('services', 'add'); ?>"><a href="<?= site_url('services/add'); ?>"><i class="fa fa-circle-o"></i> <?= lang('add_new'); ?></a></li>
<?php endif; ?>
          </ul>
        </li>
<?php endif; ?>


         

<?php if (in_array('show_categories', $logged_in_user_permissions)): ?>
      <li class="treeview <?= is_sidebar_menu_active('categories') ?>">
        <a href="#">
            <i class="fa fa-server"></i> <span><?= lang('categories'); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="<?= is_tree_sidebar_menu_active('categories', 'all'); ?>"><a href="<?= site_url('categories/all'); ?>"><i class="fa fa-circle-o"></i> <?= lang('all_categories'); ?></a></li>
          <?php if(in_array('add_categories', $logged_in_user_permissions)): ?>
          <li class="<?= is_tree_sidebar_menu_active('categories', 'add'); ?>"><a href="<?= site_url('categories/add'); ?>"><i class="fa fa-circle-o"></i> <?= lang('add_new'); ?></a></li>
<?php endif; ?>
          </ul>
      </li>
<?php endif; ?>



          <?php if (in_array('show_products', $logged_in_user_permissions)): ?>
              <li class="treeview <?= is_sidebar_menu_active('products'); ?>">
                  <a href="#">
                      <i class="fa fa-cubes"></i> <span><?= lang('products'); ?></span>
                      <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                  </a>
                  <ul class="treeview-menu">
                      <li class="<?= is_tree_sidebar_menu_active('products', 'all'); ?>"><a href="<?= site_url('products/all'); ?>"><i class="fa fa-circle-o"></i> <?= lang('all_products'); ?></a></li>
                      <?php if(in_array('add_products', $logged_in_user_permissions)): ?>
                          <li class="<?= is_tree_sidebar_menu_active('products', 'add'); ?>"><a href="<?= site_url('products/add'); ?>"><i class="fa fa-circle-o"></i> <?= lang('add_new'); ?></a></li>
                      <?php endif; ?>
                  </ul>
              </li>
          <?php endif; ?>



          <?php if (in_array('show_news', $logged_in_user_permissions)): ?>
              <li class="treeview <?= is_sidebar_menu_active('news'); ?>">
                  <a href="#">
                      <i class="fa fa-newspaper-o"></i> <span><?= lang('news'); ?></span>
                      <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                  </a>
                  <ul class="treeview-menu">
                      <li class="<?= is_tree_sidebar_menu_active('news', 'all'); ?>"><a href="<?= site_url('news/all'); ?>"><i class="fa fa-circle-o"></i> <?= lang('all_news'); ?></a></li>
                      <?php if(in_array('add_news', $logged_in_user_permissions)): ?>
                          <li class="<?= is_tree_sidebar_menu_active('news', 'add'); ?>"><a href="<?= site_url('news/add'); ?>"><i class="fa fa-circle-o"></i> <?= lang('add_new'); ?></a></li>
                      <?php endif; ?>
                  </ul>
              </li>
          <?php endif; ?>



          <?php if (in_array('show_clients', $logged_in_user_permissions)): ?>
              <li class="treeview <?= is_sidebar_menu_active('clients'); ?>">
                  <a href="#">
                      <i class="fa fa-users"></i> <span><?= lang('clients'); ?></span>
                      <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                  </a>
                  <ul class="treeview-menu">
                      <li class="<?= is_tree_sidebar_menu_active('clients', 'all'); ?>"><a href="<?= site_url('clients/all'); ?>"><i class="fa fa-circle-o"></i> <?= lang('all_clients'); ?></a></li>
                      <?php if(in_array('add_clients', $logged_in_user_permissions)): ?>
                          <li class="<?= is_tree_sidebar_menu_active('clients', 'add'); ?>"><a href="<?= site_url('clients/add'); ?>"><i class="fa fa-circle-o"></i> <?= lang('add_new'); ?></a></li>
                      <?php endif; ?>
                  </ul>
              </li>
          <?php endif; ?>





          <li class="<?= is_sidebar_menu_active('settings'); ?>"><a href="<?= site_url('settings') ?>"><i class="fa fa-gear"></i> <span><?= lang('settings') ?></span></a></li>
        
      </ul>
    </section>