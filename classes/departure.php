<?php
class Arrival {
    //JSON variable to hold the json file been returned from the api
    private $data;
    private $airportName;
    private $flightName;
    private $arrivalTime;
    private $departureTime;
    private $flightNumber;
    private $flightOrigin;
    private $status;
    public function getstatus() {
        return $this->status;
    }
    public function getFlightOrigin() {
        return $this->flightOrigin;
    }

    public function setFlightOrigin($flightOrigin) {
        $this->flightOrigin = $flightOrigin;
    }

        public function getAirportName() {
        return $this->airportName;
    }

    public function getFlightName() {
        return $this->flightName;
    }

    public function getArrivalTime() {
        return $this->arrivalTime;
    }

    public function getDepartureTime() {
        return $this->departureTime;
    }

    public function getFlightNumber() {
        return $this->flightNumber;
    }

    public function setAirportName($airportName) {
        $this->airportName = $airportName;
    }

    public function setFlightName($flightName) {
        $this->flightName = $flightName;
    }
    public function setstatus($sta) {
        $this->status = $sta;
    }

    public function setArrivalTime($arrivalTime) {
        $arrivalTime = substr($arrivalTime, 11, -7);  // returns "abcde"
        $this->arrivalTime = $arrivalTime;
    }

    public function setDepartureTime($departureTime) {
//2016-04-04T15:45:00.000
        $departureTime = substr($departureTime, 11, -7);
        $this->departureTime = $departureTime;
    }

    public function setFlightNumber($flightNumber) {
        $this->flightNumber = $flightNumber;
    }
    public function setData($mydata,$i){
      //echo $mydata;
                  $mydata = json_decode($mydata);


                  if(isset($mydata->scheduledFlights[$i]->carrierFsCode)){
                      $this->setFlightName($mydata->scheduledFlights[$i]->carrierFsCode);
                  }
                  else{
                        $this->setFlightName("not avl");
                  }
                  if(isset($mydata->scheduledFlights[$i]->carrierFsCode)){
                     $this->setFlightName($mydata->scheduledFlights[$i]->carrierFsCode);
                     $this->setstatus("scheduled");

                  }
                  else {
                    # code...
                    $this->setFlightName("not avl");
                    $this->setstatus("not avl");

                  }
                //  $this->setAirportName($mydata->scheduledFlights[$i]->carrierFsCode);
                  if(isset($mydata->scheduledFlights[$i]->flightNumber)){
                    $this->setFlightNumber($mydata->scheduledFlights[$i]->flightNumber);
                  }
                  else{
                     $this->setFlightNumber("not avl");
                  }
                  if(isset($mydata->scheduledFlights[$i]->arrivalTime)){
                      $this->setArrivalTime($mydata->scheduledFlights[$i]->arrivalTime);
                  }
                  else{
                       $this->setArrivalTime("not avl");
                  }
                  if(isset($mydata->scheduledFlights[$i]->departureTime)){
                     $this->setDepartureTime($mydata->scheduledFlights[$i]->departureTime);
                  }
                  else{
                    $this->setDepartureTime("not avl");

                  }
                  if(isset($mydata->scheduledFlights[$i]->departureAirportFsCode)){
                    $this->setFlightOrigin($mydata->scheduledFlights[$i]->departureAirportFsCode);
                  }
                  else{
                     $this->setFlightOrigin("not avl");
                  }




    }
    public function getData(){


       ?>
<th><?php echo $this->getDepartureTime()?></th>
	    <td><?php print_r($this->getFlightNumber()." ".$this->getFlightName())?></td>
	    <td><?php echo $this->getFlightOrigin()?></td>
	    <td><?php echo $this->getstatus()?><td>
	  </tr>

        <?php
      // echo var_dump($this->getAirportName());

    }




}

?>
