<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require 'db.php';
require 'create.php';
require 'update.php';
require 'delete.php';
require 'read.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['create'])) {
        createSoftwareEngineer(
            $pdo, 
            $_POST['first_name'], 
            $_POST['last_name'], 
            $_POST['email'], 
            $_POST['phone_number'], 
            $_POST['specialization'], 
            $_POST['years_of_experience'], 
            $_POST['salary_expectation'], 
            $_SESSION['user_id'] // Pass user ID as added_by
        );
    } elseif (isset($_POST['update'])) {
        updateSoftwareEngineer(
            $pdo, 
            $_POST['id'], 
            $_POST['first_name'], 
            $_POST['last_name'], 
            $_POST['email'], 
            $_POST['phone_number'], 
            $_POST['specialization'], 
            $_POST['years_of_experience'], 
            $_POST['salary_expectation'], 
            $_SESSION['user_id'] // Pass user ID as updated_by
        );
    }
}

if (isset($_GET['delete'])) {
    deleteSoftwareEngineer($pdo, $_GET['delete']);
}

$engineers = getAllSoftwareEngineers($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Software Engineers CRUD Application</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Software Engineers CRUD Application</h1>
    <p class="text-right">
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </p>
    
    <h2>Add / Update Software Engineer</h2>
    <form method="POST" action="index.php">
        <input type="hidden" name="id" value="<?php echo isset($_GET['edit']) ? $_GET['edit'] : ''; ?>">
        
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" name="first_name" required>
        </div>
        
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" name="last_name" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        
        <div class="form-group">
            <label for="phone_number">Phone Number:</label>
            <input type="text" class="form-control" name="phone_number">
        </div>
        
        <div class="form-group">
            <label for="specialization">Specialization:</label>
            <input type="text" class="form-control" name="specialization">
        </div>
        
        <div class="form-group">
            <label for="years_of_experience">Years of Experience:</label>
            <input type="number" class="form-control" name="years_of_experience">
        </div>
        
        <div class="form-group">
            <label for="salary_expectation">Salary Expectation:</label>
            <input type="number" class="form-control" step="0.01" name="salary_expectation">
        </div>
        
        <button type="submit" name="create" class="btn btn-primary">Add Software Engineer</button>
        <?php if (isset($_GET['edit'])): ?>
            <button type="submit" name="update" class="btn btn-warning">Update Software Engineer</button>
        <?php endif; ?>
    </form>

    <h2 class="mt-4">Software Engineers List</h2>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Specialization</th>
                <th>Experience</th>
                <th>Salary Expectation</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($engineers as $engineer): ?>
                <tr>
                    <td><?php echo htmlspecialchars($engineer['id']); ?></td>
                    <td><?php echo htmlspecialchars($engineer['first_name']); ?></td>
                    <td><?php echo htmlspecialchars($engineer['last_name']); ?></td>
                    <td><?php echo htmlspecialchars($engineer['email']); ?></td>
                    <td><?php echo htmlspecialchars($engineer['phone_number']); ?></td>
                    <td><?php echo htmlspecialchars($engineer['specialization']); ?></td>
                    <td><?php echo htmlspecialchars($engineer['years_of_experience']); ?> years</td>
                    <td>$<?php echo htmlspecialchars($engineer['salary_expectation']); ?></td>
                    <td class="text-center">
                        <a href="index.php?edit=<?php echo $engineer['id']; ?>" class="btn btn-sm btn-info">Edit</a>
                        <a href="index.php?delete=<?php echo $engineer['id']; ?>" onclick="return confirm('Are you sure you want to delete this record?');" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
