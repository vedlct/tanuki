<!-- Login modal -->
<div class="modal fade" id="login_2" tabindex="-1" role="dialog" aria-labelledby="myLogin" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
            <form action="<?php echo base_url()?>Login/check_user" class="popup-form" id="myLogin" method="post">
                <div class="login_icon"><i class="icon_lock_alt"></i></div>
                <input type="email" class="form-control form-white" name="email" placeholder="Email">
                <input type="password" class="form-control form-white" name="password" placeholder="Password">
                <div class="text-left">
                    <a style="cursor: pointer" onclick="forgetPassWord()">Forgot Password?</a>
                </div>
                <button type="submit" class="btn btn-submit">Submit</button>
            </form>
        </div>
    </div>
</div>
<!-- End modal -->

<!-- ForgetPass modal -->
<div class="modal fade" id="forgetPass" tabindex="-1" role="dialog" aria-labelledby="forgetPass" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
            <span id="wrongEmail"style="display: none;color:white">Your Email Doesn't Match! ,Please Input The Registered Email Address</span>
            <form action="<?php echo base_url()?>Login/forgetPassMail" class="popup-form" id="forgetPassMail" method="post">
                <div class="login_icon"><i class="icon_lock_alt"></i></div>
                <input type="email" class="form-control form-white" required name="email" id="email" placeholder="Email">
                <div class="text-left">
                    <a style="cursor: pointer" onclick="UserLogin()">User Login</a>
                </div>
                <a type="button" onclick="forgetPassWordValidate()" class="btn btn-submit">Submit</a>
            </form>
<!--            <button onclick="forgetPassWordValidate()" class="btn btn-submit">Submit</button>-->
        </div>
    </div>
</div>
<!-- End modal -->

<!-- Register modal -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myRegister" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
            <form action="<?php echo base_url()?>admin/Login/registerUser" class="popup-form" id="myRegister" onsubmit="return registration()">
                <div class="login_icon"><i class="icon_lock_alt"></i></div>
                <input type="text" class="form-control form-white" id="Name" name="Name" placeholder="User Name" required>
                <textarea type="text" id="address" name="address" class="form-control form-white"  required placeholder=" Your full address"></textarea>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <?php
                        $this->db->select('id,name');
                        $this->db->from('city');
                        $query1=$this->db->get();?>
                        <select class="form-control form-white" id="city" name="city" required>
                            <option value="">Your city</option>
                            <?php foreach ($query1->result() as $cities){?>
                            <option value="<?php echo $cities->id?>"><?php echo $cities->name?></option>
                            <?php } ?>
                        </select>

                    </div>
                    <div class="col-md-6 col-sm-6">

                    <input type="text" id="pcode" name="pcode" class="form-control form-white" value=""  required placeholder=" Your postal code">

                    </div>
                </div>

                <input type="email" class="form-control form-white"name="email" id="email" required placeholder="Email">
                <input type="text" class="form-control form-white"name="password" required placeholder="Password"  id="password">
                <input type="text" class="form-control form-white" name="conPassword" required placeholder="Confirm password"  id="conPassword">
                <input type="tel" class="form-control form-white" name="phone" required id="phone" placeholder="Contact No">
                <div id="pass-info" class="clearfix"></div>
                <div class="checkbox-holder text-left">
                    <div class="checkbox">
                        <input type="checkbox" value="accept_2" id="check_2" name="check_2" />
                        <label for="check_2"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>
                    </div>
                </div>
                <button type="submit" class="btn btn-submit">Register</button>
            </form>
        </div>
    </div>
</div><!-- End Register modal -->

<script>

    function registration() {

        var checkbox=document.getElementById('check_2').checked;
        if (!checkbox){
            alert('Please click the checkbox');
            return false;
        }
        else {

            var name = document.getElementById('Name').value;
            var address = document.getElementById('address').value;
            var city = document.getElementById('city').value;
            var postcode = document.getElementById('pcode').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var conPassword = document.getElementById('conPassword').value;
            var phone = document.getElementById('phone').value;

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
            if (password!=conPassword){
                alert('Password and confirm Password does not match');
            }
            else {
                return true;
            }
        }

    }
    function forgetPassWord() {

        $('#login_2').modal('hide');
        $('#forgetPass').modal('show');

    }

    function UserLogin() {

        $('#forgetPass').modal('hide');
        $('#login_2').modal('show');

    }

    function forgetPassWordValidate() {

        var Email=document.getElementById('email');

        if (Email.value == ""){
            alert("Email Field Can not be empty!!");
            return false;
        }
        else {
            var UserEmail=Email.value;

            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Login/CheckUser")?>',
                data:{'mail':UserEmail},
                cache: false,
                success:function(data)
                {
                    if (data == "1"){

                        document.getElementById("forgetPassMail").submit();
                    }
                    else {

                        $('#wrongEmail').show();


                    }
                    
                }
            });
            
        }



    }


</script>