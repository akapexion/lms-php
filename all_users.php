<?php
include("base/header.php");
?>


<main class="dashboard-content">
    <div class="container-fluid px-3 px-lg-4 py-4">

        <div class="d-flex justify-content-between mb-5">
            <h3>All Users</h3>

            <a href="add_user.php" class="btn btn-primary btn-sm" type="button"><i class="bi bi-file-earmark-plus" aria-hidden="true"></i> Create User</a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle mb-0" id="ordersTable" data-searchable-table>
                <thead>
                    <tr>
                        <th>Index</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Role</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $select_query = "SELECT * FROM users";
                    $execute = mysqli_query($connection_ref, $select_query);

                    while($display = mysqli_fetch_array($execute)){
                    ?>
                    <tr>
                        <td class="fw-semibold"><?php echo $display['user_id']?></td>
                        <td>
                            <div class="table-media"><img class="product-thumb" src="uploads/<?php echo $display['user_image'] ?>"
                                    alt="Wireless Headset"><span><?php echo $display['user_fullname']?></span></div>
                        </td>
                        <td><?php echo $display['user_email']?></td>
                        <td><span class="badge text-bg-success"><?php echo $display['user_gender']?></span></td>
                        <td><?php echo $display['user_role']?></td>
                        <td class="text-end">
                        
                        <button class="btn btn-light btn-sm" type="button">Edit</button>
                        <button class="btn btn-danger btn-sm" type="button">Delete</button>
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