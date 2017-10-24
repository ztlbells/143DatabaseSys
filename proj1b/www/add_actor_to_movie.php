<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<title>Movie Database Query System - Add an A/M Relat </title>
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
	      <li class="nav-item">
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
	<p></br></p>
	<form>
		<div class="form form-horizontal">
		<h1>Add an Actor to a Movie</h1>

		<div class="form-group">
			<label for id = "movietitle" class="control-label">Movie Title</label>
			 <input type="text" id = "movietitle" name="movietitle" class="form-control">
		</div>
	
		<div class="form-group">
			<label for id = "actor" class="control-label">Actor</label>
			<input type="text" id = "actor" name="actor" class="form-control" aria-describedby="nametip">
			<small id="nametip" class="form-text text-muted">Actor's name, e.g. Hank(First Name) Aaron(Last Name).</small>
		</div>
		
		<div class="form-group">
		    <label for="role">Role</label>
		    <input type="text" class="form-control" id="role" name="role" aria-describedby="roletip">
		    <small id="roletip" class="form-text text-muted">Actor's role in the movie.</small>
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
		
		$movieTitle=$_GET["movietitle"];
		$actor=$_GET["actor"];
		$role=$_GET["role"];
		
		if($movieTitle && $actor){
			$query_mid="SELECT id FROM Movie WHERE title='".$movieTitle."';";
			$rs_query_mid=mysql_query($query_mid, $db_connection) or die(mysql_error());
			if(mysql_num_rows($rs_query_mid)==0){
				echo "Please input the correct movie title";
			}
			else{
				$mid=mysql_fetch_row($rs_query_mid)[0];
				
				$list=preg_split('/\s+/',$actor);
				$firstName=$list[0];
				$lastName=$list[1];

				$query_aid="SELECT id FROM Actor WHERE first='".$firstName."' AND last='".$lastName."';";
				$rs_query_aid=mysql_query($query_aid, $db_connection) or die(mysql_error());
				if(mysql_num_rows($rs_query_aid)==0){
					echo "Please input the correct actor name";
				}
				else{
					$aid=mysql_fetch_row($rs_query_aid)[0];
					$query="INSERT INTO MovieActor VALUES(".$mid.",".$aid.",'".$role."');";
					$rs_query=mysql_query($query, $db_connection) or die(mysql_error());
					echo "Add Succesfully";
				}
			}
		}
	?>

	
</body>
</html>
