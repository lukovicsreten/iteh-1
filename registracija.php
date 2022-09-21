<html>
	<head>
		<?php include "konekcija.php"; ?>
		<title>Košarkaški klub</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="css.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<?php 
			$sql="SELECT * FROM klub";
			$q=$mysqli->query($sql);
			$sql2="SELECT * FROM drzava";
			$q2=$mysqli->query($sql2);

			class Igrac {
				public $ime;
				public $prezime;
				public $klub;
				public $drzava;
		
				public function __construct($ime,$prezime,$klub,$drzava){
					$this->ime = $ime;
					$this->prezime = $prezime;
					$this->klub = $klub;
					$this->drzava = $drzava;
				}
		
				public function dodajIgraca (){
					return "INSERT INTO igraci (igracime, igracprezime, klubid, drzavaid) VALUES ('".$this->ime."', '".$this->prezime."', '".$this->klub."', '".$this->drzava."')";
				}
			}
	
			if (isset($_POST['submit'])) {
				if(empty($_POST['ime'])||empty($_POST['prezime'])||empty($_POST['klub'])||empty($_POST['drzava'])) {
					echo '<div class="alert alert-danger">Sva polja su obavezna!</div>';
				} else {
					$ime=trim($_POST['ime']);
					$prezime=trim($_POST['prezime']);
					$klub=$_POST['klub'];
					$drzava=$_POST['drzava'];
					$igrac = new Igrac($ime, $prezime, $klub, $drzava);

					$sql3=$igrac->dodajIgraca();
					if($q3=$mysqli->query($sql3)){
						echo '<div class="alert alert-success">Novi igrač je ubačen u tim !</div>';
					} else {
						echo '<div class="alert alert-danger">Greška sa bazom!</div>';
					}
				}
			}
		?>
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
        		<li><a href="index.php">Pretraži </a></li>
        		<li class="active"><a href="registracija.php">Dodaj igrača<span class="sr-only">(current)</span></a></li>
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
			  		<h1>Registracija <small>Dodajte košarkaša u tim</small></h1>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-xs-12"></div>
				<div class="col-lg-6 col-xs-12">
					<p>Unesite sve podatke o košarkašu...</p>
					<form method="POST" action="registracija.php">
			  		<div class="form-group">
			    		<label for="exampleInputPassword1">Ime</label>
			    		<input type="text" class="form-control" name="ime" placeholder="Ime...">
			  		</div>
			  		<div class="form-group">
			    		<label for="exampleInputPassword1">Prezime</label>
			    		<input type="text" class="form-control" name="prezime" placeholder="Prezime...">
			  		</div>
			  		<div class="form-group">
			    		<label for="exampleInputPassword1">Klub</label>
			    		<select class="form-control" name="klub">
			    			<option value="">Izaberi klub...</option>
			    			<?php while ($red=$q->fetch_object()){  ?>
			    				<option value="<?php echo $red->klubid?>"><?php echo $red->klubime?></option>
			    			<?php } ?>
			    		</select>
			  		</div>
			  		<div class="form-group">
			    		<label for="exampleInputPassword1">Država</label>
			    		<select class="form-control" name="drzava">
			    			<option value="">Izaberi državu...</option>
			    			<?php while ($red2=$q2->fetch_object()){  ?>
			    				<option value="<?php echo $red2->drzavaid ?>"><?php echo $red2->drzavaime ?></option>
			    			<?php } ?>
			    		</select>
			  		</div>
			  		<button type="submit" name="submit" class="btn btn-primary">Dodaj</button>
		  		</form>
				</div>
				<div class="col-lg-3 col-xs-12"></div>
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