<?php foreach ($iteminfo as $itemInfo){?>
<form action="<?php echo base_url()?>Admin-EditItem/<?php echo $itemInfo->id?>"  method="post" id="form_sample_1" class="form-horizontal">
    <div class="form-body">

        <div class="form-group">
            <label class="control-label col-md-3">Category<span class="required"> * </span></label>
            <div class="col-md-5">
                <select class="form-control input-height" id="categoryName" name="categoryName" required onchange="showtable(this)">
                    <option value="">Select...</option>
                    <?php foreach ($categoryNameId as $category) { ?>
                        <option value="<?php echo $category->id?>" <?php if (!empty($itemInfo->category)&& $itemInfo->category==$category->id) echo 'selected = "selected"';?>><?php echo $category->name?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group">

            <label class="control-label col-md-3"> Item Name<span class="required"> * </span></label>
            <div class="col-md-5">
                <input type="text" name="itemName" placeholder="enter item name" required class="form-control input-height" value="<?php echo $itemInfo->itemName?>" />
            </div>

        </div>

        <div class="form-group">

            <label class="control-label col-md-3"> Item Description<span class="required"> * </span></label>
            <div class="col-md-5">
                <textarea name="itemDescription"  class="form-control-textarea" required rows="5" cols="5" ><?php echo $itemInfo->description?></textarea>
            </div>

        </div>

        <div id = "Item_Status" class="form-group">
            <label class="control-label col-md-3">Status: </label>
            <div class="col-md-5">
                <select class="form-control input-height"  name="itemStatus">
                    <option value="">Select...</option>

                    <option  <?php if ($itemInfo->itemStatus=='1')echo 'selected = "selected"';?>value="1">Active</option>
                    <option  <?php if ($itemInfo->itemStatus=='0')echo 'selected = "selected"';?>value="0">Inactive</option>

                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3">Upload Photo<span class="required"> * </span>
            </label>
            <div class="col-md-5">
                <input type="file" name="itemPhoto" placeholder="Item Image"class="form-control input-height" />
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
<?php }?>