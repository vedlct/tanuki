<?php foreach ($itemSizePriceInfo as $itemInfo){?>
    <form action="<?php echo base_url()?>Admin-EditItemSizePrice/<?php echo $itemInfo->id?>"  method="post" id="form_sample_1" class="form-horizontal">
        <div class="form-body">

            <div class="form-group">

                <label class="control-label col-md-3"> Item Size<span class="required"> * </span></label>
                <div class="col-md-5">
                    <input type="text" name="itemSize" placeholder="enter item Size" required class="form-control input-height" value="<?php echo $itemInfo->itemSize?>" />
                </div>

            </div>

            <div class="form-group">

                <label class="control-label col-md-3"> Item Price<span class="required"> * </span></label>
                <div class="col-md-5">
                    <input type="text" name="itemPrice" placeholder="enter item Price" required class="form-control input-height" value="<?php echo $itemInfo->price?>" />
                </div>

            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Items Activation Status
                    <span class="required"> * </span>
                </label>
                <div  class="col-md-5">
                    <select class="form-control input-height" name="itemsizeStatus">
                        <option <?php echo ($itemInfo->itemsizeStatus=='1')?'selected="selected"':''; ?>>active</option>
                        <option <?php echo ($itemInfo->itemsizeStatus=='0')?'selected="selected"':''; ?>>In-Active</option>
                    </select>

                </div>
            </div>


            <input type="hidden" name="catId" required class="form-control input-height" value="<?php echo $catId;?>" />


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
<?php }?>