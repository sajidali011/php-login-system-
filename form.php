form.php

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSF Personal Details Form</title>
    <link rel="stylesheet" href="form.css">
    <script defer src="script.js"></script>
    <style>
        .button {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    color: #fff;
    background-color: #007BFF;
    border: none;
    border-radius: 4px;
}

.button:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
<?php include "insert_form_data"?>

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
                    <?
                    <a href="logout.php">Log out</a>
                </button>
            <?php endif; ?>
        </div>
    </div>

    <nav>
        <img src="img/logo.png" alt="Your Logo" class="logo">
        <button class="menu-toggle" aria-label="Toggle menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
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

    <form action="form.php" method="post" enctype="multipart/form-data">
        <!-- Personal Information Section -->
        <h3>Personal Information</h3>
        <div class="two-column">
            <div class="form-group">
                <label for="candidate_name">Candidate's Name / प्रत्याशी का नाम:</label>
                <input type="text" id="candidate_name" name="candidate_name" required>
            </div>

            <div class="form-group">
                <label for="mobile_no">Mobile No. / मोबाइल संख्या:</label>
                <input type="text" id="mobile_no" name="mobile_no" required>
            </div>

            <div class="form-group">
                <label for="email_id">Email Id / इ-मेल आई. डी:</label>
                <input type="email" id="email_id" name="email_id" required>
            </div>
        </div>

        <!-- Identity Details Section -->
        <h3>Identity Details</h3>
        <div class="two-column">
            <div class="form-group">
                <label for="aadhar_card">Aadhar Card (Preferably):</label>
                <input type="text" id="aadhar_card" name="aadhar_card">
            </div>

            <div class="form-group">
                <label for="aadhar_no">Aadhar No:</label>
                <input type="text" id="aadhar_no" name="aadhar_no">
            </div>

            <div class="form-group">
                <label for="identity_type">Identity Type:</label>
                <select id="identity_type" name="identity_type" required>
                    <option value="">Select Identity Type</option>
                    <option value="passport">Passport</option>
                    <option value="pan">PAN Card</option>
                    <option value="driving_license">Driving License</option>
                    <option value="aadhar">Aadhar</option>
                    <option value="voter_id">Voter ID</option>
                </select>
            </div>

            <div class="form-group">
                <label for="identity_certificate_no">Identity Certificate No:</label>
                <input type="text" id="identity_certificate_no" name="identity_certificate_no" required>
            </div>
        </div>
      
        <h3>Additional Information</h3>
        <div class="two-column">
            <div class="form-group">
                <label for="dob">Date of Birth / जन्मतिथि:</label>
                <input type="date" id="dob" name="dob" required>
            </div>

            <div class="form-group">
                <label for="age">Age / आयु:</label>
                <input type="number" id="age" name="age" required>
            </div>

            <div class="form-group">
                <label for="nationality">Nationality / राष्ट्रीयता:</label>
                <input type="text" id="nationality" name="nationality" required>
            </div>

            <div class="form-group">
                <label for="father_name">Father's Name / पिता का नाम:</label>
                <input type="text" id="father_name" name="father_name" required>
            </div>

            <div class="form-group">
                <label for="mother_name">Mother's Name / माता का नाम:</label>
                <input type="text" id="mother_name" name="mother_name" required>
            </div>

            <div class="form-group">
                <label for="permanent_mark">Permanent Identification Mark on Body:</label>
                <input type="text" id="permanent_mark" name="permanent_mark" required>
            </div>

            <div class="form-group">
                <label for="gender">Gender / लिंग:</label>
                <select id="gender" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="marital_status">Marital Status / वैवाहिक स्थिति:</label>
                <select id="marital_status" name="marital_status" required>
                    <option value="">Select Marital Status</option>
                    <option value="married">Married</option>
                    <option value="unmarried">Unmarried</option>
                    <option value="divorced">Divorced</option>
                    <option value="widow">Widow</option>
                </select>
            </div>
        </div>


        <h3>Domicile Details</h3>
        <div class="two-column">
        <div class="form-group">
            <label for="domicile_certificate">Do you have domicile certificate?</label>
            <select id="domicile_certificate" name="domicile_certificate" required>
                <option value="">Select Option</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>
        <div class="form-group">
                <label for="aadhar_no">Domicile certificate number:</label>
                <input type="text" id="Domicile_certificate_no" name="Domicile_certificate_no">
            </div>
            <div class="form-group">
            <label for="Domcile_issuing_state">Domcile issuing state:</label>
                <select id="Domcile_issuing_state" name="Domcile_issuing_state" required>
                    <option value="" salected>Select State</option>
                   
<option value="9128">ANDHRA PRADESH</option>
<option value="9112">ARUNACHAL PRADESH</option>
<option value="9118">ASSAM</option>
<option value="9110">BIHAR</option>
<option value="9104">CHANDIGARH</option>
<option value="9122">CHHATTISGARH</option>
<option value="9126">DADRA &amp; NAGAR HAVELI</option>
<option value="9125">DAMAN &amp; DIU</option>
<option value="9130">GOA</option>
<option value="9124">GUJARAT</option>
<option value="9106">HARYANA</option>
<option value="9102">HIMACHAL PRADESH</option>
<option value="9101">JAMMU &amp; KASHMIR</option>
<option value="9120">JHARKHAND</option>
<option value="9129">KARNATAKA</option>
<option value="9132">KERALA</option>
<option value="9137">LADAKH</option>
<option value="9131">LAKSHADWEEP</option>
<option value="9123">MADHYA PRADESH</option>
<option value="9127">MAHARASHTRA</option>
<option value="9114">MANIPUR</option>
<option value="9117">MEGHALAYA</option>
<option value="9115">MIZORAM</option>
<option value="9113">NAGALAND</option>
<option value="9107">NCT OF DELHI</option>
<option value="9121">ORISSA</option>
<option value="9134">PUDUCHERRY</option>
<option value="9103">PUNJAB</option>
<option value="9108">RAJASTHAN</option>
<option value="9111">SIKKIM</option>
<option value="9133">TAMIL NADU</option>
<option value="9136">TELANGANA</option>
<option value="9116">TRIPURA</option>
<option value="9109" >UTTAR PRADESH</option>
<option value="9105">UTTARAKHAND</option>
<option value="9119">WEST BENGAL</option>
   
                </select>
      
            </div>
        </div>
      
        <h3>Category Reservation</h3>
        <div class="two-column">
            <div class="form-group">
                <label for="religion">Religion / धर्म:</label>
                <select id="religion" name="religion" required>
                    <option value="">Select Religion</option>
                    <option value="hindu">Hindu</option>
                    <option value="muslim">Muslim</option>
                    <option value="christian">Christian</option>
                    <option value="sikh">Sikh</option>
                    <option value="jain">Jain</option>
                    <option value="others">Others</option>
                </select>
            </div>

            <div class="form-group">
                <label for="category">Category / श्रेणी:</label>
                <select id="category" name="category" required>
                    <option value="">Select Category</option>
                    <option value="unreserved">Unreserved</option>
                    <option value="sc">SC</option>
                    <option value="st">ST</option>
                    <option value="obc">OBC</option>
                    <option value="ews">EWS</option>
                </select>
            </div>

            <div class="form-group">
                <label for="recruitment_mode">Mode of Recruitment / भर्ती का तरीका:</label>
                <select id="recruitment_mode" name="recruitment_mode" required>
                    <option value="">Select Mode of Recruitment</option>
                    <option value="direct_entry">Direct Entry (DE)</option>
                    <option value="ex_serviceman">Ex-Serviceman (ESM)</option>
                    <option value="gov_employee">Government Employee</option>
                    <option value="bsd_department">BSD Department</option>
                </select>
            </div>
        </div>

        <h3>Subcategory Reservation</h3>
        <div class="two-column">
            <div class="form-group">
                <label for="differently_abled">Are you Differently Abled Person?</label>
                <select id="differently_abled" name="differently_abled" required>
                    <option value="">Select Option</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="ex_serviceman">Are You Ex-Serviceman?</label>
                <select id="ex_serviceman" name="ex_serviceman" required>
                    <option value="">Select Option</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="departmental">Departmental (Central Government):</label>
                <select id="departmental" name="departmental">
                    <option value="">Select Option</option>
                    <option value="central_government">Central Government</option>
                </select>
            </div>

            <div class="form-group">
                <label for="department_name">Department Name / विभाग का नाम:</label>
                <input type="text" id="department_name" name="department_name">
            </div>

            <div class="form-group">
                <label for="department_joining_date">Department Date of Joining:</label>
                <input type="date" id="department_joining_date" name="department_joining_date">
            </div>

            <div class="form-group">
                <label for="noc">NOC:</label>
                <select id="noc" name="noc">
                    <option value="">Select Option</option>
                    <option value="upload">Upload for NOC</option>
                    <option value="applied">Applied for NOC</option>
                </select>
            </div>

            <div class="form-group">
                <label for="noc_remarks">NOC Remarks / एन.ओ.सी. टिप्पणी:</label>
                <input type="text" id="noc_remarks" name="noc_remarks">
            </div>

            <div class="form-group">
                <label for="completed_service">Have you completed 3 years of service?</label>
                <select id="completed_service" name="completed_service" required>
                    <option value="">Select Option</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
        </div>
 
<h3>Address Details</h3>

<div class="form-group">
    <label for="address">Permanent Address/स्थायी पता</label>
    <textarea id="address" name="address" required rows="4" style="width: 100%;"></textarea>
</div>
<div class="two-column">
    
    <div class="form-group">
        <label for="pin">PINCODE/पिन कोड</label>
        <input type="text" id="pin" name="pin" required>
    </div>

    <div class="form-group">
        <label for="state">State/UT/राज्य / केंद्रीय शासित प्रदेश</label>
        <select id="state" name="state" required>
            <option value="" selected>Select State</option>
            <option value="9128">ANDHRA PRADESH</option>
            <option value="9112">ARUNACHAL PRADESH</option>
            <option value="9118">ASSAM</option>
            <option value="9110">BIHAR</option>
            <option value="9104">CHANDIGARH</option>
            <option value="9122">CHHATTISGARH</option>
            <option value="9126">DADRA &amp; NAGAR HAVELI</option>
            <option value="9125">DAMAN &amp; DIU</option>
            <option value="9130">GOA</option>
            <option value="9124">GUJARAT</option>
            <option value="9106">HARYANA</option>
            <option value="9102">HIMACHAL PRADESH</option>
            <option value="9101">JAMMU &amp; KASHMIR</option>
            <option value="9120">JHARKHAND</option>
            <option value="9129">KARNATAKA</option>
            <option value="9132">KERALA</option>
            <option value="9137">LADAKH</option>
            <option value="9131">LAKSHADWEEP</option>
            <option value="9123">MADHYA PRADESH</option>
            <option value="9127">MAHARASHTRA</option>
            <option value="9114">MANIPUR</option>
            <option value="9117">MEGHALAYA</option>
            <option value="9115">MIZORAM</option>
            <option value="9113">NAGALAND</option>
            <option value="9107">NCT OF DELHI</option>
            <option value="9121">ORISSA</option>
            <option value="9134">PUDUCHERRY</option>
            <option value="9103">PUNJAB</option>
            <option value="9108">RAJASTHAN</option>
            <option value="9111">SIKKIM</option>
            <option value="9133">TAMIL NADU</option>
            <option value="9136">TELANGANA</option>
            <option value="9116">TRIPURA</option>
            <option value="9109">UTTAR PRADESH</option>
            <option value="9105">UTTARAKHAND</option>
            <option value="9119">WEST BENGAL</option>
        </select>
    </div>
    <div class="form-group">
        <label for="distic">District/जिला</label>
        <input type="text" id="distic" name="distic" required>
    </div>

    <div class="form-group">
        <label for="city">Village/City/गांव / शहर</label>
        <input type="text" id="city" name="city" required>
    </div>

    <div class="form-group">
        <label for="police">Police Station/पुलिस स्टेशन</label>
        <input type="text" id="police" name="police" required>
    </div>

    <div class="form-group">
        <label for="post_office">Post Office/डाक-घर</label>
        <input type="text" id="post_office" name="post_office" required>
    </div>

    <div class="form-group">
        <label for="tehsil">Tehsil/तहसील</label>
        <input type="text" id="tehsil" name="tehsil" required>
    </div>
</div>

<h3>Correspondence Address</h3>

<div class="form-group">
    <label for="address_copy">Permanent Address/स्थायी पता</label>
    <textarea id="address_copy" name="address_copy" required rows="4" style="width: 100%;"></textarea>
</div>
<div class="two-column">
    
    <div class="form-group">
        <label for="pin_copy">PINCODE/पिन कोड</label>
        <input type="text" id="pin_copy" name="pin_copy" required>
    </div>

    <div class="form-group">
        <label for="state_copy">State/UT/राज्य / केंद्रीय शासित प्रदेश</label>
        <select id="state_copy" name="state_copy" required>
            <option value="" selected>Select State</option>
             <option value="" selected>Select State</option>
            <option value="9128">ANDHRA PRADESH</option>
            <option value="9112">ARUNACHAL PRADESH</option>
            <option value="9118">ASSAM</option>
            <option value="9110">BIHAR</option>
            <option value="9104">CHANDIGARH</option>
            <option value="9122">CHHATTISGARH</option>
            <option value="9126">DADRA &amp; NAGAR HAVELI</option>
            <option value="9125">DAMAN &amp; DIU</option>
            <option value="9130">GOA</option>
            <option value="9124">GUJARAT</option>
            <option value="9106">HARYANA</option>
            <option value="9102">HIMACHAL PRADESH</option>
            <option value="9101">JAMMU &amp; KASHMIR</option>
            <option value="9120">JHARKHAND</option>
            <option value="9129">KARNATAKA</option>
            <option value="9132">KERALA</option>
            <option value="9137">LADAKH</option>
            <option value="9131">LAKSHADWEEP</option>
            <option value="9123">MADHYA PRADESH</option>
            <option value="9127">MAHARASHTRA</option>
            <option value="9114">MANIPUR</option>
            <option value="9117">MEGHALAYA</option>
            <option value="9115">MIZORAM</option>
            <option value="9113">NAGALAND</option>
            <option value="9107">NCT OF DELHI</option>
            <option value="9121">ORISSA</option>
            <option value="9134">PUDUCHERRY</option>
            <option value="9103">PUNJAB</option>
            <option value="9108">RAJASTHAN</option>
            <option value="9111">SIKKIM</option>
            <option value="9133">TAMIL NADU</option>
            <option value="9136">TELANGANA</option>
            <option value="9116">TRIPURA</option>
            <option value="9109">UTTAR PRADESH</option>
            <option value="9105">UTTARAKHAND</option>
            <option value="9119">WEST BENGAL</option>
        </select>
             Add state options dynamically or statically same as the above 
        </select>
    </div>
    
    <div class="form-group">
        <label for="distic_copy">District/जिला</label>
        <input type="text" id="distic_copy" name="distic_copy" required>
    </div>

    <div class="form-group">
        <label for="city_copy">Village/City/गांव / शहर</label>
        <input type="text" id="city_copy" name="city_copy" required>
    </div>

    <div class="form-group">
        <label for="police_copy">Police Station/पुलिस स्टेशन</label>
        <input type="text" id="police_copy" name="police_copy" required>
    </div>

    <div class="form-group">
        <label for="post_office_copy">Post Office/डाक-घर</label>
        <input type="text" id="post_office_copy" name="post_office_copy" required>
    </div>

    <div class="form-group">
        <label for="tehsil_copy">Tehsil/तहसील</label>
        <input type="text" id="tehsil_copy" name="tehsil_copy" required>
    </div>
</div>

<h3>Qualifications Details</h3>
<div class="two-column">
<div class="form-group">
  <label for="address">Qualification Type/योग्यता प्रकार</label>
<select name="qualification_type">
    <option value=""></option>
    <option value="1">High School</option>
    <option value="2">Intermediate(10+2)</option>
    <option value="18">Diploma</option>
    <option value="19">Graduate</option>
    <option value="20">PG Diploma</option>
    <option value="617">ITI</option>
</select>
</div>

    
    <div class="form-group">
        <label for="pin">Certificate No./प्रमाण पत्र संख्या</label>
        <input type="text" id="pin" name="Certificate_no_pin" required>
    </div>
    <div class="form-group">
        <label for="distic">Year/वर्ष</label>
        <select name="year" id="year">
    <option value="1966">1966</option>
    <option value="1967">1967</option>
    <option value="1968">1968</option>
    <option value="1969">1969</option>
    <option value="1970">1970</option>
    <option value="1971">1971</option>
    <option value="1972">1972</option>
    <option value="1973">1973</option>
    <option value="1974">1974</option>
    <option value="1975">1975</option>
    <option value="1976">1976</option>
    <option value="1977">1977</option>
    <option value="1978">1978</option>
    <option value="1979">1979</option>
    <option value="1980">1980</option>
    <option value="1981">1981</option>
    <option value="1982">1982</option>
    <option value="1983">1983</option>
    <option value="1984">1984</option>
    <option value="1985">1985</option>
    <option value="1986">1986</option>
    <option value="1987">1987</option>
    <option value="1988">1988</option>
    <option value="1989">1989</option>
    <option value="1990">1990</option>
    <option value="1991">1991</option>
    <option value="1992">1992</option>
    <option value="1993">1993</option>
    <option value="1994">1994</option>
    <option value="1995">1995</option>
    <option value="1996">1996</option>
    <option value="1997">1997</option>
    <option value="1998">1998</option>
    <option value="1999">1999</option>
    <option value="2000">2000</option>
    <option value="2001">2001</option>
    <option value="2002">2002</option>
    <option value="2003">2003</option>
    <option value="2004">2004</option>
    <option value="2005">2005</option>
    <option value="2006">2006</option>
</select>
    
    </div>
    <div class="form-group">
        <label for="state">State/राज्य</label>
        <select id="state" name="state_s" required>
            <option value="" selected>Select State</option>
            <option value="9128">ANDHRA PRADESH</option>
            <option value="9112">ARUNACHAL PRADESH</option>
            <option value="9118">ASSAM</option>
            <option value="9110">BIHAR</option>
            <option value="9104">CHANDIGARH</option>
            <option value="9122">CHHATTISGARH</option>
            <option value="9126">DADRA &amp; NAGAR HAVELI</option>
            <option value="9125">DAMAN &amp; DIU</option>
            <option value="9130">GOA</option>
            <option value="9124">GUJARAT</option>
            <option value="9106">HARYANA</option>
            <option value="9102">HIMACHAL PRADESH</option>
            <option value="9101">JAMMU &amp; KASHMIR</option>
            <option value="9120">JHARKHAND</option>
            <option value="9129">KARNATAKA</option>
            <option value="9132">KERALA</option>
            <option value="9137">LADAKH</option>
            <option value="9131">LAKSHADWEEP</option>
            <option value="9123">MADHYA PRADESH</option>
            <option value="9127">MAHARASHTRA</option>
            <option value="9114">MANIPUR</option>
            <option value="9117">MEGHALAYA</option>
            <option value="9115">MIZORAM</option>
            <option value="9113">NAGALAND</option>
            <option value="9107">NCT OF DELHI</option>
            <option value="9121">ORISSA</option>
            <option value="9134">PUDUCHERRY</option>
            <option value="9103">PUNJAB</option>
            <option value="9108">RAJASTHAN</option>
            <option value="9111">SIKKIM</option>
            <option value="9133">TAMIL NADU</option>
            <option value="9136">TELANGANA</option>
            <option value="9116">TRIPURA</option>
            <option value="9109">UTTAR PRADESH</option>
            <option value="9105">UTTARAKHAND</option>
            <option value="9119">WEST BENGAL</option>
        </select>
    </div>
   

    <div class="form-group">
        <label for="University">Board/University/बोर्ड / विश्वविद्यालय</label>
        <input type="text" id="University" name="University" required>
    </div>

</div>


 <!-- Document Upload Section -->
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
        <select id="post" name="post" required>
            <option value="Branch head">Branch head</option>
            <option value="Marketing Manager">Marketing Manager</option>
            <option value="Computer Data Operator">Computer Data Operator</option>
            <option value="Supervisor">Supervisor</option>
            <option value="Electrician">Electrician</option>
            <option value="Solar Replace-Mentor">Solar Replace-Mentor</option>
            <option value="Peon">Peon</option>
        </select>
    </div>

    <button type="submit" name="submit-btn">Submit</button>
</form>
</div>

<?php include "formdata_insert.php"; ?>

<section class="main-content">
    <!-- Your main content goes here -->
</section>

<section class="container-fluid footer_section text-center">
    <p class="text-center">
        &copy; 2024 @suryamitranise Rights Reserved By <a href="index.php">NISE</a>
    </p>
</section>