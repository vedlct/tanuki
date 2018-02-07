
<div class="row">
                <h3 style="text-align: center" class="dark-grey">Registration</h3>
                <form action="<?php echo base_url()?>admin/Login/newUserRegFromResturant" onsubmit="return newUserregistration()">

                <div class="form-group col-lg-12">
                    <label>Username</label><span style="color: red" class="required">*</span>
                    <input type="text" id="Name" name="Name" required class="form-control" >
                </div>
                <div class="form-group col-lg-12">
                    <label>Address</label><span style="color: red" class="required">*</span>
                    <textarea type="text" id="address" name="address" class="form-control"  required placeholder=" Your full address"></textarea>
                </div>
                <div class="form-group col-lg-6">
                    <?php
                    $this->db->select('id,name');
                    $this->db->from('city');
                    $query1=$this->db->get();?>
                    <label>City</label><span style="color: red" class="required">*</span>
                    <select class="form-control" id="city" name="city" required>
                        <option value="">Your city</option>
                        <?php foreach ($query1->result() as $cities){?>
                            <option value="<?php echo $cities->id?>"><?php echo $cities->name?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label>Postal Code</label><span style="color: red" class="required">*</span>
                    <input type="text" id="pcode" name="pcode" class="form-control " value=""  required placeholder=" Your postal code">
                </div>

                <div class="form-group col-lg-12">
                    <label>Email</label><span style="color: red" class="required">*</span>
                    <input type="email" class="form-control"name="email" id="email" required placeholder="Email">
                </div>

                <div class="form-group col-lg-6">
                    <label>Password</label>
                    <input type="text" class="form-control"name="password" required placeholder="Password" value="123456" id="password">
                </div>
                <div class="form-group col-lg-6">
                    <label>Contact No</label><span style="color: red" class="required">*</span>
                    <input type="tel" class="form-control" name="phone" required id="phone" placeholder="Contact No">
                </div>

<!--                <div class="col-md-12">-->
<!--                    <input type="checkbox" value="accept_2" id="check_2" name="check_2" />-->
<!--                    <label for="check_2"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>-->
<!--                </div>-->

                <div class="col-md-12">
                    <button type="submit" class="btn btn-submit">Register</button>
                </div>
</form>

</div>

<script>

    function newUserregistration() {

//        var checkbox=document.getElementById('check_2').checked;
//        if (!checkbox){
//            alert('Please click the checkbox');
//            return false;
//        }
//        else {

            var name = document.getElementById('Name').value;
            var address = document.getElementById('address').value;
            var city = document.getElementById('city').value;
            var postcode = document.getElementById('pcode').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
//            var conPassword = document.getElementById('conPassword').value;
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
            if (password ==""){
                alert('Password can not be empty!!');
            }
            else {
                return true;
            }
//        }

    }

</script>

