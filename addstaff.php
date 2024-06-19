<?php include 'header.php'; 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $course = $_POST['course'];
    $batch_time = $_POST['batch-time'];
    $class = $_POST['class'];
    $section = $_POST['section'];
    $details = $_POST['details'];

    require_once "config.php";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO staff (name, course, batch_time, class, section, details)
            VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $name, $course, $batch_time, $class, $section, $details);

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>




<nav class="px-3 py-2 bg-white rounded shadow-sm">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">Add Staff</h5>
                <div class="dropdown me-3 d-none d-sm-block">
                    
                    
                </div>
                <div class="dropdown">
                    <div class="d-flex align-items-center cursor-pointer dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <span class="me-2 d-none d-sm-block"> Admin</span>
                        <img class="navbar-profile-image"
                            src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cGVyc29ufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                            alt="Image">
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </nav>
            <div class="container mt-5">
       
            <form id="myForm" method="post" action="">
            <div class="row">
                <div class="col-md-4 mt-4">
                    <div class="form-group">
                        <label for="course">Name</label>
                        <input class="form-control" id="name" name="name" placeholder="Staff Name" type="text" required>
                    </div>
                </div>
                <div class="col-md-4 mt-4">
                    <div class="form-group">
                        <label for="course">Course:</label>
                        <select class="form-control select2" id="course" name="course" style="width: 100%; padding: 0.75rem 1rem;" required>
                            <option value="">Select Course</option>
                            <option value="math">Math</option>
                            <option value="science">Science</option>
                            <option value="english">English</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 mt-4">
                    <div class="form-group">
                        <label for="batch-time">Batch Time:</label>
                        <select class="form-control select2" id="batch-time" name="batch-time" style="width: 100%; padding: 0.75rem 1rem;" required>
                            <option value="">Select Batch Time</option>
                            <option value="9:00 AM to 10:00AM">9:00 AM to 10:00AM</option>
                            <option value="10:00 AM to 11:00 AM">10:00 AM to 11:00 AM</option>
                            <option value="1:00 AM to 12:00 PM">11:00 AM to 12:00 PM</option>
                            <option value="1:00 PM to 2:00 PM">1:00 PM to 2:00 PM</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                
                <div class="col-md-4 mt-4">
                    <div class="form-group">
                        <label for="class">Class:</label>
                        <select class="form-control select2" id="class" name="class" style="width: 100%; padding: 0.75rem 1rem;"required>
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
            </div>
            <div class="row mt-4">
                <div class="form-group">
                    <label for="details">Details:</label>
                    <textarea class="form-control" id="details" name="details" rows="3"></textarea>
                </div>
               
            </div>
           
            <button type="submit" class="btn btn-success mt-4"><i class="ri-save-2-fill"></i>Save</button>
            <button type="button" class="btn btn-danger mt-4" onclick="clearForm()">Clear</button>
        </form>
    </div>
    <?php include 'footer.php'; ?>  