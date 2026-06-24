```php
<?php
    session_start();

    if(!isset($_SESSION['user_email'])){
        header("Location: login.php");
        exit();
    }

    include("base/header.php");

if(isset($_POST['add_student'])){
    extract($_POST);

    $insert_query = "INSERT INTO students(student_name, student_email, student_status) VALUES('$student_name', '$student_email', '$student_status')";
    $execute = mysqli_query($connection_ref, $insert_query);

    echo "<script>
        location.assign('all_students.php');
    </script>";
}

?>


<main class="dashboard-content">
    <div class="container-fluid px-3 px-lg-4 py-4">

        <div class="d-flex justify-content-between mb-5">
            <h3>Add Student</h3>

            <a href="all_assignments.php" class="btn btn-primary btn-sm" type="button">
                <i class="bi bi-file-earmark-plus" aria-hidden="true"></i> All Assignments
            </a>
        </div>

        <div class="col-12 col-xl-7">
            <form class="panel needs-validation" novalidate method="POST">
                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">Student Name</label>
                        <input class="form-control" name="student_name" required>
                        <div class="invalid-feedback">Student name is required.</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Student Email</label>
                        <input class="form-control" name="student_email" required>
                        <div class="invalid-feedback">Student email is required.</div>
                    </div>

                    <div class="col-md-6"><label class="form-label" for="formPlan">Status</label>

                        <select class="form-select" name="student_status" required>
                            <option value="">---</option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Course Completed">Course Completed</option>
                        </select>
                        <div class="invalid-feedback">Choose a Status.</div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button class="btn btn-primary" type="submit" name="add_student">
                        <i class="bi bi-send" aria-hidden="true"></i> ADD
                    </button>
                </div>

            </form>
        </div>
    </div>
</main>

<?php
include("base/footer.php");
?>
```
