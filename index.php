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
$connection = new connectCloud('localhost', 'root', '', 'flights');
$arrival  = new Arrival();
$old_time = $connection->readData();

if($old_time = false){
    
                $connection->insertData($time);
} 
else {
                $time_difference =   ($connection->getCurrent_time() - $old_time)/3600;
                if($time_difference > 1.106388888888){
                 echo "hey not yet an hour bra";
                  //reading from a txt file
                  $myfile = fopen("flightdata.txt", "r") or die("Unable to open file!");
                  // Output one line until end-of-file
                  while(!feof($myfile)) {
                    $data = fgets($myfile);
                  }
                  fclose($myfile);
                 $mydata = json_decode($data);
                  //end
                  //setting data from the api
                  $arrival->setData($mydata);
                  //end
                  //getting table data from api
                  $arrival->getData();
                  //end
                
  }
  else {
                echo "Grab data from the api";
                //echo $time_difference.'<br>';
                //$connection->updateData($time);
                //echo $old_time;
                //grabing data from de api
                $connection->insertData(time());
                $connection->getApiData($connection->getYear(),$connection->getMonth(),$connection->getDay(),$connection->getHour());
                
                //end
  }
}

?>

</body>
</html>
