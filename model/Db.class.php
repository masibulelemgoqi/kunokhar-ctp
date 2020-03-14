<?php 
class Connect{
    protected $host = 'localhost';
    protected $dbname = 'kunokhar_workspace_db';
    protected $user = 'root';
    protected $pass = '';

    public function connector() {

        try {

            $this->DBH = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
            $this->DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->DBH;
        }
        catch (PDOException $e) {

            echo $e->getMessage();
        }
        
        $this->DBH = null;
    }
}