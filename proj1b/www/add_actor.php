<!DOCTYPE html>
<html>
<head>
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
	<form>
		<div class="form form-horizontal">
		<h1>Add an Actor</h1>
		<div class="row">
		    <div class="col">
		       <div class="form-group">
			    <label for="actorfirstname">First Name</label>
			    <input type="text" class="form-control" id="firstname" aria-describedby="nametip" placeholder="Enter first name">
			    <small id="nametip" class="form-text text-muted">Case sensitive.</small>
			  </div>
		    </div>
		    <div class="col">
		      <div class="form-group">
			    <label for="actorlastname">Last Name</label>
			    <input type="text" class="form-control" id="lastname" aria-describedby="nametip" placeholder="Enter last name">
			    <small id="nametip" class="form-text text-muted">Case sensitive.</small>
			  </div>
		    </div>
		 </div>
	
		<p></br></p>
		<div class="form-group d-flex flex-column">
			<label for id = "Gender" class="control-label">Gender</label>
			 <select id = "Gender" class="custom-select">
			  <option value="1">Male</option>
			  <option value="2">Female</option>
			</select>
		</div>

		<p></br></p>
		<div class="row">
		    <div class="col">
		       <div class="form-group">
			    <label for="dateofbirth">Date of Birth</label>
			    <input type="text" class="form-control" id="dateofbirth" aria-describedby="brithtip" placeholder="Format:YYYY-MM-DD">
			  </div>
		    </div>
		    <div class="col">
		      <div class="form-group">
			    <label for="dateofdie">Date of Die</label>
			    <input type="text" class="form-control" id="dateofdie" aria-describedby="dietip" placeholder="Format:YYYY-MM-DD">
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
			
	?>

	
</body>
</html>
