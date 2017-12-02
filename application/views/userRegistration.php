
<form method="post" action="<?php echo base_url()?>admin/Login/registerUser" class="popup-form" id="myRegister" onsubmit="return registration()">
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