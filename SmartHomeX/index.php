
</head>
<title></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>


<div class="row justify-content-center">
		<br>
	<h1> Prototipos de IoT: Aplicação SmartHome</h1>

	

</div>

	<?php require_once 'process.php'; ?> 

	<?php
if (isset($_SESSION['mensage'])):?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">

<?php 
echo $_SESSION['mensage'];
unset($_SESSION['mensage']);
?>
</div>

<?php endif?>
<div class="container">

	<?php 
		$mysqli = new mysqli('localhost','root','','crud') or die (mysqli_error($mysli));
		$result = $mysqli->query("SELECT * FROM dados") or die (mysqli_error);
       // pre_r ($result);
		//pre_r($result ->fetch_assoc()); // for nos vetores da tabela 
	?>

  <div class= "row justify-content-center">
		<table class="table">
			<thead>
				<th>Humidade</th>
				<th>Temperatura</th>
				<th>Luminosidade</th>
			</thead>

		<?php   

				while ($row = $result->fetch_assoc()): ?>
					<tr>
						<td><?php echo $row['sHumidade']?></td>
						<td><?php echo $row['sLuminosidade']?></td>
						<td><?php echo $row['sRFID']?></td>	
						<td>
							<a href="index.php?edit=<?php echo $row['id'];?>" class = "btn btn-primary">editar</a>
							<a href="process.php?delete=<?php echo $row['id'];?>" class = "btn btn-danger">excluir</a>
						</td>					

					</tr>
				<?php endwhile;?>
		</table>  	
  </div>

	<?php

	function pre_r ($array){

		echo '<pre>';
		print_r($array);
		echo '</pre>';
	}
	?>
	
<div class="row">
  <div class="col-md-4 col-xs-4">
    <div class="form-group">
		<form action ="process.php"  method="POST">
			<input type="hidden" name="id" value="<?php echo $id?>">
					<div class = "form-gourp">
					<label>Sensor Humidade</label>
					<input type="text" name="sHumidade" class="form-control" value="<?php echo $sHumidade?>">
					</div>

					<div class="form-gourp">
					<label>Sensor de Luminosidade</label>
					<input type="text" name="sLuminosidade" class="form-control" value="<?php echo $sLuminosidade?>" > 
			        </div>

					<div class = form-goup>
					<label>Sensor RFID</label>
					<input type="text" name="sRFID" class="form-control" value="<?php echo $sRFID?>" > 		
					</div>

					<div class = "form-gourp">
					<?php 
					if ($update == true):
					?>	
					<br>
					<button type="submit" class="btn btn-info" name="update">atualizar</button>
					<?php else : ?>
					<br>
					<button type="submit" class="btn btn-primary" name="add">add</button>
				    <?php endif;?>
	                </div>
			
		</form>
	</div>
</div>
</div>

</body>