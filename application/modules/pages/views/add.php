<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" action="<?= site_url('pages/add/'.$id); ?>" method="post" enctype="multipart/form-data">
            <div class="box box-info">
                <div class="box-body">
                    <!-- EN service name -->
                    <div class="form-group">
                        <label for="en_name" class="col-sm-2 control-label"><?= lang('en_page_name') ?> <span class="error">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" id="en_name" autocomplete="off" class="form-control" name="en_name"
                                   value="<?php echo set_value('en_name', transText($page->name, 'en')) ?>">
                            <?php echo form_error('en_name', '<div class="error">', '</div>'); ?>
                        </div>
                    </div>

                    <!-- AR service name -->
                    <div class="form-group">
                        <label for="ar_name" class="col-sm-2 control-label"><?= lang('ar_page_name') ?> <span class="error">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" id="ar_name" autocomplete="off" class="form-control" name="ar_name"
                                   value="<?php echo set_value('ar_name', transText($page->name, 'ar')); ?>">
                            <?php echo form_error('ar_name', '<div class="error">', '</div>'); ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label"><?= lang('page_layout') ?> </label>
                        <div class="col-sm-2">
                            <select class="form-control select2 select2-hidden-accessible" name="page_layout" style="width:300px;" onchange="showContentInputArea(this)" tabindex="-1" aria-hidden="true">
                                <option value="Full Width Page Layout">Full Width Page Layout</option>
                                <option value="FAQ Page Layout">FAQ Page Layout</option>
                                <option value="Team Member Page Layout">Team Member Page Layout</option>
                                <option value="Photo Gallery Page Layout">Photo Gallery Page Layout</option>
                                <option value="Video Gallery Page Layout">Video Gallery Page Layout</option>
                                <option value="Blog Page Layout">Blog Page Layout</option>
                                <option value="Contact Us Page Layout">Contact Us Page Layout</option>
                            </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 300px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-page_layout-is-container"><span class="select2-selection__rendered" id="select2-page_layout-is-container" title="Full Width Page Layout">Full Width Page Layout</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        </div>
                    </div>

                    <!-- en content -->
                    <div class="form-group">
                        <label for="en_content" class="col-sm-2 control-label"><?= lang('en_content') ?> <span class="error">*</span></label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="en_content" id="editor1"><?php echo set_value('en_content', transText($page->content, 'en')); ?></textarea>
                            <?php echo form_error('en_content', '<div class="error">', '</div>'); ?>
                        </div>
                    </div>

                    <!-- ar content -->
                    <div class="form-group">
                        <label for="ar_content" class="col-sm-2 control-label"><?= lang('ar_content') ?> <span class="error">*</span></label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="ar_content" id="editor2"><?php echo set_value('ar_content', transText($page->content, 'ar')); ?></textarea>
                            <?php echo form_error('ar_content', '<div class="error">', '</div>'); ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Active? </label>
                        <div class="col-sm-6">
                            <label class="radio-inline">
                                <input type="radio" name="status" value="1" checked="">Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="status" value="0">No
                            </label>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label"><?= lang('banner_image') ?> <span>*</span></label>
                        <div class="col-sm-9" style="padding-top:5px">
                            <input type="file" name="banner">(Only jpg, jpeg, gif and png are allowed)
                        </div>
                    </div>
                    <h3 class="seo-info"><?= lang('seo_info'); ?></h3>

                    <!-- meta-title -->
                    <div class="form-group">
                        <label for="meta_title" class="col-sm-2 control-label"><?= lang('meta_title'); ?> </label>
                        <div class="col-sm-9">
                            <input type="text" id="meta_title" autocomplete="off" class="form-control" name="meta_title"
                                   value="<?php echo set_value('meta_title', $page->meta_title); ?>">
                        </div>
                    </div>

                    <!-- meta-keywords -->
                    <div class="form-group">
                        <label for="meta_keyword" class="col-sm-2 control-label"><?= lang('meta_keywords') ?> </label>
                        <div class="col-sm-9">
                            <input type="text" id="meta_keyword" autocomplete="off" class="form-control" name="meta_keywords"
                                   value="<?php echo set_value('meta_keyword', $page->meta_keywords); ?>">
                        </div>
                    </div>

                    <!-- meta-description -->
                    <div class="form-group">
                        <label for="meta_description" class="col-sm-2 control-label"><?= lang('meta_description') ?> </label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="meta_description" name="meta_description" style="height:140px;"><?php echo set_value('meta_description', $page->meta_description); ?></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label"></label>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success pull-left" name="form1"><?= lang('save'); ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


    </div>
</div>
