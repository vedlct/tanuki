<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php"); ?>
</head>
<body class="page-header-fixed sidemenu-closed-hidelogo page-container-bg-solid page-content-white page-md">

<div class="page-wrapper">

    <?php include('topNavigation.php') ?>

    <div class="clearfix"> </div>
    <!-- start page container -->
    <div class="page-container">

        <?php include ('leftNavigation.php')?>


        <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Customer List</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index-2.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Customers</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Customer List</li>
                            </ol>
                            <?php if ($this->session->flashdata('errorMessage')!=null){?>
                                <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
                            <?php }
                            elseif($this->session->flashdata('successMessage')!=null){?>
                                <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
                            <?php }?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tabbable-line">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab1" data-toggle="tab"> List View </a>
                                    </li>
                                    <li>
                                        <a href="#tab2" data-toggle="tab"> Grid View </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active fontawesome-demo" id="tab1">
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
                                                                    <button id="addRow" onclick="selectid1(this)" class="btn btn-info">
                                                                        Add New <i class="fa fa-plus"></i>
                                                                    </button>
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

					                                                <th> Name </th>
					                                                <th> Email </th>
					                                                <th> MemberCardNo </th>
					                                                <th> UserAcivatin Status </th>
					                                                <th>Address</th>
                                                                    <th>Action </th>
					                                            </tr>
					                                        </thead>
					                                        <tbody>

                                                            <?php foreach($user as $u) { ?>
																<tr class="odd gradeX">

																	<td><?php echo $u->name?></td>
																	<td class="left"><?php echo $u->email?></td>
                                                                    <td class="left"><?php echo $u->memberCardNo?></td>
                                                                    <td class="left"> <?php if($u->userActivationStatus==1)
                                                                        {
                                                                            echo "active";
                                                                        }
                                                                        else
                                                                        {
                                                                            echo "inactive";
                                                                        }

                                                                        ?></td>
                                                                    <td> <?php echo $u->address?>,<?php echo $u->fkCity?>,<?php echo $u->postalCode?>;</td>
                                                                       <td>
                                                                    <td class="center">
                                                                        <button  class="btn btn-primary btn-xs"  data-panel-id="<?php echo $u->id ?>" onclick="selectid2(this)">

                                                                            <i class="fa fa-pencil"></i>
                                                                        </button>

                                                                        <button type="button" data-panel-id="<?php echo $u->id ?>" onclick="selectid3(this)"class="btn btn-danger btn-xs">

                                                                            <i class="fa fa-trash-o "></i>
                                                                        </button>
                                                                    </td>
																	</td>
																</tr>
														<?php  }	?>


															</tbody>
					                                    </table>
					                                </div>
					                            </div>
					                        </div>
					                    </div>
                                    </div>

                    					</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
<?php include ("footer.php") ?>
    </div>
<?php include ("js.php") ?>
</body>

<div id="myModal" class="modal">
    <br/><br/><br/>
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">×</span>

        <div id="txtHint"></div>

    </div>


</div>

</div>
<!-- end page container -->
</div>

</body>

</html>

<script>
    var modal = document.getElementById('myModal');
    var span = document.getElementsByClassName("close")[0];

    function selectid1(x)
    {

        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Admin/User/newUser" )?>',
            data:{},
            cache: false,
            success:function(data)
            {
                $('#txtHint').html(data);
            }

        });
        modal.style.display = "block";
    }

    function selectid2(x)
    {

        btn = $(x).data('panel-id');

        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Admin/User/getUserById")?>',
            data:{id:btn},
            cache: false,
            success:function(data) {

                $('#txtHint').html(data);

            }
        });
        modal.style.display = "block";

    }

    function selectid3(x)
    {

        if (confirm("are you sure to delete this User?"))
        {

            btn = $(x).data('panel-id');

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("Admin/User/deleteUseryById")?>',
                data: {id: btn},
                cache: false,
                success: function (data) {

                    location.reload();


                }

            });
        }
    }
    // When the user clicks * of the modal, close it
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }


</script>















</html>