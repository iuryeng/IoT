

<?php
include"conection.php";

  
    $sHumidade = $_GET['sHumidade'];
	$sLuminosidade = $_GET['sLuminosidade'];
	$sRFID = $_GET['sRFID']; 


	$sql = "INSERT INTO tbdados (sHumidade, sLuminosidade, sRFID) VALUES (:sHumidade, :sLuminosidade, :sRFID)";

	$stmt = $PDO->prepare($sql);

	$stmt->bindParam(':sHumidade', $sHumidade);
	$stmt->bindParam(':sLuminosidade', $sLuminosidade);
	$stmt->bindParam(':sRFID', $sRFID);

	if ($stmt->execute())
		{
		echo "salvo_com_sucesso";
		}

	else 
		{
			echo "erro_ao_salvar";

		}

?>


