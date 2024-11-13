<?php
session_start();

// Database connection
$con = mysqli_connect("localhost", "u271933466_info", "Avnish@3707", "u271933466_suryamitra1");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the ID from the URL
$id = isset($_GET['id']) ? $_GET['id'] : '';

if (!$id) {
    echo '<script type="text/javascript">alert("No ID provided in URL");</script>';
    exit();
}

// Fetch data from the database
$SELECT = "SELECT * FROM insert_form_data WHERE id='$id'";
$query = mysqli_query($con, $SELECT);

if ($query && mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
} else {
    echo '<script type="text/javascript">alert("Record not found");</script>';
    exit();
}

// Update data if the form is submitted
if (isset($_POST['update-btn'])) {
    $candidate_name = $_POST['candidate_name'];
    $mobile_no = $_POST['mobile_no'];
    $email_id = $_POST['email_id'];
    $aadhar_card = $_POST['aadhar_card'];
    $aadhar_no = $_POST['aadhar_no'];
    $identity_type = $_POST['identity_type'];
    $identity_certificate_no = $_POST['identity_certificate_no'];

    $update = "UPDATE insert_form_data SET 
                candidate_name='$candidate_name', 
                mobile_no='$mobile_no', 
                email_id='$email_id', 
                aadhar_card='$aadhar_card', 
                aadhar_no='$aadhar_no', 
                identity_type='$identity_type', 
                identity_certificate_no='$identity_certificate_no' 
                WHERE id='$id'";

    $query = mysqli_query($con, $update);

    if ($query) {
        echo '<script type="text/javascript">
        alert("Data updated successfully");
        window.location.href="view_form_data.php?id=' . $id . '";
        </script>';
    } else {
        echo '<script type="text/javascript">alert("Data is not updated successfully");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSF Personal Details Form</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
<?php include "insert_form_data.php"; ?>
<!-- menubar -->
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
<!-- menubar end -->

<div class="form-container">
    <h2>NISE Personal Details Form</h2>

    <form action="" method="POST">
        <!-- Personal Information Section -->
        <h3>Personal Information</h3>
        <div class="two-column">
            <div class="form-group">
                <label for="candidate_name">Candidate's Name / प्रत्याशी का नाम:</label>
                <input type="text" id="candidate_name" name="candidate_name" value="<?php echo $row['candidate_name']; ?>" required>
            </div>

            <div class="form-group">
                <label for="mobile_no">Mobile No. / मोबाइल संख्या:</label>
                <input type="text" id="mobile_no" name="mobile_no" value="<?php echo $row['mobile_no']; ?>" required>
            </div>

            <div class="form-group">
                <label for="email_id">Email Id / इ-मेल आई. डी:</label>
                <input type="email" id="email_id" name="email_id" value="<?php echo $row['email_id']; ?>" required>
            </div>
        </div>

        <!-- Identity Details Section -->
        <h3>Identity Details</h3>
        <div class="two-column">
            <div class="form-group">
                <label for="aadhar_card">Aadhar Card (Preferably):</label>
                <input type="text" id="aadhar_card" name="aadhar_card" value="<?php echo $row['aadhar_card']; ?>">
            </div>

            <div class="form-group">
                <label for="aadhar_no">Aadhar No:</label>
                <input type="text" id="aadhar_no" name="aadhar_no" value="<?php echo $row['aadhar_no']; ?>">
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
                <input type="text" id="identity_certificate_no" name="identity_certificate_no" value="<?php echo $row['identity_certificate_no']; ?>" required>
            </div>
        </div>
        
        <div class="form-group">
            <button type="submit" name="update-btn">Update</button>
        </div>
    </form>
</div>

</body>
</html>




<!--         Additional Information Section -->
<!--        <h3>Additional Information</h3>-->
<!--        <div class="two-column">-->
<!--            <div class="form-group">-->
<!--                <label for="dob">Date of Birth / जन्मतिथि:</label>-->
<!--                <input type="date" id="dob" name="dob" required>-->
<!--            </div>-->

<!--            <div class="form-group">-->
<!--                <label for="age">Age / आयु:</label>-->
<!--                <input type="number" id="age" name="age" required>-->
<!--            </div>-->

<!--            <div class="form-group">-->
<!--                <label for="nationality">Nationality / राष्ट्रीयता:</label>-->
<!--                <input type="text" id="nationality" name="nationality" required>-->
<!--            </div>-->

<!--            <div class="form-group">-->
<!--                <label for="father_name">Father's Name / पिता का नाम:</label>-->
<!--                <input type="text" id="father_name" name="father_name" required>-->
<!--            </div>-->

<!--            <div class="form-group">-->
<!--                <label for="mother_name">Mother's Name / माता का नाम:</label>-->
<!--                <input type="text" id="mother_name" name="mother_name" required>-->
<!--            </div>-->

<!--            <div class="form-group">-->
<!--                <label for="permanent_mark">Permanent Identification Mark on Body:</label>-->
<!--                <input type="text" id="permanent_mark" name="permanent_mark" required>-->
<!--            </div>-->

<!--            <div class="form-group">-->
<!--                <label for="gender">Gender / लिंग:</label>-->
<!--                <select id="gender" name="gender" required>-->
<!--                    <option value="">Select Gender</option>-->
<!--                    <option value="male">Male</option>-->
<!--                    <option value="female">Female</option>-->
<!--                </select>-->
<!--            </div>-->

<!--            <div class="form-group">-->
<!--                <label for="marital_status">Marital Status / वैवाहिक स्थिति:</label>-->
<!--                <select id="marital_status" name="marital_status" required>-->
<!--                    <option value="">Select Marital Status</option>-->
<!--                    <option value="married">Married</option>-->
<!--                    <option value="unmarried">Unmarried</option>-->
<!--                    <option value="divorced">Divorced</option>-->
<!--                    <option value="widow">Widow</option>-->
<!--                </select>-->
<!--            </div>-->
<!--        </div>-->

<!--         Domicile Details Section -->
<!--        <h3>Domicile Details</h3>-->
<!--        <div class="two-column">-->
<!--        <div class="form-group">-->
<!--            <label for="domicile_certificate">Do you have domicile certificate?</label>-->
<!--            <select id="domicile_certificate" name="domicile_certificate" required>-->
<!--                <option value="">Select Option</option>-->
<!--                <option value="yes">Yes</option>-->
<!--                <option value="no">No</option>-->
<!--            </select>-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--                <label for="aadhar_no">Domicile certificate number:</label>-->
<!--                <input type="text" id="Domicile_certificate_no" name="Domicile_certificate_no">-->
<!--            </div>-->
<!--            <div class="form-group">-->
<!--            <label for="Domcile_issuing_state">Domcile issuing state:</label>-->
<!--                <select id="Domcile_issuing_state" name="Domcile_issuing_state" required>-->
<!--                    <option value="" salected>Select State</option>-->
                   
<!--<option value="9128">ANDHRA PRADESH</option>-->
<!--<option value="9112">ARUNACHAL PRADESH</option>-->
<!--<option value="9118">ASSAM</option>-->
<!--<option value="9110">BIHAR</option>-->
<!--<option value="9104">CHANDIGARH</option>-->
<!--<option value="9122">CHHATTISGARH</option>-->
<!--<option value="9126">DADRA &amp; NAGAR HAVELI</option>-->
<!--<option value="9125">DAMAN &amp; DIU</option>-->
<!--<option value="9130">GOA</option>-->
<!--<option value="9124">GUJARAT</option>-->
<!--<option value="9106">HARYANA</option>-->
<!--<option value="9102">HIMACHAL PRADESH</option>-->
<!--<option value="9101">JAMMU &amp; KASHMIR</option>-->
<!--<option value="9120">JHARKHAND</option>-->
<!--<option value="9129">KARNATAKA</option>-->
<!--<option value="9132">KERALA</option>-->
<!--<option value="9137">LADAKH</option>-->
<!--<option value="9131">LAKSHADWEEP</option>-->
<!--<option value="9123">MADHYA PRADESH</option>-->
<!--<option value="9127">MAHARASHTRA</option>-->
<!--<option value="9114">MANIPUR</option>-->
<!--<option value="9117">MEGHALAYA</option>-->
<!--<option value="9115">MIZORAM</option>-->
<!--<option value="9113">NAGALAND</option>-->
<!--<option value="9107">NCT OF DELHI</option>-->
<!--<option value="9121">ORISSA</option>-->
<!--<option value="9134">PUDUCHERRY</option>-->
<!--<option value="9103">PUNJAB</option>-->
<!--<option value="9108">RAJASTHAN</option>-->
<!--<option value="9111">SIKKIM</option>-->
<!--<option value="9133">TAMIL NADU</option>-->
<!--<option value="9136">TELANGANA</option>-->
<!--<option value="9116">TRIPURA</option>-->
<!--<option value="9109" >UTTAR PRADESH</option>-->
<!--<option value="9105">UTTARAKHAND</option>-->
<!--<option value="9119">WEST BENGAL</option>-->
   
<!--                </select>-->
      
<!--            </div>-->
<!--        </div>-->
<!--         Category Reservation Section -->
<!--        <h3>Category Reservation</h3>-->
<!--        <div class="two-column">-->
<!--            <div class="form-group">-->
<!--                <label for="religion">Religion / धर्म:</label>-->
<!--                <select id="religion" name="religion" required>-->
<!--                    <option value="">Select Religion</option>-->
<!--                    <option value="hindu">Hindu</option>-->
<!--                    <option value="muslim">Muslim</option>-->
<!--                    <option value="christian">Christian</option>-->
<!--                    <option value="sikh">Sikh</option>-->
<!--                    <option value="jain">Jain</option>-->
<!--                    <option value="others">Others</option>-->
<!--                </select>-->
<!--            </div>-->

<!--            <div class="form-group">-->
<!--                <label for="category">Category / श्रेणी:</label>-->
<!--                <select id="category" name="category" required>-->
<!--                    <option value="">Select Category</option>-->
<!--                    <option value="unreserved">Unreserved</option>-->
<!--                    <option value="sc">SC</option>-->
<!--                    <option value="st">ST</option>-->
<!--                    <option value="obc">OBC</option>-->
<!--                    <option value="ews">EWS</option>-->
<!--                </select>-->
<!--            </div>-->

<!--            <div class="form-group">-->
<!--                <label for="recruitment_mode">Mode of Recruitment / भर्ती का तरीका:</label>-->
<!--                <select id="recruitment_mode" name="recruitment_mode" required>-->
<!--                    <option value="">Select Mode of Recruitment</option>-->
<!--                    <option value="direct_entry">Direct Entry (DE)</option>-->
<!--                    <option value="ex_serviceman">Ex-Serviceman (ESM)</option>-->
<!--                    <option value="gov_employee">Government Employee</option>-->
<!--                    <option value="bsd_department">BSD Department</option>-->
<!--                </select>-->
<!--            </div>-->
<!--        </div>-->

<!--         Subcategory Reservation Section -->
<!--        <h3>Subcategory Reservation</h3>-->
<!--        <div class="two-column">-->
<!--            <div class="form-group">-->
<!--                <label for="differently_abled">Are you Differently Abled Person?</label>-->
<!--                <select id="differently_abled" name="differently_abled" required>-->
<!--                    <option value="">Select Option</option>-->
<!--                    <option value="yes">Yes</option>-->
<!--                    <option value="no">No</option>-->
<!--                </select>-->
<!--            </div>-->

<!--            <div class="form-group">-->
<!--                <label for="ex_serviceman">Are You Ex-Serviceman?</label>-->
<!--                <select id="ex_serviceman" name="ex_serviceman" required>-->
<!--                    <option value="">Select Option</option>-->
<!--                    <option value="yes">Yes</option>-->
<!--                    <option value="no">No</option>-->
<!--                </select>-->
<!--            </div>-->

<!--            <div class="form-group">-->
<!--                <label for="departmental">Departmental (Central Government):</label>-->
<!--                <select id="departmental" name="departmental">-->
<!--                    <option value="">Select Option</option>-->
<!--                    <option value="central_government">Central Government</option>-->
<!--                </select>-->
<!--            </div>-->

<!--            <div class="form-group">-->
<!--                <label for="department_name">Department Name / विभाग का नाम:</label>-->
<!--                <input type="text" id="department_name" name="department_name">-->
<!--            </div>-->

<!--            <div class="form-group">-->
<!--                <label for="department_joining_date">Department Date of Joining:</label>-->
<!--                <input type="date" id="department_joining_date" name="department_joining_date">-->
<!--            </div>-->

<!--            <div class="form-group">-->
<!--                <label for="noc">NOC:</label>-->
<!--                <select id="noc" name="noc">-->
<!--                    <option value="">Select Option</option>-->
<!--                    <option value="upload">Upload for NOC</option>-->
<!--                    <option value="applied">Applied for NOC</option>-->
<!--                </select>-->
<!--            </div>-->

<!--            <div class="form-group">-->
<!--                <label for="noc_remarks">NOC Remarks / एन.ओ.सी. टिप्पणी:</label>-->
<!--                <input type="text" id="noc_remarks" name="noc_remarks">-->
<!--            </div>-->

<!--            <div class="form-group">-->
<!--                <label for="completed_service">Have you completed 3 years of service?</label>-->
<!--                <select id="completed_service" name="completed_service" required>-->
<!--                    <option value="">Select Option</option>-->
<!--                    <option value="yes">Yes</option>-->
<!--                    <option value="no">No</option>-->
<!--                </select>-->
<!--            </div>-->
<!--        </div>-->
<!--        <!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <title>Address Details Form</title>-->
<!--</head>-->
<!--<body>-->

<!--<h3>Address Details</h3>-->

<!--<div class="form-group">-->
<!--    <label for="address">Permanent Address/स्थायी पता</label>-->
<!--    <textarea id="address" name="address" required rows="4" style="width: 100%;"></textarea>-->
<!--</div>-->
<!--<div class="two-column">-->
    
<!--    <div class="form-group">-->
<!--        <label for="pin">PINCODE/पिन कोड</label>-->
<!--        <input type="text" id="pin" name="pin" required>-->
<!--    </div>-->

<!--    <div class="form-group">-->
<!--        <label for="state">State/UT/राज्य / केंद्रीय शासित प्रदेश</label>-->
<!--        <select id="state" name="state" required>-->
<!--            <option value="" selected>Select State</option>-->
<!--            <option value="9128">ANDHRA PRADESH</option>-->
<!--            <option value="9112">ARUNACHAL PRADESH</option>-->
<!--            <option value="9118">ASSAM</option>-->
<!--            <option value="9110">BIHAR</option>-->
<!--            <option value="9104">CHANDIGARH</option>-->
<!--            <option value="9122">CHHATTISGARH</option>-->
<!--            <option value="9126">DADRA &amp; NAGAR HAVELI</option>-->
<!--            <option value="9125">DAMAN &amp; DIU</option>-->
<!--            <option value="9130">GOA</option>-->
<!--            <option value="9124">GUJARAT</option>-->
<!--            <option value="9106">HARYANA</option>-->
<!--            <option value="9102">HIMACHAL PRADESH</option>-->
<!--            <option value="9101">JAMMU &amp; KASHMIR</option>-->
<!--            <option value="9120">JHARKHAND</option>-->
<!--            <option value="9129">KARNATAKA</option>-->
<!--            <option value="9132">KERALA</option>-->
<!--            <option value="9137">LADAKH</option>-->
<!--            <option value="9131">LAKSHADWEEP</option>-->
<!--            <option value="9123">MADHYA PRADESH</option>-->
<!--            <option value="9127">MAHARASHTRA</option>-->
<!--            <option value="9114">MANIPUR</option>-->
<!--            <option value="9117">MEGHALAYA</option>-->
<!--            <option value="9115">MIZORAM</option>-->
<!--            <option value="9113">NAGALAND</option>-->
<!--            <option value="9107">NCT OF DELHI</option>-->
<!--            <option value="9121">ORISSA</option>-->
<!--            <option value="9134">PUDUCHERRY</option>-->
<!--            <option value="9103">PUNJAB</option>-->
<!--            <option value="9108">RAJASTHAN</option>-->
<!--            <option value="9111">SIKKIM</option>-->
<!--            <option value="9133">TAMIL NADU</option>-->
<!--            <option value="9136">TELANGANA</option>-->
<!--            <option value="9116">TRIPURA</option>-->
<!--            <option value="9109">UTTAR PRADESH</option>-->
<!--            <option value="9105">UTTARAKHAND</option>-->
<!--            <option value="9119">WEST BENGAL</option>-->
<!--        </select>-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <label for="distic">District/जिला</label>-->
<!--        <input type="text" id="distic" name="distic" required>-->
<!--    </div>-->

<!--    <div class="form-group">-->
<!--        <label for="city">Village/City/गांव / शहर</label>-->
<!--        <input type="text" id="city" name="city" required>-->
<!--    </div>-->

<!--    <div class="form-group">-->
<!--        <label for="police">Police Station/पुलिस स्टेशन</label>-->
<!--        <input type="text" id="police" name="police" required>-->
<!--    </div>-->

<!--    <div class="form-group">-->
<!--        <label for="post_office">Post Office/डाक-घर</label>-->
<!--        <input type="text" id="post_office" name="post_office" required>-->
<!--    </div>-->

<!--    <div class="form-group">-->
<!--        <label for="tehsil">Tehsil/तहसील</label>-->
<!--        <input type="text" id="tehsil" name="tehsil" required>-->
<!--    </div>-->
<!--</div>-->

<!--<button onclick="copyAddress()">Same as Permanent Address</button>-->

<!--<h3>Correspondence Address</h3>-->

<!--<div class="form-group">-->
<!--    <label for="address_copy">Permanent Address/स्थायी पता</label>-->
<!--    <textarea id="address_copy" name="address_copy" required rows="4" style="width: 100%;"></textarea>-->
<!--</div>-->
<!--<div class="two-column">-->
    
<!--    <div class="form-group">-->
<!--        <label for="pin_copy">PINCODE/पिन कोड</label>-->
<!--        <input type="text" id="pin_copy" name="pin_copy" required>-->
<!--    </div>-->

<!--    <div class="form-group">-->
<!--        <label for="state_copy">State/UT/राज्य / केंद्रीय शासित प्रदेश</label>-->
<!--        <select id="state_copy" name="state_copy" required>-->
<!--            <option value="" selected>Select State</option>-->
<!--             <option value="" selected>Select State</option>-->
<!--            <option value="9128">ANDHRA PRADESH</option>-->
<!--            <option value="9112">ARUNACHAL PRADESH</option>-->
<!--            <option value="9118">ASSAM</option>-->
<!--            <option value="9110">BIHAR</option>-->
<!--            <option value="9104">CHANDIGARH</option>-->
<!--            <option value="9122">CHHATTISGARH</option>-->
<!--            <option value="9126">DADRA &amp; NAGAR HAVELI</option>-->
<!--            <option value="9125">DAMAN &amp; DIU</option>-->
<!--            <option value="9130">GOA</option>-->
<!--            <option value="9124">GUJARAT</option>-->
<!--            <option value="9106">HARYANA</option>-->
<!--            <option value="9102">HIMACHAL PRADESH</option>-->
<!--            <option value="9101">JAMMU &amp; KASHMIR</option>-->
<!--            <option value="9120">JHARKHAND</option>-->
<!--            <option value="9129">KARNATAKA</option>-->
<!--            <option value="9132">KERALA</option>-->
<!--            <option value="9137">LADAKH</option>-->
<!--            <option value="9131">LAKSHADWEEP</option>-->
<!--            <option value="9123">MADHYA PRADESH</option>-->
<!--            <option value="9127">MAHARASHTRA</option>-->
<!--            <option value="9114">MANIPUR</option>-->
<!--            <option value="9117">MEGHALAYA</option>-->
<!--            <option value="9115">MIZORAM</option>-->
<!--            <option value="9113">NAGALAND</option>-->
<!--            <option value="9107">NCT OF DELHI</option>-->
<!--            <option value="9121">ORISSA</option>-->
<!--            <option value="9134">PUDUCHERRY</option>-->
<!--            <option value="9103">PUNJAB</option>-->
<!--            <option value="9108">RAJASTHAN</option>-->
<!--            <option value="9111">SIKKIM</option>-->
<!--            <option value="9133">TAMIL NADU</option>-->
<!--            <option value="9136">TELANGANA</option>-->
<!--            <option value="9116">TRIPURA</option>-->
<!--            <option value="9109">UTTAR PRADESH</option>-->
<!--            <option value="9105">UTTARAKHAND</option>-->
<!--            <option value="9119">WEST BENGAL</option>-->
<!--        </select>-->
  
<!--             Add state options dynamically or statically same as the above -->
<!--        </select>-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <label for="distic_copy">District/जिला</label>-->
<!--        <input type="text" id="distic_copy" name="distic_copy" required>-->
<!--    </div>-->

<!--    <div class="form-group">-->
<!--        <label for="city_copy">Village/City/गांव / शहर</label>-->
<!--        <input type="text" id="city_copy" name="city_copy" required>-->
<!--    </div>-->

<!--    <div class="form-group">-->
<!--        <label for="police_copy">Police Station/पुलिस स्टेशन</label>-->
<!--        <input type="text" id="police_copy" name="police_copy" required>-->
<!--    </div>-->

<!--    <div class="form-group">-->
<!--        <label for="post_office_copy">Post Office/डाक-घर</label>-->
<!--        <input type="text" id="post_office_copy" name="post_office_copy" required>-->
<!--    </div>-->

<!--    <div class="form-group">-->
<!--        <label for="tehsil_copy">Tehsil/तहसील</label>-->
<!--        <input type="text" id="tehsil_copy" name="tehsil_copy" required>-->
<!--    </div>-->
<!--</div>-->

<!--<script>-->
<!--function copyAddress() {-->
<!--    document.getElementById('address_copy').value = document.getElementById('address').value;-->
<!--    document.getElementById('pin_copy').value = document.getElementById('pin').value;-->
<!--    document.getElementById('state_copy').value = document.getElementById('state').value;-->
<!--    document.getElementById('distic_copy').value = document.getElementById('distic').value;-->
<!--    document.getElementById('city_copy').value = document.getElementById('city').value;-->
<!--    document.getElementById('police_copy').value = document.getElementById('police').value;-->
<!--    document.getElementById('post_office_copy').value = document.getElementById('post_office').value;-->
<!--    document.getElementById('tehsil_copy').value = document.getElementById('tehsil').value;-->
<!--}-->
<!--</script>-->

<!--<h3>Qualifications Details</h3>-->
<!--<div class="two-column">-->
<!--<div class="form-group">-->
<!--  <label for="address">Qualification Type/योग्यता प्रकार</label>-->
<!--<select name="qualification_type">-->
<!--    <option value=""></option>-->
<!--    <option value="1">High School</option>-->
<!--    <option value="2">Intermediate(10+2)</option>-->
<!--    <option value="18">Diploma</option>-->
<!--    <option value="19">Graduate</option>-->
<!--    <option value="20">PG Diploma</option>-->
<!--    <option value="617">ITI</option>-->
<!--</select>-->
<!--</div>-->

    
<!--    <div class="form-group">-->
<!--        <label for="pin">Certificate No./प्रमाण पत्र संख्या</label>-->
<!--        <input type="text" id="pin" name="Certificate_no_pin" required>-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <label for="distic">Year/वर्ष</label>-->
<!--        <select name="year" id="year">-->
<!--    <option value="1966">1966</option>-->
<!--    <option value="1967">1967</option>-->
<!--    <option value="1968">1968</option>-->
<!--    <option value="1969">1969</option>-->
<!--    <option value="1970">1970</option>-->
<!--    <option value="1971">1971</option>-->
<!--    <option value="1972">1972</option>-->
<!--    <option value="1973">1973</option>-->
<!--    <option value="1974">1974</option>-->
<!--    <option value="1975">1975</option>-->
<!--    <option value="1976">1976</option>-->
<!--    <option value="1977">1977</option>-->
<!--    <option value="1978">1978</option>-->
<!--    <option value="1979">1979</option>-->
<!--    <option value="1980">1980</option>-->
<!--    <option value="1981">1981</option>-->
<!--    <option value="1982">1982</option>-->
<!--    <option value="1983">1983</option>-->
<!--    <option value="1984">1984</option>-->
<!--    <option value="1985">1985</option>-->
<!--    <option value="1986">1986</option>-->
<!--    <option value="1987">1987</option>-->
<!--    <option value="1988">1988</option>-->
<!--    <option value="1989">1989</option>-->
<!--    <option value="1990">1990</option>-->
<!--    <option value="1991">1991</option>-->
<!--    <option value="1992">1992</option>-->
<!--    <option value="1993">1993</option>-->
<!--    <option value="1994">1994</option>-->
<!--    <option value="1995">1995</option>-->
<!--    <option value="1996">1996</option>-->
<!--    <option value="1997">1997</option>-->
<!--    <option value="1998">1998</option>-->
<!--    <option value="1999">1999</option>-->
<!--    <option value="2000">2000</option>-->
<!--    <option value="2001">2001</option>-->
<!--    <option value="2002">2002</option>-->
<!--    <option value="2003">2003</option>-->
<!--    <option value="2004">2004</option>-->
<!--    <option value="2005">2005</option>-->
<!--    <option value="2006">2006</option>-->
<!--</select>-->
    
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <label for="state">State/राज्य</label>-->
<!--        <select id="state" name="state_s" required>-->
<!--            <option value="" selected>Select State</option>-->
<!--            <option value="9128">ANDHRA PRADESH</option>-->
<!--            <option value="9112">ARUNACHAL PRADESH</option>-->
<!--            <option value="9118">ASSAM</option>-->
<!--            <option value="9110">BIHAR</option>-->
<!--            <option value="9104">CHANDIGARH</option>-->
<!--            <option value="9122">CHHATTISGARH</option>-->
<!--            <option value="9126">DADRA &amp; NAGAR HAVELI</option>-->
<!--            <option value="9125">DAMAN &amp; DIU</option>-->
<!--            <option value="9130">GOA</option>-->
<!--            <option value="9124">GUJARAT</option>-->
<!--            <option value="9106">HARYANA</option>-->
<!--            <option value="9102">HIMACHAL PRADESH</option>-->
<!--            <option value="9101">JAMMU &amp; KASHMIR</option>-->
<!--            <option value="9120">JHARKHAND</option>-->
<!--            <option value="9129">KARNATAKA</option>-->
<!--            <option value="9132">KERALA</option>-->
<!--            <option value="9137">LADAKH</option>-->
<!--            <option value="9131">LAKSHADWEEP</option>-->
<!--            <option value="9123">MADHYA PRADESH</option>-->
<!--            <option value="9127">MAHARASHTRA</option>-->
<!--            <option value="9114">MANIPUR</option>-->
<!--            <option value="9117">MEGHALAYA</option>-->
<!--            <option value="9115">MIZORAM</option>-->
<!--            <option value="9113">NAGALAND</option>-->
<!--            <option value="9107">NCT OF DELHI</option>-->
<!--            <option value="9121">ORISSA</option>-->
<!--            <option value="9134">PUDUCHERRY</option>-->
<!--            <option value="9103">PUNJAB</option>-->
<!--            <option value="9108">RAJASTHAN</option>-->
<!--            <option value="9111">SIKKIM</option>-->
<!--            <option value="9133">TAMIL NADU</option>-->
<!--            <option value="9136">TELANGANA</option>-->
<!--            <option value="9116">TRIPURA</option>-->
<!--            <option value="9109">UTTAR PRADESH</option>-->
<!--            <option value="9105">UTTARAKHAND</option>-->
<!--            <option value="9119">WEST BENGAL</option>-->
<!--        </select>-->
<!--    </div>-->
   

<!--    <div class="form-group">-->
<!--        <label for="University">Board/University/बोर्ड / विश्वविद्यालय</label>-->
<!--        <input type="text" id="University" name="University" required>-->
<!--    </div>-->

<!--</div>-->

<!--<div class="u-flexed u-justify-center mt-4">-->
<!--    <button type="submit" id="submitButton" class="c-button inline c-button--primary darkGrey u-pad10_30 baseText rounded">Add</button></div>            <div class="c-tableGrid  c-tableGrid-xs design1 mt-4">-->
<!--    <div class="adm-c-tableGrid__container c-tableGrid__container--scrolling">-->
<!--        <div class="adm-c-tableGrid__box table-responsive withScroll">-->
<!--            <div id="listType" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000"><div id="w0" class="grid-view"><div class='summary mt-2'>Showing <b>1 - 2</b> of <b>2</b> items.</div>-->
<!--<table class="table"><thead>-->
<!--<tr><th>Qualification Type</th><th>Qualification Year</th><th>Certificate No.</th><th>Board/University</th><th class="action-column">action</th></tr>-->
<!--</thead>-->
<!--<tbody>-->
<!--<tr data-key="0"><td>SSC/Matric/High School</td><td>___</td><td>_____</td><td>____</td><td class="action-bars"><a class="action-bars__link update" href="/registration/qualification-details?id=13689947" title="update" data-pjax="0"><i class="fa fa-pencil-alt"></i></a> <a class="action-bars__link delete deleteQualification" href="javascript:;" title="delete" data-id="13689947"><i class="far fa-trash-alt"></i></a></td></tr>-->
<!--<tr data-key="1"><td>Intermediate(10+2)</td><td>___</td><td>______</td><td>______</td><td class="action-bars"><a class="action-bars__link update" href="/registration/qualification-details?id=13690289" title="update" data-pjax="0"><i class="fa fa-pencil-alt"></i></a> <a class="action-bars__link delete deleteQualification" href="javascript:;" title="delete" data-id="13690289"><i class="far fa-trash-alt"></i></a></td></tr>-->
<!--</tbody></table>-->
<!--<div class='table-bottom table-bottom--posRight'></div></div>            </div>       -->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


<!--<h3>Document Upload Form</h3>-->
<!--<div class="form-group">-->
    
<!--<label for="photo">Upload Photo:</label>-->
<!--        <input type="file" id="photo" name="photo" accept="image/*" required><br><br>-->

<!--        <label for="signature">Upload Signature:</label>-->
<!--        <input type="file" id="signature" name="signature" accept="image/*" required><br><br>-->

<!--        <label for="ssc">SSC/Matric/High School Certificate:</label>-->
<!--        <input type="file" id="ssc" name="ssc" accept=".pdf, .jpg, .png" required><br><br>-->

<!--        <label for="intermediate">Intermediate (10+2) Certificate:</label>-->
<!--        <input type="file" id="intermediate" name="intermediate" accept=".pdf, .jpg, .png" required><br><br>-->

<!--        <label for="castEws">Cast/EWS Certificate:</label>-->
<!--        <input type="file" id="castEws" name="castEws" accept=".pdf, .jpg, .png" required><br><br>-->

<!--        <label for="graduation">Graduation Certificate:</label>-->
<!--        <input type="file" id="graduation" name="graduation" accept=".pdf, .jpg, .png" required><br><br>-->

<!--        <label for="postGraduation">Post Graduation Certificate:</label>-->
<!--        <input type="file" id="postGraduation" name="postGraduation" accept=".pdf, .jpg, .png" required><br><br>-->
<!--</div>-->

<!--<h3>Choose your Post</h3>-->
<!--<div class="form-group">-->
<!--                <label for="post">Choose Post</label>-->
<!--                <select id="post" name="post" required>-->
<!--                    <option value="">Branch head</option>-->
<!--                    <option value="hindu">Marketing Manager</option>-->
<!--                    <option value="muslim">Computer Data Operator</option>-->
<!--                    <option value="christian">Supervisor</option>-->
<!--                    <option value="sikh">Electrician</option>-->
<!--                    <option value="jain">Solar Replace-Mentor</option>-->
<!--                    <option value="others">Peon</option>-->
<!--                </select>-->
<!--            </div>-->
             
    </form>
</div>

<?php include "formdata_insert.php"; ?>

<section class="container-fluid footer_section text-center">
    <p class="text-center">
        &copy; 2024 @suryamintranise Rights Reserved By <a href="index.php">NISE</a>
    </p>
</section>