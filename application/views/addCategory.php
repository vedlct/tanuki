
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-topline-yellow">
                                      <div class="card-head">
                                            <header>Create new catgory</header>
                                      </div>
                                <div class="card-body" id="bar-parent">
                                    <form action="<?php echo base_url()?>Admin/Category/insertCategory"  method="post" id="form_sample_1" class="form-horizontal">
                                        <div class="form-body">

                                            <div class="form-group">
                                               <label class="control-label col-md-3"> Catagory Name<span class="required"> * </span></label>
                                               <div class="col-md-5">
                                                <input type="text" name="catagoryname" data-required="1" placeholder="enter catagory name" class="form-control input-height" />
                                               </div>
                                            </div>
                                            <div class="form-group">

                                             <div class="form-actions">
                                             <div class="row">
                                              <div class="col-md-offset-3 col-md-9">
                                               <button type="submit" class="btn btn-info">Submit</button>

                                               </div>
                                               </div>
                                            </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            <!-- end page content -->

        
