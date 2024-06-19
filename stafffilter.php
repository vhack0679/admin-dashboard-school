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

function fetchFilteredData($conn, $course, $batchTime) {
    $sql = "SELECT * FROM staff WHERE 1";

    if (!empty($course)) {
        $sql .= " AND course = '$course'";
    }

    if (!empty($batchTime)) {
        $sql .= " AND batch_time = '$batchTime'";
    }

    $result = $conn->query($sql);

    $filteredData = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $filteredData[] = $row;
        }
    }

    return $filteredData;
}

$courses = [];
$batch_times = [];

$sql = "SELECT DISTINCT course FROM staff";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row['course'];
    }
}

$sql = "SELECT DISTINCT batch_time FROM staff";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $batch_times[] = $row['batch_time'];
    }
}

$conn->close();
?>
<nav class="px-3 py-2 bg-white rounded shadow-sm">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">Staff Filter</h5>
               
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
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="courseFilter">Filter by Course:</label>
            <select id="courseFilter" class="form-control">
                <option value="">All Courses</option>
                <?php foreach ($courses as $course): ?>
                    <option value="<?php echo $course; ?>"><?php echo $course; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-4">
            <label for="batchTimeFilter">Filter by Batch Time:</label>
            <select id="batchTimeFilter" class="form-control">
                <option value="">All Batch Times</option>
                <?php foreach ($batch_times as $batch_time): ?>
                    <option value="<?php echo $batch_time; ?>"><?php echo $batch_time; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="table-responsive">
        <table id="staffTable" class="table table-striped">
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
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    function updateTable(course, batchTime) {
        $.ajax({
            url: 'fetch_filtered_data.php', 
            method: 'POST',
            data: { course: course, batch_time: batchTime },
            dataType: 'html',
            success: function(response) {
                $('#staffTable tbody').html(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    $('#courseFilter').change(function() {
        var course = $(this).val();
        var batchTime = $('#batchTimeFilter').val();
        updateTable(course, batchTime);
    });

    $('#batchTimeFilter').change(function() {
        var course = $('#courseFilter').val();
        var batchTime = $(this).val();
        updateTable(course, batchTime);
    });

    updateTable('', '');
});
</script>
