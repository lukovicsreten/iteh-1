<?php 
	include "konekcija.php";
	if (empty ($_POST['pretraga'])) {
		echo '<div class="alert alert-danger">Unesite pretragu!</div>';
	} else {
		$pretraga = $_POST['pretraga'];
		$sql="SELECT igraci.id,igraci.igracime,igraci.igracprezime,klub.klubime,drzava.drzavaime
          FROM igraci
          JOIN klub ON igraci.klubid=klub.klubid
          JOIN drzava ON igraci.drzavaid=drzava.drzavaid
			  	WHERE UPPER(klubime) LIKE UPPER('%$pretraga%')
					OR UPPER(drzavaime) LIKE UPPER('%$pretraga%')
					ORDER BY igracime";
		if($q=$mysqli->query($sql)) {
?>	
<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Ime</th>
			<th>Prezime</th>
			<th>Klub</th>
			<th>Država</th>
		</tr>
	</thead>
	<tbody>
		<?php while($red=$q->fetch_object()){  ?>
			<tr>
				<td><?php echo $red->id; ?></td>
				<td><?php echo $red->igracime; ?></td>
				<td><?php echo $red->igracprezime; ?></td>
				<td><?php echo $red->klubime; ?></td>
				<td><?php echo $red->drzavaime; ?></td>
			</tr>
		<?php  } ?>
	</tbody>
</table>
<?php
	} else {
			echo '<div class="alert alert-danger">Doslo je do greske sa bazom!</div>';
	}}
 ?>