
		<?php include ("header.php"); ?>

			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Category List</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index-2.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Order</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Order List</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-topline-red">
                                <div class="card-head">
                                    <header></header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
	                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
	                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="btn-group">
                                                <button id="addRow" onclick="selectid5(this)" class="btn btn-info">
                                                    Add New <i class="fa fa-plus"></i>
                                                </button>
<!--model call-->
                                                <div id="myModal3" class="modal">
                                                    <br/><br/><br/>
                                                    <!-- Modal content -->
                                                    <div class="modal-content">
                                                        <span class="close">×</span>


                                                        <div id="txtHint"></div>

                                                    </div>


                                                </div>


                                                <div id="myModal5" class="modal">
                                                    <br/><br/><br/>
                                                    <!-- Modal content -->
                                                    <div class="modal-content">
                                                        <span class="close">×</span>


                                                        <div id="txtHint1"></div>

                                                    </div>


                                                </div>



                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="btn-group pull-right">
                                                <button class="btn green-bgcolor  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-right">
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="fa fa-print"></i> Print </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                                        <thead>
                                            <tr>
                                                <th> Sr.NO </th>
                                                <th> Name </th>
                                                <th> Food Add date</th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($catgory as $catgory) { ?>

											<tr class="odd gradeX">

												<td><?php echo $catgory->id; ?></td>
												<td class="center"><?php echo $catgory->name; ?></td>
												<td class="center"><?php echo $catgory->insertDate; ?></td>

												 <td>
                                                     <button  class="btn btn-primary btn-xs"  data-panel-id="<?php echo $catgory->id ?>" onclick="selectid9(this)" >

                                                          <i class="fa fa-pencil"></i>
													 </button>

                                                         <button type="button" data-panel-id="<?php echo $catgory->id ?>" onclick="selectid7(this)" class="btn btn-danger btn-xs">

														     <i class="fa fa-trash-o "></i>
													      </button>
												 </td>
											</tr>

                                        <?php } ?>


                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <!-- end page container -->



        <script
                src="https://code.jquery.com/jquery-3.2.1.min.js"
                integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
                crossorigin="anonymous">

        </script>


        <script>

            var modal3 = document.getElementById('myModal3');
            var modal5 = document.getElementById('myModal5');

            var span = document.getElementsByClassName("close")[0];
            var span1 = document.getElementsByClassName("close")[1];




            function selectid5(x) {
                modal3.style.display = "block";
                btn = $(x).data('panel-id');
                $.ajax({
                    type:'POST',
                    url:'<?php echo base_url("Admin/Category/addCategory" )?>/'+btn,
                    data:{'id':btn},
                    cache: false,
                    success:function(data)
                    {
                        $('#txtHint').html(data);
                    }

                });
            }


            function selectid9(x) {

                modal5.style.display = "block";

                btn9 = $(x).data('panel-id');

                $.ajax({
                    type:'POST',
                    url:'<?php echo base_url("Admin/Category/getCatgoryById")?>',
                    data:{id:btn9},
                    cache: false,
                    success:function(data) {

                        //alert(data);
                        $('#txtHint1').html(data);

                    }

                });


            }
            function selectid7(x) {

                if (confirm("are you sure to delete?")) {

                    btn4 = $(x).data('panel-id');

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url("Admin/Category/deleteCategoryById")?>',
                        data: {id: btn4},
                        cache: false,
                        success: function (data) {
                            if (data == 1) {

                                location.reload();
                                //alert(data);
                                //$('#txtHint').html(data);
                            }
                            //alert(data);

                        }

                    });
                }


            }


            span.onclick = function() {
                modal3.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal3) {
                    modal3.style.display = "none";
                }
            }

            span1.onclick = function() {
                modal5.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal5) {
                    modal5.style.display = "none";
                }
            }
        </script>



        
		<?php include ("footer.php"); ?>