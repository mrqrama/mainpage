<?php ob_start();
session_start();
date_default_timezone_set('Asia/Calcutta');
include "inc/config.php";
include "inc/plugins.php";
if (!isset($_SESSION["supadmin"]))
{
	header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="assets/bundles/weather-icon/css/weather-icons.min.css">
  <link rel="stylesheet" href="assets/bundles/weather-icon/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <?php include "header.php";?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row ">
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-green-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>
                  <div class="card-content">
                    <h4 class="card-title">Total Venue / Party</h4>
                    <span>                  <h5>
					                      <?php
											$decount1=mysqli_query ($con,"select count(id) from venders where vanderstatus='Active'");
											while ($rowdecount1=mysqli_fetch_array($decount1))
											{ echo $rowdecount1[0]; }
											?></h5>
                  </span>
                  
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6"><a href="clients-list-byService.php?services=Paid">
              <div class="card l-bg-cyan-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-briefcase"></i></div>
                  <div class="card-content">
                    <h4 class="card-title">Total Deals/Events</h4>
                    <span>
					   <h5>
					                      <?php
											$decount2=mysqli_query ($con,"select count(id) from dealesevents where vanderstatus='Active'");
											while ($rowdecount2=mysqli_fetch_array($decount2))
											{ echo $rowdecount2[0]; }
											?></h5>
					</span>
                  </div>
                </div>
              </div></a>
            </div>
            <div class="col-xl-3 col-lg-6"><a href="#">
              <div class="card l-bg-purple-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-globe"></i></div>
                  <div class="card-content">
                    <h4 class="card-title">Paid Amount</h4>
                    <span>
				                           											<h5><i class="fas fa-rupee-sign"></i>
					                      <?php
											$decount3=mysqli_query ($con,"select sum(detotalprice) from decart where pstatus='Paid'");
											while ($rowdecount3=mysqli_fetch_array($decount3))
											{ echo $rowdecount3[0]; }
											?></h5>
					 </span>
                  
                  </div>
                </div>
              </div></a>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-orange-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-money-bill-alt"></i></div>
                  <div class="card-content">
                    <h4 class="card-title">Pending Amount</h4>
                    <span>
											<h5><i class="fas fa-rupee-sign"></i>
					                      <?php
											$decount4=mysqli_query ($con,"select sum(detotalprice) from decart where pstatus='Pending'");
											while ($rowdecount4=mysqli_fetch_array($decount4))
											{ echo $rowdecount4[0]; }
											?></h5>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>



          <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>New booking</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table dataTable table-striped">
                      <tr>
                        <th>OrderId</th>
                        <th>Cust User Name</th>
                        <th>Paid( <i class="fa fa-rupee-sign"></i> )</th>
						<th>Pending( <i class="fa fa-rupee-sign"></i> )</th>
                        <th>Total( <i class="fa fa-rupee-sign"></i> )</th>
						<th>Booking</th>
						<th>Payment</th>
                      </tr>
                      <?php $sadded=1;
                      $decartlist=mysqli_query ($con,"select * from decart order by id desc limit 0,10");
                      while ($rowdecartlist=mysqli_fetch_array($decartlist))
                      { ?>
                      <tr>
                        <td><a href="order-add.php?id=<?php echo $rowdecartlist[0];?>&&type=Edit">O_ID: EO-<?php echo $rowdecartlist[0];?><br>P_ID: <?php echo $rowdecartlist[12];?><a/></td>
                        <td><a href="users-add.php?username=<?php echo $rowdecartlist[1]; ?>&&type=Edit"><?php echo $rowdecartlist[1]; ?></a></td>
                        <td><?php echo $rowdecartlist[6]; ?></td>
                        <td><?php echo $rowdecartlist[7]; ?></td>
						<td><span class="badge badge-warning"><?php echo $rowdecartlist[5]; ?></span></td>
						<td><span class="badge badge-primary"><?php echo $rowdecartlist[8]; ?></span></td>
						<td><span class="badge badge-primary"><?php echo $rowdecartlist[13]; ?></span></td>
                      </tr>
                    <?php $sadded++;} ?>

                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

					<div class="row">
						<div class="col-12 col-sm-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<h4>Last Payment Completed</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive table-invoice">
										<table class="table table-striped">
											<tr>
												<th>OrderId</th>
												<th>Cust User Name</th>
												<th>Paid( <i class="fa fa-rupee-sign"></i> )</th>
												<th>Pending( <i class="fa fa-rupee-sign"></i> )</th>
												<th>Total( <i class="fa fa-rupee-sign"></i> )</th>
												<th>Booking</th>
												<th>Payment</th>
											</tr>
											<?php
											$decartlist2=mysqli_query ($con,"select * from decart where pstatus='Paid' order by orderdate desc limit 0,10");
											while ($rowdecartlist2=mysqli_fetch_array($decartlist2))
											{ ?>
											<tr>
												 <td><a href="order-add.php?id=<?php echo $rowdecartlist2[0];?>&&type=Edit">O_ID: EO-<?php echo $rowdecartlist2[0];?><br>P_ID: <?php echo $rowdecartlist2[12];?><a/></td>
                        <td><a href="users-add.php?username=<?php echo $rowdecartlist2[1]; ?>&&type=Edit"><?php echo $rowdecartlist2[1]; ?></a></td>
                        <td><?php echo $rowdecartlist2[6]; ?></td>
                        <td><?php echo $rowdecartlist2[7]; ?></td>
						<td><span class="badge badge-warning"><?php echo $rowdecartlist2[5]; ?></span></td>
						<td><span class="badge badge-primary"><?php echo $rowdecartlist2[8]; ?></span></td>
						<td><span class="badge badge-primary"><?php echo $rowdecartlist2[13]; ?></span></td>
											</tr>
								       <?php } ?>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>


        </section>

      </div>
      <?php include "footer.php";?>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/echart/echarts.js"></script>
  <script src="assets/bundles/chartjs/chart.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
  <script src="assets/bundles/jqvmap/dist/jquery.vmap.min.js"></script>
	<script src="assets/bundles/jqvmap/dist/maps/jquery.vmap.world.js"></script>
	<script src="assets/bundles/jqvmap/dist/maps/jquery.vmap.indonesia.js"></script>
  <script src="assets/js/page/todo.js"></script>
  <script src="assets/js/page/index2.js"></script>
</body>

</html>
