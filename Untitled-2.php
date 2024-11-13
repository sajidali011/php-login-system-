<?php
session_start();

// Database connection
$con = mysqli_connect("localhost", "u271933466_info", "Avnish@3707", "u271933466_suryamitra1");

// Check connection
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Get the ID from the URL
$id = $_GET['id'];

// Fetch data based on the ID
$SELECT = "SELECT * FROM insert_form_data WHERE id='$id'";
$query = mysqli_query($con, $SELECT);
$row = mysqli_fetch_assoc($query);

// Update data if the form is submitted
if (isset($_POST['update-btn'])) {
    $candidate_name = $_POST['candidate_name'];
    $mobile_no = $_POST['mobile_no'];
    $email_id = $_POST['email_id'];
    
    $aadhar_card = $_POST['aadhar_card'];
    $aadhar_no = $_POST['aadhar_no'];
    $identity_type = $_POST['identity_type'];
    $identity_certificate_no = $_POST['identity_certificate_no'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $nationality = $_POST['nationality'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $permanent_mark = $_POST['permanent_mark'];
    $gender = $_POST['gender'];
    $marital_status = $_POST['marital_status'];
    
    $domicile_certificate = $_POST['domicile_certificate'];
    $Domicile_certificate_no = $_POST['Domicile_certificate_no'];
    $Domcile_issuing_state = $_POST['Domcile_issuing_state'];
    
     $religion = $_POST['religion'];
    $category = $_POST['category'];
    $recruitment_mode = $_POST['recruitment_mode'];
    $differently_abled = $_POST['differently_abled'];
    $ex_serviceman = $_POST['ex_serviceman'];
    $departmental = $_POST['departmental'];
    $department_name = $_POST['department_name'];
    $department_joining_date = $_POST['department_joining_date'];
    $noc = $_POST['noc'];
    $noc_remarks = $_POST['noc_remarks'];
    $completed_service = $_POST['completed_service'];
    $address = $_POST['address'];
    $pin = $_POST['pin'];
    $state = $_POST['state'];
    $distic = $_POST['distic'];
    $city = $_POST['city'];
    $police = $_POST['police'];
    $post_office = $_POST['post_office'];
    $tehsil = $_POST['tehsil'];
    $address_copy = $_POST['address_copy'];
    $pin_copy = $_POST['pin_copy'];
    $state_copy = $_POST['state_copy'];
    $distic_copy = $_POST['distic_copy'];
    $city_copy = $_POST['city_copy'];
    $police_copy = $_POST['police_copy'];
    $post_office_copy = $_POST['post_office_copy'];
    $tehsil_copy = $_POST['tehsil_copy'];
    $qualification_type = $_POST['qualification_type'];
    $Certificate_no_pin = $_POST['Certificate_no_pin'];
    $year = $_POST['year'];
    $state_s = $_POST['state_s'];
    $University = $_POST['University'];
  
  
    
    
    // Handle file uploads
    $photo = $_FILES['photo']['name'];
    $signature = $_FILES['signature']['name'];
    $ssc = $_FILES['ssc']['name'];
    $intermediate = $_FILES['intermediate']['name'];
    $castEws = $_FILES['castEws']['name'];
    $graduation = $_FILES['graduation']['name'];
    $postGraduation = $_FILES['postGraduation']['name'];
    
    // Define the target directory
    $target_dir = "image/";

    // Update file paths if new files are uploaded
    $updateData = [
        'candidate_name' => $candidate_name,
        'mobile_no' => $mobile_no,
        'email_id' => $email_id,
        
        'aadhar_card' => $aadhar_card,
        'aadhar_no' => $aadhar_no,
         'identity_type' => $identity_type,
          'identity_certificate_no' => $identity_certificate_no,
         'dob' => $dob,
          'age' => $age,
           'nationality' => $nationality,
            'father_name' => $father_name,
             'mother_name' => $mother_name,
              'permanent_mark' => $permanent_mark,
               'gender' => $gender,
                'marital_status' => $marital_status,
                
     'domicile_certificate' => $domicile_certificate,
    'Domicile_certificate_no' => $Domicile_certificate_no,
    'Domcile_issuing_state' => $Domcile_issuing_state,
    'religion' => $religion,
    'category' => $category,
    'recruitment_mode' => $recruitment_mode,
    'differently_abled' => $differently_abled,
    'ex_serviceman' => $ex_serviceman,
    'departmental' => $departmental,
    'department_name' => $department_name,
    'department_joining_date' => $department_joining_date,
    'noc' => $noc,
    'noc_remarks' => $noc_remarks,
    'completed_service' => $completed_service,
    'address' => $address,
    'pin' => $pin,
    'state' => $state,
    'distic' => $distic,
    'city' => $city,
    'police' => $police,
    'post_office' => $post_office,
    'tehsil' => $tehsil,
    'address_copy' => $address_copy,
    'pin_copy' => $pin_copy,
    'state_copy' => $state_copy,
    'distic_copy' => $distic_copy,
    'city_copy' => $city_copy,
    'police_copy' => $police_copy,
    'post_office_copy' => $post_office_copy,
    'tehsil_copy' => $tehsil_copy,
    'qualification_type' => $qualification_type,
    'Certificate_no_pin' => $Certificate_no_pin,
    'year' => $year,
    'state_s' => $state_s,
    'University' => $University];




    // Check and move uploaded files
    foreach (['photo', 'signature', 'ssc', 'intermediate', 'castEws', 'graduation', 'postGraduation'] as $fileType) {
        if (!empty($_FILES[$fileType]['name'])) {
            // Remove old file if it exists
            if (!empty($row[$fileType])) {
                unlink($target_dir . $row[$fileType]);
            }
            $target_file = $target_dir . basename($_FILES[$fileType]['name']);
            move_uploaded_file($_FILES[$fileType]['tmp_name'], $target_file);
            $updateData[$fileType] = basename($_FILES[$fileType]['name']);
        } else {
            // Keep old file if no new file is uploaded
            $updateData[$fileType] = $row[$fileType];
        }
    }

    // Update query
    $update = "UPDATE insert_form_data SET 
                candidate_name='{$updateData['candidate_name']}', 
                mobile_no='{$updateData['mobile_no']}', 
                email_id='{$updateData['email_id']}', 
                
                aadhar_card='{$updateData['aadhar_card']}',
                 aadhar_no='{$updateData['aadhar_no']}',
                  identity_type='{$updateData['identity_type']}',
                   identity_certificate_no='{$updateData['identity_certificate_no']}',
                    dob='{$updateData['$dob,']}',
                     age='{$updateData['age']}',
                      nationality='{$updateData['nationality']}',
                       father_name='{$updateData['father_name']}',
                        mother_name='{$updateData['mother_name']}',
                         permanent_mark='{$updateData['permanent_mark']}',
                          gender='{$updateData['gender']}',
                           marital_status='{$updateData['marital_status']}',
                           
                            domicile_certificate = '{$updateData['domicile_certificate']}',
    Domicile_certificate_no = '{$updateData['Domicile_certificate_no']}',
    Domcile_issuing_state = '{$updateData['Domcile_issuing_state']}',
    religion = '{$updateData['religion']}',
    category = '{$updateData['category']}',
    recruitment_mode = '{$updateData['recruitment_mode']}',
    differently_abled = '{$updateData['differently_abled']}',
    ex_serviceman = '{$updateData['ex_serviceman']}',
    departmental = '{$updateData['departmental']}',
    department_name = '{$updateData['department_name']}',
    department_joining_date = '{$updateData['department_joining_date']}',
    noc = '{$updateData['noc']}',
    noc_remarks = '{$updateData['noc_remarks']}',
    completed_service = '{$updateData['completed_service']}',
    address = '{$updateData['address']}',
    pin = '{$updateData['pin']}',
    state = '{$updateData['state']}',
    distic = '{$updateData['distic']}',
    city = '{$updateData['city']}',
    police = '{$updateData['police']}',
    post_office = '{$updateData['post_office']}',
    tehsil = '{$updateData['tehsil']}',
    address_copy = '{$updateData['address_copy']}',
    pin_copy = '{$updateData['pin_copy']}',
    state_copy = '{$updateData['state_copy']}',
    distic_copy = '{$updateData['distic_copy']}',
    city_copy = '{$updateData['city_copy']}',
    police_copy = '{$updateData['police_copy']}',
    post_office_copy = '{$updateData['post_office_copy']}',
    tehsil_copy = '{$updateData['tehsil_copy']}',
    qualification_type = '{$updateData['qualification_type']}',
    Certificate_no_pin = '{$updateData['Certificate_no_pin']}',
    year = '{$updateData['year']}',
    state_s = '{$updateData['state_s']}',
    University = '{$updateData['University']}',
    
 
                photo='{$updateData['photo']}', 
                signature='{$updateData['signature']}', 
                ssc='{$updateData['ssc']}', 
                intermediate='{$updateData['intermediate']}', 
                castEws='{$updateData['castEws']}', 
                graduation='{$updateData['graduation']}', 
                postGraduation='{$updateData['postGraduation']}' 
                WHERE id='$id'";

    $query = mysqli_query($con, $update);

    if ($query) {
        echo '<script type="text/javascript">
        alert("Data updated successfully");
        window.location.href="fetch_form_data.php"; 
        </script>';
    } else {
        echo '<script type="text/javascript">
        alert("Data is not updated successfully");
        </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Personal Details Form</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>

<!-- Menubar -->
<div class="container-fluid">
    <div class="header-row">
        <div>
            Email: <a href="mailto:info@suryamitranise.in">info@suryamitranise.in</a>
        </div>
        <div class="btn-group">
            <?php if (isset($_SESSION['username'])): ?>
                <span>Welcome, <?php echo $_SESSION['username']; ?>!</span>
                <button type="button" class="btn">
                    <a href="logout.php">Log out</a>
                </button>
            <?php endif; ?>
        </div>
    </div>

    <nav>
        <img src="img/logo.png" alt="Your Logo" class="logo">
        <ul class="menu">
            <li><a href="index.php">HOME</a></li>
            <li><a href="about.php">ABOUT US</a></li>
            <li><a href="gallery.php">GALLERY</a></li>
            <li><a href="ourpartners.php">OUR PARTNERS</a></li>
            <li><a href="contact.php">CONTACT</a></li>
        </ul>
    </nav>
</div>
<!-- Menubar end -->

<div class="form-container">
    <h2>Update Personal Details Form</h2>

    <form action="" method="POST" enctype="multipart/form-data">
        <!-- Personal Information Section -->
        <h3>Personal Information</h3>
        <div class="two-column">
            <div class="form-group">
                <label for="candidate_name">Candidate's Name / प्रत्याशी का नाम:</label>
                <input type="text" id="candidate_name" name="candidate_name" value="<?php echo htmlspecialchars($row['candidate_name']); ?>" required>
            </div>

            <div class="form-group">
                <label for="mobile_no">Mobile No. / मोबाइल संख्या:</label>
                <input type="text" id="mobile_no" name="mobile_no" value="<?php echo htmlspecialchars($row['mobile_no']); ?>" required>
            </div>

            <div class="form-group">
                <label for="email_id">Email Id / इ-मेल आई. डी:</label>
                <input type="email" id="email_id" name="email_id" value="<?php echo htmlspecialchars($row['email_id']); ?>" required>
            </div>
        </div>
        
      <!-- Identity Details Section -->
<h3>Identity Details</h3>
<div class="two-column">
    <div class="form-group">
        <label for="aadhar_card">Aadhar Card (Preferably):</label>
        <input type="text" id="aadhar_card" name="aadhar_card" value="<?php echo htmlspecialchars($row['aadhar_card']); ?>">
    </div>

    <div class="form-group">
        <label for="aadhar_no">Aadhar No:</label>
        <input type="text" id="aadhar_no" name="aadhar_no" value="<?php echo htmlspecialchars($row['aadhar_no']); ?>">
    </div>

    <div class="form-group">
        <label for="identity_type">Identity Type:</label>
        <select id="identity_type" name="identity_type" required>
            <option value="">Select Identity Type</option>
            <option value="passport" <?php echo ($row['identity_type'] == 'passport') ? 'selected' : ''; ?>>Passport</option>
            <option value="pan" <?php echo ($row['identity_type'] == 'pan') ? 'selected' : ''; ?>>PAN Card</option>
            <option value="driving_license" <?php echo ($row['identity_type'] == 'driving_license') ? 'selected' : ''; ?>>Driving License</option>
            <option value="aadhar" <?php echo ($row['identity_type'] == 'aadhar') ? 'selected' : ''; ?>>Aadhar</option>
            <option value="voter_id" <?php echo ($row['identity_type'] == 'voter_id') ? 'selected' : ''; ?>>Voter ID</option>
        </select>
    </div>

    <div class="form-group">
        <label for="identity_certificate_no">Identity Certificate No:</label>
        <input type="text" id="identity_certificate_no" name="identity_certificate_no" value="<?php echo htmlspecialchars($row['identity_certificate_no']); ?>" required>
    </div>
</div>

<h3>Additional Information</h3>
<div class="two-column">
    <div class="form-group">
        <label for="dob">Date of Birth / जन्मतिथि:</label>
        <input type="date" id="dob" name="dob" value="<?php echo htmlspecialchars($row['dob']); ?>" required>
    </div>

    <div class="form-group">
        <label for="age">Age / आयु:</label>
        <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($row['age']); ?>" required>
    </div>

    <div class="form-group">
        <label for="nationality">Nationality / राष्ट्रीयता:</label>
        <input type="text" id="nationality" name="nationality" value="<?php echo htmlspecialchars($row['nationality']); ?>" required>
    </div>

    <div class="form-group">
        <label for="father_name">Father's Name / पिता का नाम:</label>
        <input type="text" id="father_name" name="father_name" value="<?php echo htmlspecialchars($row['father_name']); ?>" required>
    </div>

    <div class="form-group">
        <label for="mother_name">Mother's Name / माता का नाम:</label>
        <input type="text" id="mother_name" name="mother_name" value="<?php echo htmlspecialchars($row['mother_name']); ?>" required>
    </div>

    <div class="form-group">
        <label for="permanent_mark">Permanent Identification Mark on Body:</label>
        <input type="text" id="permanent_mark" name="permanent_mark" value="<?php echo htmlspecialchars($row['permanent_mark']); ?>" required>
    </div>

    <div class="form-group">
        <label for="gender">Gender / लिंग:</label>
        <select id="gender" name="gender" required>
            <option value="">Select Gender</option>
            <option value="male" <?php echo ($row['gender'] == 'male') ? 'selected' : ''; ?>>Male</option>
            <option value="female" <?php echo ($row['gender'] == 'female') ? 'selected' : ''; ?>>Female</option>
        </select>
    </div>

    <div class="form-group">
        <label for="marital_status">Marital Status / वैवाहिक स्थिति:</label>
        <select id="marital_status" name="marital_status" required>
            <option value="">Select Marital Status</option>
            <option value="married" <?php echo ($row['marital_status'] == 'married') ? 'selected' : ''; ?>>Married</option>
            <option value="unmarried" <?php echo ($row['marital_status'] == 'unmarried') ? 'selected' : ''; ?>>Unmarried</option>
            <option value="divorced" <?php echo ($row['marital_status'] == 'divorced') ? 'selected' : ''; ?>>Divorced</option>
            <option value="widow" <?php echo ($row['marital_status'] == 'widow') ? 'selected' : ''; ?>>Widow</option>
        </select>
    </div>
</div>

<!-- Domicile Details Section -->
<h3>Domicile Details</h3>
<div class="two-column">
    <div class="form-group">
        <label for="domicile_certificate">Do you have domicile certificate?</label>
        <select id="domicile_certificate" name="domicile_certificate" required>
            <option value="">Select Option</option>
            <option value="yes" <?php echo ($row['domicile_certificate'] == 'yes') ? 'selected' : ''; ?>>Yes</option>
            <option value="no" <?php echo ($row['domicile_certificate'] == 'no') ? 'selected' : ''; ?>>No</option>
        </select>
    </div>
    <div class="form-group">
        <label for="Domicile_certificate_no">Domicile certificate number:</label>
        <input type="text" id="Domicile_certificate_no" name="Domicile_certificate_no" value="<?php echo htmlspecialchars($row['Domicile_certificate_no']); ?>">
    </div>
   </div>

<div class="form-group">
    <label for="Domcile_issuing_state">Domicile Issuing State:</label>
    <select id="Domcile_issuing_state" name="Domcile_issuing_state" required>
        <option value="" <?php echo ($row['Domcile_issuing_state'] == '') ? 'selected' : ''; ?>>Select State</option>
        <option value="ANDHRA PRADESH" <?php echo ($row['Domcile_issuing_state'] == 'ANDHRA PRADESH') ? 'selected' : ''; ?>>ANDHRA PRADESH</option>
        <option value="ARUNACHAL PRADESH" <?php echo ($row['Domcile_issuing_state'] == 'ARUNACHAL PRADESH') ? 'selected' : ''; ?>>ARUNACHAL PRADESH</option>
        <option value="ASSAM" <?php echo ($row['Domcile_issuing_state'] == 'ASSAM') ? 'selected' : ''; ?>>ASSAM</option>
        <option value="BIHAR" <?php echo ($row['Domcile_issuing_state'] == 'BIHAR') ? 'selected' : ''; ?>>BIHAR</option>
        <option value="CHANDIGARH" <?php echo ($row['Domcile_issuing_state'] == 'CHANDIGARH') ? 'selected' : ''; ?>>CHANDIGARH</option>
        <option value="CHHATTISGARH" <?php echo ($row['Domcile_issuing_state'] == 'CHHATTISGARH') ? 'selected' : ''; ?>>CHHATTISGARH</option>
        <option value="DADRA & NAGAR HAVELI" <?php echo ($row['Domcile_issuing_state'] == 'DADRA & NAGAR HAVELI') ? 'selected' : ''; ?>>DADRA & NAGAR HAVELI</option>
        <option value="DAMAN & DIU" <?php echo ($row['Domcile_issuing_state'] == 'DAMAN & DIU') ? 'selected' : ''; ?>>DAMAN & DIU</option>
        <option value="GOA" <?php echo ($row['Domcile_issuing_state'] == 'GOA') ? 'selected' : ''; ?>>GOA</option>
        <option value="GUJARAT" <?php echo ($row['Domcile_issuing_state'] == 'GUJARAT') ? 'selected' : ''; ?>>GUJARAT</option>
        <option value="HARYANA" <?php echo ($row['Domcile_issuing_state'] == 'HARYANA') ? 'selected' : ''; ?>>HARYANA</option>
        <option value="HIMACHAL PRADESH" <?php echo ($row['Domcile_issuing_state'] == 'HIMACHAL PRADESH') ? 'selected' : ''; ?>>HIMACHAL PRADESH</option>
        <option value="JAMMU & KASHMIR" <?php echo ($row['Domcile_issuing_state'] == 'JAMMU & KASHMIR') ? 'selected' : ''; ?>>JAMMU & KASHMIR</option>
        <option value="JHARKHAND" <?php echo ($row['Domcile_issuing_state'] == 'JHARKHAND') ? 'selected' : ''; ?>>JHARKHAND</option>
        <option value="KARNATAKA" <?php echo ($row['Domcile_issuing_state'] == 'KARNATAKA') ? 'selected' : ''; ?>>KARNATAKA</option>
        <option value="KERALA" <?php echo ($row['Domcile_issuing_state'] == 'KERALA') ? 'selected' : ''; ?>>KERALA</option>
        <option value="LADAKH" <?php echo ($row['Domcile_issuing_state'] == 'LADAKH') ? 'selected' : ''; ?>>LADAKH</option>
        <option value="LAKSHADWEEP" <?php echo ($row['Domcile_issuing_state'] == 'LAKSHADWEEP') ? 'selected' : ''; ?>>LAKSHADWEEP</option>
        <option value="MADHYA PRADESH" <?php echo ($row['Domcile_issuing_state'] == 'MADHYA PRADESH') ? 'selected' : ''; ?>>MADHYA PRADESH</option>
        <option value="MAHARASHTRA" <?php echo ($row['Domcile_issuing_state'] == 'MAHARASHTRA') ? 'selected' : ''; ?>>MAHARASHTRA</option>
        <option value="MANIPUR" <?php echo ($row['Domcile_issuing_state'] == 'MANIPUR') ? 'selected' : ''; ?>>MANIPUR</option>
        <option value="MEGHALAYA" <?php echo ($row['Domcile_issuing_state'] == 'MEGHALAYA') ? 'selected' : ''; ?>>MEGHALAYA</option>
        <option value="MIZORAM" <?php echo ($row['Domcile_issuing_state'] == 'MIZORAM') ? 'selected' : ''; ?>>MIZORAM</option>
        <option value="NAGALAND" <?php echo ($row['Domcile_issuing_state'] == 'NAGALAND') ? 'selected' : ''; ?>>NAGALAND</option>
        <option value="NCT OF DELHI" <?php echo ($row['Domcile_issuing_state'] == 'NCT OF DELHI') ? 'selected' : ''; ?>>NCT OF DELHI</option>
        <option value="ORISSA" <?php echo ($row['Domcile_issuing_state'] == 'ORISSA') ? 'selected' : ''; ?>>ORISSA</option>
        <option value="PUDUCHERRY" <?php echo ($row['Domcile_issuing_state'] == 'PUDUCHERRY') ? 'selected' : ''; ?>>PUDUCHERRY</option>
        <option value="PUNJAB" <?php echo ($row['Domcile_issuing_state'] == 'PUNJAB') ? 'selected' : ''; ?>>PUNJAB</option>
        <option value="RAJASTHAN" <?php echo ($row['Domcile_issuing_state'] == 'RAJASTHAN') ? 'selected' : ''; ?>>RAJASTHAN</option>
        <option value="SIKKIM" <?php echo ($row['Domcile_issuing_state'] == 'SIKKIM') ? 'selected' : ''; ?>>SIKKIM</option>
        <option value="TAMIL NADU" <?php echo ($row['Domcile_issuing_state'] == 'TAMIL NADU') ? 'selected' : ''; ?>>TAMIL NADU</option>
        <option value="TELANGANA" <?php echo ($row['Domcile_issuing_state'] == 'TELANGANA') ? 'selected' : ''; ?>>TELANGANA</option>
        <option value="TRIPURA" <?php echo ($row['Domcile_issuing_state'] == 'TRIPURA') ? 'selected' : ''; ?>>TRIPURA</option>
        <option value="UTTAR PRADESH" <?php echo ($row['Domcile_issuing_state'] == 'UTTAR PRADESH') ? 'selected' : ''; ?>>UTTAR PRADESH</option>
        <option value="UTTARAKHAND" <?php echo ($row['Domcile_issuing_state'] == 'UTTARAKHAND') ? 'selected' : ''; ?>>UTTARAKHAND</option>
        <option value="WEST BENGAL" <?php echo ($row['Domcile_issuing_state'] == 'WEST BENGAL') ? 'selected' : ''; ?>>WEST BENGAL</option>
    </select>
</div>


<h3>Category Reservation</h3>
<div class="two-column">
    <div class="form-group">
        <label for="religion">Religion / धर्म:</label>
        <select id="religion" name="religion" required>
            <option value="">Select Religion</option>
            <option value="hindu" <?php echo ($row['religion'] == 'hindu') ? 'selected' : ''; ?>>Hindu</option>
            <option value="muslim" <?php echo ($row['religion'] == 'muslim') ? 'selected' : ''; ?>>Muslim</option>
            <option value="christian" <?php echo ($row['religion'] == 'christian') ? 'selected' : ''; ?>>Christian</option>
            <option value="sikh" <?php echo ($row['religion'] == 'sikh') ? 'selected' : ''; ?>>Sikh</option>
            <option value="jain" <?php echo ($row['religion'] == 'jain') ? 'selected' : ''; ?>>Jain</option>
            <option value="others" <?php echo ($row['religion'] == 'others') ? 'selected' : ''; ?>>Others</option>
        </select>
    </div>

    <div class="form-group">
        <label for="category">Category / श्रेणी:</label>
        <select id="category" name="category" required>
            <option value="">Select Category</option>
            <option value="unreserved" <?php echo ($row['category'] == 'unreserved') ? 'selected' : ''; ?>>Unreserved</option>
            <option value="sc" <?php echo ($row['category'] == 'sc') ? 'selected' : ''; ?>>SC</option>
            <option value="st" <?php echo ($row['category'] == 'st') ? 'selected' : ''; ?>>ST</option>
            <option value="obc" <?php echo ($row['category'] == 'obc') ? 'selected' : ''; ?>>OBC</option>
            <option value="ews" <?php echo ($row['category'] == 'ews') ? 'selected' : ''; ?>>EWS</option>
        </select>
    </div>

    <div class="form-group">
        <label for="recruitment_mode">Mode of Recruitment / भर्ती का तरीका:</label>
        <select id="recruitment_mode" name="recruitment_mode" required>
            <option value="">Select Mode of Recruitment</option>
            <option value="direct_entry" <?php echo ($row['recruitment_mode'] == 'direct_entry') ? 'selected' : ''; ?>>Direct Entry (DE)</option>
            <option value="ex_serviceman" <?php echo ($row['recruitment_mode'] == 'ex_serviceman') ? 'selected' : ''; ?>>Ex-Serviceman (ESM)</option>
            <option value="gov_employee" <?php echo ($row['recruitment_mode'] == 'gov_employee') ? 'selected' : ''; ?>>Government Employee</option>
            <option value="bsd_department" <?php echo ($row['recruitment_mode'] == 'bsd_department') ? 'selected' : ''; ?>>BSD Department</option>
        </select>
    </div>
</div>


  <h3>Subcategory Reservation</h3>
<div class="two-column">
    <div class="form-group">
        <label for="differently_abled">Are you Differently Abled Person?</label>
        <select id="differently_abled" name="differently_abled" required>
            <option value="" <?php echo ($row['differently_abled'] == '') ? 'selected' : ''; ?>>Select Option</option>
            <option value="yes" <?php echo ($row['differently_abled'] == 'yes') ? 'selected' : ''; ?>>Yes</option>
            <option value="no" <?php echo ($row['differently_abled'] == 'no') ? 'selected' : ''; ?>>No</option>
        </select>
    </div>

    <div class="form-group">
        <label for="ex_serviceman">Are You Ex-Serviceman?</label>
        <select id="ex_serviceman" name="ex_serviceman" required>
            <option value="" <?php echo ($row['ex_serviceman'] == '') ? 'selected' : ''; ?>>Select Option</option>
            <option value="yes" <?php echo ($row['ex_serviceman'] == 'yes') ? 'selected' : ''; ?>>Yes</option>
            <option value="no" <?php echo ($row['ex_serviceman'] == 'no') ? 'selected' : ''; ?>>No</option>
        </select>
    </div>

    <div class="form-group">
        <label for="departmental">Departmental (Central Government):</label>
        <select id="departmental" name="departmental">
            <option value="" <?php echo ($row['departmental'] == '') ? 'selected' : ''; ?>>Select Option</option>
            <option value="central_government" <?php echo ($row['departmental'] == 'central_government') ? 'selected' : ''; ?>>Central Government</option>
        </select>
    </div>

    <div class="form-group">
        <label for="department_name">Department Name / विभाग का नाम:</label>
        <input type="text" id="department_name" name="department_name" value="<?php echo htmlspecialchars($row['department_name']); ?>">
    </div>

    <div class="form-group">
        <label for="department_joining_date">Department Date of Joining:</label>
        <input type="date" id="department_joining_date" name="department_joining_date" value="<?php echo htmlspecialchars($row['department_joining_date']); ?>">
    </div>

    <div class="form-group">
        <label for="noc">NOC:</label>
        <select id="noc" name="noc">
            <option value="" <?php echo ($row['noc'] == '') ? 'selected' : ''; ?>>Select Option</option>
            <option value="upload" <?php echo ($row['noc'] == 'upload') ? 'selected' : ''; ?>>Upload for NOC</option>
            <option value="applied" <?php echo ($row['noc'] == 'applied') ? 'selected' : ''; ?>>Applied for NOC</option>
        </select>
    </div>

    <div class="form-group">
        <label for="noc_remarks">NOC Remarks / एन.ओ.सी. टिप्पणी:</label>
        <input type="text" id="noc_remarks" name="noc_remarks" value="<?php echo htmlspecialchars($row['noc_remarks']); ?>">
    </div>

    <div class="form-group">
        <label for="completed_service">Have you completed 3 years of service?</label>
        <select id="completed_service" name="completed_service" required>
            <option value="" <?php echo ($row['completed_service'] == '') ? 'selected' : ''; ?>>Select Option</option>
            <option value="yes" <?php echo ($row['completed_service'] == 'yes') ? 'selected' : ''; ?>>Yes</option>
            <option value="no" <?php echo ($row['completed_service'] == 'no') ? 'selected' : ''; ?>>No</option>
        </select>
    </div>
</div>

<h3>Address Details</h3>
<div class="form-group">
    <label for="address">Permanent Address/स्थायी पता:</label>
    <textarea id="address" name="address" required rows="4" style="width: 100%;"><?php echo htmlspecialchars($row['address']); ?></textarea>
</div>
<div class="two-column">
    <div class="form-group">
        <label for="pin">PINCODE/पिन कोड:</label>
        <input type="text" id="pin" name="pin" required value="<?php echo htmlspecialchars($row['pin']); ?>">
    </div>

    <div class="form-group">
        <label for="state">State/UT/राज्य / केंद्रीय शासित प्रदेश:</label>
       <select id="state" name="state" required>
        <option value="" <?php echo ($row['Domcile_issuing_state'] == '') ? 'selected' : ''; ?>>Select State</option>
        <option value="ANDHRA PRADESH" <?php echo ($row['Domcile_issuing_state'] == 'ANDHRA PRADESH') ? 'selected' : ''; ?>>ANDHRA PRADESH</option>
        <option value="ARUNACHAL PRADESH" <?php echo ($row['Domcile_issuing_state'] == 'ARUNACHAL PRADESH') ? 'selected' : ''; ?>>ARUNACHAL PRADESH</option>
        <option value="ASSAM" <?php echo ($row['Domcile_issuing_state'] == 'ASSAM') ? 'selected' : ''; ?>>ASSAM</option>
        <option value="BIHAR" <?php echo ($row['Domcile_issuing_state'] == 'BIHAR') ? 'selected' : ''; ?>>BIHAR</option>
        <option value="CHANDIGARH" <?php echo ($row['Domcile_issuing_state'] == 'CHANDIGARH') ? 'selected' : ''; ?>>CHANDIGARH</option>
        <option value="CHHATTISGARH" <?php echo ($row['Domcile_issuing_state'] == 'CHHATTISGARH') ? 'selected' : ''; ?>>CHHATTISGARH</option>
        <option value="DADRA & NAGAR HAVELI" <?php echo ($row['Domcile_issuing_state'] == 'DADRA & NAGAR HAVELI') ? 'selected' : ''; ?>>DADRA & NAGAR HAVELI</option>
        <option value="DAMAN & DIU" <?php echo ($row['Domcile_issuing_state'] == 'DAMAN & DIU') ? 'selected' : ''; ?>>DAMAN & DIU</option>
        <option value="GOA" <?php echo ($row['Domcile_issuing_state'] == 'GOA') ? 'selected' : ''; ?>>GOA</option>
        <option value="GUJARAT" <?php echo ($row['Domcile_issuing_state'] == 'GUJARAT') ? 'selected' : ''; ?>>GUJARAT</option>
        <option value="HARYANA" <?php echo ($row['Domcile_issuing_state'] == 'HARYANA') ? 'selected' : ''; ?>>HARYANA</option>
        <option value="HIMACHAL PRADESH" <?php echo ($row['Domcile_issuing_state'] == 'HIMACHAL PRADESH') ? 'selected' : ''; ?>>HIMACHAL PRADESH</option>
        <option value="JAMMU & KASHMIR" <?php echo ($row['Domcile_issuing_state'] == 'JAMMU & KASHMIR') ? 'selected' : ''; ?>>JAMMU & KASHMIR</option>
        <option value="JHARKHAND" <?php echo ($row['Domcile_issuing_state'] == 'JHARKHAND') ? 'selected' : ''; ?>>JHARKHAND</option>
        <option value="KARNATAKA" <?php echo ($row['Domcile_issuing_state'] == 'KARNATAKA') ? 'selected' : ''; ?>>KARNATAKA</option>
        <option value="KERALA" <?php echo ($row['Domcile_issuing_state'] == 'KERALA') ? 'selected' : ''; ?>>KERALA</option>
        <option value="LADAKH" <?php echo ($row['Domcile_issuing_state'] == 'LADAKH') ? 'selected' : ''; ?>>LADAKH</option>
        <option value="LAKSHADWEEP" <?php echo ($row['Domcile_issuing_state'] == 'LAKSHADWEEP') ? 'selected' : ''; ?>>LAKSHADWEEP</option>
        <option value="MADHYA PRADESH" <?php echo ($row['Domcile_issuing_state'] == 'MADHYA PRADESH') ? 'selected' : ''; ?>>MADHYA PRADESH</option>
        <option value="MAHARASHTRA" <?php echo ($row['Domcile_issuing_state'] == 'MAHARASHTRA') ? 'selected' : ''; ?>>MAHARASHTRA</option>
        <option value="MANIPUR" <?php echo ($row['Domcile_issuing_state'] == 'MANIPUR') ? 'selected' : ''; ?>>MANIPUR</option>
        <option value="MEGHALAYA" <?php echo ($row['Domcile_issuing_state'] == 'MEGHALAYA') ? 'selected' : ''; ?>>MEGHALAYA</option>
        <option value="MIZORAM" <?php echo ($row['Domcile_issuing_state'] == 'MIZORAM') ? 'selected' : ''; ?>>MIZORAM</option>
        <option value="NAGALAND" <?php echo ($row['Domcile_issuing_state'] == 'NAGALAND') ? 'selected' : ''; ?>>NAGALAND</option>
        <option value="NCT OF DELHI" <?php echo ($row['Domcile_issuing_state'] == 'NCT OF DELHI') ? 'selected' : ''; ?>>NCT OF DELHI</option>
        <option value="ORISSA" <?php echo ($row['Domcile_issuing_state'] == 'ORISSA') ? 'selected' : ''; ?>>ORISSA</option>
        <option value="PUDUCHERRY" <?php echo ($row['Domcile_issuing_state'] == 'PUDUCHERRY') ? 'selected' : ''; ?>>PUDUCHERRY</option>
        <option value="PUNJAB" <?php echo ($row['Domcile_issuing_state'] == 'PUNJAB') ? 'selected' : ''; ?>>PUNJAB</option>
        <option value="RAJASTHAN" <?php echo ($row['Domcile_issuing_state'] == 'RAJASTHAN') ? 'selected' : ''; ?>>RAJASTHAN</option>
        <option value="SIKKIM" <?php echo ($row['Domcile_issuing_state'] == 'SIKKIM') ? 'selected' : ''; ?>>SIKKIM</option>
        <option value="TAMIL NADU" <?php echo ($row['Domcile_issuing_state'] == 'TAMIL NADU') ? 'selected' : ''; ?>>TAMIL NADU</option>
        <option value="TELANGANA" <?php echo ($row['Domcile_issuing_state'] == 'TELANGANA') ? 'selected' : ''; ?>>TELANGANA</option>
        <option value="TRIPURA" <?php echo ($row['Domcile_issuing_state'] == 'TRIPURA') ? 'selected' : ''; ?>>TRIPURA</option>
        <option value="UTTAR PRADESH" <?php echo ($row['Domcile_issuing_state'] == 'UTTAR PRADESH') ? 'selected' : ''; ?>>UTTAR PRADESH</option>
        <option value="UTTARAKHAND" <?php echo ($row['Domcile_issuing_state'] == 'UTTARAKHAND') ? 'selected' : ''; ?>>UTTARAKHAND</option>
        <option value="WEST BENGAL" <?php echo ($row['Domcile_issuing_state'] == 'WEST BENGAL') ? 'selected' : ''; ?>>WEST BENGAL</option>
    </select>
    </div>

    <div class="form-group">
        <label for="distic">District/जिला:</label>
        <input type="text" id="distic" name="distic" required value="<?php echo htmlspecialchars($row['distic']); ?>">
    </div>

    <div class="form-group">
        <label for="city">Village/City/गांव / शहर:</label>
        <input type="text" id="city" name="city" required value="<?php echo htmlspecialchars($row['city']); ?>">
    </div>

    <div class="form-group">
        <label for="police">Police Station/पुलिस स्टेशन:</label>
        <input type="text" id="police" name="police" required value="<?php echo htmlspecialchars($row['police']); ?>">
    </div>

    <div class="form-group">
        <label for="post_office">Post Office/डाक-घर:</label>
        <input type="text" id="post_office" name="post_office" required value="<?php echo htmlspecialchars($row['post_office']); ?>">
    </div>

    <div class="form-group">
        <label for="tehsil">Tehsil/तहसील:</label>
        <input type="text" id="tehsil" name="tehsil" required value="<?php echo htmlspecialchars($row['tehsil']); ?>">
    </div>
</div>

<h3>Correspondence Address</h3>
<div class="form-group">
    <label for="address_copy">Permanent Address/स्थायी पता:</label>
    <textarea id="address_copy" name="address_copy" required rows="4" style="width: 100%;"><?php echo htmlspecialchars($row['address_copy']); ?></textarea>
</div>
<div class="two-column">
    <div class="form-group">
        <label for="pin_copy">PINCODE/पिन कोड:</label>
        <input type="text" id="pin_copy" name="pin_copy" required value="<?php echo htmlspecialchars($row['pin_copy']); ?>">
    </div>

    <div class="form-group">
        <label for="state_copy">State/UT/राज्य / केंद्रीय शासित प्रदेश:</label>
        <select id="state_copy" name="state_copy" required>
            <option value="" <?php echo ($row['Domcile_issuing_state'] == '') ? 'selected' : ''; ?>>Select State</option>
        <option value="ANDHRA PRADESH" <?php echo ($row['Domcile_issuing_state'] == 'ANDHRA PRADESH') ? 'selected' : ''; ?>>ANDHRA PRADESH</option>
        <option value="ARUNACHAL PRADESH" <?php echo ($row['Domcile_issuing_state'] == 'ARUNACHAL PRADESH') ? 'selected' : ''; ?>>ARUNACHAL PRADESH</option>
        <option value="ASSAM" <?php echo ($row['Domcile_issuing_state'] == 'ASSAM') ? 'selected' : ''; ?>>ASSAM</option>
        <option value="BIHAR" <?php echo ($row['Domcile_issuing_state'] == 'BIHAR') ? 'selected' : ''; ?>>BIHAR</option>
        <option value="CHANDIGARH" <?php echo ($row['Domcile_issuing_state'] == 'CHANDIGARH') ? 'selected' : ''; ?>>CHANDIGARH</option>
        <option value="CHHATTISGARH" <?php echo ($row['Domcile_issuing_state'] == 'CHHATTISGARH') ? 'selected' : ''; ?>>CHHATTISGARH</option>
        <option value="DADRA & NAGAR HAVELI" <?php echo ($row['Domcile_issuing_state'] == 'DADRA & NAGAR HAVELI') ? 'selected' : ''; ?>>DADRA & NAGAR HAVELI</option>
        <option value="DAMAN & DIU" <?php echo ($row['Domcile_issuing_state'] == 'DAMAN & DIU') ? 'selected' : ''; ?>>DAMAN & DIU</option>
        <option value="GOA" <?php echo ($row['Domcile_issuing_state'] == 'GOA') ? 'selected' : ''; ?>>GOA</option>
        <option value="GUJARAT" <?php echo ($row['Domcile_issuing_state'] == 'GUJARAT') ? 'selected' : ''; ?>>GUJARAT</option>
        <option value="HARYANA" <?php echo ($row['Domcile_issuing_state'] == 'HARYANA') ? 'selected' : ''; ?>>HARYANA</option>
        <option value="HIMACHAL PRADESH" <?php echo ($row['Domcile_issuing_state'] == 'HIMACHAL PRADESH') ? 'selected' : ''; ?>>HIMACHAL PRADESH</option>
        <option value="JAMMU & KASHMIR" <?php echo ($row['Domcile_issuing_state'] == 'JAMMU & KASHMIR') ? 'selected' : ''; ?>>JAMMU & KASHMIR</option>
        <option value="JHARKHAND" <?php echo ($row['Domcile_issuing_state'] == 'JHARKHAND') ? 'selected' : ''; ?>>JHARKHAND</option>
        <option value="KARNATAKA" <?php echo ($row['Domcile_issuing_state'] == 'KARNATAKA') ? 'selected' : ''; ?>>KARNATAKA</option>
        <option value="KERALA" <?php echo ($row['Domcile_issuing_state'] == 'KERALA') ? 'selected' : ''; ?>>KERALA</option>
        <option value="LADAKH" <?php echo ($row['Domcile_issuing_state'] == 'LADAKH') ? 'selected' : ''; ?>>LADAKH</option>
        <option value="LAKSHADWEEP" <?php echo ($row['Domcile_issuing_state'] == 'LAKSHADWEEP') ? 'selected' : ''; ?>>LAKSHADWEEP</option>
        <option value="MADHYA PRADESH" <?php echo ($row['Domcile_issuing_state'] == 'MADHYA PRADESH') ? 'selected' : ''; ?>>MADHYA PRADESH</option>
        <option value="MAHARASHTRA" <?php echo ($row['Domcile_issuing_state'] == 'MAHARASHTRA') ? 'selected' : ''; ?>>MAHARASHTRA</option>
        <option value="MANIPUR" <?php echo ($row['Domcile_issuing_state'] == 'MANIPUR') ? 'selected' : ''; ?>>MANIPUR</option>
        <option value="MEGHALAYA" <?php echo ($row['Domcile_issuing_state'] == 'MEGHALAYA') ? 'selected' : ''; ?>>MEGHALAYA</option>
        <option value="MIZORAM" <?php echo ($row['Domcile_issuing_state'] == 'MIZORAM') ? 'selected' : ''; ?>>MIZORAM</option>
        <option value="NAGALAND" <?php echo ($row['Domcile_issuing_state'] == 'NAGALAND') ? 'selected' : ''; ?>>NAGALAND</option>
        <option value="NCT OF DELHI" <?php echo ($row['Domcile_issuing_state'] == 'NCT OF DELHI') ? 'selected' : ''; ?>>NCT OF DELHI</option>
        <option value="ORISSA" <?php echo ($row['Domcile_issuing_state'] == 'ORISSA') ? 'selected' : ''; ?>>ORISSA</option>
        <option value="PUDUCHERRY" <?php echo ($row['Domcile_issuing_state'] == 'PUDUCHERRY') ? 'selected' : ''; ?>>PUDUCHERRY</option>
        <option value="PUNJAB" <?php echo ($row['Domcile_issuing_state'] == 'PUNJAB') ? 'selected' : ''; ?>>PUNJAB</option>
        <option value="RAJASTHAN" <?php echo ($row['Domcile_issuing_state'] == 'RAJASTHAN') ? 'selected' : ''; ?>>RAJASTHAN</option>
        <option value="SIKKIM" <?php echo ($row['Domcile_issuing_state'] == 'SIKKIM') ? 'selected' : ''; ?>>SIKKIM</option>
        <option value="TAMIL NADU" <?php echo ($row['Domcile_issuing_state'] == 'TAMIL NADU') ? 'selected' : ''; ?>>TAMIL NADU</option>
        <option value="TELANGANA" <?php echo ($row['Domcile_issuing_state'] == 'TELANGANA') ? 'selected' : ''; ?>>TELANGANA</option>
        <option value="TRIPURA" <?php echo ($row['Domcile_issuing_state'] == 'TRIPURA') ? 'selected' : ''; ?>>TRIPURA</option>
        <option value="UTTAR PRADESH" <?php echo ($row['Domcile_issuing_state'] == 'UTTAR PRADESH') ? 'selected' : ''; ?>>UTTAR PRADESH</option>
        <option value="UTTARAKHAND" <?php echo ($row['Domcile_issuing_state'] == 'UTTARAKHAND') ? 'selected' : ''; ?>>UTTARAKHAND</option>
        <option value="WEST BENGAL" <?php echo ($row['Domcile_issuing_state'] == 'WEST BENGAL') ? 'selected' : ''; ?>>WEST BENGAL</option>
        </select>
    </div>

    <div class="form-group">
        <label for="distic_copy">District/जिला:</label>
        <input type="text" id="distic_copy" name="distic_copy" required value="<?php echo htmlspecialchars($row['distic_copy']); ?>">
    </div>

    <div class="form-group">
        <label for="city_copy">Village/City/गांव / शहर:</label>
        <input type="text" id="city_copy" name="city_copy" required value="<?php echo htmlspecialchars($row['city_copy']); ?>">
    </div>

    <div class="form-group">
        <label for="police_copy">Police Station/पुलिस स्टेशन:</label>
        <input type="text" id="police_copy" name="police_copy" required value="<?php echo htmlspecialchars($row['police_copy']); ?>">
    </div>

    <div class="form-group">
        <label for="post_office_copy">Post Office/डाक-घर:</label>
        <input type="text" id="post_office_copy" name="post_office_copy" required value="<?php echo htmlspecialchars($row['post_office_copy']); ?>">
    </div>

    <div class="form-group">
        <label for="tehsil_copy">Tehsil/तहसील:</label>
        <input type="text" id="tehsil_copy" name="tehsil_copy" required value="<?php echo htmlspecialchars($row['tehsil_copy']); ?>">
    </div>
</div>


<h3>Qualifications Details</h3>
<div class="two-column">
    <div class="form-group">
        <label for="qualification_type">Qualification Type/योग्यता प्रकार:</label>
        <select name="qualification_type" id="qualification_type" required>
            <option value="" <?php echo ($row['qualification_type'] == '') ? 'selected' : ''; ?>>Select Qualification Type</option>
            <option value="High School" <?php echo ($row['qualification_type'] == 'High School') ? 'selected' : ''; ?>>High School</option>
            <option value="Intermediate(10+2)" <?php echo ($row['qualification_type'] == 'Intermediate(10+2)') ? 'selected' : ''; ?>>Intermediate(10+2)</option>
            <option value="Diploma" <?php echo ($row['qualification_type'] == 'Diploma') ? 'selected' : ''; ?>>Diploma</option>
            <option value="Graduate" <?php echo ($row['qualification_type'] == 'Graduate') ? 'selected' : ''; ?>>Graduate</option>
            <option value="PG Diploma" <?php echo ($row['qualification_type'] == 'PG Diploma') ? 'selected' : ''; ?>>PG Diploma</option>
            <option value="ITI" <?php echo ($row['qualification_type'] == 'ITI') ? 'selected' : ''; ?>>ITI</option>
        </select>
    </div>
</div>

    <div class="form-group">
        <label for="Certificate_no_pin">Certificate No./प्रमाण पत्र संख्या:</label>
        <input type="text" id="Certificate_no_pin" name="Certificate_no_pin" required value="<?php echo htmlspecialchars($row['Certificate_no_pin']); ?>">
    </div>

    <div class="form-group">
        <label for="year">Year/वर्ष:</label>
        <select name="year" id="year" required>
            <?php 
            for ($i = 1966; $i <= 2006; $i++) {
                echo '<option value="' . $i . '"' . ($row['year'] == $i ? ' selected' : '') . '>' . $i . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="state_s">State/राज्य:</label>
        <select id="state_s" name="state_s" required>
            <option value="" <?php echo ($row['Domcile_issuing_state'] == '') ? 'selected' : ''; ?>>Select State</option>
        <option value="ANDHRA PRADESH" <?php echo ($row['Domcile_issuing_state'] == 'ANDHRA PRADESH') ? 'selected' : ''; ?>>ANDHRA PRADESH</option>
        <option value="ARUNACHAL PRADESH" <?php echo ($row['Domcile_issuing_state'] == 'ARUNACHAL PRADESH') ? 'selected' : ''; ?>>ARUNACHAL PRADESH</option>
        <option value="ASSAM" <?php echo ($row['Domcile_issuing_state'] == 'ASSAM') ? 'selected' : ''; ?>>ASSAM</option>
        <option value="BIHAR" <?php echo ($row['Domcile_issuing_state'] == 'BIHAR') ? 'selected' : ''; ?>>BIHAR</option>
        <option value="CHANDIGARH" <?php echo ($row['Domcile_issuing_state'] == 'CHANDIGARH') ? 'selected' : ''; ?>>CHANDIGARH</option>
        <option value="CHHATTISGARH" <?php echo ($row['Domcile_issuing_state'] == 'CHHATTISGARH') ? 'selected' : ''; ?>>CHHATTISGARH</option>
        <option value="DADRA & NAGAR HAVELI" <?php echo ($row['Domcile_issuing_state'] == 'DADRA & NAGAR HAVELI') ? 'selected' : ''; ?>>DADRA & NAGAR HAVELI</option>
        <option value="DAMAN & DIU" <?php echo ($row['Domcile_issuing_state'] == 'DAMAN & DIU') ? 'selected' : ''; ?>>DAMAN & DIU</option>
        <option value="GOA" <?php echo ($row['Domcile_issuing_state'] == 'GOA') ? 'selected' : ''; ?>>GOA</option>
        <option value="GUJARAT" <?php echo ($row['Domcile_issuing_state'] == 'GUJARAT') ? 'selected' : ''; ?>>GUJARAT</option>
        <option value="HARYANA" <?php echo ($row['Domcile_issuing_state'] == 'HARYANA') ? 'selected' : ''; ?>>HARYANA</option>
        <option value="HIMACHAL PRADESH" <?php echo ($row['Domcile_issuing_state'] == 'HIMACHAL PRADESH') ? 'selected' : ''; ?>>HIMACHAL PRADESH</option>
        <option value="JAMMU & KASHMIR" <?php echo ($row['Domcile_issuing_state'] == 'JAMMU & KASHMIR') ? 'selected' : ''; ?>>JAMMU & KASHMIR</option>
        <option value="JHARKHAND" <?php echo ($row['Domcile_issuing_state'] == 'JHARKHAND') ? 'selected' : ''; ?>>JHARKHAND</option>
        <option value="KARNATAKA" <?php echo ($row['Domcile_issuing_state'] == 'KARNATAKA') ? 'selected' : ''; ?>>KARNATAKA</option>
        <option value="KERALA" <?php echo ($row['Domcile_issuing_state'] == 'KERALA') ? 'selected' : ''; ?>>KERALA</option>
        <option value="LADAKH" <?php echo ($row['Domcile_issuing_state'] == 'LADAKH') ? 'selected' : ''; ?>>LADAKH</option>
        <option value="LAKSHADWEEP" <?php echo ($row['Domcile_issuing_state'] == 'LAKSHADWEEP') ? 'selected' : ''; ?>>LAKSHADWEEP</option>
        <option value="MADHYA PRADESH" <?php echo ($row['Domcile_issuing_state'] == 'MADHYA PRADESH') ? 'selected' : ''; ?>>MADHYA PRADESH</option>
        <option value="MAHARASHTRA" <?php echo ($row['Domcile_issuing_state'] == 'MAHARASHTRA') ? 'selected' : ''; ?>>MAHARASHTRA</option>
        <option value="MANIPUR" <?php echo ($row['Domcile_issuing_state'] == 'MANIPUR') ? 'selected' : ''; ?>>MANIPUR</option>
        <option value="MEGHALAYA" <?php echo ($row['Domcile_issuing_state'] == 'MEGHALAYA') ? 'selected' : ''; ?>>MEGHALAYA</option>
        <option value="MIZORAM" <?php echo ($row['Domcile_issuing_state'] == 'MIZORAM') ? 'selected' : ''; ?>>MIZORAM</option>
        <option value="NAGALAND" <?php echo ($row['Domcile_issuing_state'] == 'NAGALAND') ? 'selected' : ''; ?>>NAGALAND</option>
        <option value="NCT OF DELHI" <?php echo ($row['Domcile_issuing_state'] == 'NCT OF DELHI') ? 'selected' : ''; ?>>NCT OF DELHI</option>
        <option value="ORISSA" <?php echo ($row['Domcile_issuing_state'] == 'ORISSA') ? 'selected' : ''; ?>>ORISSA</option>
        <option value="PUDUCHERRY" <?php echo ($row['Domcile_issuing_state'] == 'PUDUCHERRY') ? 'selected' : ''; ?>>PUDUCHERRY</option>
        <option value="PUNJAB" <?php echo ($row['Domcile_issuing_state'] == 'PUNJAB') ? 'selected' : ''; ?>>PUNJAB</option>
        <option value="RAJASTHAN" <?php echo ($row['Domcile_issuing_state'] == 'RAJASTHAN') ? 'selected' : ''; ?>>RAJASTHAN</option>
        <option value="SIKKIM" <?php echo ($row['Domcile_issuing_state'] == 'SIKKIM') ? 'selected' : ''; ?>>SIKKIM</option>
        <option value="TAMIL NADU" <?php echo ($row['Domcile_issuing_state'] == 'TAMIL NADU') ? 'selected' : ''; ?>>TAMIL NADU</option>
        <option value="TELANGANA" <?php echo ($row['Domcile_issuing_state'] == 'TELANGANA') ? 'selected' : ''; ?>>TELANGANA</option>
        <option value="TRIPURA" <?php echo ($row['Domcile_issuing_state'] == 'TRIPURA') ? 'selected' : ''; ?>>TRIPURA</option>
        <option value="UTTAR PRADESH" <?php echo ($row['Domcile_issuing_state'] == 'UTTAR PRADESH') ? 'selected' : ''; ?>>UTTAR PRADESH</option>
        <option value="UTTARAKHAND" <?php echo ($row['Domcile_issuing_state'] == 'UTTARAKHAND') ? 'selected' : ''; ?>>UTTARAKHAND</option>
        <option value="WEST BENGAL" <?php echo ($row['Domcile_issuing_state'] == 'WEST BENGAL') ? 'selected' : ''; ?>>WEST BENGAL</option>
    </select>
    </div>

    <div class="form-group">
        <label for="University">Board/University/बोर्ड / विश्वविद्यालय:</label>
        <input type="text" id="University" name="University" required value="<?php echo htmlspecialchars($row['University']); ?>">
    </div>
</div>

        <h3>Document Upload Form</h3>
        <div class="form-group">
            <label for="photo">Upload Photo:</label>
            <input type="file" id="photo" name="photo" accept="image/*" onchange="previewImage('photo', 'photoPreview')"><br><br>
            <img id="photoPreview" src="<?php echo 'image/' . htmlspecialchars($row['photo']); ?>" alt="Photo Preview" style="width: 100px; height: auto;"><br><br>

            <label for="signature">Upload Signature:</label>
            <input type="file" id="signature" name="signature" accept="image/*" onchange="previewImage('signature', 'signaturePreview')"><br><br>
            <img id="signaturePreview" src="<?php echo 'image/' . htmlspecialchars($row['signature']); ?>" alt="Signature Preview" style="width: 100px; height: auto;"><br><br>

            <label for="ssc">SSC/Matric/High School Certificate:</label>
            <input type="file" id="ssc" name="ssc" accept=".pdf, .jpg, .png" onchange="previewFile('ssc', 'sscPreview')"><br><br>
            <img id="sscPreview" src="<?php echo 'image/' . htmlspecialchars($row['ssc']); ?>" alt="SSC Certificate Preview" style="width: 100px; height: auto;"><br><br>

            <label for="intermediate">Intermediate (10+2) Certificate:</label>
            <input type="file" id="intermediate" name="intermediate" accept=".pdf, .jpg, .png" onchange="previewFile('intermediate', 'intermediatePreview')"><br><br>
            <img id="intermediatePreview" src="<?php echo 'image/' . htmlspecialchars($row['intermediate']); ?>" alt="Intermediate Certificate Preview" style="width: 100px; height: auto;"><br><br>

            <label for="castEws">Cast/EWS Certificate:</label>
            <input type="file" id="castEws" name="castEws" accept=".pdf, .jpg, .png" onchange="previewFile('castEws', 'castEwsPreview')"><br><br>
            <img id="castEwsPreview" src="<?php echo 'image/' . htmlspecialchars($row['castEws']); ?>" alt="Cast/EWS Certificate Preview" style="width: 100px; height: auto;"><br><br>

            <label for="graduation">Graduation Certificate:</label>
            <input type="file" id="graduation" name="graduation" accept=".pdf, .jpg, .png" onchange="previewFile('graduation', 'graduationPreview')"><br><br>
            <img id="graduationPreview" src="<?php echo 'image/' . htmlspecialchars($row['graduation']); ?>" alt="Graduation Certificate Preview" style="width: 100px; height: auto;"><br><br>

            <label for="postGraduation">Post Graduation Certificate:</label>
            <input type="file" id="postGraduation" name="postGraduation" accept=".pdf, .jpg, .png" onchange="previewFile('postGraduation', 'postGraduationPreview')"><br><br>
            <img id="postGraduationPreview" src="<?php echo 'image/' . htmlspecialchars($row['postGraduation']); ?>" alt="Post Graduation Certificate Preview" style="width: 100px; height: auto;"><br><br>
        </div>
        
        <h3>Choose your Post</h3>
<div class="form-group">
    <label for="post">Choose Post:</label>
    <select id="post" name="post" required>
        <option value="" <?php echo ($row['post'] == '') ? 'selected' : ''; ?>>Branch head</option>
        <option value="hindu" <?php echo ($row['post'] == 'hindu') ? 'selected' : ''; ?>>Marketing Manager</option>
        <option value="muslim" <?php echo ($row['post'] == 'muslim') ? 'selected' : ''; ?>>Computer Data Operator</option>
        <option value="christian" <?php echo ($row['post'] == 'christian') ? 'selected' : ''; ?>>Supervisor</option>
        <option value="sikh" <?php echo ($row['post'] == 'sikh') ? 'selected' : ''; ?>>Electrician</option>
        <option value="jain" <?php echo ($row['post'] == 'jain') ? 'selected' : ''; ?>>Solar Replace-Mentor</option>
        <option value="others" <?php echo ($row['post'] == 'others') ? 'selected' : ''; ?>>Peon</option>
    </select>
</div>
        <div class="form-group">
            <button value="update" type="submit" name="update-btn">Update</button>
        </div>
    </form>
</div>
<section class="container-fluid footer_section text-center">
    <p class="text-center">
        &copy; 2024 @suryamintranise Rights Reserved By <a href="index.php">NISE</a>
    </p>
</section>
</body>
</html>
