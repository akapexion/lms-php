<?php
session_start();

    if(!isset($_SESSION['user_email'])){
        header("Location: login.php");
        exit();
    }

    include("base/header.php");

if(isset($_POST['add_user'])){
    extract($_POST);

    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    $extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

    $allowed_extensions = ['jpg', 'jpeg', 'png'];

    if(in_array($extension, $allowed_extensions)){

    move_uploaded_file($image_tmp, "uploads/".$image_name);

    $insert_query = "INSERT INTO users(user_fullname, user_gender, user_role, user_email, user_image) VALUES('$fullname', '$gender', '$role', '$email', '$image_name')";
    $execute = mysqli_query($connection_ref, $insert_query);

    echo "<script>
        location.assign('all_users.php');
    </script>";
    }
}
?>
<main class="dashboard-content">
    <div class="container-fluid px-3 px-lg-4 py-4">

        <div class="d-flex justify-content-between mb-5">
            <h3>Add User</h3>

            <a href="all_users.php" class="btn btn-primary btn-sm" type="button"><i class="bi bi-file-earmark-plus"
                    aria-hidden="true"></i> All Users</a>
        </div>

        <div class="col-12 col-xl-7">
            <form class="panel needs-validation" novalidate method="POST" enctype="multipart/form-data">
                <div class="row g-3">
                    <div class="col-md-6"><label class="form-label" for="formName">Full name</label>

                        <input class="form-control" required name="fullname">

                        <div class="invalid-feedback">Full name is required.</div>
                    </div>
                    <div class="col-md-6"><label class="form-label" for="formEmail">Email</label>

                        <input class="form-control" name="email" type="email" required>

                        <div class="invalid-feedback">Valid email is required.</div>
                    </div>
                    <div class="col-md-6"><label class="form-label" for="formPlan">Role</label>

                        <select class="form-select" name="role" required>
                            <option value="">Choose role</option>
                            <option>Student</option>
                            <option>Instructor</option>
                            <option>Admin</option>
                        </select>
                        <div class="invalid-feedback">Choose a role.</div>
                    </div>
                    <div class="col-md-6"><label class="form-label" for="formPlan">Role</label>

                        <select class="form-select" name="gender" required>
                            <option value="">Choose Gender</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                        <div class="invalid-feedback">Choose a valid gender.</div>
                    </div>

                    <div class="col-md-6"><label class="form-label" for="formPlan">Image</label>
                        <input class="form-control" name="image" type="file" required>

                        <div class="invalid-feedback">Proper Image is required.</div>
                    </div>

                </div>
                <div class="d-flex justify-content-end mt-4">

                    <button class="btn btn-primary" type="submit" name="add_user"><i class="bi bi-send"
                            aria-hidden="true"></i> ADD</button>

                </div>
            </form>
        </div>
    </div>
</main>






<?php
include("base/footer.php");
?>