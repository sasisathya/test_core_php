<?php
 include 'conn.php'; 
 $sql = "select u.*,GROUP_CONCAT(ui.image_name) as image_name from users as u left join user_imgs ui on u.user_id = ui.user_id group by u.user_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
 <title></title>

 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

 <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
   <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

</head>
<body>

 <div class="container">
 <div class="col-lg-12">
 <br><br>
 <h1 class="text-warning text-center" > Display Table Data </h1>
 <br>
 <a href="<?php echo $path;?>insert.php" class="btn btn-info">Add New</a>
 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 
 <tr class="bg-dark text-white text-center">
 
 <th> Id </th>
 <th> Company name </th>
 <th> E-Mail </th>
 <th> Mobile No </th>
 <th> HR Name </th>
 <th>Address</th>

 </tr >

 <?php
if ($result->num_rows > 0) {
 while($res = $result->fetch_assoc()){
 ?>
 <tr class="text-center">
 <td> <?php echo $res['user_id'];  ?> </td>
 <td> <?php echo $res['company_name'];  ?> </td>
 <td> <?php echo $res['email'];  ?> </td>
 <td> <?php echo $res['mobile'];  ?> </td>
 <td> <?php echo $res['hr_name'];  ?> </td>
 <td> <?php echo $res['address'];  ?> </td>

 </tr>

 <?php 
}
 }
  ?>
 
 </table>  

 </div>
 </div>

 <script type="text/javascript">
 
 $(document).ready(function(){
 $('#tabledata').DataTable();
 }) 
 
 </script>

</body>
</html>