<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<title>Movie Database Query System - Add an Actor </title>
	<style>	
	.form-horizontal{
	    display:block;
	    width:50%;
	    margin:0 auto;
	}
	</style>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	  <a class="navbar-brand" href="#">Movie Database Query System</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavDropdown">
	    <ul class="navbar-nav">
	      <li class="nav-item ">
	        <a class="nav-link" href="./homepage.php">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link" href="./update.php">Update</a>
	      </li>
	      <li class="nav-item">
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
		    <a class="nav-link  active" href="./add_actor.php">Add an Actor</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="./add_director.php">Add a Director</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="./add_movie.php">Add a Movie</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="./add_actor_to_movie.php">Add an Actor-to-Movie Relation</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="./add_director_to_movie.php">Add a Director to-Movie Relation</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="./add_comment.php">Add a Comment</a>
		  </li>
		</ul>

	<div class="jumbotron jumbotron-fluid">
	  <div class="container">
	    <h1 class="display-3">Add an Actor</h1>
	<form method="GET" action="<?php $_PHP_SELF?>">
		<div class="form">
		<div class="row">
		    <div class="col">
		       <div class="form-group">
			    <label for="actorfirstname">First Name</label>
			    <input type="text" class="form-control" id="firstname" name="firstname"aria-describedby=" nametip" placeholder="Enter first name">
			    <small id="nametip" class="form-text text-muted">Case sensitive.</small>
			  </div>
		    </div>
		    <div class="col">
		      <div class="form-group">
			    <label for="actorlastname">Last Name</label>
			    <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby=" nametip" placeholder="Enter last name">
			    <small id="nametip" class="form-text text-muted">Case sensitive.</small>
			  </div>
		    </div>
		 </div>
	
		<p></br></p>
		<div class="form-group d-flex flex-column">
			<label for id = "Gender" class="control-label">Gender</label>
			 <select id = "Gender" name="Gender" class="custom-select">
			  <option value="1">Male</option>
			  <option value="2">Female</option>
			</select>
		</div>

		<p></br></p>
		<div class="row">
		    <div class="col">
		       <div class="form-group">
			    <label for="dateofbirth">Date of Birth</label>
			    <input type="text" class="form-control" id="dateofbirth" name="dateofbirth" aria-describedby="brithtip" placeholder="Format:YYYY-MM-DD">
			  </div>
		    </div>
		    <div class="col">
		      <div class="form-group">
			    <label for="dateofdie">Date of Death</label>
			    <input type="text" class="form-control" id="dateofdeath" name="dateofdeath" aria-describedby="dietip" placeholder="Format:YYYY-MM-DD">
			    <small id="dietip" class="form-text text-muted">Leave it blank if the actor is still alive.</small>
			  </div>
		    </div>
		 </div>

	  	<div class="form-group">
	  		<button type="submit" class="btn btn-primary">Submit</button>
	  	</div>
	 </div>

	</form>

	<?php
		$db_connection = mysql_connect("localhost", "cs143", "");
		if(!$db_connection){
			$errmsg = mysql_error($db_connection);
			echo "Connection failed: $errmsg <br/>";
			exit(1);
		}
		mysql_select_db("CS143", $db_connection);
		$firstName = $_GET["firstname"];
		$lastName = $_GET["lastname"];
		$Gender = $_GET["Gender"];
		if($firstName){
			if ($Gender == 1){
				$gender = "Male";
			}
			elseif ($Gender == 2){
				$gender = "Female";
			} 
			$dateOfBirth = $_GET["dateofbirth"];
			$dateOfDeath = $_GET["dateofdeath"];
	 
			$query_id = "SELECT id FROM MaxPersonID;";
			
			
			$rs_id = mysql_query($query_id, $db_connection) or die(mysql_error());
			$id = mysql_fetch_row($rs_id)[0] + 1;
			$query_add_id = "UPDATE MaxPersonID SET id = id + 1;";
			$rs_add_id = mysql_query($query_add_id, $db_connection) or die(mysql_error());
			
			if($dateOfDeath){
				$query = "INSERT INTO Actor VALUES(".$id.",'".$lastName."','".$firstName."','".$gender."','".$dateOfBirth."','".$dateOfDeath."');";
			}
			else{
				$query = "INSERT INTO Actor VALUES(".$id.",'".$lastName."','".$firstName."','".$gender."','".$dateOfBirth."',NULL);";
			}
			
			$rs = mysql_query($query, $db_connection) or die(mysql_error());
			echo "Add Succesfully!";
			mysql_close($db_connection);
		}	
	?>
	</div>
</div>
	
</body>
</html>

