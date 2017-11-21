
<?php foreach ($orderstatusinfo as $orderinfo) { ?>
<form action="<?php echo base_url()?>Admin/Orders/updateOrderStatus/<?php echo $orderinfo->id ?>"  method="post" id="form_sample_1" class="form-horizontal">
    <div class="form-body">

        <div class="form-group">

            <label class="control-label col-md-3"> Enter Sequnce<span class="required"> * </span></label>
            <div class="col-md-5">
                <input type="text" name="sequence" placeholder="enter Sequence" value="<?php echo $orderinfo->sequece ?>" required class="form-control input-height" />
            </div>

        </div>
        <div class="form-group">

            <label class="control-label col-md-3"> Delivery  Status<span class="required"> * </span></label>
            <div class="col-md-5">
                <input type="text" name="statusTitle" placeholder="enter Delivery Status" value="<?php echo $orderinfo->statusTitle ?>" required class="form-control input-height" />
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



