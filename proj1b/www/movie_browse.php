<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<title>Movie Database Query System - Browse Movies </title>
	<style>	
	.form-horizontal{
	    display:block;
	    width:50%;
	    margin:0 auto;
	}
	table{
		width: 100%;
	}
	table, th, td{
		border: 2px grey;
		border-collapse: collapse;
	}
	th,td{
		padding: 5px;
		text-align: left;
	}
	tr:nth-child(even){
		background-color: #eee;
	}
	tr:nth-child(odd){
		background-color: #fff;
	}
	th{
		background-color:black;
		color:white;
	}
	</style>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	  <a class="navbar-brand" href="#">Movie Database Query System</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavDropdown">
	    <ul class="navbar-nav">
	      <li class="nav-item">
	        <a class="nav-link" href="./homepage.php">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="./update.php">Update</a>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link" href="./browse.php">Browse</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="./search.php">Search</a>
	      </li>
	    </ul>
	  </div>
	</nav>

</head>
<body>
	<ul class="nav nav-tabs">
	  <li class="nav-item">
	    <a class="nav-link" href="./actor_browse.php">Actors</a>
	  </li>
	  <li class="nav-item active">
	    <a class="nav-link  active" href="./movie_browse.php">Movies</a>
	  </li>
	</ul>

	<div class="jumbotron jumbotron-fluid">
	  <div class="container">
	    <h1 class="display-3">Browse Movies</h1>
	<form method="post" action="movie_info.php">
		<div class="form">
		<div class="form-group d-flex flex-column">
			<label for id = "movie" class="control-label">Select a Movie</label>
			 <select id = "movie" name="movie" class="custom-select">
			 <?php
					$db_connection = mysql_connect("localhost", "cs143", "");
					if(!$db_connection){
						$errmsg = mysql_error($db_connection);
						echo "Connection failed: $errmsg <br/>";
						exit(1);
					}
					mysql_select_db("CS143", $db_connection);
					$query="SELECT title,year,id FROM Movie ORDER BY year DESC";
					$rs=mysql_query($query, $db_connection) or die(mysql_error());
					$row_number=mysql_num_rows($rs);
					echo '<option value="0" selected="selected"> </option>';
					for($i=1;$i<=$row_number;$i++){
						$row=mysql_fetch_row($rs);
						$title=$row[0];
						$year=$row[1];
						$id=$row[2];
						echo '<option value="'.$id.'">'.$title.' ('.$year.')'.'</option>';
					}
					mysql_close($db_connection); 
			 ?>
			</select>
		</div>

	  	<div class="form-group">
	  		<button type="submit" class="btn btn-primary">Submit</button>
	  	</div>
	 </div>

	</form>

	<?php
			
	?>
	</div>
</div>
	
</body>
</html>
