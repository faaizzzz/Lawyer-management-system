<?php
// lawyer_register.php

// Start a session
session_start();

// Database connection (replace with your actual credentials)
$host = 'localhost';
$dbname = 'lawyermanagement';
$username = 'root';
$password = '';
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Initialize variables
$error = "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form inputs and sanitize
    $firstName = filter_input(INPUT_POST, 'first_Name', FILTER_SANITIZE_STRING);
    $lastName = filter_input(INPUT_POST, 'last_Name', FILTER_SANITIZE_STRING);
    $contactNumber = filter_input(INPUT_POST, 'contact_number', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security
    $institute = filter_input(INPUT_POST, 'university_College', FILTER_SANITIZE_STRING);
    $degree = $_POST['degree'];
    $passingYear = $_POST['passing_year'];
    $fullAddress = filter_input(INPUT_POST, 'full_address', FILTER_SANITIZE_STRING);
    $city = $_POST['city'];
    $zipCode = filter_input(INPUT_POST, 'zip_code', FILTER_SANITIZE_STRING);
    $practiceLength = $_POST['practise_Length'];
    $speciality = $_POST['speciality'];
    $caseHandle = implode(", ", $_POST['case_handle']); // Combine checked values

    // Image upload logic
    $image = $_FILES['fileToUpload'];
    $imagePath = 'uploads/' . basename($image['name']);
    move_uploaded_file($image['tmp_name'], $imagePath);

    // Insert data into database
    try {
        $query = "INSERT INTO lawyers (first_name, last_name, contact_number, email, password, university_college, degree, passing_year, full_address, city, zip_code, practise_length, speciality, case_handle, image_path) 
                  VALUES (:firstName, :lastName, :contactNumber, :email, :password, :institute, :degree, :passingYear, :fullAddress, :city, :zipCode, :practiceLength, :speciality, :caseHandle, :imagePath)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':contactNumber', $contactNumber);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':institute', $institute);
        $stmt->bindParam(':degree', $degree);
        $stmt->bindParam(':passingYear', $passingYear);
        $stmt->bindParam(':fullAddress', $fullAddress);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':zipCode', $zipCode);
        $stmt->bindParam(':practiceLength', $practiceLength);
        $stmt->bindParam(':speciality', $speciality);
        $stmt->bindParam(':caseHandle', $caseHandle);
        $stmt->bindParam(':imagePath', $imagePath);
        $stmt->execute();

        // Redirect to lawyer's dashboard
        header("Location: lawyer_dashboard.php");
        exit;
    } catch (PDOException $e) {
        $error = "Registration failed: " . $e->getMessage();
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register as a Lawyer</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .has-error .help-block { color: red; }
    </style>
</head>
<body>
    <header class="customnav bg-success">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand cus-a" href="#">Lawyer Management System</a>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link cus-a" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link cus-a" href="lawyers.php">Lawyers</a></li>
                    <li class="nav-item"><a class="nav-link cus-a" href="login.php">Login</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle cus-a" href="#" data-toggle="dropdown">Register</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="lawyer_register.php">Register as a lawyer</a>
                            <a class="dropdown-item" href="user_register.php">Register as a user</a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="registerform">
        <div class="container">
            <h2>Register as a Lawyer</h2>
            <?php if ($error): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
            <form action="lawyer_register.php" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="first_Name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="last_Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" class="form-control" name="contact_number" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="form-group">
                    <label>Profile Image</label>
                    <input type="file" class="form-control" name="fileToUpload" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>University / College Name</label>
                        <input type="text" class="form-control" name="university_College" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Degree</label>
                        <select name="degree" class="form-control" required>
                            <option selected>Choose...</option>
                            <option value="LLB">LLB</option>
                            <option value="LLM">LLM</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Passing Year</label>
                        <input type="number" class="form-control" name="passing_year" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="full_address" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>City</label>
                        <select name="city" class="form-control" required>
                            <option selected>Choose...</option>
                            <option value="Mumbai">Mumbai</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Kashmir">Kashmir</option>
                            <option value="Chennai">Chennai</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Zip Code</label>
                        <input type="text" class="form-control" name="zip_code" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Practice Length</label>
                    <select name="practise_Length" class="form-control" required>
                        <option selected>Choose...</option>
                        <option>1-5 years</option>
                        <option>6-10 years</option>
                        <option>11-15 years</option>
                        <option>16-20 years</option>
                        <option>21+ years</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Speciality</label>
                    <select name="speciality" class="form-control" required>
                        <option selected>Choose...</option>
                        <option>Corporate Law</option>
                        <option>Criminal Law</option>
                        <option>Family Law</option>
                        <option>Intellectual Property</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Cases You Handle</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="case_handle[]" value="Civil">
                        <label class="form-check-label">Civil</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="case_handle[]" value="Criminal">
                        <label class="form-check-label">Criminal</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="case_handle[]" value="Family">
                        <label class="form-check-label">Family</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="case_handle[]" value="Intellectual Property">
                        <label class="form-check-label">Intellectual Property</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
