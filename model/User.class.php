<?php

require_once('Db.class.php');

class User
{
    private $con;

    public function __construct(){
        $conn = new Connect();
        $sql = $conn->connectorSecond();
        $this->con = $sql;

    }

    public function log_in($email, $password) {
        try {
            $stmt = $this->con->query("SELECT * FROM users WHERE email = '$email'");
            if($stmt->rowCount() == 1) {
                $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
                $hash = $userRow['password'];
                $id = $userRow['id'];
                if(password_verify($password, $hash)) {
                    $auth = $this->getAuth($id);
                    if($auth != null) {
                        session_start();
                        $_SESSION['id'] = $id;
                        echo json_encode(array(
                            'success' => true,
                            'user'    => $userRow,
                            'auth'    => $auth
                        ));
                    }else {
                        echo json_encode(array(
                            'success' => false,
                            'message' => 'Contact your admin to authorise you to the system'
                        )); 
                    }
                }else {
                    echo json_encode(array(
                        'success' => false,
                        'message' => 'Wrong email or password'
                    )); 
                }
            }else {
                echo json_encode(array(
                    'success' => false,
                    'message' => 'Wrong email or password'
                )); 
            }
        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
        }
    }
    
    public function logout()
    {
        session_start();
        if(isset($_SESSION['id']))
        {
            session_unset();
            session_destroy();
            header("Location: ../index.php");
        }
    }

    public function getAuth($id)
    {
        $stmt = $this->con->query("SELECT * FROM `authorities` WHERE `user_id`=$id AND `product_name`='Idea Registration' AND `isBlocked`=0");
        if($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }else {
            return null;
        }
    }

}
