<?php


if(!isset($_SESSION['isLoggedIn'])){
    if(isset($_POST['email'])){
        echo 'email is set<br>';
        $_SESSION['isLoggedIn'] = true;
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['isAdmin'] = $_POST['isAdmin'];
        $_SESSION['objID'] = $_POST['objID'];
        echo "".$_POST['email']."<br>";
        echo "".$_POST['isAdmin']."<br>";
        echo "".$_POST['objID']."<br>";

        if($_SESSION['isAdmin'] == 1){
            header("Location: /taft2GO/Dashboard"); // FOR NOW
        }
        else{
            header("Location: /taft2GO/Dashboard");
        }
    }
    else{
        header("Location: /taft2GO/Login");
    }
}
else{   // if isLoggedIn is set
    if($_SESSION['isAdmin'] == 1){
        header("Location: /taft2GO/Dashboard"); // FOR NOW
    }
    else{
        header("Location: /taft2GO/Dashboard");
    }
}

?>