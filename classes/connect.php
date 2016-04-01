<?php
class connectCloud{
  //Database connection variables
  private $database;
  private $hostname;
  private $username;
  private $password;
  public $time;
  public $con;

  //MySQL variables

  public function __construct($hostname, $username, $password, $database){
    $this->username = $username;
    $this->password = $password;
    $this->hostname = $hostname;
    $this->database = $database;

    try {
        $this->con = new PDO('mysql:host='.$this->hostname.'; dbname='.$this->database, $this->username, $this->password);
        $this->con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        echo "Connection Successful";
        $this->con->exec("SET CHARACTER SET utf8");  //  return all sql requests as UTF-8
    }
    catch (PDOException $err) {
        echo "Database connectin failed! Contact server admin!";
        $err->getMessage() . "<br/>";
        die();  //  terminate connection
    }
  }

  public function insertData($time){
      $this->time = $time;
      //SQL Query
      $insert = $this->con->prepare("INSERT INTO time (id, time) VALUES (0, :time)");
      $insert->bindParam(':time', $this->time); //Insert Data
      $insert->execute();
  }

  public function readData(){
    $this->time = $time;
    //SQL Query
    $read = $this->con->prepare("SELECT * FROM time WHERE id = :id");
    $read->bindValue(':id', 0);
    $read->execute();
    $lasttime = $read->fetchObject();
    echo $read->time;
  }

  public function updateData(){

  }
}

//Test area [CAUTION HARZARDS AHEAD]
$connection = new connectCloud('localhost', 'root', 'pynch2015', 'flights');
$connection->insertData('12552525252');
?>
