
<?php if ($this->session->userdata('userType')!="Admin"){
echo "<script type=\"text/javascript\">
        alert(\"Login First\");
        
        window.location.href= '" . base_url() . "';
        </script>";
}
else
    {
        $this->db->select('COUNT(id) as total');
        $this->db->from('orders');
        $this->db->where('orderNotifications',"0");

        $query=$this->db->get();
        
     foreach ($query->result() as $unseenOrder){
         $ordernotification=$unseenOrder->total;
     }
?>

<!-- start sidebar menu -->
<div class="sidebar-container">
    <div class="sidemenu-container navbar-collapse collapse fixed-menu">
        <div id="remove-scroll">
            <ul class="sidemenu  page-header-fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                <li class="nav-item start active open">
                    <a href="<?php echo base_url() ?>Admin/Home" class="nav-link "> <i class="fa fa-tachometer"></i> <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url()?>Admin-Category" class="nav-link nav-toggle"><i class="fa fa-book"></i>
                        <span class="title">Category</span>
                    </a>
                </li>



                <li class="nav-item">
                    <a href="<?php echo base_url() ?>Admin/User/allUser" class="nav-link nav-toggle"> <i class="fa fa-user-md"></i>
                        <span class="title">Users</span> <span class="arrow"></span>
                    </a>
                </li>
                
                <li class="nav-item  ">
                    <a href="#" class="nav-link nav-toggle"> <i class="fa fa-user-md"></i>
                        <span class="title">Customer</span> <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="#" class="nav-link "> <span class="title">Add Customer</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="add_doctor.php" class="nav-link "> <span class="title">Add Customer</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="edit_doctor.php" class="nav-link "> <span class="title">Edit Customer</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item  ">
                    <a href="#" class="nav-link nav-toggle"> <i class="fa fa-user-md"></i>
                        <span class="title">Items</span> <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">

                        <li class="nav-item  ">

                            <a href="<?php echo base_url()?>Admin-addItems" class="nav-link "> <span class="title">Add Items</span>
                            </a>
                        </li>

                        <li class="nav-item  ">
                            <a href="<?php echo base_url()?>Admin-Items" class="nav-link "> <span class="title">All Items</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url()?>Admin-Orders" class="nav-link nav-toggle"><i class="fa fa-book"></i>
                        <span class="title">Order</span><span id="output1" style="color:#FFF;;margin: 1px;font-size: 13px;"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url()?>Admin-ordersStatus" class="nav-link nav-toggle"><i class="fa fa-book"></i>
                        <span class="title">Order Status</span>
                    </a>
                </li>
                <li class="nav-item">

                    <a href="<?php echo base_url()?>Admin/Feedback/allUserfeedback" class="nav-link nav-toggle"><i class="fa fa-book"></i>
                        <span class="title">User Feedback</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url()?>Admin/Charge/allCharges" class="nav-link nav-toggle"><i class="fa fa-gift"></i>
                        <span class="title">Charges</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link nav-toggle"><i class="fa fa-book"></i>
                        <span class="title">Report</span> <span class="arrow"></span>

                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="<?php echo base_url()?>Admin-Report" class="nav-link "> <span class="title">Filter By Date</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="<?php echo base_url()?>Admin/Report/filterByCustomer" class="nav-link "> <span class="title">Filter By Customer</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="<?php echo base_url()?>Admin/Report/filterByEmployee" class="nav-link "> <span class="title">Filter By Employee</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="<?php echo base_url()?>Admin/Report/filterByItems" class="nav-link "> <span class="title">Filter By Items</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url()?>Admin/Report/filterByPoints" class="nav-link"><span class="title">Filter By Points</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  ">
                    <a href="#" class="nav-link nav-toggle"> <i class="fa fa-gift"></i>
                        <span class="title">Promotions</span> <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="<?php echo base_url()?>Admin/Promotions/addPromotions" class="nav-link "> <span class="title">Add Promotion</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="<?php echo base_url()?>Admin/Promotions/allPromotions" class="nav-link "> <span class="title">All Promotion</span>
                            </a>
                        </li>


                    </ul>
                </li>

                <li class="heading">
                    <h3 class="uppercase">Extra Components</h3>
                </li>
                <li class="nav-item  ">
                    <a href="#" class="nav-link nav-toggle">
                        <i class="fa fa-window-restore"></i>
                        <span class="title">UI Elements</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="ui_buttons.html" class="nav-link ">
                                <span class="title">Buttons</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="ui_tabs_accordions_navs.html" class="nav-link ">
                                <span class="title">Tabs &amp; Accordions</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="ui_panels.html" class="nav-link ">
                                <span class="title">Panels</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="ui_tree.html" class="nav-link ">
                                <span class="title">Tree View</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-id-card-o"></i>
                        <span class="title">Forms </span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="layouts_form.html" class="nav-link ">
                                <span class="title">Form Layout</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="advance_form.html" class="nav-link ">
                                <span class="title">Advance Component</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="wizard_form.html" class="nav-link ">
                                <span class="title">Form Wizard</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="validation_form.html" class="nav-link ">
                                <span class="title">Form Validation</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="editable_form.html" class="nav-link ">
                                <span class="title">Editor</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-caret-square-o-right"></i>
                        <span class="title">Multi Level Menu</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-university"></i> Item 1
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="fa fa-bell-o"></i> Arrow Toggle
                                        <span class="arrow "></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item">
                                            <a href="javascript:;" class="nav-link">
                                                <i class="fa fa-calculator"></i> Sample Link 1</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="fa fa-clone"></i> Sample Link 2</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="fa fa-cogs"></i> Sample Link 3</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa fa-file-pdf-o"></i> Sample Link 1</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa fa-rss"></i> Sample Link 2</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa fa-hdd-o"></i> Sample Link 3</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-gavel"></i> Arrow Toggle
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa fa-paper-plane"></i> Sample Link 1</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa fa-power-off"></i> Sample Link 1</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa fa-recycle"></i> Sample Link 1
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-volume-up"></i> Item 3 </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- end sidebar menu -->
<script>
    var old_notification = "<?php echo $ordernotification?>";

    var old_unseen = parseInt(old_notification);
    var new_unseen =0;
    setInterval(function(){
        $.ajax({
            type : 'POST',
            url: "<?php echo base_url('Admin/Orders/getTotalOrderSeen') ?>",
            cache: false,
            success : function(datan){

                if (parseFloat(datan) > old_unseen) {
                    new_unseen=new_unseen+1;
                    $('#output1').html(" ("+new_unseen+")"),
                        old_unseen = datan;
                }else {
                    $('#output1').html(" ("+old_unseen+")")
                }
            }
        });
    },2000);

</script>

<?php }?>