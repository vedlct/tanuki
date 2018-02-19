<form method="post" action="<?php echo base_url()?>Items/checkoutguest" onsubmit="return registration()">

    <div class="form-group">
        <label>Telephone/mobile</label>
        <p><font color="red"> <?php echo form_error('phone'); ?></font></p>
        <input type="tel" class="form-control" value="<?php echo set_value('phone'); ?>" name="phone" required id="phone" placeholder="Contact No">
    </div>

    <div class="form-group">
        <label>Your full address</label>
        <p><font color="red"> <?php echo form_error('address'); ?></font></p>
        <textarea type="text" id="address" name="address" cols="3" rows="3" class="form-control"  required placeholder=" Your full address"><?php echo set_value('address'); ?></textarea>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>City</label>
                <select class="form-control" id="city" name="city" required>
                    <option value="">Your city</option>
                    <?php foreach ($allCity as $cities){?>
                        <option <?php echo set_select('city',  $cities->id, False); ?> value="<?php echo $cities->id?>"><?php echo $cities->name?></option>
                    <?php } ?>
                </select>

            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>Postal code</label>
                <p><font color="red"> <?php echo form_error('pcode'); ?></font></p>
                <input type="text" id="pcode" value="<?php echo set_value('pcode'); ?>" name="pcode" class="form-control" required placeholder=" Your postal code">
            </div>
        </div>
    </div>


                <hr>


                <input type="submit" class="btn_full" value="Go to checkout">
</form>