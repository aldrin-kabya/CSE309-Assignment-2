<?php
// Connect to the MySQL database
$link = mysqli_connect("localhost", "root", "", "contact_form_db");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Execute a SELECT query
$sql = "SELECT firstName, lastName, subject_, email, city, contactNumber FROM userinfo";
$result = mysqli_query($link, $sql);

// Store the data in an array
$data = array();
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}

// Close the connection
mysqli_close($link);
?>


<!DOCTYPE html>
<html>
<head>
	<title>User Info</title>
	<style>
		table {
			border-collapse: collapse;
			width: 90%;
			margin: 20px 0 0 30px;
			font-size: 1em;
			min-width: 400px;
			border-radius: 5px 5px 5px 5px;
			overflow: hidden;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
		}

		th {
			background-color: #01d28e;
			color: #ffffff;
			font-family: 'Poppins', sans-serif;
			font-weight: bold;
			text-align: left;
			padding: 12px;
		}

		td {
			font-family: 'Poppins', sans-serif;
			padding: 12px;
			border: 1px solid #dddddd;
		}

		tr:nth-child(even) {
			font-family: 'Poppins', sans-serif;
			background-color: #f8f8f8;
		}

		.heading {
			background-color: #01d28e;
			padding: 40px 20px;
			text-align: center;
			border-radius: 8px 8px 8px 8px;
		}

		.heading-main {
			font-family: Verdana, Geneva, Tahoma, sans-serif!important;
			font-size: 48px;
			color: #00203fff;
		}

		.heading-sub {
			margin: 40px 0 0 30px;
			font-family: 'Poppins', sans-serif;
			font-size: 24px;
			font-weight: normal;
			color: #6C757D;
		}
	</style>

</head>
<body>
	<div class="heading">
		<h1 class="heading-main">Admin Panel</h1>
	</div>
	
	<h2 class="heading-sub">User Info</h2>
	<table>
		<tr>
			<th>Sl.</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Subject</th>
            <th>Email</th>
            <th>City</th>
            <th>Contact Number</th>
		</tr>
		<?php
			$count = 0;
			foreach($data as $row):
				$count++;
		?>
		<tr>
			<td><?php echo $count; ?></td>
			<td><?php echo $row['firstName']; ?></td>
			<td><?php echo $row['lastName']; ?></td>
			<td><?php echo $row['subject_']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['city']; ?></td>
            <td><?php echo $row['contactNumber']; ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>
