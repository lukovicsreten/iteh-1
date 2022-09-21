<?php 
	include "konekcija.php";

	if(empty($_POST['reg'])){
		echo '<div class="alert alert-danger">Unesite registracioni broj igrača !</div>';
	} else {
		$reg=$_POST['reg'];

		$sql="DELETE FROM igraci 
		      WHERE id='$reg'";
		if($q=$mysqli->query($sql)){
			echo '<div class="alert alert-success">Košarkaš je uspešno izbrisan!</div>';
		} else {
			echo '<div class="alert alert-danger">Greška sa bazom!</div>';
		}
	}
 ?>