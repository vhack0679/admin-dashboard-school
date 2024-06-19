<?php
include 'header.php';

require_once "config.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$sql_staff = "SELECT COUNT(*) AS total_staff FROM staff";
$result_staff = $conn->query($sql_staff);

if ($result_staff->num_rows > 0) {
    $row_staff = $result_staff->fetch_assoc();
    $total_staff = $row_staff["total_staff"];
} else {
    $total_staff = 0;
}

$sql_students = "SELECT COUNT(*) AS total_students FROM studentregistration";
$result_students = $conn->query($sql_students);

if ($result_students->num_rows > 0) {
    $row_students = $result_students->fetch_assoc();
    $total_students = $row_students["total_students"];
} else {
    $total_students = 0;
}

$conn->close();
?>



<nav class="px-3 py-2 bg-white rounded shadow-sm">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">Dashboard</h5>
                
                <div class="dropdown">
                    <div class="d-flex align-items-center cursor-pointer dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <span class="me-2 d-none d-sm-block">Admin </span>
                        <img class="navbar-profile-image"
                            src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cGVyc29ufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                            alt="Image">
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </nav>

            <div class="py-4">
                <div class="row g-3">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="#"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-primary">
                            <div>
                                <i class="ri-team-fill summary-icon bg-primary mb-2"></i>
                                <div>Students </div>
                            </div>
                            <h4><?php echo $total_students ; ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="#" class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-indigo">
                            <div>
                                <i class="ri-user-star-fill summary-icon bg-indigo mb-2"></i>
                                <div>Staffs</div>
                            </div>
                            <h4><?php echo $total_staff; ?></h4>
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="#"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-success">
                            <div>
                                
                                <i class=" summary-icon bg-success mb-2">₹ </i>
                                <div>Income/year</div>
                            </div>
                            <h4>₹ 0</h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="#"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-success">
                            <div>
                                <i class=" summary-icon bg-success mb-2">₹</i>
                                <div>income/month</div>
                            </div>
                            <h4>₹ 0</h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="#"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-danger">
                            <div>
                                <i class=" summary-icon bg-danger mb-2">₹</i>
                                <div>expensive/year</div>
                            </div>
                            <h4>₹ 0</h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="#"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-danger">
                            <div>
                                <i class=" summary-icon bg-danger mb-2">₹</i>
                                <div>expensive/month</div>
                            </div>
                            <h4>₹ 0</h4>
                        </a>
                    </div>
                </div>
            </div>

<?php include 'footer.php'; ?>  