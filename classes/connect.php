<?php
class connectCloud{
  //Database connection variables
  private $database;
  private $hostname;
  private $username;
  private $password;

  //MySQL variables

  public function __construct($hostname, $username, $password, $database){
    $this->username = $username;
    $this->password = $password;
    $this->hostname = $hostname;
    $this->database = $database;
    try {
        $con = new PDO('mysql:host='.$this->hostname.'; dbname='.$this->database, $this->username, $this->password);
        $con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        echo "Connection Successful";
        $con->exec("SET CHARACTER SET utf8");  //  return all sql requests as UTF-8
    }
    catch (PDOException $err) {
        echo "Database connectin failed! Contact server admin!";
        $err->getMessage() . "<br/>";
        file_put_contents('errorsCon.txt',$err, FILE_APPEND);  // write some details to an error-log outside public_html
        die();  //  terminate connection
    }
  }

  public function insertData($time){
      global $this->time = $time;
      //SQL Query
      $insert = $con->prepare("INSERT INTO flights (id, time) VALUES (0, :time)");
      $insert->bindParam(':time', $this->time); //Insert Data
      $insert->execute();
  }

  public function readData(){

  }

  public function updateData(){

  }
}
?>
