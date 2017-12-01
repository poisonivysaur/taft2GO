

<script>
    sessionStorage.clear();
    console.log('cleared session storage');
</script>
<?php
if(!isset($_SESSION))
{
    session_start();
}
//session_start();
$_SESSION=array();
session_destroy();
setcookie('PHPSESSID','',time()-300,'/','',0);

header("Location: /taft2GO/Login");
?>