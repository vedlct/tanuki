

<link rel="stylesheet" href="<?php echo base_url()?>public/css/datepicker.css">
    <div class="clearfix"></div>
    <!-- start page container -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-green">
                            <div class="card-head">
                                <header>Update Promotion</header>

                            </div>
                            <div class="card-body ">
                           <?php foreach ($promotioninfo as $p) { ?>

                                <form action="<?php echo base_url()?>Admin/Promotions/updatePromotionById/<?php echo $p->id ?>"  method="post" id="form_sample_1" enctype="multipart/form-data" class="form-horizontal">

                                    <div class="form-group">

                                        <label class="control-label col-md-3"> Campain Title<span class="required"> * </span></label>
                                        <div class="col-md-5">
                                            <input type="text" name="campain" placeholder="Campain Title name" value="<?php echo $p->campainTitle ?>" required class="form-control input-height" />
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label class="control-label col-md-3"> Promo Code<span class="required"> * </span></label>
                                        <div class="col-md-5">
                                            <input type="text" name="promocode" placeholder="Promo Code" required value="<?php echo $p->promoCode ?>" class="form-control input-height" />
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label class="control-label col-md-3"> Start Date<span class="required"> * </span></label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control docs-date" name="startdate" placeholder="Pick a date" value="<?php echo $p->startDate ?>">

                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="control-label col-md-3"> End Date<span class="required"> * </span></label>
                                        <div class="col-md-5">

                                            <input type="text" class="form-control docs-date" name="enddate" placeholder="Pick a date" value="<?php echo $p->endDate ?>">

                                        </div>
                                    </div>

                                    <div id = "Item_price" class="form-group">
                                        <label class="control-label col-md-3"> Discount(%):<span class="required"> * </span></label>
                                        <div class="col-md-5">
                                            <input type="text"  name="discount" placeholder="Discount(%)" value="<?php echo $p->discountAmount ?>"  class="form-control input-height" />
                                        </div>

                                    </div>

                                    <div id = "Item_Status" class="form-group">
                                        <label class="control-label col-md-3">Status: </label>
                                        <div class="col-md-5">
                                            <select class="form-control input-height"  name="itemStatus">
                                                <option value="1" <?php echo ($p->activationStatus=='1')?'selected="selected"':''; ?>>Active</option>
                                                <option value="0" <?php echo ($p->activationStatus=='0')?'selected="selected"':''; ?>>In-Active</option>

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


                                </form>

                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>


<?php include ("js.php") ?>

            <div id="myModal" class="modal">
               <br/><br/><br/>
            <!-- Modal content -->
               <div class="modal-content">
                  <span class="close">×</span>

                   <div id="txtHint"></div>

                  </div>


           </div>




