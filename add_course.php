```php
<?php
include("base/header.php");

if(isset($_POST['add_course'])){
    extract($_POST);

    $insert_query = "INSERT INTO courses(course_title, course_code, course_duration, course_status) VALUES('$course_title', '$course_code', '$course_duration', '$course_status')";
    $execute = mysqli_query($connection_ref, $insert_query);

    echo "<script>
        location.assign('all_courses.php');
    </script>";
}
?>


<main class="dashboard-content">
    <div class="container-fluid px-3 px-lg-4 py-4">

        <div class="d-flex justify-content-between mb-5">
            <h3>Add Course</h3>

            <a href="all_courses.php" class="btn btn-primary btn-sm" type="button">
                <i class="bi bi-file-earmark-plus" aria-hidden="true"></i> All Courses
            </a>
        </div>

        <div class="col-12 col-xl-7">
            <form class="panel needs-validation" novalidate method="POST">
                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">Course Title</label>
                        <input class="form-control" name="course_title" required>
                        <div class="invalid-feedback">Course title is required.</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Course Code</label>
                        <input class="form-control" name="course_code" required>
                        <div class="invalid-feedback">Course code is required.</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Duration</label>
                        <input class="form-control" name="course_duration" required>
                        <div class="invalid-feedback">Duration is required.</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Status</label>

                        <select class="form-select" name="course_status" required>
                            <option value="">Choose status</option>
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>

                        <div class="invalid-feedback">Choose a status.</div>
                    </div>

                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button class="btn btn-primary" type="submit" name="add_course">
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
