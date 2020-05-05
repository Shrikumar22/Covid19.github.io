<?php
	session_start();
		
	$inpdate = $_POST['inputdate'];
	$inpmonth =  $_POST['inputmonth'];
	$inputddmmm = $inpdate.' '.$inpmonth ;
	//echo $inputddmmm;
	 
	
	$data = file_get_contents('https://api.covid19india.org/data.json');
	$daywise = json_decode($data, true);
	// $inputdate = '04 April';
	$_SESSION["dcon"]=0;
	$_SESSION["drec"]=0;
	$_SESSION["ddea"]=0;
	$_SESSION["tcon"]=0;
	$_SESSION["trec"]=0;
	$_SESSION["tdea"]=0;
	$Yes = "N";
	//echo "<pre>";
	//print_r($daywise);
	
	$totalcount = count($daywise['cases_time_series']);
	//echo $inputdate;
	//echo $daywise['cases_time_series'][0]['date'];
	
	$i=0;
	while($i < $totalcount){
		
	 // $CON=array_sum(array($coranalive['statewise'][$i]['confirmed']));
	  $apidate= $daywise['cases_time_series'][$i]['date'];
	
	  if ($apidate == $inputddmmm) {	
	  //echo 'jj'.$inputddmmm;
	  //echo $daywise['cases_time_series'][$i]['date'] . "<br>"  ;
	  
		  $_SESSION["dcon"]=array_sum(array($daywise['cases_time_series'][$i]['dailyconfirmed'])) ;
		  $_SESSION["drec"]=array_sum(array($daywise['cases_time_series'][$i]['dailyrecovered'])) ;
		  $_SESSION["ddea"]=array_sum(array($daywise['cases_time_series'][$i]['dailydeceased'])) ;
		  $_SESSION["tcon"]=array_sum(array($daywise['cases_time_series'][$i]['totalconfirmed'])) ;
		  $_SESSION["trec"]=array_sum(array($daywise['cases_time_series'][$i]['totalrecovered'])) ;
		  $_SESSION["tdea"]=array_sum(array($daywise['cases_time_series'][$i]['totaldeceased'])) ;
		  //echo $_SESSION["dcon"]. "<br>"  ;
		  //echo $_SESSION["drec"];
		  
	echo '						<div class="row">';
	echo '							  <div class="col-lg-6">';
	echo '								<div class="card card-primary card-outline">';
	echo '								  <div class="card-header">';
	echo '									<h5 class="card-title m-0">Todays Data Of  '.$inputddmmm.' </h5>';
	echo '								  </div>';
	echo '';
	echo '									<div class="card-body">';
	echo '									  <!-- the events -->';
	echo '									  <div id="external-events">';
	echo '										<div class="external-event bg-warning" >';
	echo '										<div class="row"';
	echo '										<div class="col-lg-12">';
	echo '											<div class="col-lg-8" align="left">CONFIRMED</div>';
	echo '											<div class="col-lg-4" align="right">'. $_SESSION["dcon"].'</div>';
	echo '										</div>';
	echo '										</div';
	echo '										</div>';
	echo '';
	echo '										<div class="external-event bg-success" >';
	echo '										<div class="row"';
	echo '										<div class="col-lg-12">';
	echo '											<div class="col-lg-8" align="left">RECOVERED</div>';
	echo '											<div class="col-lg-4" align="right">'. $_SESSION["drec"].'</div>';
	echo '										</div>';
	echo '										</div';
	echo '										</div>';
	echo '';
	echo '										<div class="external-event bg-danger" >';
	echo '										<div class="row"';
	echo '										<div class="col-lg-12">';
	echo '											<div class="col-lg-8" align="left">DECEASED</div>';
	echo '											<div class="col-lg-4" align="right">'. $_SESSION["ddea"].'</div>';
	echo '										</div>';
	echo '										</div';
	echo '										</div>';
	echo '';
	echo '									  </div>';
	echo '									  ';
	echo '									</div>';
	echo '';
	echo '								</div>';
	echo '';
	echo '							  </div>';
	echo ''							  ;
	echo '							  <div class="col-lg-6">';
	echo '								<div class="card card-primary card-outline">';
	echo '								  <div class="card-header">';
	echo '									<h5 class="card-title m-0">Cumlative Date Upto The  '.$inputddmmm.' </h5>';
	echo '								  </div>';
	echo '								  ';
	echo '									<div class="card-body">';
	echo '									  <!-- the events -->';
	echo '									  <div id="external-events">';
	echo '										<div class="external-event bg-warning" >';
	echo '										<div class="row"';
	echo '										<div class="col-lg-12">';
	echo '											<div class="col-lg-8" align="left">CONFIRMED</div>';
	echo '											<div class="col-lg-4" align="right">'. $_SESSION["tcon"].'</div>';
	echo '										</div>';
	echo '										</div';
	echo '										</div>';
	echo '';
	echo '										<div class="external-event bg-success" >';
	echo '										<div class="row"';
	echo '										<div class="col-lg-12">';
	echo '											<div class="col-lg-8" align="left">RECOVERED</div>';
	echo '											<div class="col-lg-4" align="right">'. $_SESSION["trec"].'</div>';
	echo '										</div>';
	echo '										</div';
	echo '										</div>';
	echo '';
	echo '										<div class="external-event bg-danger" >';
	echo '										<div class="row"';
	echo '										<div class="col-lg-12">';
	echo '											<div class="col-lg-8" align="left">DECEASED</div>';
	echo '											<div class="col-lg-4" align="right">'. $_SESSION["tdea"].'</div>';
	echo '										</div>';
	echo '										</div';
	echo '										</div>';
	echo '';
	echo '									  </div>';
	echo '									</div>';
	echo '';
	echo '								</div>';
	echo '';
	echo '';
	echo '							  </div>';
	echo '							</div>';
	//echo'							<div class="modal-footer justify-content-between">';
	//echo'								<p>Some of the data provided might be missing/unknown as the details have not been shared by the state/central governments.</p>';
	//echo'							</div>';
	
	
		  $Yes = "Y";
	  } 
	  $i++;
	}
	
	  if ($Yes =="N") {
		  //Echo '<script>alert("No Record Found")</script>'; 
		  $_SESSION["dcon"]=0;
		  $_SESSION["drec"]=0;
		  $_SESSION["ddea"]=0;
		  $_SESSION["tcon"]=0;
		  $_SESSION["trec"]=0;
		  $_SESSION["tdea"]=0;
	  }
	
	?>