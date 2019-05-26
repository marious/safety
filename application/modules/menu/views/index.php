<div class="row">
    <div class="col-md-12">

            <div class="box box-info">
                <div class="box-body">


                  <div class="col-md-4">
                    <fieldset style="min-height: 400px;">
                      <legend>Menu Navigation</legend>
                      <div id="list2" class="dd myadmin-dd-empty" style="min-height:350px;">
                        <ol class="dd-list">

                        <?php if (is_array($menus) && count($menus)): ?>
                        <?php foreach ($menus as $menu): ?>
                          <li data-id="<?= $menu['id'] ?>" class="dd-item dd3-item">
                            <div class="dd-handle dd3-handle"></div><div class="dd3-content"><?=$menu['menu_name']?>
                             <span class="pull-right">
                              <a href=""><i class="fa fa-edit"></i></a></span>
                            </div>
                            <?php if (is_array($menu['childs']) && count($menu['childs'])): ?>
                            <ol class="dd-list" style="">
                            <?php foreach ($menu['childs'] as $menu2): ?>
                            <li data-id="<?=$menu2['id']?>" class="dd-item dd3-item">
                            <div class="dd-handle dd3-handle"></div><div class="dd3-content"><?= $menu2['menu_name'] ?>
                            <span class="pull-right">
                              <a href=""><i class="fa fa-edit"></i></a></span>
                            </div>
                            <?php if (is_array($menu2['childs']) && count($menu2['childs'])): ?>
                            <ol class="dd-list" style="">
                            <?php foreach ($menu2['childs'] as $menu3): ?>
                            <li data-id="<?=$menu3['id']?>" class="dd-item dd3-item">
                              <div class="dd-handle dd3-handle"></div><div class="dd3-content"><?=$menu3['menu_name']?>
                              <span class="pull-right">
                                <a href=""><i class="fa fa-edit"></i></a>
                                </span>
                              </div>
                              </li>  


<?php endforeach; ?>
</ol>
<?php endif; ?>
</li>

<?php endforeach; ?>
</ol>
<?php endif; ?>

</li>
<?php endforeach; ?>
<?php endif; ?>
                        </ol>
                      </div>

                      <form action="<?= site_url('menu/save_order') ?>" method="post">
                        <input type="hidden" name="reorder" id="reorder" value="">
                        <button type="submit" class="btn btn-primary">Reorder</button>
                      </form>
                    </fieldset>

                  </div><!-- ./col-md-5 -->

                  <div class="col-md-5 col-md-push-2">

                    <fieldset style="min-height: 400px;">

                        <legend> Create / Update</legend>

                        <form action="<?= site_url('menu/save') ?>" method="post" class="form-horizontal">

                        <input type="hidden" name="menu_id" id="menu_id" value="">
							          <input type="hidden" name="parent_id" id="parent_id" value="">	


                        <div class="form-group">
                            <label for="ipt" class=" control-label col-md-4 text-right">Name / Title   </label>
                            <div class="col-md-8">
                              <input class="form-control input-sm " placeholder="" required="true" name="menu_name" type="text" value="" autocomplete="off">
                                      <div class="input-group input-group-sm" style="margin:1px 0 !important;">
                                      <input name="language_title" type="text" class="form-control" placeholder="Arabic Title" value="" autocomplete="off">
                                        <span class="input-group-addon xlick bg-default btn-sm "></span>
                                  </div>


                              </div>
                        </div>



                        <div class="form-group  " >
                          <label for="ipt" class=" control-label col-md-4 text-right"> Active  </label>
                          <div class="col-md-8 ">
                              <div class="">
                              <label><input type="radio" name="active"  value="1"  class="minimal-red">&nbsp; Active </label>
                              </div>
                              <div class="">
                              <label><input type="radio" name="active" value="0"  class="minimal-red">&nbsp; Inactive </label>
                              </div>
                          </div>
                        </div>

                            <div class="form-group  int-link" >
                                <label for="ipt" class=" control-label col-md-4 text-right"> Page </label>
                                <div class="col-md-8">
                                    <select name='module' rows='5' id='module'  style="width:100%"
                                            class='form-control input-sm'>

                                        <option value=""> -- Select Page -- </option>
                                        <?php if (is_array($pages) && count($pages)): ?>
                                        <?php foreach ($pages as $page): ?>
                                                <option value="<?=transText($page->slug, 'en')?>"><?=transText($page->name, get_current_lang())?></option>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>

                            </div>


                            <br><br>
                          <div class="form-group" > 
                          <label class="col-sm-4 text-right">&nbsp;</label>
                          <div class="col-sm-8">	
                            <button type="submit" class="btn btn-primary ">  Submit  </button>
                          
                          </div>	  
                      
                          </div> 

                        </form>

                    </fieldset>
                  
                  </div><!-- ./col-md-7 -->



                </div>
            </div>


    </div>
</div>
