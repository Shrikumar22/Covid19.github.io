<?php
	session_start();
	?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>COVID-19 Statistics For India</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
		<!-- JQVMap -->
		<link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="dist/css/adminlte.min.css">
		<!-- overlayScrollbars -->
		<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
		<!-- DataTables -->
		<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
		<!-- Google Font: Source Sans Pro -->
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
		<script src="go.js"></script>
	</head>
	<body class="hold-transition layout-top-nav">
		<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
			<div class="container">
				<img src="dist/img/covid.png" class="brand-image img-circle elevation-3"
					style="opacity: .8">
				<h4><span class="brand-text font-weight-light">	&nbsp; COVID-19 Statistics - INDIA</span></h4>
				<!-- Right navbar links -->
				<ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
					<li class="nav-item">
						<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
							class="fas fa-th-large"></i></a>
					</li>
				</ul>
			</div>
		</nav>
		<!-- /.navbar -->
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container">
					<div class="row mb-2">
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-left">
							</ol>
						</div>
						<!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-xl">
								Date Wise Statistics
								</button>
							</ol>
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
				</div>
				<!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->
			<?php
					
				$data = file_get_contents('https://api.covid19india.org/data.json');
				$yday = json_decode($data, true);
				// $inputdate = '04 April';
				$ydttm="";
				$yrec=0;
				$ydea=0;
				$ycon=0;

				$ycount = count($yday['cases_time_series']);
				//echo $inputdate;
				//echo $daywise['cases_time_series'][0]['date'];
				
				$i=$ycount-1;

				$ydttm=date("d/m", strtotime($yday['cases_time_series'][$i]['date']))."/2020";
				$yrec=array_sum(array($yday['cases_time_series'][$i]['dailyrecovered'])) ;
				$ydea=array_sum(array($yday['cases_time_series'][$i]['dailydeceased'])) ;
				$ycon=array_sum(array($yday['cases_time_series'][$i]['dailyconfirmed'])) ;

/////////////////////////////////////////////////////////////////////////////////////////////////////

				$coranalive = json_decode($data, true);
				
				$statescount = count($coranalive['statewise']);               

				$i=0;
				  $dttm=$coranalive['statewise'][$i]['lastupdatedtime'];			   
				  $ttcon=array_sum(array($coranalive['statewise'][$i]['confirmed']));
				  $ttact=array_sum(array($coranalive['statewise'][$i]['active']));
				  $ttrec=array_sum(array($coranalive['statewise'][$i]['recovered']));
				  $ttdea=array_sum(array($coranalive['statewise'][$i]['deaths']));
				  $dlttcon=array_sum(array($coranalive['statewise'][$i]['deltaconfirmed']));
				  $dlttact=array_sum(array($coranalive['statewise'][$i]['active']));
				  $dlttrec=array_sum(array($coranalive['statewise'][$i]['deltarecovered']));
				  $dlttdea=array_sum(array($coranalive['statewise'][$i]['deltadeaths']));
				?>
			<!-- Main content -->
			<div class="content">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="card card-primary card-outline">
								<div class="card-header">
									<h5 class="card-title m-0">Cumlative Statistics <SMALL>(As on <?php echo $dttm ?>)</SMALL></h5>
								</div>
								<div class="card-body">
									<div>
										<div class="row">
											<div class="col-12 col-sm-6 col-md-3">
												<div class="info-box">
													<span class="info-box-icon bg-warning elevation-1"><i class="far fa-star"></i></span>
													<div class="info-box-content">
														<span class="info-box-text">CONFIRMED</span>
														<span class="info-box-number"><?php echo $ttcon ?></span>
													</div>
													<!-- /.info-box-content -->
												</div>
												<!-- /.info-box -->
											</div>
											<!-- /.col -->
											<div class="col-12 col-sm-6 col-md-3">
												<div class="info-box mb-3">
													<span class="info-box-icon bg-info elevation-1"><i class="far fa-star"></i></span>
													<div class="info-box-content">
														<span class="info-box-text">ACTIVE</span>
														<span class="info-box-number"><?php echo $ttact ?></span>
													</div>
													<!-- /.info-box-content -->
												</div>
												<!-- /.info-box -->
											</div>
											<!-- /.col -->
											<!-- fix for small devices only -->
											<div class="clearfix hidden-md-up"></div>
											<div class="col-12 col-sm-6 col-md-3">
												<div class="info-box mb-3">
													<span class="info-box-icon bg-success elevation-1"><i class="far fa-star"></i></span>
													<div class="info-box-content">
														<span class="info-box-text">RECOVERED</span>
														<span class="info-box-number"><?php echo $ttrec ?></span>
													</div>
													<!-- /.info-box-content -->
												</div>
												<!-- /.info-box -->
											</div>
											<!-- /.col -->
											<div class="col-12 col-sm-6 col-md-3">
												<div class="info-box mb-3">
													<span class="info-box-icon bg-danger elevation-1"><i class="far fa-star"></i></span>
													<div class="info-box-content">
														<span class="info-box-text">DECEASED</span>
														<span class="info-box-number"><?php echo $ttdea ?></span>
													</div>
													<!-- /.info-box-content -->
												</div>
												<!-- /.info-box -->
											</div>
											<!-- /.col -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="card card-primary card-outline">
								<div class="card-header">
									<h5 class="card-title m-0">Today's Statistics <SMALL>(<?php echo substr($dttm,0,10) ?>)</SMALL></h5>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-lg-3 col-6">
											<!-- small box -->
											<div class="small-box bg-warning">
												<div class="inner">
													<h3><?php echo $dlttcon ?></h3>
													<p>CONFIRMED</p>
												</div>
											</div>
										</div>
										<!-- ./col -->
										<div class="col-lg-3 col-6">
											<!-- small box -->
											<div class="small-box bg-info">
												<div class="inner">
													<h3>- - - - -</h3>
													<p>ACTIVE</p>
												</div>
											</div>
										</div>
										<!-- ./col -->
										<div class="col-lg-3 col-6">
											<!-- small box -->
											<div class="small-box bg-success">
												<div class="inner">
													<h3><?php echo $dlttrec ?></h3>
													<p>RECOVERED</p>
												</div>
											</div>
										</div>
										<!-- ./col -->
										<div class="col-lg-3 col-6">
											<!-- small box -->
											<div class="small-box bg-danger">
												<div class="inner">
													<h3><?php echo $dlttdea ?></h3>
													<p>DECEASED</p>
												</div>
											</div>
										</div>
										<!-- ./col -->
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card card-primary card-outline">
								<div class="card-header">
									<h5 class="card-title m-0">Yesterday's Statistics <SMALL>(<?php echo substr($ydttm,0,10) ?>)</SMALL></h5>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-lg-3 col-6">
											<!-- small box -->
											<div class="small-box bg-warning">
												<div class="inner">
													<h3><?php echo $ycon ?></h3>
													<p>CONFIRMED</p>
												</div>
											</div>
										</div>
										<!-- ./col -->
										<div class="col-lg-3 col-6">
											<!-- small box -->
											<div class="small-box bg-info">
												<div class="inner">
													<h3>- - - - -</h3>
													<p>ACTIVE</p>
												</div>
											</div>
										</div>
										<!-- ./col -->
										<div class="col-lg-3 col-6">
											<!-- small box -->
											<div class="small-box bg-success">
												<div class="inner">
													<h3><?php echo $yrec ?></h3>
													<p>RECOVERED</p>
												</div>
											</div>
										</div>
										<!-- ./col -->
										<div class="col-lg-3 col-6">
											<!-- small box -->
											<div class="small-box bg-danger">
												<div class="inner">
													<h3><?php echo $ydea ?></h3>
													<p>DECEASED</p>
												</div>
											</div>
										</div>
										<!-- ./col -->
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card card-primary card-outline">
								<div class="card-header">
									<h5 class="card-title m-0">STATEWISE STATISTICS</h5>
								</div>
								<div class="card-body">
									<div class="card-body table-responsive p-0">
										<table id="example1" class="table table-bordered table-striped table-head-fixed text-nowrap">
											<a class="text-warning"><i class="fas fa-square"></i>&nbsp;CONFIRMED&nbsp;&nbsp;&nbsp;&nbsp;</a>
											<a class="text-primary"><i class="fas fa-square"></i>&nbsp;ACTIVE&nbsp;&nbsp;&nbsp;&nbsp;</a>
											<a class="text-success"><i class="fas fa-square"></i>&nbsp;RECOVERED&nbsp;&nbsp;&nbsp;&nbsp;</a>
											<a class="text-danger"><i class="fas fa-square"></i>&nbsp;DECEASED</a>
											<thead>
												<tr>
													<th class="bg-secondary">
														<center> STATE/UT </center>
													</th>
													<th class="bg-warning">
														<center> CONFIRMED</center>
													</th>
													<th class="bg-info">
														<center> ACTIVE</center>
													</th>
													<th class="bg-success">
														<center> RECOVERED</center>
													</th>
													<th class="bg-danger">
														<center> DECEASED</center>
													</th>
													<th class="bg-secondary">
														<center> LAST CASE FOUND</center>
													</th>
													<th class="bg-secondary">
													</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$i=1;
													while($i < $statescount){
													
													 // $CON=array_sum(array($coranalive['statewise'][$i]['confirmed']));
													
													$con=array_sum(array($coranalive['statewise'][$i]['confirmed']));
													$act=array_sum(array($coranalive['statewise'][$i]['active']));
													$rec=array_sum(array($coranalive['statewise'][$i]['recovered']));
													$dea=array_sum(array($coranalive['statewise'][$i]['deaths']));
													$tocon=array_sum(array($coranalive['statewise'][$i]['deltaconfirmed']));
													$toact=array_sum(array($coranalive['statewise'][$i]['active']));
													$torec=array_sum(array($coranalive['statewise'][$i]['deltarecovered']));
													$todea=array_sum(array($coranalive['statewise'][$i]['deltadeaths']));
													
													
													?>
												<tr>
													<td ><?php echo $coranalive['statewise'][$i]['state'] ?></td>
													<td align="right">
														<?php
															if ($coranalive['statewise'][$i]['deltaconfirmed'] > "0") {
																//echo '<small class="text-success mr-1">';
																echo '<span class="badge bg-warning"><i class="fas fa-arrow-up">&nbsp;</i>' ;
																echo $coranalive['statewise'][$i]['deltaconfirmed'];
																echo '</span>';
																//echo '</small>';
															}
															?>
														<?php echo $coranalive['statewise'][$i]['confirmed'] ?>
													</td>
													<td align="right">
														<?php echo $coranalive['statewise'][$i]['active'] ?>
													</td>
													<td align="right">
														<?php
															if ($coranalive['statewise'][$i]['deltarecovered'] > "0") {
																echo '<span class="badge bg-success"><i class="fas fa-arrow-up">&nbsp;</i>' ;
																echo $coranalive['statewise'][$i]['deltarecovered'];
																echo '</span>';
															}
															?>
														<?php echo $coranalive['statewise'][$i]['recovered'] ?>
													</td>
													<td align="right">
														<?php
															if ($coranalive['statewise'][$i]['deltadeaths'] > "0") {
																echo '<span class="badge bg-danger"><i class="fas fa-arrow-up">&nbsp;</i>' ;
																echo $coranalive['statewise'][$i]['deltadeaths'];
																echo '</span>';
															}
															?>
														<?php echo $coranalive['statewise'][$i]['deaths'] ?>
													</td>
													<td><?php echo substr($coranalive['statewise'][$i]['lastupdatedtime'],0,10) ?></td>
													<td><a  type="button" class="theButton"  onclick="myFunction()"  data-toggle="modal" data-target="#modal-default"><span class="badge bg-navy">VIEW</span></a></td>
												</tr>
												<?php
													$i++;
													}
													?>
											</tbody>
											<tfoot>
												<tr>
													<td class="bg-secondary">TOTAL</td>
													<td class="bg-secondary" align="right" >
														<?php
															if ($dlttcon > "0") {
																echo '<span class="badge bg-warning"><i class="fas fa-arrow-up">&nbsp;</i>' ;
																echo $dlttcon;
																echo '</span>';
															}
															?>
														<?php echo $ttcon ?>
													</td>
													<td class="bg-secondary" align="right">
														<?php echo $ttact ?>
													</td>
													<td class="bg-secondary" align="right" >
														<?php
															if ($dlttrec > "0") {
																echo '<span class="badge bg-success"><i class="fas fa-arrow-up">&nbsp;</i>' ;
																echo $dlttrec;
																echo '</span>';
															}
															?>
														<?php echo $ttrec ?>
													</td>
													<td class="bg-secondary" align="right" >
														<?php
															if ($dlttdea > "0") {
																echo '<span class="badge bg-danger"><i class="fas fa-arrow-up">&nbsp;</i>' ;
																echo $dlttdea;
																echo '</span>';
															}
															?>
														<?php echo $ttdea ?>
													</td>
													<td class="bg-secondary" colspan="2"> </td>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
							</div>
						</div>
						<!-- /.row -->
					</div>
					<!-- /.container-fluid -->
				</div>
				<div class="modal fade" id="modal-xl">
					<div class="modal-dialog modal-xl">
						<div class="modal-content">
							<form id="myform" method="post">
								<div class="modal-header">
									<div class="card-body">
										<div class="form-group row">
											<label class="col-form-label">Select Date</label>
											<div class="col-sm-1">
												<select class="custom-select" id="inputdate" name="inputdate">
													<option value="0">DD</option>
													<option value="01">01</option>
													<option value="02">02</option>
													<option value="03">03</option>
													<option value="04">04</option>
													<option value="05">05</option>
													<option value="06">06</option>
													<option value="07">07</option>
													<option value="08">08</option>
													<option value="09">09</option>
													<option value="10">10</option>
													<option value="11">11</option>
													<option value="12">12</option>
													<option value="13">13</option>
													<option value="14">14</option>
													<option value="15">15</option>
													<option value="16">16</option>
													<option value="17">17</option>
													<option value="18">18</option>
													<option value="19">19</option>
													<option value="20">20</option>
													<option value="21">21</option>
													<option value="22">22</option>
													<option value="23">23</option>
													<option value="24">24</option>
													<option value="25">25</option>
													<option value="26">26</option>
													<option value="27">27</option>
													<option value="28">28</option>
													<option value="29">29</option>
													<option value="30">30</option>
												</select>
											</div>
											<div class="col-sm-2">
												<select class="custom-select" id="inputmonth" name="inputmonth">
													<option value="">MMM</option>
													<option value="January ">January</option>
													<option value="February ">February</option>
													<option value="March ">March</option>
													<option value="April " >April</option>
													<option value="May " >May</option>
													<!-- <option value="May ">May</option>
														<option value="June ">June</option>
														<option value="July ">July</option>
														<option value="August ">August</option>
														<option value="September ">September</option>
														<option value="October ">October</option>
														<option value="November ">November</option>
														<option value="December ">December</option> -->
												</select>
											</div>
											<div class="col-sm-1">
												<button type="button" class="btn btn-info btn-flat" id="submitFormData" onclick="SubmitFormData();" value="Submit">Go</button> 
											</div>
										</div>
									</div>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
									<!--<p id="results"></p>-->
								</div>
								<div class="modal-body">
									<p id="results"></p>
								</div>
							</form>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<div class="modal fade" id="modal-default">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title"></h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<p id="showresult"></p>
							</div>
							<div class="modal-footer justify-content-between">
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
			</div>
			<!-- /.content-wrapper -->
			<!-- Main Footer -->
			<footer class="main-footer">
				<!-- To the right -->
				<div class="float-right d-none d-sm-inline">------------------</div>
				<!-- Default to the left -->
				<strong>Data Source - <a href="https://api.covid19india.org/">www.covid19india.org</a>.</strong> 
			</footer>
		</div>
		<!-- ./wrapper -->
		<!-- REQUIRED SCRIPTS -->
		<!-- jQuery -->
		<script src="plugins/jquery/jquery.min.js"></script>
		<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="dist/js/adminlte.min.js"></script>
		<script src="plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
		<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
		<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
		<script>
			function myFunction() {
			
				$('body').on('click', 'a.theButton', function(e) {
				var txt;
				e.preventDefault();
				stateval = $(this).parent().prev().prev().prev().prev().prev().prev().text();
				/*alert(stateval); */
				
				$.post("getstate.php", { stateval: stateval },
				function(data) {
				 $('#showresult').html(data);
				 $('#myForm')[0].reset();
				});
			})
				
			         };
			      
		</script>
		<script>
			$(function () {
			  $("#example1").DataTable({
			    "responsive": true,
			    "autoWidth": false,
			  });
			  $('#example2').DataTable({
			    "paging": true,
			    "lengthChange": false,
			    "searching": false,
			    "ordering": true,
			    "info": true,
			    "autoWidth": false,
			    "responsive": true,
			  });
			});
		</script>
	</body>
</html>