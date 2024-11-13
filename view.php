<a href="phpcrud.php">Back</a> <br><br>

<?php
$con = mysqli_connect("localhost", "root", "", "upload_image");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<center>
    <table border="1px" cellpadding="10px" cellspacing="0">
        <tr>
            <th>FIRST NAME</th>
            <th>LAST NAME</th>
            <th>AGE</th>
            <th>IMAGE</th>
            <th>ACTION</th>
        </tr>

        <?php
        $select = "SELECT * FROM stp_data"; // Ensure this matches your table name
        $query = mysqli_query($con, $select);
        $data = mysqli_num_rows($query);

        if ($data) {
            while ($row = mysqli_fetch_assoc($query)) {
        ?>
                <tr>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td>
                        <?php
                        // Display the uploaded image
                        $imagePath = "image/" . $row['uploadfile'];
                        if (!empty($row['uploadfile']) && file_exists($imagePath)) {
                            echo '<img src="' . $imagePath . '" alt="User Image" width="100">';
                        } else {
                            echo 'No image';
                        }
                        ?>
                    </td>
                    <td>
                        <a href="update.php?id=<?php echo $row['id']; ?>" class="btn">EDIT</a>
                        <a onclick="return confirm('Are you sure you want to delete this data?')" href="delete.php?id=<?php echo $row['id']; ?>" class="btn">DELETE</a>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo "<tr><td colspan='5'>No data found</td></tr>";
        }
        ?>
    </table>
</center>
