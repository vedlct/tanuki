
                        <form class="form-horizontal" action="<?php echo base_url()?>Admin/User/insertUser" onsubmit=" return registration()" enctype="multipart/form-data" method="POST">
                            <div class="form-wizard">
                                <div class="form-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                                            <h3 style="text-align: center" class="block">Add New User</h3>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"> Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" required class="form-control input-height" placeholder="Enter Name" id="username" name="username" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"> Address
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <textarea type="text" id="address" name="address" class="form-control input-height"  required placeholder=" Your full address"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">PostCode
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" required class="form-control input-height" id="postcode" placeholder="Enter Postcode" name="postcode" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">City
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" required id="city" name="city">
                                                        <option value="">select the  City</option>
                                                        <?php foreach ($city as $city) { ?>
                                                            <option value="<?php echo $city->id ?>"><?php echo $city->name ?></option>

                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">ContactNo
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" required class="form-control input-height" placeholder="Enter ContactNo" id="contactno" name="contactno" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Email
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <p id="WrongEmail" style="display: none;color: red">Email Already Existed!!</p>
                                                    <input type="email" required class="form-control input-height" onchange="checkEmail()" placeholder="Enter Email" id="email" name="email" />

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Password
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="password" required class="form-control input-height" placeholder="Enter Password" id="password" name="password" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">User Activation Status
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">

                                                    <select class="form-control input-height"  id="status" required name="status">
                                                        <option value="1">Active</option>
                                                        <option value="0">In-Active</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">User TYpe
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" required id="usertype" name="usertype">
                                                        <option value="">select User Type</option>
                                                        <?php foreach ($userTypeinfo as $userTypeinfo) { ?>
                                                            <option value="<?php echo $userTypeinfo->id ?>"><?php echo $userTypeinfo->typeTitle ?></option>

                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">
                                                </label>
                                                <div class="col-md-5">
                                                    <button type="submit" id="submit" class="btn btn-info">Submit</button>
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
                        <script>

                            function registration() {



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

                            function checkEmail() {

                                var email = document.getElementById('email').value;

                                $.ajax({
                                    type:'POST',
                                    url:'<?php echo base_url("Admin/User/checkEmail")?>',
                                    data:{'email':email},
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