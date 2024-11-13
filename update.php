<?php
$con = mysqli_connect("localhost", "root", "", "upload_image");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0; // Ensure the ID is an integer
$SELECT = "SELECT * FROM stp_data WHERE id='$id'";
$query = mysqli_query($con, $SELECT);
$row = mysqli_fetch_assoc($query);
?>

<div>
    <form action="" method="POST" enctype="multipart/form-data">
        <input value="<?php echo $row['firstname']; ?>" type="text" placeholder="firstname" name="firstname" required><br><br>
        <input value="<?php echo $row['lastname']; ?>" type="text" placeholder="lastname" name="lastname" required><br><br>
        <input value="<?php echo $row['age']; ?>" type="number" placeholder="age" name="age" required><br><br>
        
        <!-- Existing image -->
        <?php if (!empty($row['uploadfile'])): ?>
            <img src="image/<?php echo $row['uploadfile']; ?>" alt="User Image" width="100"><br><br>
        <?php endif; ?>
        
        <input type="file" name="uploadfile"><br><br>
        
        <input value="update" type="submit" name="update-btn">
        <a href="view.php"><input value="view" type="button" name="view"></a><br><br>
    </form>
</div>

<?php
if (isset($_POST['update-btn'])) {
    // Retrieve POST data
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $age = $_POST['age'];

    // Check if a new file is uploaded
    if (isset($_FILES['uploadfile']) && $_FILES['uploadfile']['error'] == 0) {
        $filename = $_FILES['uploadfile']['name'];
        $tmp_name = $_FILES['uploadfile']['tmp_name'];
        $folder = "image/" . $filename;
        
        // Move the uploaded file
        if (move_uploaded_file($tmp_name, $folder)) {
            // File upload successful, update the record with new image
            $update = "UPDATE stp_data SET firstname='$fname', lastname='$lname', age='$age', uploadfile='$filename' WHERE id='$id'";
        } else {
            echo '<script type="text/javascript">alert("File upload failed");</script>';
        }
    } else {
        // No new file uploaded, update the record without changing the image
        $update = "UPDATE stp_data SET firstname='$fname', lastname='$lname', age='$age' WHERE id='$id'";
    }

    $query = mysqli_query($con, $update);

    if ($query) {
        echo '<script type="text/javascript">
            alert("Data updated successfully");
            window.location.href="view.php"; 
        </script>';
    } else {
        echo '<script type="text/javascript">
            alert("Data is not updated successfully");
        </script>';
    }
}
?>
