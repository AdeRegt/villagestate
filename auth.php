<?php
    include_once "config.php";

    $username = $_POST["username"];
    $password = $_POST["password"];

    if($_POST["method"]=="login"){

        // exists?
        $conn = connectToServer();
        $prepare = $conn->prepare("SELECT id,password FROM user WHERE username=? ");
        $prepare->bind_param("s",$username);
        $prepare->execute();
        $sid = null;
        $lang = null;
        $prepare->bind_result($sid,$lang);
        if($prepare->fetch()===true){
            // verify pass
            if(password_verify($password,$lang)){
                // pass is OK

                // store in session
                session_start();
                $_SESSION["login"] = $sid;

                // go to the loginscreen
                header("location: /");
                exit;

            }else{
                die("Invalid username or password");
            }
        }else{
            die("Invalid username or password");
        }
    }else if($_POST["method"]=="signup"){

        // exists?
        $conn = connectToServer();
        $prepare = $conn->prepare("SELECT COUNT(*) AS 'T' FROM user WHERE username=? ");
        $prepare->bind_param("s",$username);
        $prepare->execute();
        $lang = null;
        $prepare->bind_result($lang);
        $prepare->fetch();
        if($lang!=0){
            die("Username already exist");
        }

        // insert to database
        $conn = connectToServer();
        $prep = $conn->prepare("INSERT INTO user VALUES (NULL,?,?)");
        $prep->bind_param("ss",$username,password_hash($password,"PASSWORD_BCRYPT"));
        $prep->execute();

        // go to the loginscreen
        header("location: /");
        exit;
    }else if($_POST["method"]=="logout"){

    }else{
        die("This action is not allowed!");
    }
?>