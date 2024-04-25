<?php
session_start();

// Redirect user to login page if not logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

include('database.php');

// Fetch admin details
$admin_id = $_SESSION['admin_id'];
$sql_admin = "SELECT * FROM admin WHERE admin_id = $admin_id";
$result_admin = mysqli_query($conn, $sql_admin);
if (!$result_admin) {
    die("Database error: " . mysqli_error($conn));
}
$admin = mysqli_fetch_assoc($result_admin);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet">
    <style>
        body {
    background-color: #f8f9fa;
    font-family: 'Cabin', sans-serif;
}

.sidebar {
    height: 100%;
    width: 250px;
    position: fixed;
    top: 0;
    left: 0;
    background-color: #343a40;
    padding-top: 20px;
}

.sidebar a {
    padding: 10px;
    text-decoration: none;
    font-size: 1.2rem;
    color: #f8f9fa;
    display: block;
}

.sidebar a.active {
    background-color: #007bff;
}

.sidebar a:hover {
    background-color: #007bff;
    color: #f8f9fa;
}

.container {
    padding-top: 50px;
    margin-left: 250px;
}

.card {
    margin-bottom: 20px;
}

.navbar-brand {
    font-size: 1.5rem;
}

.navbar-toggler {
    order: 1;
}

.navbar-collapse {
    text-align: left;
}

.navbar-nav {
    margin-left: auto;
}

.navbar-nav .nav-item {
    margin-right: 10px;
}

.navbar-nav .nav-item:last-child {
    margin-right: 0;
}

.navbar-nav .nav-link {
    color: black;
}

.fa-user,
.fa-gears,
.fa-right-from-bracket {
    font-size: 1.5rem;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #dee2e6;
}

th, td {
    padding: 8px;
    text-align: left;
}

th {
    background-color: #007bff;
    color: white;
}

    </style>
</head>
<body>
    <div class="sidebar">
    <a class="active" href="#">Admin Dashboard</a>
    <a href="program.php">Add Program</a>
    <a href="#">Admission</a>
    <a href="#">All Students</a>
    <a href="#">Select Applicants</a>
    <a href="#">View Application Status</a>
</div>
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- Navbar content -->
            <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <span class="nav-link"><i class="far fa-user"></i> Welcome <?php echo $_SESSION['fullname']; ?></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-gears"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-user"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i class="fas fa-right-from-bracket"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        </nav>
            <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Hi, Admin!</h3>
                <p class="card-text">You have access to manage users, settings, and more.</p>
            </div>
        </div>
            <h2>All Applications</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Program</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
// Fetch all applications
$sql_applications = "SELECT application.application_id, application.program_id, application.user_id, user.fullname, user.email, user.phone, programme.program_name, application.status_message
                        FROM application
                        INNER JOIN user ON application.user_id = user.user_id
                        INNER JOIN programme ON application.program_id = programme.program_id";
$result_applications = mysqli_query($conn, $sql_applications);

if (!$result_applications) {
    die("Database error: " . mysqli_error($conn));
}

if (mysqli_num_rows($result_applications) > 0) {
                $num = 1;
    while ($row = mysqli_fetch_assoc($result_applications)) {
        echo "<tr>";
        echo "<td>" . $num++ . "</td>";
        echo "<td>" . $row['fullname'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td>" . $row['program_name'] . "</td>";
       echo "<td><a href='view.php?application_id=" . $row['application_id'] . "'>View</a></td>";
       echo "<td>" . $row['status_message'] . "</td>";
        echo "<td><a href='select_applicant.php?application_id=" . $row['application_id'] . "'>Select</a></td>";

        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>No applications found</td></tr>";
}

// Close database connection
mysqli_close($conn);
?>

                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
