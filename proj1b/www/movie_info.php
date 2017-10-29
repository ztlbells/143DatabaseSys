<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<title>Movie Database Query System - Search </title>
	<style>	
	.form-horizontal{
	    display:block;
	    width:50%;
	    margin:0 auto;
	}
	table{
		width: 50%;
	}
	table, th, td{
		border: 1px solid grey;
		border-collapse: collapse;
	}
	th,td{
		padding: 3px;
		text-align: left;
	}
	tr:nth-child(even){
		background-color: #eee;
	}
	tr:nth-child(odd){
		background-color: #fff;
	}
	th{
		background-color:white;
		color:black;
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
	<div class="jumbotron">
	  <h1 class="display-3">Movie Information Page</h1>
	<form method="post" action="add_comment.php">
		<div class="form">
		<input type="hidden" name="movie" value="<?php echo $_POST['movie']; ?>">
		<ul class="nav nav-tabs flex-column">
			<li class="nav-item"><h3>Movie Information</h3></li>
			<?php
					$db_connection = mysql_connect("localhost", "cs143", "");
					if(!$db_connection){
						$errmsg = mysql_error($db_connection);
						echo "Connection failed: $errmsg <br/>";
						exit(1);
					}
					mysql_select_db("CS143", $db_connection);
					$movie = $_POST["movie"];
					if(!$movie) $movie = $_GET["movie"];
					if($movie){
						$query = "SELECT id, title, rating, company FROM Movie WHERE id =".$movie.";";
						$rs=mysql_query($query, $db_connection) or die(mysql_error());
						$row=mysql_fetch_row($rs);
						$id=$row[0];
						$title=$row[1];
						$rating=$row[2];
						$company=$row[3];
						echo '<li class="nav-item">Title: '.$title.'</li>';
						echo '<li class="nav-item">Producer: '.$company.'</li>';
						echo '<li class="nav-item">MPAA Rating: '.$rating.'</li>';
						$query="SELECT first,last FROM Director D, MovieDirector MD WHERE D.id=MD.did AND MD.mid=".$id.";";
						$rs=mysql_query($query, $db_connection) or die(mysql_error());
						$row=mysql_fetch_row($rs);
						$first=$row[0];
						$last=$row[1];
						echo '<li class="nav-item">Director: '.$first.' '.$last.'</li>';
						$query="SELECT genre FROM MovieGenre WHERE mid=".$id.";";
						$rs=mysql_query($query, $db_connection) or die(mysql_error());
						$row=mysql_fetch_row($rs);
						$genre=$row[0];
						echo '<li class="nav-item">Genre: '.$genre.'</li>';
					}
			?>
		</ul>
		<ul class="nav nav-tabs flex-column">
			<li class="nav-item"><h3>Actors</h3></li>
			<?php
				echo '<table class="table table-bordered">';
				echo '<thead>';
				echo '<tr>';
				echo '<th> Name </th>';
				echo '<th> Role </th>';
				echo '</tr>';
				echo '</thead>';
				echo '<tbody>';
				if($movie){
					$query='SELECT A.first, A.last, MA.role, A.id FROM Actor A, MovieActor MA WHERE MA.aid=A.id AND MA.mid='.$movie.';';
					$rs=mysql_query($query, $db_connection) or die(mysql_error());
					$row_number=mysql_num_rows($rs);
					for($i=0;$i<$row_number;$i++){
						$row=mysql_fetch_row($rs);
						$first=$row[0];
						$last=$row[1];
						$role=$row[2];	
						$id=$row[3];
						echo '<tr>';
						echo '<td><a href="actor_info.php?actor='.$id.'">'.$first.' '.$last.'</a></td>';
						echo '<td>'.$role.'</td>';
						echo '</tr>';						
					}
				}
				echo '</tbody>';
				echo '</table>';
			?>
		</ul>
		<ul class="nav nav-tabs flex-column">
			<li class="nav-item"><h3>Reviews/Score</h3></li>
			<?php
				if($movie){
					$query = 'SELECT AVG(rating), COUNT(*) FROM Review WHERE mid ='. $movie. ';';
					$rs=mysql_query($query, $db_connection) or die(mysql_error());
					$row=mysql_fetch_row($rs);
					$score=$row[0];
					$count=$row[1];
					if($count==0){
						echo '<div class="form-group">';
						echo '<button type="submit" class="btn btn-primary">By now, nobody ever rates this movie. Be the first one to give a review</button>';
						echo '</div>';
					}
					else{
						if($score > 0 && $score <= 1){
							echo '<li class="nav-item">Average score: <font color="#B0C4DE">'.number_format($score,1).'/5 - Waste of time</font> ('.$count.' people reviewed)</li>';
						}
						if($score > 1 && $score <= 2){
							echo '<li class="nav-item">Average score: <font color="#778899">'.number_format($score,1).'/5 - Just so-so</font> ('.$count.' people reviewed)</li>';
						}
						if($score > 2 && $score <= 3){
							echo '<li class="nav-item">Average score: <font color="#87CEFA">'.number_format($score,1).'/5 - Okay</font> ('.$count.' people reviewed)</li>';
						}
						if($score > 3 && $score <= 4){
							echo '<li class="nav-item">Average score: <font color="#9370DB">'.number_format($score,1).'/5 - Not bad</font> ('.$count.' people reviewed)</li>';
						}
						if($score > 4 && $score <= 5){
							echo '<li class="nav-item">Average score: <font color="#800080">'.number_format($score,1).'/5 - Awesome</font> ('.$count.' people reviewed)</li>';
						}
						echo '<div class="form-group">';
						echo '<button type="submit" name="movie" class="btn btn-primary" value="'.$movie.'">Leave your score & comment as well!</button>';
						echo '</div>';
					}
				}
			?>
		</ul>
		<ul class="nav nav-tabs flex-column">
			<li class="nav-item"><h3>Comments:</h3></li>
			<?php
				if($movie){
					$query = 'SELECT name, time, rating, comment FROM Review WHERE mid ='. $movie. ';';
					$rs=mysql_query($query, $db_connection) or die(mysql_error());
					$row_number=mysql_num_rows($rs);
					if($row_number==0) echo 'No comments.';
					for($i=0;$i<$row_number;$i++){
						$row=mysql_fetch_row($rs);
						$name=$row[0];
						$time=$row[1];
						$rating=$row[2];
						$comment=$row[3];
						if(!$name){
							echo '<li class="nav-item"><font color="#1E90FF"> Guest </font>'.' rates the this movie with score '. $rating. '/5 and left a review at '.$time.'</li>';
						}
						else{
							echo '<li class="nav-item"><font color="#1E90FF">'.$name.'</font>'.' rates the this movie with score '. $rating. ' and left a review at '.$time.'</li>';
						}
						echo '<li class="nav-item">Comment:</li>';
						echo '<li class="nav-item">'.$comment.'</li>';
						echo '</br>';
					}
				}
			?>
		</ul>
	</div>
	</form>
</div>
</body>
</html>