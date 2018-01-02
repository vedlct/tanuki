<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php"); ?>
</head>
<body class="page-header-fixed sidemenu-closed-hidelogo page-container-bg-solid page-content-white page-md">

<div class="page-wrapper">

    <?php include('topNavigation.php') ?>

    <div class="clearfix"></div>
    <!-- start page container -->
    <div class="page-container">

        <?php include ('leftNavigation.php')?>
        <!-- start page content -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <?php if ($this->session->flashdata('errorMessage')!=null){?>
                    <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
                <?php }
                elseif($this->session->flashdata('successMessage')!=null){?>
                    <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
                <?php }?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-red">
                            <div class="card-head">
                                <header>Report</header>

                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div id="date" style="display: none">
                                        <!--                                    <form method="post" action="--><?php //echo base_url()?><!--Admin/Report/searchByDate" onsubmit="return checkDate()">-->

                                        <div class="col-md-3 col-sm-3" >
                                            <div class="form-group" >

                                                <label for="date">Start Date</label>
                                                <input type="text" class="form-control docs-date" name="startdate" id="startdate" placeholder="Pick a date">
                                            </div >
                                        </div>
                                        <div class="col-md-3 col-sm-3" >
                                            <div class="form-group" >

                                                <label for="date">End Date</label>
                                                <input type="text" class="form-control docs-date" name="enddate" id="enddate" placeholder="Pick a date">
                                            </div>



                                        </div>
                                        <div class="btn-group col-md-3 col-sm-3">

                                            <button style="margin-top: 30px"  id="addRow" onclick="checkDate()" onclick="" class="btn btn-info">
                                                submit
                                            </button>
                                        </div>


                                        <!--                                    </form>-->
                                    </div>
<!--                                    <form method="post" action="--><?php //echo base_url()?><!--Admin/Report/searchByEmployeeId">-->
                                    <div id="searchEmplyee" style="display: none" >
<!--                                    <form action="--><?php //echo base_url()?><!--Admin/Report/searchByEmployeeId" method="post">-->

                                            <div class="col-md-3 col-sm-3" >
                                                <div class="form-group" >

                                                    <label for="date">Membership ID</label>
                                                    <input type="text" class="form-control " id="employeeid" name="employeeid" placeholder="Membership ID">
                                                </div >

                                            </div>

                                        <div class="btn-group col-md-3 col-sm-3">

                                            <button style="margin-top: 30px"   onclick="searchByEmp()" class="btn btn-info">
                                                submit
                                            </button>
                                        </div>


<!--                                    </form>-->
                                    </div>
                                    <div class="btn-group col-md-3 col-sm-3" id="searchbydate">

                                        <button style="margin-top: 30px"   onclick="searchbydate()" class="btn btn-info">
                                            Search By Date
                                        </button>
                                    </div>

                                    <div class="btn-group col-md-3 col-sm-3" id="employid">

                                        <button style="margin-top: 30px"  id="employeeid" onclick="searchbydorder()" class="btn btn-info">
                                            Search By embership ID
                                        </button>
                                    </div>






                                <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                                    <thead>
                                    <tr >
                                        <th width="" class="center"> SL </th>
                                        <th width="" class="center"> Employee Name </th>
                                        <th width="" class="center"> Employee Membership</th>
                                        <th width="" class="center"> Total Order </th>
                                        <th width="" class="center"> Total Item </th>
                                        <th width="" class="center"> Total Amount</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $count = 1; ;$qun= 0; $rate=0;$discount=0; foreach ($allreportemp as $ar) {  ?>

                                        <tr>
                                            <td class="center"><?php echo $count ?></td>
                                            <td class="center"><?php echo $ar->employee ?></td>
                                            <td class="center"><?php echo $ar->memberCardNo ?></td>
                                            <td class="center"><?php foreach ($allorder as $ao){
                                                    if ($ar->uid == $ao->uid){
                                                        echo $ao->totalorder ;
                                                    }
                                                }?></td>
                                            <td class="center"><?php echo $ar->totalitem?></td>
                                            <td class="center"><?php echo $ar->totalammount?></td>

                                        </tr>
                                        <?php  $count++;} ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- end page content -->

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

<?php include ("footer.php") ?>

</div>


</body>

</html>
<?php include ("js.php") ?>



<script>
    function searchbydate(){
        document.getElementById('searchbydate').style.display='none';
        document.getElementById('searchEmplyee').style.display='none';
        document.getElementById('date').style.display='block';
        document.getElementById('employid').style.display='block';
    }
    function checkDate() {

        var startdate = document.getElementById('startdate').value;
        var enddate = document.getElementById('enddate').value;


        if (startdate > enddate){

            alert('End Date must be greater than start date');
            return false;
        }
        else
        {
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin/Report/searchByEmployDate" )?>',
                data:{'startdate':startdate,'enddate':enddate},
                cache: false,
                success:function(data)
                {
                    $('#example4').html(data);
                }
            });
        }

    }

    function searchByEmp() {

        var employeeId = document.getElementById('employeeid').value;



        if (employeeId == null){

            alert('Please enter Employee Member Id');
            return false;
        }
        else
        {
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin/Report/searchByEmployeeId" )?>',
                data:{'employeeid':employeeId},
                cache: false,
                success:function(data)
                {
                    $('#example4').html(data);
                }
            });
        }

    }


    function searchbydorder(){
        document.getElementById('searchbydate').style.display='block';
        document.getElementById('searchEmplyee').style.display='block';
        document.getElementById('date').style.display='none';
        document.getElementById('employid').style.display='none';

    }


    var modal = document.getElementById('myModal');
    var span = document.getElementsByClassName("close")[0];
    function selectid1(x)
    {
        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Admin/Category/newCategory" )?>',
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
            url:'<?php echo base_url("Admin/Category/getCategoryById")?>',
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
        if (confirm("are you sure to delete this Category?"))
        {
            btn = $(x).data('panel-id');
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("Admin/Category/deleteCategoryById")?>',
                data: {id: btn},
                cache: false,
                success: function (data) {
                    alert('Category deleted Successfully');
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