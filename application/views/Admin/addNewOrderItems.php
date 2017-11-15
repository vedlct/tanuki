<form action="<?php echo base_url()?>Admin-AddCategory"  method="post" id="form_sample_1" class="form-horizontal">
    <div class="form-body">

        <div class="form-group">
            <label class="control-label col-md-3">Category<span class="required"> * </span></label>
            <div class="col-md-5">
                <select class="form-control input-height" id="categoryName" name="categoryName" required onchange="showItemByCategory(this)">
                    <option value="">Select...</option>
                    <?php foreach ($categoryInfo as $category) { ?>
                        <option value="<?php echo $category->id?>"><?php echo $category->name?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3">Item Name<span class="required"> * </span></label>
            <div class="col-md-5">
                <select class="form-control input-height" id="itemId" name="itemId" required onchange="showItemSizesByItem(this)">
                    <option value="">Select...</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3">Item Size<span class="required"> * </span></label>
            <div class="col-md-5">
                <select class="form-control input-height" id="itemSizeId" name="itemSizeId" required onchange="showItemPriceByItemSizeId(this)">
                    <option value="">Select...</option>
                </select>
            </div>
        </div>

        <div class="form-group">

            <label class="control-label col-md-3"> Item Quantity<span class="required"> * </span></label>
            <div class="col-md-5">
                <input type="text" id="ItemQuantity" name="ItemQuantity" placeholder="Please Select an Item Size" required class="form-control input-height" />
            </div>
        </div>

        <div class="form-group">

            <label class="control-label col-md-3"> Item price<span class="required"> * </span></label>
            <div class="col-md-5">
                <input type="text" readonly id="ItemPrice" name="ItemPrice" placeholder="Please Select an Item Size" required class="form-control input-height" />
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