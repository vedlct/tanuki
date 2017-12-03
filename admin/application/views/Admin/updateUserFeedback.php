
                <?php foreach ($userFeedbackinfo as $fupdate) { ?>

                <form class="form-horizontal" action="<?php echo base_url()?>Admin/Feedback/UpdateUserFeedbackById/<?php echo $fupdate->fid ?> "  enctype="multipart/form-data" method="POST">
                    <div class="form-wizard">
                        <div class="form-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <h3 style="text-align: center" class="block">Feedabck   Detail Update</h3>
                                    <div class="form-group">
                                        <label class="control-label col-md-3"> Item Name
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
<!--                                            <input type="text" required class="form-control input-height" placeholder="Enter Item Name" value="--><?php //echo $fupdate->itemName ?><!--" name="itemname" />-->
                                            <select class="form-control input-height" id="itemlist"  name="itemlist">
                                                <!--                                                            <option value="--><?php //echo $s->itname ?><!--">--><?php //echo $s->itname ?><!--</option>-->
                                                <?php foreach ($itemsinfo as $itemsinfo ) { ?>
                                                    <option value="<?php echo $itemsinfo->id ?>"<?php if (!empty($fupdate->fkItemId) && $itemsinfo->id==$fupdate->fkItemId) echo 'selected="selected"'?> ><?php echo $itemsinfo->itemName ?></option>

                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3"> Customer Name
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <!--                                            <input type="text" required class="form-control input-height" placeholder="Enter Item Name" value="--><?php //echo $fupdate->itemName ?><!--" name="itemname" />-->
                                            <select class="form-control input-height" id="itemlist"  name="customer">
                                                <!--                                                            <option value="--><?php //echo $s->itname ?><!--">--><?php //echo $s->itname ?><!--</option>-->
                                                <?php foreach ($user as $user ) { ?>
                                                    <option value="<?php echo $user->id ?>"<?php if (!empty($fupdate->fkUserId) && $user->id==$fupdate->fkUserId) echo 'selected="selected"'?> ><?php echo $user->name ?></option>

                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">User Rating
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <input type="text" required class="form-control input-height" value="<?php echo $fupdate-> userRating ?>" placeholder="Enter  Rating " name="rating" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Feedback Detail
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <input type="text" required class="form-control input-height" value="<?php echo $fupdate->feedback ?> " placeholder="Enter feedback detail" name="detail" />
                                        </div>
                                    </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="control-label col-md-3">
                                        </label>
                                        <div class="col-md-5">
                                            <button type="submit"  class="btn btn-info">Submit</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

    </form>

<?php } ?>