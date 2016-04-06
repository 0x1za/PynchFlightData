<!DOCTYPE html>
<html lang="en">
<head>
  <title>Arrival Flights</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include("classes/connect.php");
include("classes/arrival.php");
//Test area [CAUTION HARZARDS AHEAD]
$connection = new connectCloud('localhost', 'root', 'pynch2015', 'flights','arrival');
$arrival  = new Arrival();
$old_time = $connection->readData();

if($old_time = false){

                $connection->insertData($time);
}
else {
                $time_difference =   ($connection->getCurrent_time() - $old_time)/3600;
                if($time_difference > 3600){
                 //echo "hey not yet an hour bra";
                  //reading from a txt file
                  $myfile = fopen("flightdata.txt", "r") or die("Unable to open file!");
                  // Output one line until end-of-file
                  while(!feof($myfile)) {
                    $data = fgets($myfile);
                  }
                  fclose($myfile);
                  //$mydata = json_decode($data);
                  $mydata = file_get_contents('flightdata.txt');
                  //echo  $mydata;
                  $mydata = json_decode($mydata);
                  //end
?>
<!---html table-->
                                 <table class='table'>
   				   <thead>
     					 <tr>
       					  <th>Arrival</th>
       					   <th>Flight No</th>
           				 <th>Origin</th>
         				   <th>Status</th>

                                        </tr>
                                    </thead>
                                       <tbody>
                                        <tr class='success'>
<?php
                  //setting data from the api
                  $counter=0;
               while($counter<3){
                  $arrival->setData($mydata,$counter);
                  //end
                  //getting table data from api
                  $arrival->getData();
                  $counter++;
                 }
                 echo "</tbody>
	               </table>";
                  //end

  }
  else {
                echo "Grab data from the api";
                //echo $time_difference.'<br>';
                $connection->updateData($time);
                echo $old_time;
                //grabing data from de api
                $connection->insertData(time());
                $connection->getApiData($connection->getYear(),$connection->getMonth(),$connection->getDay(),$connection->getHour(),'arrival');

                //end
                ?>
                
                <table class='table'>
   				   <thead>
     				<tr>
       			     <th>Arrival</th>
					 <th>Flight No</th>
					 <th>Origin</th>
					  <th>Status</th>
					</tr>
				  </thead>
				 <tbody>
			     <tr class='success'>
                
  <?php   
  //setting data from the api
                  $counter=0;
               while($counter<3){
                  $arrival->setData(json_decode($connection->getdata()),$counter);
                  
                  //end
                  //getting table data from api
                  $arrival->getData();
                  $counter++;
                 }
                 echo "</tbody>
	               </table>";
                  //end           
  }
}

?>

</body>
</html>
