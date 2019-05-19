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
        <!-- <li class="header">MAIN NAVIGATION</li> -->
        <li class="treeview <?= is_sidebar_menu_active('services'); ?>">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span><?= lang('services'); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?= is_tree_sidebar_menu_active('services', 'all'); ?>"><a href="<?= site_url('services/all'); ?>"><i class="fa fa-circle-o"></i> <?= lang('all_services'); ?></a></li>
            <li class="<?= is_tree_sidebar_menu_active('services', 'add'); ?>"><a href="<?= site_url('services/add'); ?>"><i class="fa fa-circle-o"></i> <?= lang('add_new'); ?></a></li>
          </ul>
        </li>
     
        <li class="<?= is_sidebar_menu_active('settings'); ?>"><a href="<?= site_url('settings') ?>"><i class="fa fa-gear"></i> <span>Settings</span></a></li>
        
      </ul>
    </section>