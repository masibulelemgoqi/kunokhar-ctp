<?php

require_once('Db.class.php');

class User
{
    private $con;

    public function __construct(){
        $conn = new Connect();
        $sql = $conn->connector();
        $this->con = $sql;

    }

    public function add_user($fname, $lname, $email, $position, $password, $cell_number) {
        try {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $date_created = date("Y-m-d H:m:s");
            $user_status = 0;
            $date_loggedin = null;

            $sql = "INSERT INTO `workers_tb` (`w_fname`, `w_lfname`, `w_email`, `w_type`, `w_password`, `w_datecreated`, `w_active_status`) VALUES (:fname, :lname, :email, :position, :hash, :date_created, :user_status)";

            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':fname', $fname);
            $stmt->bindParam(':lname', $lname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':position', $position);
            $stmt->bindParam(':hash', $hash);
            $stmt->bindParam(':date_created', $date_created);
            $stmt->bindParam(':user_status', $user_status);
            if($stmt->execute() && $this->add_log("Added user ".$fname." ".$lname."  with position: ".$position)) {
                return true;
                $this->con = null;
            }
        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
        }
    }

    public function log_in($email, $password) {
        try {
            $stmt = $this->con->query("SELECT * FROM workers_tb WHERE w_email = '$email'");
            if($stmt->rowCount() == 1) {
                $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
                $hash = $userRow['w_password'];
                if(password_verify($password, $hash)) {
                    session_start();
                    $_SESSION['id'] = $userRow['w_id'];
                    $_SESSION['last_login'] = time();
                    $id = $userRow['w_id'];
                    $this->add_log("Logged in");
                    $val = 1;
                    $statement = $this->con->prepare("UPDATE `workers_tb` SET `w_active_status`=:val WHERE w_id=:id");
                    $statement->bindParam(':id', $id);
                    $statement->bindParam(':val', $val);
                    if($statement->execute()) {
                        echo json_encode(array(
                            'success' => true,
                            'user'    => $userRow
                        ));
                    }
                }
            }else {
                echo json_encode(array('success' => false));
            }
        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
        }
    }

    public function log_out($w_id)
    {
        session_start();
        if(isset($_SESSION['id']))
        {
            $this->add_log("Logged out");
            $val = 0;

            $statement = $this->con->prepare("UPDATE `workers_tb` SET `w_active_status`=:val WHERE w_id=:w_id");
            $statement->bindParam(':w_id', $w_id);
            $statement->bindParam(':val', $val);

            if($statement->execute())
            {
                session_unset();
                session_destroy();
                header("Location: ../index.php");
            }

        }
    }

    public function add_log($action)
    {

        $date_log = date("Y-m-d H:i:s");

        $w = $this->getUser($_SESSION['id']);

        $w_id = $w['w_id'];

        $report = $w['w_fname']." ".$w['w_lfname'].", ".$action;

        try
        {
            $sql = "INSERT INTO `log_tb` (`fk_w_id`, `log_report`, `log_date`) VALUES (:w_id, :report, :date_log)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':w_id', $w_id);
            $stmt->bindParam(':report', $report);
            $stmt->bindParam(':date_log', $date_log);

            if($stmt->execute())
            {
                return true;
            }
        }catch(PDOException $e)
        {
            echo "Error: ".$e->getMessage();
        }
    }


    public function get_logs($id)
    {
        try
        {
            $stmt = $this->con->query("SELECT * FROM `log_tb` WHERE `fk_w_id` = $id ORDER BY `log_date` DESC");

            $logs = array();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $logs[] = $row;
            }

            return $logs;


        }catch(PDOException $e)
        {
            echo "Error: ".$e->getMessage();
        }
    }

    public function getUsers()
    {
        try
        {
            $stmt = $this->con->query("SELECT * FROM `workers_tb`");

            $result = array();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $result[] = $row;
            }

            return $result;
        }catch(PDOException $e)
        {
            echo "Error: ".$e->getMessage();
        }

    }

    public function getUser($id)
    {
    	$stmt = $this->con->query("SELECT * FROM workers_tb WHERE w_id=$id");
    	return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete_user($id)
    {
        try
        {
            if($this->con->exec("DELETE FROM `workers_tb` WHERE `w_id`=$id"))
            {
                return true;
                $this->con = null;
            }


        }catch(PDOException $e)
        {
           echo "Error: ".$e->getMessage();
        }
    }






}
