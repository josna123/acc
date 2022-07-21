<?php 

session_start(); 

include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['uname']);

    $pass = validate($_POST['password']);
    $pass=md5($pass);

    if (empty($uname)) {

        header("Location: index.php?error=User Name is required");

        exit();

    }else if(empty($pass)){

        header("Location: index.php?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * FROM drivers_list WHERE name='$uname' AND password='$pass'";
        
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['name'] === $uname && $row['password'] === $pass) {
                $_SESSION['name'] = $row['name'];
                $_SESSION['contact_number'] = $row['contact_number'];
                $_SESSION['blood_group'] = $row['blood_group'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['address'] = $row['address'];
                $_SESSION['emergency_contact_number'] = $row['emergency_contact_number'];
                $_SESSION['emergency_contact_name'] = $row['emergency_contact_name'];

                header("Location: driverhome.php");

                exit();

            }else{

                header("Location: index.php?error=Incorect User name or password");
                exit();

            }

        }else{

            header("Location: index.php?error=Incorect User name or password");
            exit();

        }

    }

}