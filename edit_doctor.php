
		<?php include ("header.php"); ?>

			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Edit Customer</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index-2.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Customers</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Edit Customer</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-topline-aqua" id="form_wizard_1">
                                <div class="card-head">
                                </div>
                                <div class="card-body" id="bar-parent">
                                <form class="form-horizontal" action="#" id="submit_form" method="POST">
                                        <div class="form-wizard">
                                            <div class="form-body">
                                                <ul class="nav nav-pills nav-justified steps">
                                                    <li>
                                                        <a href="#tab1" data-toggle="tab" class="step">
                                                            <span class="number"> 1 </span>
                                                            <span class="desc">
                                                                    Basic</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab2" data-toggle="tab" class="step">
                                                            <span class="number"> 2 </span>
                                                            <span class="desc">
                                                                    Account</span>
                                                        </a>
                                                    </li>
                                                     <li>
                                                        <a href="#tab3" data-toggle="tab" class="step active">
                                                            <span class="number"> 3 </span>
                                                            <span class="desc">
                                                                    Social </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tablast" data-toggle="tab" class="step active">
                                                            <span class="number"> 4 </span>
                                                            <span class="desc">
                                                                    Verify Details </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div id="bar" class="progress progress-striped" role="progressbar">
                                                    <div class="progress-bar progress-bar-info"> </div>
                                                </div>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab1">
                                                        <h3 class="block">Provide your basic details</h3>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Name
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control input-height" placeholder="enter your name" value="Kiran Patel" name="doctorname" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
			                                                <label class="control-label col-md-3">Date Of Birth
			                                                </label>
			                                                <div class="col-md-5">
			                                                    <div class="input-group date form_date " data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
					                                                <input class="form-control input-height" name="dateofbirth" value="26/06/1987" placeholder="date of birth" size="16" type="text" >
					                                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					                                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					                                            </div>
			                                            		<input type="hidden" id="dtp_input5" value="" />
			                                                </div>
			                                            </div>
			                                            <div class="form-group">
			                                                <label class="control-label col-md-3">Gender
			                                                    <span class="required"> * </span>
			                                                </label>
			                                                <div class="col-md-5">
			                                                    <select class="form-control input-height" name="select">
			                                                        <option value="">Select...</option>
			                                                        <option value="Category 1">Male</option>
			                                                        <option selected="selected" value="Category 2">Female</option>
			                                                    </select>
			                                                </div>
			                                            </div>
			                                            <div class="form-group">
                                                            <label class="control-label col-md-3">Speciality
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control input-height" value="Gynaecology" placeholder="speciality" name="speciality" />
                                                            </div>
                                                        </div>
                                        				<div class="form-group">
			                                                <label class="control-label col-md-3">Phone
			                                                    <span class="required"> * </span>
			                                                </label>
			                                                <div class="col-md-5">
			                                                    <input name="phone" type="text" class="form-control input-height" value="12345678" placeholder="phone" /> </div>
			                                            </div>
			                                            <div class="form-group">
                                                            <label class="control-label col-md-3">Email
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control input-height" value="kiran@gmail.com" placeholder="enter your email" name="email" />
                                                            </div>
                                                        </div>
			                                            <div class="form-group">
			                                                <label class="control-label col-md-3">Address
			                                                    <span class="required"> * </span>
			                                                </label>
			                                                <div class="col-md-5">
			                                                    <textarea name="address"  class="form-control-textarea" placeholder=" address" rows="5" > 602,Sardar nagar, gandhi road, Ahmedabad</textarea>
			                                                </div>
			                                            </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Upload Photo
                                                            </label>
                                                            <div class="col-md-5">
                                                                <div id="id_dropzone" class="dropzone"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab2">
                                                        <h3 class="block">Provide your profile details</h3>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Username
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control input-height" value="kiranpatel" placeholder="username" name="username" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Password
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="password" class="form-control input-height" name="password" placeholder="password" id="submit_form_password" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Confirm Password
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="password" class="form-control input-height" placeholder="confirm password" name="rpassword" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab3">
                                                        <h3 class="block">Provide your social details</h3>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Facebook
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control input-height" value="http://www.facebook.com/username" placeholder="facebook" name="fb" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Twitter
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control input-height" value="http://www.twitter.com/username" placeholder="twitter" name="twitter" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Google Plus
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control input-height" value="http://www.plus.google.com/username" placeholder="google plus" name="gplus" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">LinkedIn
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control input-height" value="http://www.linkedin.com/username" placeholder="linkedin" name="linkedin" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Instagram
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control input-height" value="http://www.instagram.com/username" placeholder="instagram" name="insta" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tablast">
                                                        <h3 class="block">Verify your details</h3>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Name:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="doctorname"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Email:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="email"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Speciality:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="speciality"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Email:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="email"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Address:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="address"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Phone:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="phone"> </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <a href="javascript:;" class="btn btn-outline green-bgcolor  button-previous">
                                                            <i class="fa fa-angle-left"></i> Previous </a>
                                                        <a href="javascript:;" class="btn btn-outline green-bgcolor button-next"> Next
                                                                <i class="fa fa-angle-right"></i>
                                                            </a>
                                                        <a href="javascript:;" class="btn btn-outline green-bgcolor button-submit"> Finish
                                                                <i class="fa fa-check"></i>
                                                            </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page content -->
            <!-- start chat sidebar -->
            <div class="chat-sidebar-container" data-close-on-body-click="false">
                <div class="chat-sidebar">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
                                    <span class="badge badge-danger">4</span>
                                </a>
                        </li>
                        <li>
                            <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-settings"></i> Settings
                            </a>
                        </li>
                    </ul>
                    
                    <div class="tab-content">
                        <!-- Start Doctor Chat --> 
 						<div class="tab-pane active chat-sidebar-chat" id="quick_sidebar_tab_1">
                        	<div class="chat-sidebar-list">
	                            <div class="chat-sidebar-chat-users slimscroll-style" data-rail-color="#ddd" data-wrapper-class="chat-sidebar-list">
	                                <h3 class="list-heading">Online</h3>
	                                <ul class="media-list list-items">
	                                    <li class="media"><img class="media-object" src="img/doc/doc3.svg" width="35" height="35" alt="...">
	                                        <i class="online dot"></i>
	                                        <div class="media-body">
	                                            <h4 class="media-heading">John Deo</h4>
	                                            <div class="media-heading-sub">Spine Surgeon</div>
	                                        </div>
	                                    </li>
	                                    <li class="media">
	                                        <div class="media-status">
	                                            <span class="badge badge-success">5</span>
	                                        </div> <img class="media-object" src="img/doc/doc1.svg" width="35" height="35" alt="...">
	                                        <i class="busy dot"></i>
	                                        <div class="media-body">
	                                            <h4 class="media-heading">Rajesh</h4>
	                                            <div class="media-heading-sub">Director</div>
	                                        </div>
	                                    </li>
	                                    <li class="media"><img class="media-object" src="img/doc/doc5.svg" width="35" height="35" alt="...">
	                                        <i class="away dot"></i>
	                                        <div class="media-body">
	                                            <h4 class="media-heading">Jacob Ryan</h4>
	                                            <div class="media-heading-sub">Ortho Surgeon</div>
	                                        </div>
	                                    </li>
	                                    <li class="media">
	                                        <div class="media-status">
	                                            <span class="badge badge-danger">8</span>
	                                        </div> <img class="media-object" src="img/doc/doc4.svg" width="35" height="35" alt="...">
	                                        <i class="online dot"></i>
	                                        <div class="media-body">
	                                            <h4 class="media-heading">Kehn Anderson</h4>
	                                            <div class="media-heading-sub">CEO</div>
	                                        </div>
	                                    </li>
	                                    <li class="media"><img class="media-object" src="img/doc/doc2.svg" width="35" height="35" alt="...">
	                                        <i class="busy dot"></i>
	                                        <div class="media-body">
	                                            <h4 class="media-heading">Sarah Smith</h4>
	                                            <div class="media-heading-sub">Anaesthetics</div>
	                                        </div>
	                                    </li>
	                                    <li class="media"><img class="media-object" src="img/doc/doc7.svg" width="35" height="35" alt="...">
	                                        <i class="online dot"></i>
	                                        <div class="media-body">
	                                            <h4 class="media-heading">Vlad Cardella</h4>
	                                            <div class="media-heading-sub">Cardiologist</div>
	                                        </div>
	                                    </li>
	                                </ul>
	                                <h3 class="list-heading">Offline</h3>
	                                <ul class="media-list list-items">
	                                    <li class="media">
	                                        <div class="media-status">
	                                            <span class="badge badge-warning">4</span>
	                                        </div> <img class="media-object" src="img/doc/doc6.svg" width="35" height="35" alt="...">
	                                        <i class="offline dot"></i>
	                                        <div class="media-body">
	                                            <h4 class="media-heading">Jennifer Maklen</h4>
	                                            <div class="media-heading-sub">Nurse</div>
	                                            <div class="media-heading-small">Last seen 01:20 AM</div>
	                                        </div>
	                                    </li>
	                                    <li class="media"><img class="media-object" src="img/doc/doc8.svg" width="35" height="35" alt="...">
	                                        <i class="offline dot"></i>
	                                        <div class="media-body">
	                                            <h4 class="media-heading">Lina Smith</h4>
	                                            <div class="media-heading-sub">Ortho Surgeon</div>
	                                            <div class="media-heading-small">Last seen 11:14 PM</div>
	                                        </div>
	                                    </li>
	                                    <li class="media">
	                                        <div class="media-status">
	                                            <span class="badge badge-success">9</span>
	                                        </div> <img class="media-object" src="img/doc/doc9.svg" width="35" height="35" alt="...">
	                                        <i class="offline dot"></i>
	                                        <div class="media-body">
	                                            <h4 class="media-heading">Jeff Adam</h4>
	                                            <div class="media-heading-sub">Compounder</div>
	                                            <div class="media-heading-small">Last seen 3:31 PM</div>
	                                        </div>
	                                    </li>
	                                    <li class="media"><img class="media-object" src="img/doc/doc10.svg" width="35" height="35" alt="...">
	                                        <i class="offline dot"></i>
	                                        <div class="media-body">
	                                            <h4 class="media-heading">Anjelina Cardella</h4>
	                                            <div class="media-heading-sub">Physiotherapist</div>
	                                            <div class="media-heading-small">Last seen 7:45 PM</div>
	                                        </div>
	                                    </li>
	                                </ul>
	                            </div>
                            </div>
                            <div class="chat-sidebar-item">
                                <div class="chat-sidebar-chat-user">
                                    <div class="page-quick-sidemenu">
                                        <a href="javascript:;" class="chat-sidebar-back-to-list">
                                            <i class="fa fa-angle-double-left"></i>Back
                                        </a>
                                    </div>
                                    <div class="chat-sidebar-chat-user-messages">
                                        <div class="post out">
                                            <img class="avatar" alt="" src="img/dp.svg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Kiran Patel</a> <span class="datetime">9:10</span>
                                                <span class="body-out"> could you send me menu icons ? </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="img/doc/doc5.svg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Jacob Ryan</a> <span class="datetime">9:10</span>
                                                <span class="body"> please give me 10 minutes. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="img/dp.svg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Kiran Patel</a> <span class="datetime">9:11</span>
                                                <span class="body-out"> ok fine :) </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="img/doc/doc5.svg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Jacob Ryan</a> <span class="datetime">9:22</span>
                                                <span class="body">Sorry for
													the delay. i sent mail to you. let me know if it is ok or not.</span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="img/dp.svg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Kiran Patel</a> <span class="datetime">9:26</span>
                                                <span class="body-out"> it is perfect! :) </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="img/dp.svg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Kiran Patel</a> <span class="datetime">9:26</span>
                                                <span class="body-out"> Great! Thanks. </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="img/doc/doc5.svg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Jacob Ryan</a> <span class="datetime">9:27</span>
                                                <span class="body"> it is my pleasure :) </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-sidebar-chat-user-form">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Type a message here...">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn green-bgcolor">
                                                    <i class="fa fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Doctor Chat --> 
 						<!-- Start Setting Panel --> 
 						<div class="tab-pane chat-sidebar-settings" id="quick_sidebar_tab_3">
                            <div class="chat-sidebar-settings-list">
                                <h3 class="list-heading">Layout Settings</h3>
	                            <div class="chatpane inner-content ">
	                            	<ul class="list-items borderless theme-options">
                                        <li class="theme-option layout-setting"><span>Sidebar
												Position </span>
                                            <select class="sidebar-pos-option form-control input-inline input-sm input-small ">
                                                <option value="left" selected="selected">Left</option>
                                                <option value="right">Right</option>
                                            </select>
                                        </li>
                                        <li class="theme-option layout-setting"><span>Header</span>
                                            <select class="page-header-option form-control input-inline input-sm input-small ">
                                                <option value="fixed" selected="selected">Fixed</option>
                                                <option value="default">Default</option>
                                            </select>
                                        </li>
                                        <li class="theme-option layout-setting"><span>Sidebar Menu </span>
                                            <select class="sidebar-menu-option form-control input-inline input-sm input-small ">
                                                <option value="accordion" selected="selected">Accordion</option>
                                                <option value="hover">Hover</option>
                                            </select>
                                        </li>
                                        <li class="theme-option layout-setting"><span>Footer</span>
                                            <select class="page-footer-option form-control input-inline input-sm input-small ">
                                                <option value="fixed">Fixed</option>
                                                <option value="default" selected="selected">Default</option>
                                            </select>
                                        </li>
									</ul>
									<h3 class="list-heading">Account Settings</h3>
									<ul class="list-items borderless theme-options">
                                        <li>Show me Online
                                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                        </li>
                                        <li>Status visible to all
                                            <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                        </li>
                                        <li>Everyone will see my stuff
                                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                        </li>
                                        <li>Auto Sumbit Issues
                                            <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                        </li>
                                        <li>Save History
                                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                        </li>
									</ul>
                                    <h3 class="list-heading">General Settings</h3>
                                    <ul class="list-items borderless">
                                        <li>Enable Notifications
                                            <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                        </li>
                                        <li>Enable SMS Alerts
                                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                        </li>
                                        <li>Location
                                            <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                        </li>
                                        <li>Show Offline Users
                                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                        </li>
                                    </ul>
	                        	</div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->
        <?php include ("footer.php"); ?>