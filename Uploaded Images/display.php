<?php
include 'connect.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    

    <table class="table container mt-5 border">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">UserName</th>
      <th scope="col">Profile</th>
    </tr>
  </thead>

  <tbody>
    <?php

    $sql="SELECT * FROM `user_data`";
    $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
        echo "<tr>
        <th>$row[Serial_NO]</th>
        <td>$row[UserName]</td>
        <td><img src='$row[Profile]' height='100px' width='100px'></td>
  
      </tr> ";
    }


?>
    
    
    
  </tbody>
</table>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>