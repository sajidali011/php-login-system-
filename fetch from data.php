fetch from data 

<?php 
session_start(); // Start the session

// Assuming the user's email is stored in the session after login
$user_email = $_SESSION['email'];

// Database connection
$con = mysqli_connect("localhost", "u271933466_info", "Avnish@3707", "u271933466_suryamitra1");

// Check connection
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Fetch data based on the user's email
$query = "SELECT * FROM `insert_form_data` WHERE `email_id` = '$user_email'";
$result = mysqli_query($con, $query);

// Display data with edit buttons
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    ?>
    

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NISE Personal Details Form</title>
        <link rel="stylesheet" href="form.css">
        <style>
            .form-container {
                max-width: 1200px;
                margin: auto;
                padding: 20px;
                border: 1px solid #ddd;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                background-color: #f9f9f9;
            }
            .form-container h2 {
                text-align: center;
                color: #333;
            }
            .form-group {
                margin-bottom: 15px;
            }
            .form-group label {
                display: block;
                font-weight: bold;
                margin-bottom: 5px;
            }
            .form-group input, .form-group select, .form-group textarea {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }
            .two-column {
                display: flex;
                justify-content: space-between;
                gap: 10px;
            }
            .form-group {
                flex: 1;
            }
            .btn {
                display: inline-block;
                padding: 10px 20px;
                font-size: 16px;
                color: #fff;
                background-color: #007bff;
                border: none;
                border-radius: 4px;
                text-align: center;
                text-decoration: none;
                margin: 5px;
                cursor: pointer;
                transition: background-color 0.3s;
            }
            .btn:hover {
                background-color: #0056b3;
            }
            .btn-back {
                background-color: #6c757d;
            }
            .btn-back:hover {
                background-color: #5a6268;
            }
        </style>
    </head>
    <body>
        <div class="form-container">
            <h2>NISE Personal Details Form</h2>
            <form action="update_form_data.php" method="GET">
                <h3>Personal Information</h3>
                <div class="two-column">
                    <div class="form-group">
                        <label for="candidate_name">Candidate's Name / प्रत्याशी का नाम:</label>
                        <input type="text" id="candidate_name" name="candidate_name" 
                            value="<?php echo htmlspecialchars($row['candidate_name']); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="mobile_no">Mobile No. / मोबाइल संख्या:</label>
                        <input type="text" id="mobile_no" name="mobile_no" 
                            value="<?php echo htmlspecialchars($row['mobile_no']); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email_id">Email Id / इ-मेल आई. डी:</label>
                        <input type="email" id="email_id" name="email_id" 
                            value="<?php echo htmlspecialchars($row['email_id']); ?>" readonly>
                    </div>
                </div>

                <h3>Identity Details</h3>
                <div class="two-column">
                    <div class="form-group">
                        <label for="aadhar_card">Aadhar Card (Preferably):</label>
                        <input type="text" id="aadhar_card" name="aadhar_card" 
                            value="<?php echo htmlspecialchars($row['aadhar_card']); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="aadhar_no">Aadhar No:</label>
                        <input type="text" id="aadhar_no" name="aadhar_no" 
                            value="<?php echo htmlspecialchars($row['aadhar_no']); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="identity_type">Identity Type:</label>
                        <input type="text" id="identity_type" name="identity_type" 
                            value="<?php echo htmlspecialchars($row['identity_type']); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="identity_certificate_no">Identity Certificate No:</label>
                        <input type="text" id="identity_certificate_no" name="identity_certificate_no" 
                            value="<?php echo htmlspecialchars($row['identity_certificate_no']); ?>" readonly>
                    </div>
                </div>

                <h3>Additional Information</h3>
                <div class="two-column">
                    <div class="form-group">
                        <label for="dob">Date of Birth / जन्मतिथि:</label>
                        <input type="date" id="dob" name="dob" 
                            value="<?php echo htmlspecialchars($row['dob']); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="age">Age / आयु:</label>
                        <input type="number" id="age" name="age" 
                            value="<?php echo htmlspecialchars($row['age']); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nationality">Nationality / राष्ट्रीयता:</label>
                        <input type="text" id="nationality" name="nationality" 
                            value="<?php echo htmlspecialchars($row['nationality']); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="father_name">Father's Name / पिता का नाम:</label>
                        <input type="text" id="father_name" name="father_name" 
                            value="<?php echo htmlspecialchars($row['father_name']); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="mother_name">Mother's Name / माता का नाम:</label>
                        <input type="text" id="mother_name" name="mother_name" 
                            value="<?php echo htmlspecialchars($row['mother_name']); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="permanent_mark">Permanent Identification Mark on Body:</label>
                        <input type="text" id="permanent_mark" name="permanent_mark" 
                            value="<?php echo htmlspecialchars($row['permanent_mark']); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender / लिंग:</label>
                        <input type="text" id="gender" name="gender" 
                            value="<?php echo htmlspecialchars($row['gender']); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="marital_status">Marital Status / वैवाहिक स्थिति:</label>
                        <input type="text" id="marital_status" name="marital_status" 
                            value="<?php echo htmlspecialchars($row['marital_status']); ?>" readonly>
                    </div>
                </div>

        <h3>Domicile Details</h3>
        <div class="two-column">
        <div class="form-group">
            <label for="domicile_certificate">Do you have domicile certificate?</label>
           <input type="text" id="domicile_certificate" name="domicile_certificate" 
                            value="<?php echo htmlspecialchars($row['domicile_certificate']); ?>" readonly>
        </div>
        <div class="form-group">
                <label for="aadhar_no">Domicile certificate number:</label>
                <input type="text" id="Domicile_certificate_no" name="Domicile_certificate_no"  value="<?php echo htmlspecialchars($row['Domicile_certificate_no']); ?>" required>
            </div>
            <div class="form-group">
            <label for="Domcile_issuing_state">Domcile issuing state:</label>
             <input type="text" id="Domcile_issuing_state" name="Domcile_issuing_state" 
                            value="<?php echo htmlspecialchars($row['Domcile_issuing_state']); ?>" readonly>
            </div>
        </div>
        
        <h3>Category Reservation</h3>
        <div class="two-column">
            <div class="form-group">
                <label for="religion">Religion / धर्म:</label>
                 <input type="text" id="religion" name="religion" 
                            value="<?php echo htmlspecialchars($row['religion']); ?>" readonly>
            </div>

            <div class="form-group">
                <label for="category">Category / श्रेणी:</label>
                <input type="text" id="category" name="category" 
                            value="<?php echo htmlspecialchars($row['category']); ?>" readonly>
            </div>

            <div class="form-group">
                <label for="recruitment_mode">Mode of Recruitment / भर्ती का तरीका:</label>
                 <input type="text" id="recruitment_mode" name="recruitment_mode" 
                            value="<?php echo htmlspecialchars($row['recruitment_mode']); ?>" readonly>
            </div>
        </div>

        <h3>Subcategory Reservation</h3>
        <div class="two-column">
            <div class="form-group">
                <label for="differently_abled">Are you Differently Abled Person?</label>
               <input type="text" id="differently_abled" name="differently_abled" 
                            value="<?php echo htmlspecialchars($row['differently_abled']); ?>" readonly>
            </div>

            <div class="form-group">
                <label for="ex_serviceman">Are You Ex-Serviceman?</label>
                <input type="text" id="ex_serviceman" name="ex_serviceman" 
                            value="<?php echo htmlspecialchars($row['ex_serviceman']); ?>" readonly>
            </div>

            <div class="form-group">
                <label for="departmental">Departmental (Central Government):</label>
                <input type="text" id="departmental" name="departmental" 
                            value="<?php echo htmlspecialchars($row['departmental']); ?>" readonly>
            </div>

            <div class="form-group">
                <label for="department_name">Department Name / विभाग का नाम:</label>
                <input type="text" id="department_name" name="department_name"  value="<?php echo htmlspecialchars($row['department_name']); ?>" required>
            </div>

            <div class="form-group">
                <label for="department_joining_date">Department Date of Joining:</label>
                <input type="date" id="department_joining_date" name="department_joining_date"  value="<?php echo htmlspecialchars($row['department_joining_date']); ?>" required>
            </div>

            <div class="form-group">
                <label for="noc">NOC:</label>
               <input type="text" id="noc" name="noc" 
                            value="<?php echo htmlspecialchars($row['noc']); ?>" readonly>
            </div>

            <div class="form-group">
                <label for="noc_remarks">NOC Remarks / एन.ओ.सी. टिप्पणी:</label>
                <input type="text" id="noc_remarks" name="noc_remarks" value="<?php echo htmlspecialchars($row['noc_remarks']); ?>" required>
            </div>

            <div class="form-group">
                <label for="completed_service">Have you completed 3 years of service?</label>
                 <input type="text" id="completed_service" name="completed_service" 
                            value="<?php echo htmlspecialchars($row['completed_service']); ?>" readonly>
            </div>
        </div>

<h3>Address Details</h3>

<div class="form-group">
    <label for="address">Permanent Address/स्थायी पता</label>
    <textarea id="address" name="address"  value="<?php echo htmlspecialchars($row['address']); ?>"required rows="4" style="width: 100%;"></textarea>
</div>
<div class="two-column">
    <div class="form-group">
        <label for="pin">PINCODE/पिन कोड</label>
        <input type="text" id="pin" name="pin" value="<?php echo htmlspecialchars($row['pin']);?>" required ?>
    </div>

    <div class="form-group">
        <label for="state">State/UT/राज्य / केंद्रीय शासित प्रदेश</label>
         <input type="text" id="state" name="state" 
                            value="<?php echo htmlspecialchars($row['state']); ?>" readonly>
    </div>
    <div class="form-group">
        <label for="distic">District/जिला</label>
        <input type="text" id="distic" name="distic" value="<?php echo htmlspecialchars($row['distic']);?>" required ?>
    </div>

    <div class="form-group">
        <label for="city">Village/City/गांव / शहर</label>
        <input type="text" id="city" name="city"  value="<?php echo htmlspecialchars($row['city']); ?>" required>
    </div>

    <div class="form-group">
        <label for="police">Police Station/पुलिस स्टेशन</label>
        <input type="text" id="police" name="police" value="<?php echo htmlspecialchars($row['police']); ?>" required>
    </div>

    <div class="form-group">
        <label for="post_office">Post Office/डाक-घर</label>
        <input type="text" id="post_office" name="post_office" value="<?php echo htmlspecialchars($row['post_office']); ?>" required>
    </div>

    <div class="form-group">
        <label for="tehsil">Tehsil/तहसील</label>
        <input type="text" id="tehsil" name="tehsil" value="<?php echo htmlspecialchars($row['tehsil']); ?>" required>
    </div>
</div>

<h3>Correspondence Address</h3>

<div class="form-group">
    <label for="address_copy">Permanent Address/स्थायी पता</label>
    <textarea id="address_copy" name="address_copy" required rows="4" style="width: 100%;">
        <?php echo htmlspecialchars($row['address_copy']); ?>
    </textarea>
</div>

<div class="two-column">
    
    <div class="form-group">
        <label for="pin_copy">PINCODE/पिन कोड</label>
        <input type="text" id="pin_copy" name="pin_copy" value="<?php echo htmlspecialchars($row['pin_copy']); ?>" required>
    </div>

    <div class="form-group">
        <label for="state_copy">State/UT/राज्य / केंद्रीय शासित प्रदेश</label>
         <input type="text" id="state_copy" name="state_copy" 
                            value="<?php echo htmlspecialchars($row['state_copy']); ?>" readonly>
    </div>
    <div class="form-group">
        <label for="distic_copy">District/जिला</label>
        <input type="text" id="distic_copy" name="distic_copy" value="<?php echo htmlspecialchars($row['distic_copy']); ?>" required>
    </div>

    <div class="form-group">
        <label for="city_copy">Village/City/गांव / शहर</label>
        <input type="text" id="city_copy" name="city_copy" value="<?php echo htmlspecialchars($row['city_copy']); ?>" required>
    </div>

    <div class="form-group">
        <label for="police_copy">Police Station/पुलिस स्टेशन</label>
        <input type="text" id="police_copy" name="police_copy" value="<?php echo htmlspecialchars($row['police_copy']); ?>" required>
    </div>

    <div class="form-group">
        <label for="post_office_copy">Post Office/डाक-घर</label>
        <input type="text" id="post_office_copy" name="post_office_copy" value="<?php echo htmlspecialchars($row['post_office_copy']); ?>" required>
    </div>

    <div class="form-group">
        <label for="tehsil_copy">Tehsil/तहसील</label>
        <input type="text" id="tehsil_copy" name="tehsil_copy" value="<?php echo htmlspecialchars($row['tehsil_copy']); ?>" required>
    </div>
</div>



<h3>Qualifications Details</h3>
<div class="two-column">
<div class="form-group">
  <label for="address">Qualification Type/योग्यता प्रकार</label>
<input type="text" id="qualification_type" name="qualification_type" 
 value="<?php echo htmlspecialchars($row['qualification_type']); ?>" readonly>
</div>

    <div class="form-group">
        <label for="pin">Certificate No./प्रमाण पत्र संख्या</label>
        <input type="text" id="pin" name="Certificate_no_pin" value="<?php echo htmlspecialchars($row['Certificate_no_pin']); ?>" required>
    </div>
    <div class="form-group">
        <label for="distic">Year/वर्ष</label>
        <input type="text" id="year" name="year" 
 value="<?php echo htmlspecialchars($row['year']); ?>" readonly>
    </div>
    
    <div class="form-group">
        <label for="state">State/राज्य</label>
        <input type="text" id="state_s" name="state_s" 
 value="<?php echo htmlspecialchars($row['state_s']); ?>" readonly>
    </div>
   

    <div class="form-group">
        <label for="University">Board/University/बोर्ड / विश्वविद्यालय</label>
        <input type="text" id="University" name="University"  value="<?php echo htmlspecialchars($row['University']); ?>" required>
    </div>

</div>


<h3>Document Upload Form</h3>
<div class="form-group">
    
<label for="photo">Upload Photo:</label>
        <input type="file" id="photo" name="photo" accept="image/*" required><br><br>

        <label for="signature">Upload Signature:</label>
        <input type="file" id="signature" name="signature" accept="image/*" required><br><br>

        <label for="ssc">SSC/Matric/High School Certificate:</label>
        <input type="file" id="ssc" name="ssc" accept=".pdf, .jpg, .png" required><br><br>

        <label for="intermediate">Intermediate (10+2) Certificate:</label>
        <input type="file" id="intermediate" name="intermediate" accept=".pdf, .jpg, .png" required><br><br>

        <label for="castEws">Cast/EWS Certificate:</label>
        <input type="file" id="castEws" name="castEws" accept=".pdf, .jpg, .png" required><br><br>

        <label for="graduation">Graduation Certificate:</label>
        <input type="file" id="graduation" name="graduation" accept=".pdf, .jpg, .png" required><br><br>

        <label for="postGraduation">Post Graduation Certificate:</label>
        <input type="file" id="postGraduation" name="postGraduation" accept=".pdf, .jpg, .png" required><br><br>
</div>

<h3>Choose your Post</h3>
<div class="form-group">
                <label for="post">Choose Post</label>
               <input type="text" id="post" name="post" 
 value="<?php echo htmlspecialchars($row['post']); ?>" readonly>
            </div>
                     <a href="update_form_data.php?id=<?php echo $row['id']; ?>" class="btn">Edit</a>
                    <a href="dashboard.php" class="btn btn-back">Back to Dashboard</a>
                </div>
            </form>
        </div>
    </body>
    </html>

    <?php
} else {
    echo "No data found.";
}

// Close connection
mysqli_close($con);
?>
