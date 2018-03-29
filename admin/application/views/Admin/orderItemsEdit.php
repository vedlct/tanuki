<?php foreach ($ordersItem as $oI){?>
<form action="<?php echo base_url()?>Admin-EditOrderItem/<?php echo $oI->id?>"  method="post" id="form_sample_1" class="form-horizontal">
    <div class="form-body">

        <div class="form-group">

            <label class="control-label col-md-3"> Quantity<span class="required"> * </span></label>
            <div class="col-md-5">
                <input type="text" name="itemQuantity" placeholder="enter Quantity" required value="<?php echo $oI->quantity?>" class="form-control input-height" />
           <input type="hidden" name="orderid" value="<?php echo $orderid?>">
            </div>

        </div>

        <div  class="form-group">
            <div class="form-actions">
                <div class="row">

                    <div class="col-md-offset-3 col-md-4">
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php } ?>