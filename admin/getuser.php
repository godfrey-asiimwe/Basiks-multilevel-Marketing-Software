!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','basiks');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

//mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM accounts WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);
?>
<table class="table table-striped">
  <thead>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Country</th>
      <th>Address</th>
      <th>Action</th>
    </tr>
  </thead>
<?php
while($row = mysqli_fetch_array($result)) {
  ?>
    <tr>
      <td class="text-left"><?php echo $row["firstname"];?></td>
      <td><?php echo $row["lastname"];?></td>
      <td><?php echo $row["email"];?></td>
      <td><?php echo $row["phone"];?></td>
      <td><?php echo $row["country"];?></td>
      <td><?php echo $row["address"];?></td>
      <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Send email</button></td>
    </tr>
<?php
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>