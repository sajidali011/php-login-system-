<?php
$con = mysqli_connect("localhost", "root", "", "upload_image");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0; // Ensure the ID is an integer

// Fetch the filename of the image before deleting the record
$select = "SELECT uploadfile FROM stp_data WHERE id='$id'";
$query = mysqli_query($con, $select);

if ($query) {
    $row = mysqli_fetch_assoc($query);
    $filename = $row['uploadfile'];

    // Delete the image file if it exists
    if ($filename) {
        $file_path = "image/" . $filename;
        if (file_exists($file_path)) {
            unlink($file_path); // Delete the file
        }
    }

    // Now delete the record from the database
    $delete = "DELETE FROM stp_data WHERE id='$id'";
    $delete_query = mysqli_query($con, $delete);

    if ($delete_query) {
        ?>
        <script type="text/javascript">
            alert("Data deleted successfully");
            window.location.href = "view.php";
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert("Please try again");
        </script>
        <?php
    }
} else {
    ?>
    <script type="text/javascript">
        alert("Error fetching data");
    </script>
    <?php
}
?>
