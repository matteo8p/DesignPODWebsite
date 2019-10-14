<html>
<head>
<meta charset="utf-8">
<title>Design POD Search</title>
<link href="styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
  <ul id="navigation">
    <li><a id="home" href="index.html">HOME</a></li>
    <li><a id="search" href="search.php">SEARCH</a></li>
    <li><a id="order" href="order.html">ORDER</a></li>
    <li><a id="about" href="about.html">ABOUT</a></li>
  </ul>
</header>
<form action="search.php" method="POST">
  <input type="text" name="query" placeholder="Search..." value="" maxlength = 25 autocomplete="off"/>
</form>
<?php
$conn = mysqli_connect( "localhost", "root", "", "designpod" )or die( "Could not connect" );
$result = "";
if ( isset( $_POST[ 'query' ] ) ) {
  $searchquery = $_POST[ 'query' ];
  $result = $conn->query( "SELECT * FROM inventory WHERE name LIKE '%$searchquery%' OR description LIKE '%$searchquery%'" );
}
?>
<table>
  <tr>
    <th>NAME</th>
    <th>DESCRIPTION</th>
    <th>LOCATION</th>
  </tr>
  <?php
  if ( $result != "" ) {
    while ( $row1 = mysqli_fetch_array( $result ) ): ;
    ?>
  <tr>
    <td><?php echo $row1[1]?></td>
    <td><?php echo $row1[2]?></td>
    <td><?php echo $row1[3]?></td>
  </tr>
  <?php
  endwhile;
  };
  $result = "";
  $conn->close();
  ?>
</table>
</body>
</html>