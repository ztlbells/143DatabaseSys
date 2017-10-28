<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<title>Movie Database Query System - Browse Actor </title>
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
	      <li class="nav-item active">
	        <a class="nav-link" href="/homepage.php">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="/update.php">Update</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="/browse.php">Browse</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="/search.php">Search</a>
	      </li>
	    </ul>
	  </div>
	</nav>
	
</head>
<body>
	<p></br></p>
	<form method="post" action="actor_info.php">
		
		<div class="form form-horizontal">
		<h1>Browse Actors</h1>

		<div class="form-group d-flex flex-column">
			<label for id = "actor" class="control-label">Select an Actor</label>
			 <select id = "actor" name="actor" class="custom-select">
			 <?php
					$db_connection = mysql_connect("localhost", "cs143", "");
					if(!$db_connection){
						$errmsg = mysql_error($db_connection);
						echo "Connection failed: $errmsg <br/>";
						exit(1);
					}
					mysql_select_db("CS143", $db_connection);
					$query="SELECT last,first,id,dob,dod FROM Actor ORDER BY last ASC";
					$rs=mysql_query($query, $db_connection) or die(mysql_error());
					$row_number=mysql_num_rows($rs);
					echo '<option value="0" selected="selected"> </option>';
					for($i=1;$i<=$row_number;$i++){
						$row=mysql_fetch_row($rs);
						$first=$row[1];
						$last=$row[0];
						$id=$row[2];
						$dob = $row[3];
						$dod = $row[4];
						echo '<option value="'.$id.'">'.$first.' '.$last.' ('.$dob.' - '.$dod.')'.'</option>';
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

	
</body>
</html>
