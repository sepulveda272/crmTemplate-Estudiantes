<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if (isset($_POST['registrarse'])){
    require_once("RegistroUser.php");

    $registrar = new RegistroUser();

    $registrar->setIdCamper(1);

    $registrar->setEmail($_POST['email']);
    $registrar->setUsername($_POST['username']);
    $registrar->setPassword($_POST['password']);

    /* $registrar->insertData();

    echo "<script>alert('Los datos fueron guardados satisfactoriamente');document.location='../Home/home.php'</script>";
 */


 if($registrar->checkUser($_POST['email'])){
    echo "<script>alert('Usuario ya existe');document.location='loginRegister.php'</script>";
 }
 else if($_POST['email']=== '' || $_POST['username']=== '' || $_POST['password']  === ''){
   echo "<script>alert('datos vacios');document.location='loginRegister.php'</script>";
 }
 else{
    $registrar->insertData();
    echo "<script>alert('Los datos fueron guardados satisfactoriamente');document.location='../Home/home.php'</script>";

 }
}

?>