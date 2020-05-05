<?php
	session_start();
		
	$statevalue = $_POST['stateval'];
	
	$data = file_get_contents('https://api.covid19india.org/v2/state_district_wise.json');
	$fullcount = json_decode($data, true);
	
	$statescount = count($fullcount);
	
	$i=0;
	while($i < $statescount){
		
		$apistate= $fullcount[$i]['state'];
		if ($apistate == $statevalue) {
	?>
<div class="card card-primary card-outline">
	<div class="card-header">
		<h5 class="card-title m-0">Statistics for <?php echo $apistate; ?> </h5>
	</div>
	<div class="card-body table-responsive p-0" style="height: 450px;">
		<table id="example1" class="table table-bordered table-striped table-head-fixed text-nowrap">
			<!--<a class="text-warning"><i class="fas fa-square"></i>&nbsp;CONFIRMED&nbsp;&nbsp;&nbsp;</a>
				<a class="text-primary"><i class="fas fa-square"></i>&nbsp;ACTIVE&nbsp;</a><br>
				<a class="text-success"><i class="fas fa-square"></i>&nbsp;RECOVERED&nbsp;&nbsp;&nbsp;</a>
				<a class="text-danger"><i class="fas fa-square"></i>&nbsp;DECEASED&nbsp;</a>-->
			<thead>
				<tr>
					<th class="bg-secondary">
						<center> DISTRICT </center>
					</th>
					<th class="bg-secondary">
						<center> TODAY'S</center>
					</th>
					<th class="bg-secondary">
						<center> CUMLATIVE</center>
					</th>
				</tr>
			</thead>
			<?php			
				$discount = count($fullcount[$i]['districtData']);
				
					
					$j=0;	
					while($j < $discount) {
				?>
			<tr>
				<td><?php echo $fullcount[$i]['districtData'][$j]['district'] ?></td>
				<td align="right"><?php echo $fullcount[$i]['districtData'][$j]['delta']['confirmed'] ?></td>
				<td align="right"><?php echo $fullcount[$i]['districtData'][$j]['confirmed'] ?></td>
			</tr>
			<?php
				$j++;
				}
				}
				$i++;
				}
				
				?>
		</table>
	</div>
</div>