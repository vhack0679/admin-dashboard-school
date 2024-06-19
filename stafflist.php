<?php include 'header.php'; ?>
<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
require_once "config.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM staff";
$result = $conn->query($sql);

$staff_records = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $staff_records[] = $row;
    }
}

$conn->close();
?>
<nav class="px-3 py-2 bg-white rounded shadow-sm">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto"> Staff List</h5>
               
                <div class="dropdown">
                    <div class="d-flex align-items-center cursor-pointer dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <span class="me-2 d-none d-sm-block"> Admin</span>
                        <img class="navbar-profile-image"
                            src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cGVyc29ufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                            alt="Image">
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </div>
            </nav>
            <div class="table-responsive mt-5" >
   
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Staff ID</th>
                <th>Name</th>
                <th>Course</th>
                <th>Batch Time</th>
                <th>Class</th>
                <th>Section</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($staff_records as $record): ?>
                <tr>
                    <td><?php echo $record['staff_id']; ?></td>
                    <td><?php echo $record['name']; ?></td>
                    <td><?php echo $record['course']; ?></td>
                    <td><?php echo $record['batch_time']; ?></td>
                    <td><?php echo $record['class']; ?></td>
                    <td><?php echo $record['section']; ?></td>
                    <td><?php echo $record['details']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

   

<?php include 'footer.php'; ?>  