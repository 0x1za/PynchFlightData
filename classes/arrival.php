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

    public function setArrivalTime($arrivalTime) {
        $arrivalTime = substr($arrivalTime, 11, -7);  // returns "abcde"
        $this->arrivalTime = $arrivalTime;
    }

    public function setDepartureTime($departureTime) {
        $this->departureTime = $departureTime;
    }

    public function setFlightNumber($flightNumber) {
        $this->flightNumber = $flightNumber;
    }
    public function setData($mydata){
                  $this->setFlightName($mydata->appendix->airlines[0]->name);
                  $this->setAirportName($mydata->appendix->airports[0]->name);
                  $this->setFlightNumber( $mydata->flightStatuses[0]->flightNumber);
                  $this->setArrivalTime($mydata->flightStatuses[0]->arrivalDate->dateLocal);
                  $this->setDepartureTime( $mydata->flightStatuses[0]->departureDate->dateLocal);
                
                  
    }
    public function getData(){
       echo "<table class='table'>
    <thead>
      <tr>
        <th>Flight Name  #</th>
          <th>From</th>
           <th>to</th>
         <th>Departure</th>
         <th>Arrival</th>
      </tr>
    </thead>
    <tbody>
      <tr class='success'>";
       
       ?>
<th><?php echo  $this->getFlightName()." "; echo $this->flightNumber?></th>
	    <td>Heathrow</td>
            <td><?php echo $this->getAirportName()?></td>
	    <td>12:00</td>
	    <td><?php echo $this->getArrivalTime()?></td>
	  </tr>
	
	</table>
        <?php
        
    }




}

?>
