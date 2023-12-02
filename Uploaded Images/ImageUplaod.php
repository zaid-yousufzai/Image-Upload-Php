<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ImageUpload.css">
    <title>Image Upload</title> 
</head>
<body>
    
<div class="myform">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="input-field">
            <label for="">Name</label>
            <br>
            <br>
            <input type="text" name="username">
        </div>

        <div class="input-field">
            <label for="">Select An Image</label>
            <br>
            <br>
            <input type="file" name="profile">
        </div>
        <div class="submit-btn">
            <button type="submit" name="upload">Upload</button>
        </div>
        <br><br>
        <br><br>
        <button> <a href="display.php">Dispaly</a> </button>
    </form>

    <?php
    if(isset($_POST['upload'])) {
        $img_loc = $_FILES['profile']['tmp_name'];
        $img_name = $_FILES['profile']['name'];
        $uname = $_POST['username'];
        $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_size=$_FILES['profile']['size']/(1024*1024);
        $img_dest = "Images/" . $uname . "." . $img_ext;

        if(($img_ext!='jpg') && ($img_ext!='png') && ($img_ext!='jpeg'))
        {
            echo "<script>alert('Invalid image extension')</script>";
            exit();
        }

        if($img_size>2)
        {
            echo "<script>alert('Image size is greater than 2mb')</script>";
            exit();
        }

        $sql = "INSERT INTO `user_data` (`UserName`, `Profile`) VALUES ('$uname', '$img_dest')";

        if(mysqli_query($con, $sql)) {
            move_uploaded_file($img_loc, $img_dest);
            echo "<script>alert('Pass Image')</script>";
        } else {
            echo "<script>alert('Fail Image')</script>";
        }
    }
    ?>

   
    
</div>
</body>
</html>
