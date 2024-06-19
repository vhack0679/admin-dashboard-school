<?php include 'header.php' ?>
<?php
   session_start();

   if (!isset($_SESSION['username'])) {
       header("Location: login.php");
       exit();
   }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sname = $_POST['sname'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $aadhaarno = $_POST['aadhaarno'];
    $class = $_POST['class'];
    $section = $_POST['section'];
    $dateOfJoining = $_POST['dateOfJoining'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $fOccupation = $_POST['fOccupation'];
    $contactno = $_POST['contactno'];
    $Address = $_POST['Address'];
    $total_fee = $_POST['total_fee'];
    $feeinstalment = $_POST['feeinstalment'];

    require_once "config.php";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
 
    $stmt = $conn->prepare("INSERT INTO studentregistration (student_name, date_of_birth, aadhaar_no, class, section, date_of_joining, father_name, mother_name, father_occupation, contact_no, address, total_fee, fee_instalment) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssss", $sname, $dateOfBirth, $aadhaarno, $class, $section, $dateOfJoining, $fname, $mname, $fOccupation, $contactno, $Address, $total_fee, $feeinstalment);

    if ($stmt->execute()) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>


<nav class="px-3 py-2 bg-white rounded shadow-sm">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">Student Registration</h5>
                
                <div class="dropdown">
                    <div class="d-flex align-items-center cursor-pointer dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <span class="me-2 d-none d-sm-block">Admin</span>
                        <img class="navbar-profile-image"
                            src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cGVyc29ufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                            alt="Image">
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </div>
            </nav>

            <div class="container mt-5">
       
       <form id="myForm" method="post" action="">
       <div class="row">
        <h6>Student details</h6>
        <hr/>
           <div class="col-md-4 mt-4">
               <div class="form-group">
                   <label for="sname">Student Name:</label>
                   <input class="form-control" id="sname" name="sname" placeholder="Student Name" type="text" required>
               </div>
           </div>
           <div class="col-md-4 mt-4">
           <div class="form-group">
                <label for="dateOfJoining">Date of Birth:</label>
                <input class="form-control" id="dateOfBirth" name="dateOfBirth" type="date" required>
            </div>
           </div>
           <div class="col-md-4 mt-4">
           <div class="form-group">
    <label for="aadhaarno">Aadhaar No:</label>
    <input class="form-control" id="aadhaarno" name="aadhaarno" placeholder="Enter 12-digit Aadhaar No" type="text" maxlength="12" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 12);">

</div>

           </div>
       </div>
       <div class="row mt-2">
           <div class="col-md-4 mt-4">
           <div class="form-group">
                        <label for="class">Class:</label>
                        <select class="form-control select2" id="class" name="class" style="width: 100%; padding: 0.75rem 1rem;" required>
                            <option value="">Select Class</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
           </div>
           <div class="col-md-4 mt-4">
           <div class="form-group">
                        <label for="section">Section:</label>
                        <select class="form-control select2" id="section" name="section" style="width: 100%; padding: 0.75rem 1rem;" required>
                            <option value="">Select Section</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
           </div>
           <div class="col-md-4 mt-4">
           <div class="form-group">
                <label for="dateOfJoining">Date of Joining:</label>
                <input class="form-control" id="dateOfJoining" name="dateOfJoining" type="date" required>
            </div>
           </div>
       </div>
       <div class="row mt-4">
        <h6>Parent Details</h6>
        <hr/>
           <div class="col-md-4 mt-4">
               <div class="form-group">
                   <label for="fname">Father Name:</label>
                   <input class="form-control" id="fname" name="fname" placeholder="Father Name" type="text" required>
               </div>
           </div>
           <div class="col-md-4 mt-4">
           <div class="form-group">
                   <label for="mname">Mother Name:</label>
                   <input class="form-control" id="mname" name="mname" placeholder="mother Name" type="text" required>
               </div>
           </div>
           <div class="col-md-4 mt-4">
           <div class="form-group">
                   <label for="fOccupation">Father Occupation:</label>
                   <input class="form-control" id="fOccupation" name="fOccupation" placeholder="Father Occupation" type="text" required>
               </div>
           </div>
       </div>
       <div class="row mt-4">
           <div class="col-md-4 mt-4">
               <div class="form-group">
                   <label for="contactno">Contact No:</label>
                   <input class="form-control" id="contactno" name="contactno" placeholder="+91 " type="text" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 12);" required>
               </div>
           </div>
           <div class="col-md-4 mt-4">
           <div class="form-group">
                   <label for="Address">Address</label>
                   <input class="form-control" id="Address" name="Address" placeholder="Address with H.NO" type="text" required>
               </div>
           </div>
          
       </div>
       <div class="row mt-4">
        <h6>FEE Details</h6>
        <hr/>
           <div class="col-md-4 mt-4">
               <div class="form-group">
                   <label for="total_fee">Total Fee:</label>
                   <input class="form-control" id="total_fee" name="total_fee" placeholder="Total Fee" type="text" required>
               </div>
           </div>
           <div class="col-md-4 mt-4">
           <div class="form-group">
                   <label for="feeinstalment">Fee Instalment:</label>
                   <select class="form-control select2" id="feeinstalment" name="feeinstalment" style="width: 100%; padding: 0.75rem 1rem;" required>
                            <option value="">Select instalment</option>
                            <option value="full">Full</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
               </div>
           </div>
         
       </div>
       
       <button type="submit" class="btn btn-success mt-4"><i class="ri-save-2-fill"></i>Save</button>
            <button type="button" class="btn btn-danger mt-4" onclick="clearForm()">Clear</button>
   </form>
</div>
            <?php include 'footer.php' ?>