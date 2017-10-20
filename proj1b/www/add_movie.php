<!DOCTYPE html>
<html>
<head>
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
		<h1>Add a Movie</h1>

       <div class="form-group">
	    <label for="title">Title</label>
	    <input type="text" class="form-control" id="title" aria-describedby="nametip" placeholder="Enter movie title">
	    <small id="nametip" class="form-text text-muted">Case sensitive.</small>
	  </div>

	   <div class="form-group">
	    <label for="company">Company</label>
	    <input type="text" class="form-control" id="company" aria-describedby="nametip" placeholder="Enter company">
	    <small id="nametip" class="form-text text-muted">Case sensitive.</small>
	  </div>

	   <div class="form-group">
	    <label for="year">Year</label>
	    <input type="value" class="form-control" id="year" placeholder="Format:YYYY">
	  </div>

		<div class="form-group d-flex flex-column">
			<label for id = "mpaarating" class="control-label">MPAA Rating</label>
			 <select id = "mpaarating" class="custom-select">
			  <option value="1">G</option>
			  <option value="2">NC-17</option>
			  <option value="3">PG</option>
			  <option value="4">PG-13</option>
			  <option value="1">R</option>
			  <option value="2">surrendere</option>
			</select>
		</div>
             
	  	<label for id = "genre">Genre</label>
	  	<div class="form-check form-check-inline" id = "genre">
	  		
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Action"> Action
		</label>

		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Adult"> Adult
		  </label>

		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Adventure"> Adventure
		  </label>
 
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="Animation"> Animation
		  </label>
 
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="Comedy"> Comedy
		  </label>
 
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="Crime"> Crime
		  </label>
 
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox7" value="Documentary"> Documentary
		  </label>
               
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox8" value="Drama"> Drama
		  </label>
 
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox9" value="Family"> Family
		  </label>
 
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox10" value="Fantasy"> Fantasy
		  </label>
 
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox11" value="Horror"> Horror
		  </label>
 
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox12" value="Musical"> Musical
		  </label>
 
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox13" value="Mystery"> Mystery
		  </label>
 
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox14" value="Romance"> Romance
		  </label>
 
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox15" value="Sci-Fi"> Sci-Fi 
		  </label>
 
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox16" value="Short"> Short
		  </label>
 
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox17" value="Thriller"> Thriller
		  </label>
     
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox18" value="War"> War  
		  </label>
 
		  <label class="form-check-label">
		    <input class="form-check-input" type="checkbox" id="inlineCheckbox19" value="Western"> Western
		  </label>
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
