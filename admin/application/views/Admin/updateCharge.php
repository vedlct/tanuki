

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card card-topline-aqua" id="form_wizard_1">
            <div class="card-head">

            </div>
            <div class="card-body" id="bar-parent">
                <?php  foreach ( $chageInfo as $ch) {  ?>
<!--                <td>--><?php //echo $ch->id ?><!--</td>-->
                <form class="form-horizontal" action="<?php echo base_url()?>Admin/Charge/updateCharge/<?php echo $ch->id ?>"  enctype="multipart/form-data" method="POST">


                    <div class="form-wizard">
                        <div class="form-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <h3 class="block"> Update Delivery Charge</h3>

                                    <div class="form-group">

                                        <label class="control-label col-md-3"> Delivery fee<span class="required"> * </span></label>
                                        <div class="col-md-5">
                                            <input type="text" name="deliveryfee" placeholder="Campain Title name" value="<?php echo $ch->deliveryfee ?>" required class="form-control input-height" />
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label class="control-label col-md-3"> Vat<span class="required"> * </span></label>
                                        <div class="col-md-5">
                                            <input type="text" name="vat" placeholder="Promo Code" required value="<?php echo $ch->vat ?>" class="form-control input-height" />
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
                    </div>
            </div>
        </div>

    </div>
    </form>
    <?php } ?>
</div>

