
                        <?php foreach($userInfo as $u) { ?>
                        <form class="form-horizontal" action="<?php echo base_url()?>Admin/User/updateUserById/<?php echo $u->id ?>" onsubmit="return updateUser()" enctype="multipart/form-data" method="POST">
                            <div class="form-wizard">
                                <div class="form-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                                            <h3 style="text-align: center" class="block"> User Detail Updateform</h3>

                                            <div class="form-group">
                                                <label class="control-label col-md-3"> Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text"  class="form-control input-height"  value="<?php echo $u->name; ?>" id="username" name="username" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"> Address
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text"  class="form-control input-height" value="<?php echo $u->address; ?>" id="address" name="address" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">PostCode
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text"  class="form-control input-height" value="<?php echo $u->postalCode; ?>" id="postcode" name="postcode" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">City
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" id="city" required name="city">
                                                        <?php foreach ($city as $cityinfo ) { ?>
                                                            <option value="<?php echo $cityinfo->id ?>"<?php if (!empty($u->fkCity) && $cityinfo->id==$u->fkCity) echo 'selected="selected"'?> ><?php echo $cityinfo->name ?></option>


                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">ContactNo
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" id="contactno" class="form-control input-height" value="<?php echo $u->contactNo ?>" name="contactno" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Email
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <p id="WrongEmail" style="display: none;color: red">Email Already Existed!!</p>
                                                    <input type="email" id="email" class="form-control input-height" onchange="checkEmailFromUpdate()" value="<?php echo $u->email ?>" name="email" />

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Password
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="password" id="password" class="form-control input-height" value="<?php echo $u->password ?>" name="password" />
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-md-3">User Activation Status
                                                    <span class="required"> * </span>
                                                </label>
                                                    <div  class="col-md-5">
                                                        <select class="form-control input-height" id="status" required name="status">
                                                            <option value="">Select Status</option>
                                                            <option value="1" <?php echo ($u->userActivationStatus=='1')?'selected="selected"':''; ?>>active</option>
                                                            <option value="0" <?php echo ($u->userActivationStatus=='0')?'selected="selected"':''; ?>>In-Active</option>
                                                        </select>

                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">User Type
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" id="usertype" required name="usertype">
                                                        <option value="">Select User Type</option>
                                                        <?php foreach ($userTypeinfo as $userTypeinfo ) { ?>
                                                            <option value="<?php echo $userTypeinfo->id ?>"<?php if (!empty($u->fkUserType) && $userTypeinfo->id==$u->fkUserType ) echo 'selected="selected"'?> ><?php echo $userTypeinfo->typeTitle ?></option>


                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label class="control-label col-md-3">
                                                </label>
                                                <div class="col-md-5">
                                                    <button type="submit" id="submit" class="btn btn-info">Update</button>
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

                        <script>

                            function updateUser() {



                                var name = document.getElementById('username').value;
                                var address = document.getElementById('address').value;
                                var city = document.getElementById('city').value;
                                var postcode = document.getElementById('postcode').value;
                                var email = document.getElementById('email').value;
                                var password = document.getElementById('password').value;

                                var phone = document.getElementById('contactno').value;

                                if (name.length > 45) {
                                    alert("User Name should be less than 45 charecter");
                                    return false;
                                }
                                if (address.length > 100) {
                                    alert("address should be less than 100 charecter");
                                    return false;
                                }
                                if (postcode.length > 11) {
                                    alert("Post Code should be less than 11 charecter");
                                    return false;
                                }
                                var chk = /^[0-9]*$/;
                                var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                                if (!phone.match(chk)) {
                                    alert('Please enter a valid Phone number!!');
                                    return false;
                                }
                                if (phone.length > 18) {
                                    alert('Phone number must be less than 18 charecter!!');
                                    return false;
                                }
                                if (!email.match(mailformat)) {
                                    alert("You have entered an invalid email address!");
                                    return false;
                                }
                                else {

                                    return true;
                                }


                            }

                            function checkEmailFromUpdate() {

                                var email = document.getElementById('email').value;
                                var userId = '<?php echo $u->id ?>';

                                $.ajax({
                                    type:'POST',
                                    url:'<?php echo base_url("Admin/User/checkEmailFromUpdate")?>',
                                    data:{'email':email,'id':userId},
                                    cache: false,
                                    success:function(data) {

                                        if (data=="0")
                                        {

                                            document.getElementById('submit').disabled= true;
                                            document.getElementById('WrongEmail').style.display='block';

                                        }
                                        else {
                                            document.getElementById('WrongEmail').style.display='none';
                                            document.getElementById('submit').disabled= false;
                                        }

                                    }
                                });

                            }


                        </script>
