<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<title>Movie Database Query System - Add a comment</title>
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
		<ul class="nav nav-tabs">
		  <li class="nav-item">
		    <a class="nav-link" href="./add_actor.php">Add an Actor</a>
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
		    <a class="nav-link   active" href="./add_comment.php">Add a Comment</a>
		  </li>
		</ul>

	<div class="jumbotron jumbotron-fluid">
	  <div class="container">
	    <h1 class="display-3">Add a comment</h1>
	<form method="GET" action="<?php $_PHP_SELF?>">
		<input type="hidden" name="movie" value="<?php echo $_POST['movie']; ?>">
		<div class="form">


		<div class="form-group d-flex flex-column">
			<label for id = "movietitle" class="control-label">Movie Title</label>
			 <select id = "movietitle" name="movietitle" class="custom-select">
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
					
					$movie = $_POST["movie"];
					if($movie){
						$query_show_first='SELECT title,year FROM Movie WHERE id='.$movie.';';
						$rs_show_first=mysql_query($query_show_first, $db_connection) or die(mysql_error());
						$row_show_first=mysql_fetch_row($rs_show_first);
						$title_show_first=$row_show_first[0];
						$year_show_first=$row_show_first[1];
						echo '<option value="'.$movie.'" selected="selected">'.$title_show_first.' ('.$year_show_first.')'.'</option>';
					}
					else{
						echo '<option value="0" selected="selected"> </option>';
					}
					
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

		<div class="row">
		    <div class="col">
		       <div class="form-group">
			    <label for id="name">Your Name</label>
			    <input type="text" class="form-control" id="name" name="name" placeholder="Guest">
			  </div>
		    </div>
		    <div class="col">
		    	<div class="form-group d-flex flex-column">
				     <label for id = "rating" class="control-label">Rating</label>
					 <select id = "rating" name="rating" class="custom-select">
					  <option value="1"> 1 (Waste of time) </option>
					  <option value="2"> 2 (Just so-so)</option>
					  <option value="3"> 3 (Okay)</option>
					  <option value="4"> 4 (Not bad)</option>
					  <option value="5"> 5 (Awesome)</option>
					</select>
				</div>
		    </div>
		 </div>
		
		<label for id="comment" class="control-label">Comment</label>
		<div>
			<textarea class="form-control" id="comment" name="comment" rows=5 cols=40></textarea>
		</div>
		
		<p></br></p>
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
		
		$mid=$_GET["movietitle"];
		$name=$_GET["name"];
		$rating=$_GET["rating"];
		$comment=$_GET["comment"];
		$query_time="SELECT NOW();";
		$rs_query_time=mysql_query($query_time, $db_connection) or die(mysql_error());
		$time=mysql_fetch_row($rs_query_time)[0];
		
		
		if($mid){
			$query="INSERT INTO Review VALUES('".$name."','".$time."',".$mid.",".$rating.",'".$comment."');";
			$rs_query=mysql_query($query, $db_connection) or die(mysql_error());
			echo "Add Succesfully";
		}
		
		mysql_close($db_connection); 
	?>
	</div>
</div>
	
</body>
</html>
