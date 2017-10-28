<?php  
	 $db_connection = mysql_connect("localhost", "cs143", "");
	 if(!$db_connection){
					$errmsg = mysql_error($db_connection);
					echo "Connection failed: $errmsg <br/>";
					exit(1);
				}
				mysql_select_db("CS143", $db_connection);					
	 if(isset($_POST["submit"]))  
	 {  
	      if(!empty($_POST["search"]))  
	      {  
	           $query = str_replace(" ", "+", $_POST["search"]);  
	           header("location:search.php?search=" . $query);  
	      }  
	 }  
?>  
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<title>Movie Database Query System - Search </title>
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
	      <li class="nav-item">
	        <a class="nav-link" href="./update.php">Update</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="./browse.php">Browse</a>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link" href="./search.php">Search</a>
	      </li>
	    </ul>
	  </div>
	</nav>

</head>
<body>
	<p></br></p>
	<form method = "post">
		<div class="form form-horizontal">
		<div class="form-group">
		    <label for="searchtxt">I'm looking for ..</label>
		    <input type="text" class="form-control" id="searchtxt" name = "search" value="<?php if(isset($_GET["search"])) echo $_GET["search"]; ?>" />  
		 <br />  
            <input type="submit" name="submit" class="btn btn-info" />  
	  	</div>
	</form>



    <div class="table-responsive">  
	    <ul class="nav nav-tabs flex-column"> 
	    <?php  
	    if(isset($_GET["search"]))  
	    {  
	        $condition = '';  
	        $query = explode(" ", $_GET["search"]);  
	        foreach($query as $text)  
	        {  
	          $condition .= "title LIKE '%".$text."%' AND ";  #mysqli_real_escape_string($connect, $text)
	        }  

	        # delete AND at the end of query
	        $condition = substr($condition, 0, -4); 

	        $sql_query = "SELECT title, year,id FROM Movie WHERE " . $condition. ";";  
	        $rs=mysql_query($sql_query, $db_connection) or die(mysql_error());
	        if($rs){
	        	echo '<li class="nav-item"><h4> Resutls in Movies </h4></li>';
	        	echo '<table>';
				echo '<tr>';
				echo '<th> Title </th>';
				echo '<th> Year </th>';
				echo '</tr>';
		    	$row_number=mysql_num_rows($rs);
		    	for($i=0;$i<$row_number;$i++){
					$row=mysql_fetch_row($rs);
					$title=$row[0];
					$year=$row[1];
					$id=$row[2];
					echo '<tr>';
					echo '<td><a href="movie_info.php?movie='.$id.'">'.$title.'</a></td>';
					echo '<td>'.$year.'</td>';
					echo '</tr>';						
			  	}
			  	echo '</table>';
	        }

	        $actor_condition = '';
	        foreach($query as $text)  
	        {  
	          $actor_condition .= "last LIKE '%".$text."%' OR ";  
	        }  

	        # delete AND at the end of query
	        $actor_condition = substr($actor_condition, 0, -4); 
	        $actor_condition .= " AND ";
	        foreach($query as $text)  
	        {  
	          $actor_condition .= "first LIKE '%".$text."%' OR ";  
	        }

	        # delete AND at the end of query
	        $actor_condition = substr($actor_condition, 0, -4); 

	        $sql_query = "SELECT first, last, id, dob, dod FROM Actor WHERE " . $actor_condition. ";"; 
	        $rs=mysql_query($sql_query, $db_connection) or die(mysql_error());
	        if($rs){
	        	echo '<li class="nav-item"><h4> Resutls in Actors </h4></li>';
	        	echo '<table>';
				echo '<tr>';
				echo '<th> Actor </th>';
				echo '<th> Date of Birth </th>';
				echo '<th> Date of Death </th>';
				echo '</tr>';
		    	$row_number=mysql_num_rows($rs);
		    	for($i=0;$i<$row_number;$i++){
					$row=mysql_fetch_row($rs);
					$first=$row[0];
					$last=$row[1];
					$id=$row[2];
					$dob=$row[3];
					$dod=$row[4];
					echo '<tr>';
					echo '<td><a href="actor_info.php?actor='.$id.'">'.$first.' '.$last.'</a></td>';
					echo '<td>'.$dob.'</td>';
					echo '<td>'.$dod.'</td>';
					echo '</tr>';						
			  	}
			  	echo '</table>';
	        }
	                  
	    }  
		?>  
	    </ul>  
    </div>  
</div>

	

	<?php
			
	?>

	
</body>
</html>
