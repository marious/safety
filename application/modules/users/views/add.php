<div class="row">
    <div class="col-md-12">

        <form class="form-horizontal" action="<?= site_url('users/add/'.$id); ?>" method="post" enctype="multipart/form-data">
            <div class="box box-info">
                <div class="box-body">
                    <!-- username -->
                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label"><?= lang('username') ?> <span class="error">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" id="username" autocomplete="off" class="form-control" name="username"
                                   value="<?php echo set_value('username', $user->username) ?>">
                            <?php echo form_error('username', '<div class="error">', '</div>'); ?>
                        </div>
                    </div>


                    <!-- email -->
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label"><?= lang('email') ?> <span class="error">*</span></label>
                        <div class="col-sm-6">
                            <input type="email" id="email" autocomplete="off" class="form-control" name="email"
                                   value="<?php echo set_value('email', $user->email) ?>">
                            <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                        </div>
                    </div>


                    <!-- password -->
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label"><?= lang('password'); ?> <span class="error">*</span></label>
                        <div class="col-sm-6">
                            <input type="password" name="password" class="form-control" id="password">
                            <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                        </div>
                    </div>

                    <!-- password confirmation -->
                    <div class="form-group">
                        <label for="conf_password" class="col-sm-2 control-label"><?= lang('conf_password'); ?> <span class="error">*</span></label>
                        <div class="col-sm-6">
                            <input type="password" name="conf_password" class="form-control" id="conf_password">
                            <?php echo form_error('conf_password', '<div class="error">', '</div>'); ?>

                        </div>
                    </div>


                    <div class="form-group">
                        <label for="role_group" class="col-sm-2 control-label"><?= lang('role_group') ?> <span class="error">*</span></label>
                        <div class="col-sm-6">
                            <select name="role_group" id="role_group" class="form-control">
                                <option value="0">-- <?= lang('select_role_group') ?> --</option>
                                <?php if (is_array($groups) && count($groups)): ?>
                                <?php $selected = ''; ?>
                                    <?php foreach($groups as $group): ?>
                                        <?php
                                            $group_temp = $this->ion_auth->get_users_groups($user->id)->row();
                                            if ($user->id && $group) {
                                                if ($group_temp->id == $group->id) {
                                                    $selected = 'selected';
                                                }
                                            }
                                        ?>
                                        <option value="<?= $group->id; ?>" <?= $selected; ?>><?= $group->name; ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <?php echo form_error('role_group', '<div class="error">', '</div>'); ?>
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
</div>
