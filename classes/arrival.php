<?php

class FlightData {
    //json variable to hold the json file been returned from the api
    public $data;
    //end

    // Variables being collected from the flight data API
    public function getArrivalTime() {
        return $this->arrivalTime;
    }

    public function getDepartureTime() {
        return $this->departureTime;
    }

    public function getFlightName() {
        return $this->flightName;
    }

    public function getFlightNumber() {
        return $this->flightNumber;
    }

    public function getAirportOrigin() {
        return $this->airportOrigin;
    }

    public function setArrivalTime($arrivalTime) {
        $this->arrivalTime = $arrivalTime;
    }

    public function setDepartureTime($departureTime) {
        $this->departureTime = $departureTime;
    }

    public function setFlightName($flightName) {
        $this->flightName = $flightName;
    }

    public function setFlightNumber($flightNumber) {
        $this->flightNumber = $flightNumber;
    }

    public function setAirportOrigin($airportOrigin) {
        $this->airportOrigin = $airportOrigin;
    }

    public function __construct($year, $month, $day, $hour) {
        $this->data = file_get_contents("https://api.flightstats.com/flex/flightstatus/rest/v2/json/airport/status/LUN/arr/$year/$month/$day/$hour?appId=f2fada9e&appKey=b3b6ad43212e524752691e4f5e2496ff&utc=false&numHours=5&codeType=FS&maxFlights=8");
    }
    //end of variables 

}

class GetTime {

    public $day;
    public $month;
    public $year;
    public $hour;
    public $time;

    public function __construct() {
        date_default_timezone_set("Africa/Lusaka");
        $this->time = time();
        $this->day = date("d");
        $this->year = date("Y");
        $this->hour = date("H");
        $this->month = date("m");
    }

}

?>
