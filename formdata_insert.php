formdata_insert.php

<?php 
// Database connection
$con = mysqli_connect("localhost", "u271933466_info", "Avnish@3707", "u271933466_suryamitra1");

// Check connection
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Function to handle file uploads
function uploadFile($inputName) {
    if (isset($_FILES[$inputName]) && $_FILES[$inputName]["error"] == 0) {
        $filename = basename($_FILES[$inputName]["name"]);
        $targetDir = "image/";
        $targetFile = $targetDir . $filename;

        // Move uploaded file to target directory
        if (move_uploaded_file($_FILES[$inputName]["tmp_name"], $targetFile)) {
            return $filename;
        } else {
            echo '<script type="text/javascript"> alert("Failed to move uploaded file: ' . $inputName . '"); </script>';
        }
    }
    return ''; // Return an empty string if upload fails
}

// Check if form is submitted
if (isset($_POST['submit-btn'])) {
    // Collect form data
    $candidate_name = mysqli_real_escape_string($con, $_POST['candidate_name']);
    $mobile_no = mysqli_real_escape_string($con, $_POST['mobile_no']);
    $email_id = mysqli_real_escape_string($con, $_POST['email_id']); 
    $aadhar_card = mysqli_real_escape_string($con, $_POST['aadhar_card']); 
    $aadhar_no = mysqli_real_escape_string($con, $_POST['aadhar_no']);
    $identity_type = mysqli_real_escape_string($con, $_POST['identity_type']); 
    $identity_certificate_no = mysqli_real_escape_string($con, $_POST['identity_certificate_no']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $nationality = mysqli_real_escape_string($con, $_POST['nationality']);
    $father_name = mysqli_real_escape_string($con, $_POST['father_name']);
    $mother_name = mysqli_real_escape_string($con, $_POST['mother_name']);
    $permanent_mark = mysqli_real_escape_string($con, $_POST['permanent_mark']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $marital_status = mysqli_real_escape_string($con, $_POST['marital_status']);
    $domicile_certificate = mysqli_real_escape_string($con, $_POST['domicile_certificate']);
    $Domicile_certificate_no = mysqli_real_escape_string($con, $_POST['Domicile_certificate_no']);
    $Domcile_issuing_state = mysqli_real_escape_string($con, $_POST['Domcile_issuing_state']);
    $religion = mysqli_real_escape_string($con, $_POST['religion']);
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $recruitment_mode = mysqli_real_escape_string($con, $_POST['recruitment_mode']);
    $differently_abled = mysqli_real_escape_string($con, $_POST['differently_abled']);
    $ex_serviceman = mysqli_real_escape_string($con, $_POST['ex_serviceman']);
    $departmental = mysqli_real_escape_string($con, $_POST['departmental']);
    $department_name = mysqli_real_escape_string($con, $_POST['department_name']);
    $department_joining_date = mysqli_real_escape_string($con, $_POST['department_joining_date']);
    $noc = mysqli_real_escape_string($con, $_POST['noc']);
    $noc_remarks = mysqli_real_escape_string($con, $_POST['noc_remarks']);
    $completed_service = mysqli_real_escape_string($con, $_POST['completed_service']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $pin = mysqli_real_escape_string($con, $_POST['pin']);
    $state = mysqli_real_escape_string($con, $_POST['state']);
    $distic = mysqli_real_escape_string($con, $_POST['distic']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $police = mysqli_real_escape_string($con, $_POST['police']);
    $post_office = mysqli_real_escape_string($con, $_POST['post_office']);
    $tehsil = mysqli_real_escape_string($con, $_POST['tehsil']);
    $address_copy = mysqli_real_escape_string($con, $_POST['address_copy']);
    $pin_copy = mysqli_real_escape_string($con, $_POST['pin_copy']);
    $state_copy = mysqli_real_escape_string($con, $_POST['state_copy']);
    $distic_copy = mysqli_real_escape_string($con, $_POST['distic_copy']);
    $city_copy = mysqli_real_escape_string($con, $_POST['city_copy']);
    $police_copy = mysqli_real_escape_string($con, $_POST['police_copy']);
    $post_office_copy = mysqli_real_escape_string($con, $_POST['post_office_copy']);
    $tehsil_copy = mysqli_real_escape_string($con, $_POST['tehsil_copy']);
    $qualification_type = mysqli_real_escape_string($con, $_POST['qualification_type']);
    $Certificate_no_pin = mysqli_real_escape_string($con, $_POST['Certificate_no_pin']);
    $year = mysqli_real_escape_string($con, $_POST['year']);
    $state_s = mysqli_real_escape_string($con, $_POST['state_s']);
    $University = mysqli_real_escape_string($con, $_POST['University']);
    $post = mysqli_real_escape_string($con, $_POST['post']);

    // File upload handling
    $photo = uploadFile('photo');
    $signature = uploadFile('signature');
    $ssc = uploadFile('ssc');
    $intermediate = uploadFile('intermediate');
    $castEws = uploadFile('castEws');
    $graduation = uploadFile('graduation');
    $postGraduation = uploadFile('postGraduation');

    // SQL query to insert data into the database
    $query = "INSERT INTO `insert_form_data` 
        (`candidate_name`, `mobile_no`, `email_id`, `aadhar_card`, `aadhar_no`, `identity_type`, `identity_certificate_no`, `dob`, `age`, `nationality`, `father_name`, `mother_name`, `permanent_mark`, `gender`, `marital_status`, `domicile_certificate`, `Domicile_certificate_no`, `Domcile_issuing_state`, `religion`, `category`, `recruitment_mode`, `differently_abled`, `ex_serviceman`, `departmental`, `department_name`, `department_joining_date`, `noc`, `noc_remarks`, `completed_service`, `address`, `pin`, `state`, `distic`, `city`, `police`, `post_office`, `tehsil`, `address_copy`, `pin_copy`, `state_copy`, `distic_copy`, `city_copy`, `police_copy`, `post_office_copy`, `tehsil_copy`, `qualification_type`, `Certificate_no_pin`, `year`, `state_s`, `University`, `photo`, `signature`, `ssc`, `intermediate`, `castEws`, `graduation`, `postGraduation`, `post`) 
        VALUES 
        ('$candidate_name', '$mobile_no', '$email_id', '$aadhar_card', '$aadhar_no', '$identity_type', '$identity_certificate_no', '$dob', '$age', '$nationality', '$father_name', '$mother_name', '$permanent_mark', '$gender', '$marital_status', '$domicile_certificate', '$Domicile_certificate_no', '$Domcile_issuing_state', '$religion', '$category', '$recruitment_mode', '$differently_abled', '$ex_serviceman', '$departmental', '$department_name', '$department_joining_date', '$noc', '$noc_remarks', '$completed_service', '$address', '$pin', '$state', '$distic', '$city', '$police', '$post_office', '$tehsil', '$address_copy', '$pin_copy', '$state_copy', '$distic_copy', '$city_copy', '$police_copy', '$post_office_copy', '$tehsil_copy', '$qualification_type', '$Certificate_no_pin', '$year', '$state_s', '$University', '$photo', '$signature', '$ssc', '$intermediate', '$castEws', '$graduation', '$postGraduation', '$post')";

    // Execute the query
    $data = mysqli_query($con, $query);

    if ($data) {
        echo '<script type="text/javascript">
                alert("Your data was successfully saved"); 
                window.location.href = "dashboard.php"; 
              </script>';
    } else {
        echo '<script type="text/javascript">
                alert("Error saving data: ' . mysqli_error($con) . '"); 
              </script>';
    }
}
?>
