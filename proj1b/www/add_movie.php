<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<title>Movie Database Query System - Add a Movie </title>
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
	<form method="GET" action="<?php $_PHP_SELF?>">
		<div class="form form-horizontal">
		<h1>Add a Movie</h1>

       <div class="form-group">
	    <label for="title">Title</label>
	    <input type="text" class="form-control" id="title" name="title" aria-describedby="nametip" placeholder="Enter movie title">
	    <small id="nametip" class="form-text text-muted">Case sensitive.</small>
	  </div>

	   <div class="form-group">
	    <label for="company">Company</label>
	    <input type="text" class="form-control" id="company" name="company" aria-describedby="nametip" placeholder="Enter company">
	    <small id="nametip" class="form-text text-muted">Case sensitive.</small>
	  </div>

	   <div class="form-group">
	    <label for="year">Year</label>
	    <input type="value" class="form-control" id="year" name="year" placeholder="Format:YYYY">
	  </div>

		<div class="form-group d-flex flex-column">
			<label for id = "mpaarating" class="control-label">MPAA Rating</label>
			 <select id = "mpaarating" name="mpaarating" class="custom-select">
			  <option value="1">G</option>
			  <option value="2">NC-17</option>
			  <option value="3">PG</option>
			  <option value="4">PG-13</option>
			  <option value="5">R</option>
			  <option value="6">surrendere</option>
			</select>
		</div>
             
	  	<label for id = "genre">Genre</label>
	  	<div class="form-check form-check-inline" id = "genre">
	  		
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name = "genre[]" value="Action"> Action
		  </label>

		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name = "genre[]" value="Adult"> Adult
		  </label>

		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name = "genre[]" value="Adventure"> Adventure
		  </label>
 
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox4" name = "genre[]" value="Animation"> Animation
		  </label>
 
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox5" name = "genre[]" value="Comedy"> Comedy
		  </label>
 
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox6" name = "genre[]" value="Crime"> Crime
		  </label>
 
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox7" name = "genre[]" value="Documentary"> Documentary
		  </label>
               
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox8" name = "genre[]" value="Drama"> Drama
		  </label>
 
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox9" name = "genre[]" value="Family"> Family
		  </label>
 
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox10" name = "genre[]" value="Fantasy"> Fantasy
		  </label>
 
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox11" name = "genre[]" value="Horror"> Horror
		  </label>
 
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox12" name = "genre[]" value="Musical"> Musical
		  </label>
 
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox13" name = "genre[]" value="Mystery"> Mystery
		  </label>
 
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox14" name = "genre[]" value="Romance"> Romance
		  </label>
 
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox15" name = "genre[]" value="Sci-Fi"> Sci-Fi 
		  </label>
 
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox16" name = "genre[]" value="Short"> Short
		  </label>
 
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox17" name = "genre[]" value="Thriller"> Thriller
		  </label>
     
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox18" name = "genre[]" value="War"> War  
		  </label>
 
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox19" name = "genre[]" value="Western"> Western
		  </label>
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
		$title=$_GET["title"];
		$company=$_GET["company"];
		$year=$_GET["year"];
		$rating=$_GET["mpaarating"];
		$genre=$_GET["genre"];
		if($title){
			if($rating==1)$rating="G";
			else if($rating==2)$rating="NC-17";
			else if($rating==3)$rating="PG";
			else if($rating==4)$rating="PG-13";
			else if($rating==5)$rating="R";
			else if($rating==6)$rating="surrendere";
			
			$query_id="SELECT id FROM MaxMovieID;";
			$rs_id = mysql_query($query_id, $db_connection) or die(mysql_error());
			$id = mysql_fetch_row($rs_id)[0] + 1;
			
			$query_add_id = "UPDATE MaxMovieID SET id = id + 1;";
			$rs_add_id = mysql_query($query_add_id, $db_connection) or die(mysql_error());

			$query="INSERT INTO Movie VALUES(".$id.",'".$title."',".$year.",'".$rating."','".$company."');";
			$rs = mysql_query($query, $db_connection) or die(mysql_error());
			
			if(!empty($genre)){
				foreach($genre as $genrestuff){
					$query_add_genre="INSERT INTO MovieGenre Values(".$id.",'".$genrestuff."');";
					$rs_add_genre=mysql_query($query_add_genre, $db_connection) or die(mysql_error());
				}
			}
			echo "Add Succesfully";
			mysql_close($db_connection); 
		}
		/*
		if (!empty($food)){
			echo "The foods selected are: <strong>";
			foreach($food as $foodstuff){
				echo '<br />'.htmlentities($foodstuff);
			}
			echo "</strong>.";
		}*/
		
		
	?>

	
</body>
</html>
