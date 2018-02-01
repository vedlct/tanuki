

                <form action="<?php echo base_url()?>Admin-AddCategory"  method="post" id="form_sample_1" class="form-horizontal">
                    <div class="form-body">

                        <div class="form-group">

                            <label class="control-label col-md-3"> Catagory Name<span class="required"> * </span></label>
                            <div class="col-md-5">
                                <p id="duplicateCat" style="display: none;color: red">Category Already Existed!! Please Enter Another Name</p>
                                <input type="text" name="catagoryname" placeholder="enter catagory name" id="catagoryname"  required class="form-control input-height" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3"> Description<span class="required"> * </span></label>
                            <div class="col-md-5">
                                <input type="text" name="description" placeholder="Give Offer  description"  class="form-control input-height" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Status :</label>
                            <div class="col-md-5">
                                <select class="form-control input-height"  name="catStatus">
                                    <option value="">Select...</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>

                                </select>
                            </div>
                        </div>
                        <div  class="form-group">
                            <div class="form-actions">
                                <div class="row">

                                    <div class="col-md-offset-3 col-md-4">
                                        <button type="submit" id="submit" class="btn btn-info">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <script>
                    
                    $("#catagoryname").on('input', function(){
                        var catName =document.getElementById('catagoryname').value;


                            $.ajax({
                                type:'POST',
                                url:'<?php echo base_url("Admin/Category/checkCategory")?>',
                                data:{'catName': catName},
                                cache: false,
                                success:function(data) {

                                    if (data=="1")
                                    {

                                        document.getElementById('submit').disabled= true;
                                        document.getElementById('duplicateCat').style.display='block';

                                    }
                                    else {
                                        document.getElementById('duplicateCat').style.display='none';
                                        document.getElementById('submit').disabled= false;
                                    }


                                }
                            });
                    });

                </script>


        
