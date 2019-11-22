<?php
session_start();
include_once "conection.php";
$update = false;
$sHumidade ='';
$sLuminosidade = '';
$sRFID ='';
$id= 0;

if (isset($_POST['add'])){

	 $sHumidade = $_POST ['sHumidade'];
	 $sLuminosidade = $_POST ['sLuminosidade'];
	 $sRFID = $_POST ['sRFID'];

     $query = mysqli_query($connect, 
     "INSERT INTO dados (sHumidade, sLuminosidade, sRFID)
      VALUES('$sHumidade', '$sLuminosidade', '$sRFID')");


	 $_SESSION['mensage'] = "Salvo com Sucesso!";
	 $_SESSION['msg_type'] = "success";


	 header("location: index.php");

}

if(isset($_GET['delete'])){
	$id = $_GET['delete'];
	$query = mysqli_query($connect, "DELETE FROM dados WHERE id=$id");

	 $_SESSION['mensage'] = "Deletado com scesso!";
	 $_SESSION['msg_type'] = "danger";


	 header("location: index.php");

}


if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update= true;
	$result = mysqli_query($connect,"SELECT * FROM dados WHERE id=$id") or die($mysqli->error());

	 	$row =$result->fetch_array();
	 	$sHumidade = $row ['sHumidade'];
	 	$sLuminosidade = $row['sLuminosidade'];
	 	$sRFID = $row ['sRFID']; 


}




if (isset($_POST['update'])){
	$id = $_POST['id'];
	$sHumidade = $_POST['sHumidade'];
    $sLuminosidade = $_POST['sLuminosidade'];
    $sRFID = $_POST['sRFID'];

    mysqli_query($connect, "UPDATE dados SET sHumidade='$sHumidade', sLuminosidade='$sLuminosidade', sRFID='$sRFID'");

    $_SESSION['mensage'] = "Atualização feita com sucesso!";
    $_SESSION['msg_type'] = "warning";
	
    header("location: index.php");

}

?>