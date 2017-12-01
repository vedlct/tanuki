<!-- Login modal -->
<div class="modal fade" id="login_2" tabindex="-1" role="dialog" aria-labelledby="myLogin" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
            <form action="<?php echo base_url()?>admin/Login/check_user" class="popup-form" id="myLogin" method="post">
                <div class="login_icon"><i class="icon_lock_alt"></i></div>
                <input type="email" class="form-control form-white" name="email" placeholder="Email">
                <input type="text" class="form-control form-white" name="password" placeholder="Password">
                <div class="text-left">
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="btn btn-submit">Submit</button>
            </form>
        </div>
    </div>
</div><!-- End modal -->

<!-- Register modal -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myRegister" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
            <form action="<?php echo base_url()?>admin/Login/check_user" class="popup-form" id="myRegister" onsubmit="return registration()">
                <div class="login_icon"><i class="icon_lock_alt"></i></div>
                <input type="text" class="form-control form-white" id="Name" placeholder="Name">
                <textarea type="text" id="address" name="address" class="form-control form-white" placeholder=" Your full address"></textarea>
                <div class="row">
                    <div class="col-md-6 col-sm-6">

                    <input type="text" id="city" name="city" class="form-control form-white" value="" placeholder="Your city">

                    </div>
                    <div class="col-md-6 col-sm-6">

                    <input type="text" id="pcode" name="pcode" class="form-control form-white" value="" placeholder=" Your postal code">

                    </div>
                </div>

                <input type="email" class="form-control form-white"name="email" id="email" placeholder="Email">
                <input type="text" class="form-control form-white"name="password" placeholder="Password"  id="password">
                <input type="text" class="form-control form-white" name="conPassword" placeholder="Confirm password"  id="conPassword">
                <input type="tel" class="form-control form-white" placeholder="Contact No">
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
        var name=document.getElementById('Name').value;
        var address=document.getElementById('address').value;
        var city=document.getElementById('city').value;
        var pcode=document.getElementById('pcode').value;
        var email=document.getElementById('email').value;
        var password=document.getElementById('password').value;
        var conPassword=document.getElementById('conPassword').value;

    }

</script>