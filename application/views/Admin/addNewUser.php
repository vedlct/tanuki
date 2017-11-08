

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card card-topline-aqua" id="form_wizard_1">
                    <div class="card-head">
                    </div>
                    <div class="card-body" id="bar-parent">
                        <form class="form-horizontal" action="<?php echo base_url()?>Admin/User/insertUser"  enctype="multipart/form-data" method="POST">
                            <div class="form-wizard">
                                <div class="form-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                                            <h3 class="block">User  Detail</h3>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"> Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" required class="form-control input-height" placeholder="Enter Name" name="username" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"> Address
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" required class="form-control input-height" placeholder="Enter Address Detail" name="address" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">PostCode
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" required class="form-control input-height" placeholder="Enter Postcode" name="postcode" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">City
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" required name="city">
                                                        <option value="">select the  City</option>
                                                        <?php foreach ($city as $city) { ?>
                                                            <option value="<?php echo $city->id ?>"><?php echo $city->name ?></option>

                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"> MemberCardNumber
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" required class="form-control input-height" placeholder="Enter MemberCardNumber" name="membercardnumber" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">ContactNo
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" required class="form-control input-height" placeholder="Enter ContactNo" name="contactno" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Email
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="email" required class="form-control input-height" placeholder="Enter Email" name="email" />

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Password
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="password" required class="form-control input-height" placeholder="Enter Password" name="password" />
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-md-3">User Activation Status
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">

                                                    <select required name="status">
                                                        <option value="1">Active</option>
                                                        <option value="0">In-Active</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">
                                                </label>
                                                <div class="col-md-5">
                                                    <button type="submit"  class="btn btn-info">Submit</button>
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
        </div>
    </div>
</div>
</div>
