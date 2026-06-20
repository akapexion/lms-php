<?php
include("base/header.php");

if(isset($_POST['add_user'])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $gender = $_POST['gender'];

    $insert_query = "INSERT INTO users(user_fullname, user_gender, user_role, user_email) VALUES('$fullname', '$gender', '$role', '$email')";
    $execute = mysqli_query($connection_ref, $insert_query);

    echo "<script>
        location.assign('all_users.php');
    </script>";
}


?>


<main class="dashboard-content">
    <div class="container-fluid px-3 px-lg-4 py-4">

        <div class="d-flex justify-content-between mb-5">
            <h3>Add User</h3>

            <a href="all_users.php" class="btn btn-primary btn-sm" type="button"><i class="bi bi-file-earmark-plus" aria-hidden="true"></i> All Users</a>
        </div>

        <div class="col-12 col-xl-7">
            <form class="panel needs-validation" novalidate method="POST">
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
                    <div class="col-md-6"><label class="form-label" for="formBudget">Gender</label>
                    
                    <input class="form-control" name="gender" type="text" min="1" required>
                        <div class="invalid-feedback">Enter a valid Gender.</div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-4">
                    
                <button class="btn btn-primary" type="submit" name="add_user"><i class="bi bi-send" aria-hidden="true"></i> ADD</button>
            
            </div>
            </form>
        </div>
    </div>
</main>






<?php
include("base/footer.php");
?>