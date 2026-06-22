<?php
include("base/header.php");
?>

<main class="dashboard-content">
    <div class="container-fluid px-3 px-lg-4 py-4">

        <div class="d-flex justify-content-between mb-5">
            <h3>All Assignments</h3>

            <a href="add_assignment.php" class="btn btn-primary btn-sm">
                <i class="bi bi-file-earmark-plus" aria-hidden="true"></i>
                Create Assignment
            </a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle mb-0" id="assignmentsTable" data-searchable-table>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Assignment Title</th>
                        <th>Course</th>
                        <th>Due Date</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    $select_query = "SELECT * FROM assignments INNER JOIN courses ON assignments.assignment_course = courses.course_id";
                    $execute = mysqli_query($connection_ref, $select_query);

                    if(mysqli_num_rows($execute) > 0){

                        while($display = mysqli_fetch_array($execute)){
                    ?>

                    <tr>

                        <td class="fw-semibold">
                            <?php echo $display['assignment_id']; ?>
                        </td>

                        <td>
                            <?php echo $display['assignment_title']; ?>
                        </td>

                        <td>
                            <?php echo $display['course_title']; ?>
                        </td>

                        <td>
                            <?php echo date("d M Y", strtotime($display['assignment_due_date'])); ?>
                        </td>

                        <td class="text-end">

                            <a href="edit_assignment.php?id=<?php echo $display['assignment_id']; ?>"
                                class="btn btn-light btn-sm">
                                Edit
                            </a>

                            <a href="delete_assignment.php?id=<?php echo $display['assignment_id']; ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this assignment?')">
                                Delete
                            </a>

                        </td>

                    </tr>

                    <?php
                        }
                    } else {
                    ?>

                    <tr>
                        <td colspan="5" class="text-center py-4">
                            No assignments found.
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