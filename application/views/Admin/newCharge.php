

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card card-topline-aqua" id="form_wizard_1">
            <div class="card-head">
            </div>
            <div class="card-body" id="bar-parent">
                <form class="form-horizontal" action="<?php echo base_url()?>Admin/Charge/insertCharge"  enctype="multipart/form-data" method="POST">
                    <div class="form-wizard">
                        <div class="form-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <h3 class="block"> Add New Delivery Charge</h3>
                                    <div class="form-group">
                                        <label class="control-label col-md-3"> Delivery fee
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <input type="text" required class="form-control input-height" placeholder="Enter delivery fee" name="deliveryfee" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3"> Vat
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <input type="text" required class="form-control input-height" placeholder="Enter vat Here" name="vat" />
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
</div>

