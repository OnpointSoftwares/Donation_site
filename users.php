<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>
</head>
<body>
<table>
    
    <?php
    $conn=mysqli_connect("localhost","root","","donation_site");
    $sql="select * from login";
    $query=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($query))
    {
        echo " <tr>
        <th>".$row['username']."</th>
        <th>".$row['password']."</th>
        <th>".$row['role']."</th>
      </tr>";
    }
 ?>
</table>

</body>
</html>
