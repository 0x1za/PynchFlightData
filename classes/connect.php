<?php
date_default_timezone_set("Africa/Lusaka");
$time = time();
$day = date("d");
$year = date("Y");
$hour = date("H");
$month = date("m");

class connectCloud{
  //Database connection variables
  private $database;
  private $hostname;
  private $username;
  private $password;
  public $con;

  //JSON variable to hold the json file been returned from the api
  public $data;
  public $airport;
  public $day;
  public $month;
  public $year;
  public $hour;
  public $time;

  public function __construct($hostname, $username, $password, $database){
    $this->username = $username;
    $this->password = $password;
    $this->hostname = $hostname;
    $this->database = $database;

    try {
        $this->con = new PDO('mysql:host='.$this->hostname.'; dbname='.$this->database, $this->username, $this->password);
        $this->con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        //echo "Connection Successful";
        $this->con->exec("SET CHARACTER SET utf8");  //  return all sql requests as UTF-8
    }
    catch (PDOException $err) {
        echo "Database connectin failed! Contact server admin!";
        $err->getMessage() . "<br/>";
        die();  //  terminate connection
    }
  }

  public function insertData($current_time){
      $this->time = $current_time;
      //SQL Query
      $insert = $this->con->prepare("INSERT INTO time (id, time) VALUES (0, :time)");
      $insert->bindParam(':time', $this->time); //Insert Data
      $insert->execute();
  }

  public function readData(){
    //SQL Query
    $read = $this->con->prepare("SELECT * FROM time WHERE id = :id");
    $read->bindValue(':id', 0);
    $read->execute();
    if ($read->rowCount() > 0){
        $check = $read->fetch(PDO::FETCH_ASSOC);
        return $old_time = $check['time'];
    } else {
      return $old_time = false;
    }
  }

  public function updateData($current_time){
    //SQL Query
    $update = $this->con->prepare("UPDATE time SET time = $current_time WHERE id = :id");
    $update->bindValue(':id', 0);
    $update->execute();
    echo $current_time.'<br>';
  }
}

//Test area [CAUTION HARZARDS AHEAD]
$connection = new connectCloud('localhost', 'root', 'pynch2015', 'flights');
echo $old_time = $connection->readData();
if($old_time = false){
  $connection->insertData($time);
} else {
  $time_difference =  ($time - $old_time);
  if($time_difference <= 2470){
    echo "Read from TXT file";
    echo $time_difference;
  } else {
    echo "Grab data from the api";
    //echo $time_difference.'<br>';
    //$connection->updateData($time);
    echo $old_time;
  }
}
?>
