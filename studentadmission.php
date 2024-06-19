<?php include 'header.php'; ?>

<?php
 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "schoolwebsite";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT student_name FROM studentregistration";
$result = $conn->query($sql);
?>

<nav class="px-3 py-2 bg-white rounded shadow-sm">
    <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
    <h5 class="fw-bold mb-0 me-auto">Student Admission</h5>
    <div class="dropdown">
        <div class="d-flex align-items-center cursor-pointer dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="me-2 d-none d-sm-block">Admin</span>
            <img class="navbar-profile-image" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cGVyc29ufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="Image">
        </div>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">Logout</a></li>
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <form id="myForm" method="post" action="">
        <div class="row">
            
            <div class="col-md-4 mt-4">
                <div class="form-group">
                    <label for="sname">Student Name:</label>
                    <select class="form-control select2" id="sname" name="sname" required>
                        <option value="">Select Student</option>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row['student_name'] . '">' . $row['student_name'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-4 mt-4">
            <div class="form-group">
                <label for="class">Class:</label>
                    <select class="form-control select2" id="class" name="class" required>
                        <option value="">Select class</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 mt-4">
            <div class="form-group">
                   <label for="total_fee">Total Fee:</label>
                   <input class="form-control" id="total_fee" name="total_fee" placeholder="Total Fee" type="text" required>
               </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-4 mt-4">
                <div class="form-group">
                   <label for="Paidfee">Paid Fee:</label>
                   <input class="form-control" id="paidfee" name="paidfee" placeholder="Paid Fee" type="text" required>
               </div>
            </div>
           <div class="col-md-4 mt-4">
                <div class="form-group">
                   <label for="instalment">Instalment :</label>
                   <select class="form-control select2" id="class" name="class" required>
                        <option value="">Select Instalment</option>
                        <option value="YES">YES</option>
                        <option value="NO">NO</option>
                    </select>

               </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success mt-4"><i class="ri-save-2-fill"></i>Save</button>
        <button type="button" class="btn btn-danger mt-4" onclick="clearForm()">Clear</button>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    // Initialize Select2
    $(document).ready(function () {
        $('.select2').select2();
    });
</script>

<?php include 'footer.php'; ?>
