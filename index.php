<?php
class FlightData{
  // Variables being collected from the flight data API
  public $arrivalTime;
  public $departureTime;
  public $flightName;
  public $flightNumber;
  public $airportOrigin;

  public function __construct($year, $month, $day, $hour){
    $data = file_get_contents("https://api.flightstats.com/flex/flightstatus/rest/v2/json/airport/status/LUN/arr/$year/$month/$day/$hour?appId=f2fada9e&appKey=b3b6ad43212e524752691e4f5e2496ff&utc=false&numHours=5&codeType=FS&maxFlights=8");

  }
}

class GetTime{
  public $day;
  public $date;
  public $year;
  public $hour;
  public $time;

  public function __construct(){
    date_default_timezone_set("Africa/Lusaka");
    $this->time = time();

  }
  public function getTime($time){

  }
}
?>
