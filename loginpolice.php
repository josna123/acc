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

        header("Location: index.php?error=User Id is required");

        exit();

    }else if(empty($pass)){

        header("Location: index.php?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * FROM police_list WHERE station_name='$uname' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['station_name'] === $uname && $row['password'] === $pass) {

                echo "Logged in!";

                $_SESSION['station_name'] = $row['station_name'];

                header("Location: policehome.php");

                exit();

            }else{

                header("Location: index.php?error=Incorect User Id or password");
                exit();

            }

        }else{

            header("Location: index.php?error=Incorect User name or password");
            exit();

        }

    }

}else{

    echo "not";

    exit();

}