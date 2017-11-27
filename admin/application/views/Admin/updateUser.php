


        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card card-topline-aqua" id="form_wizard_1">
                    <div class="card-head">
                    </div>
                    <div class="card-body" id="bar-parent">
                        <?php foreach($userInfo as $u) { ?>
                        <form class="form-horizontal" action="<?php echo base_url()?>Admin/User/updateUserById/<?php echo $u->id ?>"  enctype="multipart/form-data" method="POST">
                            <div class="form-wizard">
                                <div class="form-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                                            <h3 class="block"> User Detail Updateform</h3>

                                            <div class="form-group">
                                                <label class="control-label col-md-3"> Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" n class="form-control input-height"  value="<?php echo $u->name; ?> " name="username" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"> Address
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" n class="form-control input-height" value="<?php echo $u->address; ?>" name="address" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">PostCode
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" n class="form-control input-height" value="<?php echo $u->postalCode; ?>" name="postcode" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">City
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" required name="city">
                                                        <?php foreach ($city as $cityinfo ) { ?>
                                                            <option value="<?php echo $cityinfo->id ?>"<?php if (!empty($u->fkCity) && $cityinfo->id==$u->fkCity) echo 'selected="selected"'?> ><?php echo $cityinfo->name ?></option>


                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"> MemberCardNumber
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" n class="form-control input-height" value="<?php echo $u->memberCardNo ?>" name="membercardnumber" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">ContactNo
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" n class="form-control input-height" value="<?php echo $u->contactNo ?>" name="contactno" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Email
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="email" n class="form-control input-height" value="<?php echo $u->email ?>" name="email" />

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Password
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="password" n class="form-control input-height" value="<?php echo $u->password ?>" name="password" />
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-md-3">User Activation Status
                                                    <span class="required"> * </span>
                                                </label>
                                                    <div  class="col-md-5">
                                                        <select class="form-control input-height" name="status">
                                                            <option <?php echo ($u->userActivationStatus=='1')?'selected="selected"':''; ?>>active</option>
                                                            <option <?php echo ($u->userActivationStatus=='0')?'selected="selected"':''; ?>>In-Active</option>
                                                        </select>

                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">City
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" required name="usertype">
                                                        <?php foreach ($userTypeinfo as $userTypeinfo ) { ?>
                                                            <option value="<?php echo $userTypeinfo->id ?>"<?php if (!empty($u->fkUserType) && $userTypeinfo->id==$u->fkUserType) echo 'selected="selected"'?> ><?php echo $userTypeinfo->typeTitle ?></option>


                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label class="control-label col-md-3">
                                                </label>
                                                <div class="col-md-5">
                                                    <button type="submit"  class="btn btn-info">Update</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

            </div>
            </form>
            <?php } ?>
        </div>
    </div>
</div>
</div>
