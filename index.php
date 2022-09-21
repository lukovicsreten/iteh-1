<html>
	<head>
		<?php include "konekcija.php";?>
		<title>Košarkaški klub</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="css.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<?php 
			$sql="SELECT igraci.id,igraci.igracime,igraci.igracprezime,klub.klubime,drzava.drzavaime
            FROM igraci
            JOIN klub ON igraci.klubid=klub.klubid
            JOIN drzava ON igraci.drzavaid=drzava.drzavaid";
			$q=$mysqli->query($sql);
		?>
		<script type="text/javascript">
	 		function pretrazi(){
	 			var pretraga = $('#pretraga').val();

				$.post('skriptapretraga.php', {pretraga:pretraga}, function(data) {
				  $('#odgovor').html(data);
        });
	 		}
	 </script>
	</head>
	<body>
		<nav class="navbar navbar-default">
  		<div class="container">
    		<div class="navbar-header">
      		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        		<span class="sr-only">Toggle navigation</span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
      		</button>
      		<a class="navbar-brand" href="index.php">Košarkaški klub</a>
    		</div>

    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      		<ul class="nav navbar-nav">
        		<li class="active"><a href="index.php">Pretraži <span class="sr-only">(current)</span></a></li>
        		<li><a href="registracija.php">Dodaj igrača</a></li>
        		<li><a href="brisanje.php">Izbriši igrača</a></li>
        		<li><a href="izmena.php">Transfer igrača</a></li>
      		</ul>
    		</div>
  		</div>
		</nav>

		<div class="container">
			<div class="row">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			  	<ol class="carousel-indicators">
			    	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    	<li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    	<li data-target="#carousel-example-generic" data-slide-to="2"></li>
			  	</ol>

			  	<div class="carousel-inner" role="listbox">
			    	<div class="item active">
			      	<img src="img/slider2.jpg" alt="...">
			    	</div>
			    	<div class="item">
			      	<img src="img/slider1.jpg" alt="...">
			    	</div>
			    	<div class="item">
			      	<img src="img/slider3.jpg" alt="...">
			    	</div>
			  	</div>

			  	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			    	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    	<span class="sr-only">Previous</span>
			  	</a>
			  	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			    	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    	<span class="sr-only">Next</span>
			  	</a>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-xs-12">
					<div class="page-header">
			  		<h1>Pretraga <small>Pretražite košarkaše</small></h1>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 col-xs-12">
					<div id="odgovor">			
						<table class="table">
							<thead>
								<tr>
									<th>Reg. br.</th>
									<th>Ime</th>
									<th>Prezime</th>
									<th>Klub</th>
									<th>Država</th>
								</tr>
							</thead>
							<tbody>
								<?php while ($red=$q->fetch_object()){ ?>
									<tr>
										<td><?php echo $red->id; ?></td>
										<td><?php echo $red->igracime; ?></td>
										<td><?php echo $red->igracprezime; ?></td>
										<td><?php echo $red->klubime; ?></td>
										<td><?php echo $red->drzavaime; ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-lg-3 col-xs-12">
					<p>Unesite ime kluba....</p>
					<div class="form-group">
		    		<label for="exampleInputPassword1">Traži po imenu kluba ili države</label>
		    		<input type="text" class="form-control" id="pretraga" placeholder="Pretraži...">
		  		</div>
		  		<button onclick="pretrazi();" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
						Pretraži
					</button>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-xs-12">
					<hr>
						<div id="futer">
							Copyright 2022 by <a href="mailto:lukovicsreten@gmail.com?Subject=Poruka" target="_top">Sreten Lukovic</a>
						</div>
					<hr>
				</div>
			</div>
		</div>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>