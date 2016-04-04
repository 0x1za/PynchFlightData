<?php
include("classes/connect.php");
//Test area [CAUTION HARZARDS AHEAD]
$connection = new connectCloud('localhost', 'root', '', 'flights');
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
                  $mydata = $data;
                  //end
                  echo $connection->getCurrent_time();
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