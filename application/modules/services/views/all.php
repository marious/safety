<div class="row">
    <div class="col-md-12">

        <?php if (validation_errors()): ?>
            <!--            <div class="alert alert-danger alert-dismissible">-->
            <!--                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>-->
            <!--                <h4><i class="icon fa fa-check"></i> Alert!</h4>-->
            <!--                --><?php //echo validation_errors(); ?>
            <!--            </div>-->
        <?php endif; ?>

        <form class="form-horizontal" action="<?= site_url('services/add'); ?>" method="post" enctype="multipart/form-data">
            <div class="box box-info">
                <div class="box-body">


                    <table id="service-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?= lang('en_service_name') ?></th>
                                <th><?= lang('ar_service_name') ?></th>
                                <th><?= lang('en_description') ?></th>
                                <th><?= lang('ar_description') ?></th>
                                <th><?= lang('featured_image') ?></th>
                                <th><?= lang('created_at'); ?></th>
                                <th><?= lang('actions'); ?></th>
                            </tr>
                        </thead>

<!--                        <tfoot>-->
<!--                        <tr>-->
<!--                            <th>#</th>-->
<!--                            <th>--><?//= lang('en_service_name') ?><!--</th>-->
<!--                            <th>--><?//= lang('ar_service_name') ?><!--</th>-->
<!--                            <th>--><?//= lang('en_description') ?><!--</th>-->
<!--                            <th>--><?//= lang('ar_description') ?><!--</th>-->
<!--                            <th>--><?//= lang('created_at'); ?><!--</th>-->
<!--                            <th>--><?//= lang('actions'); ?><!--</th>-->
<!--                        </tr>-->
<!--                        </tfoot>-->
                    </table>





                </div>
            </div>
        </form>


    </div>
</div>
</div>


