
<?php if ($this->session->userdata('userType')!="Admin"){
echo "<script type=\"text/javascript\">
        alert(\"Login First\");
        
        window.location.href='". base_url() ."';
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
                        <span class="title">Users</span>
                    </a>
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

                    <a href="<?php echo base_url()?>Admin/Feedback/allRestaurantsReview" class="nav-link nav-toggle"><i class="fa fa-book"></i>
                        <span class="title">Restaurant Review</span>
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



            </ul>


        </div>
    </div>
</div>
<!-- end sidebar menu -->
<script>
    var old_notification = "<?php echo $ordernotification?>";

    var old_unseen = parseInt(old_notification);
    var new_unseen ="0";
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
//                    var snd = new Audio("file.wav"); // buffers automatically when created
//                    snd.play();

                    var song = new Audio();
                    song.src = '<?php echo base_url()?>public/notification_sound.mp3';
                    song.play();
                    desktopnotification();
                }else {
                    $('#output1').html(" ("+old_unseen+")")
                }
            }
        });
    },2000);


function desktopnotification() {



        var title="New Order";
        var desc='New Order';
        var url="www.tanukiva.com";
        //notifyBrowser(title,desc,url);

        // Let's check if the browser supports notifications
        if (!("Notification" in window)) {
            alert("This browser does not support desktop notification");
        }

        // Let's check if the user is okay to get some notification
        else if (Notification.permission === "granted") {
            // If it's okay let's create a notification
            var notification = new Notification(title, {icon:'<?php echo base_url()?>images/logo/logo.png',body: desc ,  requireInteraction: true});
        }

        // Otherwise, we need to ask the user for permission
        // Note, Chrome does not implement the permission static property
        // So we have to check for NOT 'denied' instead of 'default'
        else if (Notification.permission !== 'denied') {
            Notification.requestPermission(function (permission) {

                // Whatever the user answers, we make sure we store the information
                if(!('permission' in Notification)) {
                    Notification.permission = permission;
                }

                // If the user is okay, let's create a notification
                if (permission === "granted") {
                    var notification = new Notification(title, {icon:'<?php echo base_url()?>images/logo/logo.png"',body: desc,  requireInteraction: true});



                }


            });

        }

        // At last, if the user already denied any notification, and you
        // want to be respectful there is no need to bother him any more.
    }


</script>

<?php }?>