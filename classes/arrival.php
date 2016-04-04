<?php
class getFlightData {
    //JSON variable to hold the json file been returned from the api
    public $data;
    public $airport;


    // Variables being collected from the flight data API
    public function __construct($year, $month, $day, $hour) {
      $this->data = file_get_contents("https://api.flightstats.com/flex/flightstatus/rest/v2/json/airport/status/LUN/arr/$year/$month/$day/$hour?appId=f2fada9e&appKey=b3b6ad43212e524752691e4f5e2496ff&utc=false&numHours=5&codeType=FS&maxFlights=8");
      return $data;
    }
    public function getTime(){
      date_default_timezone_set("Africa/Lusaka");
      $this->time = time();
      $this->day = date("d");
      $this->year = date("Y");
      $this->hour = date("H");
      $this->month = date("m");

      //Return collected values
      return
    }
    //End of variables
    public function getInformation(){

    }

}

class GetTime {
    public function __construct() {

    }
}

?>
