
    <form action="<?php echo base_url()?>Admin-insertItemSizePrice/<?php echo $catId ?>/<?php echo $itemId?>"  method="post" id="form_sample_1" class="form-horizontal">
        <div class="form-body">

            <div class="form-group">

                <label class="control-label col-md-3"> Item Size<span class="required"> * </span></label>
                <div class="col-md-5">
                    <input type="text" name="itemSize" placeholder="enter item Size" required class="form-control input-height" />
                </div>

            </div>

            <div class="form-group">

                <label class="control-label col-md-3"> Item Price<span class="required"> * </span></label>
                <div class="col-md-5">
                    <input type="text" name="itemPrice" placeholder="enter item Price" required class="form-control input-height"  />
                </div>

            </div>

            <div class="form-group">
                <label class="control-label col-md-3"> Items Status </label>
                <div class="col-md-5">
                    <select class="form-control input-height"  name="itemsizeStatus">
                        <option value="">Select...</option>
                        <option value="1">Active</option>
                        <option value="0">In-active</option>

                    </select>
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
