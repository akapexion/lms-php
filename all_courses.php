<?php
session_start();

    if(!isset($_SESSION['user_email'])){
        header("Location: login.php");
        exit();
    }

    include("base/header.php");
?>

<main class="dashboard-content">
    <div class="container-fluid px-3 px-lg-4 py-4">

        <div class="d-flex justify-content-between mb-5">
            <h3>All Courses</h3>

            <a href="add_course.php" class="btn btn-primary btn-sm">
                <i class="bi bi-file-earmark-plus" aria-hidden="true"></i>
                Create Course
            </a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle mb-0" id="coursesTable" data-searchable-table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Course Title</th>
                        <th>Course Code</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    $select_query = "SELECT * FROM courses";
                    $execute = mysqli_query($connection_ref, $select_query);

                    while($display = mysqli_fetch_array($execute)){
                    ?>

                    <tr>
                        <td class="fw-semibold">
                            <?php echo $display['course_id']; ?>
                        </td>

                        <td>
                            <?php echo $display['course_title']; ?>
                        </td>

                        <td>
                            <?php echo $display['course_code']; ?>
                        </td>

                        <td>
                            <?php echo $display['course_duration']; ?>
                        </td>

                        <td>
                            <?php
                            if($display['course_status'] == 'Active'){
                                echo '<span class="badge text-bg-success">Active</span>';
                            } else {
                                echo '<span class="badge text-bg-danger">Inactive</span>';
                            }
                            ?>
                        </td>

                        <td class="text-end">
                            <button class="btn btn-light btn-sm" type="button">
                                Edit
                            </button>

                            <button class="btn btn-danger btn-sm" type="button">
                                Delete
                            </button>
                        </td>
                    </tr>

                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>

    </div>
</main>

<?php
include("base/footer.php");
?>