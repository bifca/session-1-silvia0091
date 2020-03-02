<html>
    <head>
         <title>poked</title>
         <!-- Latest compiled and minified Bootstrap CSS -->
         <link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   
         <!-- Latest compiled Bootstrap JavaScript -->
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
         <!-- latest jQuery library -->
         <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    </head>
    <body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pokedb";

$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error){
	die("<strong>Connection Failed: </strong><br>".$conn->connect_error);
}
else{
	echo "database connected successful.<br></br>";
}
// running a query
$query = "SELECT * FROM pokedex";

$result = mysqli_query($conn,$query);

printf("<br>the query '$query'returned %d rows.\n",$result->num_rows);
echo "<br><br><br>";

if(mysqli_num_rows($result) > 0){
	echo "<div class='container'><h2>pokemon</h2><div class='row'>";
    $count = 0;
	while($row = mysqli_fetch_assoc($result)){
         $count =  $count + 2;
		echo'<div class="col-12 col-sm-6 col-md-4 col-lg-2">';
        echo"img class='icon' src=".$row['icon']."'alt='Icon'><h3>".$row["name"]."</h3><p>".$row["classfication"]."</p>";
        echo"</div>";
        if ($count == 12){
            echo"</div><div class='row'>";
            $count = 0;
        }
		
	}
     echo"</div>";
}





         ?>
	</body>
</html>