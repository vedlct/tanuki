
                <?php foreach ($categoryInfo as $find) {  ?>
                <form action="<?php echo base_url()?>Admin/Category/updateCategoryById/<?php echo $find->id ?>"  method="post" id="form_sample_1" class="form-horizontal">
                    <div class="form-body">

                        <div class="form-group">
                            <label class="control-label col-md-3"> Catagory Name<span class="required"> * </span></label>
                            <div class="col-md-5">
                                <input class="form-control input-height" type="text" name="catagoryname" required value="<?php echo $find->name ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3"> Description<span class="required"> * </span></label>
                            <div class="col-md-5">
                                <input type="text" name="description" placeholder="Give  description"  class="form-control input-height"  value="<?php echo $find->description ?>"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Category Status <span class="required"> * </span></label>
                            <div class="col-md-5">
                                <select class="form-control input-height"  required name="catStatus">
                                    <option value="">Select...</option>

                                    <option  <?php if ($find->categoryStatus=='1')echo 'selected = "selected"';?>value="1">Active</option>
                                    <option  <?php if ($find->categoryStatus=='0')echo 'selected = "selected"';?>value="0">Inactive</option>

                                </select>
                            </div>
                        </div>

                    <div class="form-group">

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit"  class="btn btn-info">Submit</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
                <?php } ?>


