<!DOCTYPE html>
<html>
<head>
	<title>Web Query Page</title>
	<style>
		table{
			width:80%;
		}
		table, th, td{
			border: 2px solid back;
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
</head>
<body>

	<h1>CS143 Web Query</h1>
	<p>Type an SQL query in the following box:</p>
	<p>
		<FORM METHOD = "POST" ACTION = "<?php $_PHP_SELF?>">
			<TEXTAREA NAME="sqlQuery" ROWS=5 COLS=30></TEXTAREA>
			<INPUT TYPE="submit" VALUE="SUBMIT">
		</FORM>
	</p>

	<?php
		$db_connection = mysql_connect("localhost", "cs143", "");
		if(!$db_connection){
			$errmsg = mysql_error($db_connection);
			echo "Connection failed: $errmsg <br />";
			exit(1);
		}
		mysql_select_db("CS143", $db_connection);
		$query = $_POST["sqlQuery"];
		if($query){
			$rs = mysql_query($query, $db_connection);# or die(mysql_error());
			print "Results of query are listed as below.<br />";

			# Storing received data
			$result = array();

			#print field names
			for($i = 0; $i < mysql_num_fields($rs); $i++){
				$data = mysql_fetch_field($rs, $i) -> name; 
				#no return
				if(!$data) echo "N/A<br/>";
				array_push($result, $data);
			}

			#print results
			if(count($result) > 0){
				echo "<table border='0.5'>";
			 	echo "<tr>";
			 	for ($i = 0; $i < count($result); $i++) {
			 		echo "<th>" . $result[$i] . "</th>";
			 	}
			 	echo "</tr>";
			 	while($row = mysql_fetch_row($rs)) {
			 		echo "<tr>";
			 		for ($i = 0; $i < mysql_num_fields($rs); $i++) {
						if ($row[$i]) echo "<td>" . $row[$i] . "</td>";
						else echo "<td>N/A</td>";									 				
			 		}
			 		echo "</tr>";
			 	}
				echo "</table>";
			}
		}
		mysql_close($db_connection);
		
		
	?>

	
</body>
</html>
