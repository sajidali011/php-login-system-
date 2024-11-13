<?php
$con = mysqli_connect("localhost", "root", "", "upload_image");
if ($con) {
    echo "Connected";
} else {
    echo "Not connected";
}
?>

<div>
    <form action="" method="POST" enctype="multipart/form-data">
        <input value="" type="text" placeholder="firstname" name="firstname"><br><br>
        <input value="" type="text" placeholder="lastname" name="lastname"><br><br>
        <input value="" type="number" placeholder="age" name="age"><br><br>
        <input type="file" name="uploadfile"><br><br>
        <input value="submit" type="submit" name="submit-btn">
        <a href="view.php"><input value="view" type="button" name="view"></a><br><br>
    </form>
</div>

<?php
if (isset($_POST['submit-btn'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $age = $_POST['age'];

    // Check if a file was uploaded
    if (isset($_FILES["uploadfile"]) && $_FILES["uploadfile"]["error"] == 0) {
        $filename = $_FILES["uploadfile"]["name"];
        $tmp_name = $_FILES["uploadfile"]["tmp_name"];
        $folder = "image/" . $filename;

        if (move_uploaded_file($tmp_name, $folder)) {
            // If the file is successfully moved, insert the file name into the database
            $query = "INSERT INTO `stp_data` (`firstname`, `lastname`, `age`, `uploadfile`) VALUES ('$fname', '$lname', '$age', '$filename')";
            $data = mysqli_query($con, $query);

            if ($data) {
                echo '<script type="text/javascript"> alert("Your data and file successfully saved"); </script>';
            } else {
                echo '<script type="text/javascript"> alert("Data not saved"); </script>';
            }
        } else {
            echo '<script type="text/javascript"> alert("File upload failed"); </script>';
        }
    } else {
        echo '<script type="text/javascript"> alert("No file uploaded or there was an error"); </script>';
    }
}
?>
