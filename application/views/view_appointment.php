
		<?php include ("header.php"); ?>

			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Order List</div>
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
                                                <button id="addRow" class="btn btn-info">
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
                                            	<th></th>
                                                <th> Name </th>
                                                <th> Email </th>
                                                <th> Date Of Appointment </th>
                                                <th> From </th>
                                                <th> To </th>
                                                <th> Mobile </th>
                                                <th> Consulting Doctor </th>
                                                <th>Injury/Condition</th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<tr class="odd gradeX">
												<td class="patient-img">
														<img src="img/user/user6.svg" alt="">
												</td>
												<td>Jenish shah</td>
												<td><a href="mailto:shuxer@gmail.com">
														jenish@gmail.com </a></td>
												<td class="center">12 Jan 2012</td>
												<td class="center">07:15</td>
												<td class="center">07:30</td>
												<td><a href="tel:444543564">
														444543564 </a></td>
												<td>Dr.Rajesh</td>
												<td>Fever</td>
												<td>
													<button class="btn btn-primary btn-xs">
														<i class="fa fa-pencil"></i>
													</button>
													<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
													</button>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="patient-img">
														<img src="img/user/user1.svg" alt="">
												</td>
												<td>Pankaj Singh</td>
												<td><a href="mailto:shuxer@gmail.com">
														jenish@gmail.com </a></td>
												<td class="center">12 Jan 2012</td>
												<td class="center">07:45</td>
												<td class="center">08:00</td>
												<td><a href="tel:444543564">
														444543564 </a></td>
												<td>Dr.Sarah Smith</td>
												<td>Malaria</td>
												<td>
													<button class="btn btn-primary btn-xs">
														<i class="fa fa-pencil"></i>
													</button>
													<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
													</button>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="patient-img">
														<img src="img/user/user2.svg" alt="">
												</td>
												<td>Jenish shah</td>
												<td><a href="mailto:shuxer@gmail.com">
														jenish@gmail.com </a></td>
												<td class="center">12 Jan 2012</td>
												<td class="center">08:15</td>
												<td class="center">08:30</td>
												<td><a href="tel:444543564">
														444543564 </a></td>
												<td>Dr.Rajesh</td>
												<td>Fever</td>
												<td>
													<button class="btn btn-primary btn-xs">
														<i class="fa fa-pencil"></i>
													</button>
													<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
													</button>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="patient-img">
														<img src="img/user/user3.svg" alt="">
												</td>
												<td>Pankaj Singh</td>
												<td><a href="mailto:shuxer@gmail.com">
														jenish@gmail.com </a></td>
												<td class="center">12 Jan 2012</td>
												<td class="center">08:45</td>
												<td class="center">08:00</td>
												<td><a href="tel:444543564">
														444543564 </a></td>
												<td>Dr.Sarah Smith</td>
												<td>Malaria</td>
												<td>
													<button class="btn btn-primary btn-xs">
														<i class="fa fa-pencil"></i>
													</button>
													<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
													</button>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="patient-img">
														<img src="img/user/user4.svg" alt="">
												</td>
												<td>Jenish shah</td>
												<td><a href="mailto:shuxer@gmail.com">
														jenish@gmail.com </a></td>
												<td class="center">12 Jan 2012</td>
												<td class="center">09:00</td>
												<td class="center">09:15</td>
												<td><a href="tel:444543564">
														444543564 </a></td>
												<td>Dr.Rajesh</td>
												<td>Fever</td>
												<td>
													<button class="btn btn-primary btn-xs">
														<i class="fa fa-pencil"></i>
													</button>
													<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
													</button>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="patient-img">
														<img src="img/user/user6.svg" alt="">
												</td>
												<td>Pankaj Singh</td>
												<td><a href="mailto:shuxer@gmail.com">
														jenish@gmail.com </a></td>
												<td class="center">12 Jan 2012</td>
												<td class="center">09:30</td>
												<td class="center">09:45</td>
												<td><a href="tel:444543564">
														444543564 </a></td>
												<td>Dr.Sarah Smith</td>
												<td>Malaria</td>
												<td>
													<button class="btn btn-primary btn-xs">
														<i class="fa fa-pencil"></i>
													</button>
													<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
													</button>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="patient-img">
														<img src="img/user/user5.svg" alt="">
												</td>
												<td>Jenish shah</td>
												<td><a href="mailto:shuxer@gmail.com">
														jenish@gmail.com </a></td>
												<td class="center">12 Jan 2012</td>
												<td class="center">09:45</td>
												<td class="center">10:00</td>
												<td><a href="tel:444543564">
														444543564 </a></td>
												<td>Dr.Rajesh</td>
												<td>Cholera</td>
												<td>
													<button class="btn btn-primary btn-xs">
														<i class="fa fa-pencil"></i>
													</button>
													<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
													</button>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="patient-img">
														<img src="img/user/user8.svg" alt="">
												</td>
												<td>Pankaj Singh</td>
												<td><a href="mailto:shuxer@gmail.com">
														jenish@gmail.com </a></td>
												<td class="center">12 Jan 2012</td>
												<td class="center">10:15</td>
												<td class="center">10:30</td>
												<td><a href="tel:444543564">
														444543564 </a></td>
												<td>Dr.Rajesh</td>
												<td>Fever</td>
												<td>
													<button class="btn btn-primary btn-xs">
														<i class="fa fa-pencil"></i>
													</button>
													<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
													</button>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="patient-img">
														<img src="img/user/user7.svg" alt="">
												</td>
												<td>Jenish shah</td>
												<td><a href="mailto:shuxer@gmail.com">
														jenish@gmail.com </a></td>
												<td class="center">12 Jan 2012</td>
												<td class="center">11:15</td>
												<td class="center">11:30</td>
												<td><a href="tel:444543564">
														444543564 </a></td>
												<td>Dr.Rajesh</td>
												<td>Malaria</td>
												<td>
													<button class="btn btn-primary btn-xs">
														<i class="fa fa-pencil"></i>
													</button>
													<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
													</button>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="patient-img">
														<img src="img/user/user9.svg" alt="">
												</td>
												<td>Pankaj Singh</td>
												<td><a href="mailto:shuxer@gmail.com">
														jenish@gmail.com </a></td>
												<td class="center">12 Jan 2012</td>
												<td class="center">07:15</td>
												<td class="center">07:30</td>
												<td><a href="tel:444543564">
														444543564 </a></td>
												<td>Dr.Rajesh</td>
												<td>Fever</td>
												<td>
													<button class="btn btn-primary btn-xs">
														<i class="fa fa-pencil"></i>
													</button>
													<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
													</button>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="patient-img">
														<img src="img/user/user6.svg" alt="">
												</td>
												<td>Pankaj Singh</td>
												<td><a href="mailto:shuxer@gmail.com">
														jenish@gmail.com </a></td>
												<td class="center">12 Jan 2012</td>
												<td class="center">07:15</td>
												<td class="center">07:30</td>
												<td><a href="tel:444543564">
														444543564 </a></td>
												<td>Dr.Jay Soni</td>
												<td>Cholera</td>
												<td>
													<button class="btn btn-primary btn-xs">
														<i class="fa fa-pencil"></i>
													</button>
													<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
													</button>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="patient-img">
														<img src="img/user/user2.svg" alt="">
												</td>
												<td>Jenish shah</td>
												<td><a href="mailto:shuxer@gmail.com">
														jenish@gmail.com </a></td>
												<td class="center">12 Jan 2012</td>
												<td class="center">07:15</td>
												<td class="center">07:30</td>
												<td><a href="tel:444543564">
														444543564 </a></td>
												<td>Dr.Rajesh</td>
												<td>Malaria</td>
												<td>
													<button class="btn btn-primary btn-xs">
														<i class="fa fa-pencil"></i>
													</button>
													<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
													</button>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="patient-img">
														<img src="img/user/user3.svg" alt="">
												</td>
												<td>Pankaj Singh</td>
												<td><a href="mailto:shuxer@gmail.com">
														jenish@gmail.com </a></td>
												<td class="center">12 Jan 2012</td>
												<td class="center">07:15</td>
												<td class="center">07:30</td>
												<td><a href="tel:444543564">
														444543564 </a></td>
												<td>Dr.Jay Soni</td>
												<td>Fever</td>
												<td>
													<button class="btn btn-primary btn-xs">
														<i class="fa fa-pencil"></i>
													</button>
													<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
													</button>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="patient-img">
														<img src="img/user/user5.svg" alt="">
												</td>
												<td>Jenish shah</td>
												<td><a href="mailto:shuxer@gmail.com">
														jenish@gmail.com </a></td>
												<td class="center">12 Jan 2012</td>
												<td class="center">07:15</td>
												<td class="center">07:30</td>
												<td><a href="tel:444543564">
														444543564 </a></td>
												<td>Dr.Rajesh</td>
												<td>Cholera</td>
												<td>
													<button class="btn btn-primary btn-xs">
														<i class="fa fa-pencil"></i>
													</button>
													<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
													</button>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="patient-img">
														<img src="img/user/user4.svg" alt="">
												</td>
												<td>Sneha Pandya</td>
												<td><a href="mailto:shuxer@gmail.com">
														jenish@gmail.com </a></td>
												<td class="center">12 Jan 2012</td>
												<td class="center">07:15</td>
												<td class="center">07:30</td>
												<td><a href="tel:444543564">
														444543564 </a></td>
												<td>Dr.Rajesh</td>
												<td>Malaria</td>
												<td>
													<button class="btn btn-primary btn-xs">
														<i class="fa fa-pencil"></i>
													</button>
													<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
													</button>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="patient-img">
														<img src="img/user/user7.svg" alt="">
												</td>
												<td>Jenish shah</td>
												<td><a href="mailto:shuxer@gmail.com">
														jenish@gmail.com </a></td>
												<td class="center">12 Jan 2012</td>
												<td class="center">07:15</td>
												<td class="center">07:30</td>
												<td><a href="tel:444543564">
														444543564 </a></td>
												<td>Dr.Jay Soni</td>
												<td>Fever</td>
												<td>
													<button class="btn btn-primary btn-xs">
														<i class="fa fa-pencil"></i>
													</button>
													<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
													</button>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="patient-img">
														<img src="img/user/user8.svg" alt="">
												</td>
												<td>Sneha Pandya</td>
												<td><a href="mailto:shuxer@gmail.com">
														jenish@gmail.com </a></td>
												<td class="center">12 Jan 2012</td>
												<td class="center">07:15</td>
												<td class="center">07:30</td>
												<td><a href="tel:444543564">
														444543564 </a></td>
												<td>Dr.Rajesh</td>
												<td>Cholera</td>
												<td>
													<button class="btn btn-primary btn-xs">
														<i class="fa fa-pencil"></i>
													</button>
													<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
													</button>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="patient-img">
														<img src="img/user/user9.svg" alt="">
												</td>
												<td>Pooja Patel</td>
												<td><a href="mailto:shuxer@gmail.com">
														jenish@gmail.com </a></td>
												<td class="center">12 Jan 2012</td>
												<td class="center">07:15</td>
												<td class="center">07:30</td>
												<td><a href="tel:444543564">
														444543564 </a></td>
												<td>Dr.Rajesh</td>
												<td>Malaria</td>
												<td>
													<button class="btn btn-primary btn-xs">
														<i class="fa fa-pencil"></i>
													</button>
													<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
													</button>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="patient-img">
														<img src="img/user/user6.svg" alt="">
												</td>
												<td>Jenish shah</td>
												<td><a href="mailto:shuxer@gmail.com">
														jenish@gmail.com </a></td>
												<td class="center">12 Jan 2012</td>
												<td class="center">07:15</td>
												<td class="center">07:30</td>
												<td><a href="tel:444543564">
														444543564 </a></td>
												<td>Dr.Rajesh</td>
												<td>Fever</td>
												<td>
													<button class="btn btn-primary btn-xs">
														<i class="fa fa-pencil"></i>
													</button>
													<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
													</button>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="patient-img">
														<img src="img/user/user2.svg" alt="">
												</td>
												<td>Sneha Pandya</td>
												<td><a href="mailto:shuxer@gmail.com">
														jenish@gmail.com </a></td>
												<td class="center">12 Jan 2012</td>
												<td class="center">07:15</td>
												<td class="center">07:30</td>
												<td><a href="tel:444543564">
														444543564 </a></td>
												<td>Dr.Rajesh</td>
												<td>Cholera</td>
												<td>
													<button class="btn btn-primary btn-xs">
														<i class="fa fa-pencil"></i>
													</button>
													<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
													</button>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="patient-img">
														<img src="img/user/user5.svg" alt="">
												</td>
												<td>Sneha Pandya</td>
												<td><a href="mailto:shuxer@gmail.com">
														jenish@gmail.com </a></td>
												<td class="center">12 Jan 2012</td>
												<td class="center">07:15</td>
												<td class="center">07:30</td>
												<td><a href="tel:444543564">
														444543564 </a></td>
												<td>Dr.Rajesh</td>
												<td>Fever</td>
												<td>
													<button class="btn btn-primary btn-xs">
														<i class="fa fa-pencil"></i>
													</button>
													<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
													</button>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="patient-img">
														<img src="img/user/user7.svg" alt="">
												</td>
												<td>Pooja Patel</td>
												<td><a href="mailto:shuxer@gmail.com">
														jenish@gmail.com </a></td>
												<td class="center">12 Jan 2012</td>
												<td class="center">07:15</td>
												<td class="center">07:30</td>
												<td><a href="tel:444543564">
														444543564 </a></td>
												<td>Dr.Rajesh</td>
												<td>Fever</td>
												<td>
													<button class="btn btn-primary btn-xs">
														<i class="fa fa-pencil"></i>
													</button>
													<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
													</button>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="patient-img">
														<img src="img/user/user4.svg" alt="">
												</td>
												<td>Jenish shah</td>
												<td><a href="mailto:shuxer@gmail.com">
														jenish@gmail.com </a></td>
												<td class="center">12 Jan 2012</td>
												<td class="center">07:15</td>
												<td class="center">07:30</td>
												<td><a href="tel:444543564">
														444543564 </a></td>
												<td>Dr.Rajesh</td>
												<td>Cholera</td>
												<td>
													<button class="btn btn-primary btn-xs">
														<i class="fa fa-pencil"></i>
													</button>
													<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
													</button>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="patient-img">
														<img src="img/user/user9.svg" alt="">
												</td>
												<td>Sneha Pandya</td>
												<td><a href="mailto:shuxer@gmail.com">
														jenish@gmail.com </a></td>
												<td class="center">12 Jan 2012</td>
												<td class="center">07:15</td>
												<td class="center">07:30</td>
												<td><a href="tel:444543564">
														444543564 </a></td>
												<td>Dr.Rajesh</td>
												<td>Fever</td>
												<td>
													<button class="btn btn-primary btn-xs">
														<i class="fa fa-pencil"></i>
													</button>
													<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
													</button>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="patient-img">
														<img src="img/user/user8.svg" alt="">
												</td>
												<td>Pooja Patel</td>
												<td><a href="mailto:shuxer@gmail.com">
														jenish@gmail.com </a></td>
												<td class="center">12 Jan 2012</td>
												<td class="center">07:15</td>
												<td class="center">07:30</td>
												<td><a href="tel:444543564">
														444543564 </a></td>
												<td>Dr.Rajesh</td>
												<td>Cholera</td>
												<td>
													<button class="btn btn-primary btn-xs">
														<i class="fa fa-pencil"></i>
													</button>
													<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
													</button>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="patient-img">
														<img src="img/user/user6.svg" alt="">
												</td>
												<td>Jenish shah</td>
												<td><a href="mailto:shuxer@gmail.com">
														jenish@gmail.com </a></td>
												<td class="center">12 Jan 2012</td>
												<td class="center">07:15</td>
												<td class="center">07:30</td>
												<td><a href="tel:444543564">
														444543564 </a></td>
												<td>Dr.Rajesh</td>
												<td>Fever</td>
												<td>
													<button class="btn btn-primary btn-xs">
														<i class="fa fa-pencil"></i>
													</button>
													<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
													</button>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="patient-img">
														<img src="img/user/user5.svg" alt="">
												</td>
												<td>Sneha Pandya</td>
												<td><a href="mailto:shuxer@gmail.com">
														jenish@gmail.com </a></td>
												<td class="center">12 Jan 2012</td>
												<td class="center">07:15</td>
												<td class="center">07:30</td>
												<td><a href="tel:444543564">
														444543564 </a></td>
												<td>Dr.Rajesh</td>
												<td>Fever</td>
												<td>
													<button class="btn btn-primary btn-xs">
														<i class="fa fa-pencil"></i>
													</button>
													<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
													</button>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="patient-img">
														<img src="img/user/user7.svg" alt="">
												</td>
												<td>Pooja Patel</td>
												<td><a href="mailto:shuxer@gmail.com">
														jenish@gmail.com </a></td>
												<td class="center">12 Jan 2012</td>
												<td class="center">07:15</td>
												<td class="center">07:30</td>
												<td><a href="tel:444543564">
														444543564 </a></td>
												<td>Dr.Rajesh</td>
												<td>Cholera</td>
												<td>
													<button class="btn btn-primary btn-xs">
														<i class="fa fa-pencil"></i>
													</button>
													<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
													</button>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td class="patient-img">
														<img src="img/user/user9.svg" alt="">
												</td>
												<td>Sneha Pandya</td>
												<td><a href="mailto:shuxer@gmail.com">
														jenish@gmail.com </a></td>
												<td class="center">12 Jan 2012</td>
												<td class="center">07:15</td>
												<td class="center">07:30</td>
												<td><a href="tel:444543564">
														444543564 </a></td>
												<td>Dr.Rajesh</td>
												<td>Fever</td>
												<td>
													<button class="btn btn-primary btn-xs">
														<i class="fa fa-pencil"></i>
													</button>
													<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
													</button>
												</td>
											</tr>
										</tbody>
                                    </table>
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