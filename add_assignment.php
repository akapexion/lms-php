```php
<?php
include("base/header.php");

if(isset($_POST['add_assignment'])){
    $assignment_title = $_POST['assignment_title'];
    $course_name = $_POST['course_name'];
    $due_date = $_POST['due_date'];
    $assignment_status = $_POST['assignment_status'];

    $insert_query = "INSERT INTO assignments(assignment_title, course_name, due_date, assignment_status) VALUES('$assignment_title', '$course_name', '$due_date', '$assignment_status')";
    $execute = mysqli_query($connection_ref, $insert_query);

    echo "<script>
        location.assign('all_assignments.php');
    </script>";

?>


<main class="dashboard-content">
    <div class="container-fluid px-3 px-lg-4 py-4">

        <div class="d-flex justify-content-between mb-5">
            <h3>Add Assignment</h3>

            <a href="all_assignments.php" class="btn btn-primary btn-sm" type="button">
                <i class="bi bi-file-earmark-plus" aria-hidden="true"></i> All Assignments
            </a>
        </div>

        <div class="col-12 col-xl-7">
            <form class="panel needs-validation" novalidate method="POST">
                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">Assignment Title</label>
                        <input class="form-control" name="assignment_title" required>
                        <div class="invalid-feedback">Assignment title is required.</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Course Name</label>
                        <input class="form-control" name="course_name" required>
                        <div class="invalid-feedback">Course name is required.</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Due Date</label>
                        <input class="form-control" type="date" name="due_date" required>
                        <div class="invalid-feedback">Due date is required.</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Status</label>

                        <select class="form-select" name="assignment_status" required>
                            <option value="">Choose status</option>
                            <option>Pending</option>
                            <option>Submitted</option>
                            <option>Closed</option>
                        </select>

                        <div class="invalid-feedback">Choose a status.</div>
                    </div>

                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button class="btn btn-primary" type="submit" name="add_assignment">
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
