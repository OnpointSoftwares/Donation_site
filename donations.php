<!DOCTYPE html>
<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src=
"//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
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
<table id="donation">
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Email</th>
      <th>Address</th>
      <th>City</th>
      <th>Credit Card No</th>
      <th>Expiration Date</th>
      <th>CCV</th>
      <th>Phone Number</th>
      <th>TransactionCode</th>
  </tr>
    <?php
    $conn=mysqli_connect("localhost","root","","donation_site");
    $sql="select * from donations";
    $query=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($query))
    {
        echo " <tr>
        <td>".$row['id']."</td>
        <td>".$row['Name']."</td>
        <td>".$row['Email']."</td>
        <td>".$row['City']."</td>
        <td>".$row['Address']."</td>
        <td>".$row['CreditCardno']."</td>
        <td>".$row['ExpirationDate']."</td>
        <td>".$row['CCV']."</td>
        <td>".$row['phone']."</td>
        <td>".$row['TransactionCode']."</td>
        <td>".$row['Amount']."</td>
      </tr>";
    }
 ?>
 <tr><td>Download as<td><td><button id="reportexcel" class="btn btn-primary">Excel File</button></td><td><a href="" class="btn btn-primary">CSV</a></td><td><button class="btn btn-primary" id="reportpdf">PDF</button></td></tr>
</table>
<button id="report" class="btn btn-primary">Excel File</button>
<script>

$("#reportexcel").click(function(){
  $("#donation").table2excel({
    filename: "report.xls"
});
});
$("#reportpdf").click(function(){
  html2canvas($('#donation')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var allMembersDataInformation = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(allMembersDataInformation).download("report.pdf");
                }
            });
});

 
</script>
</body>
</html>
