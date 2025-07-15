<?php require "components/header.php" ?>
<?php require "components/sidebar.php" ?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title">Users Table</h4>
                                <p class="card-description">
                                    This is my users table table.This table show me my all users.
                                </p>
                            </div>
                            <div>
                                <a href="/user-create" class="btn btn-primary">Create User</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Abubakar baig
                                        </td>
                                        <td>
                                            Abubakar@gmail.com
                                        </td>
                                        <td>
                                            <a href="/user-edit" class="btn btn-success">Edit</a>
                                            <a href="/user-delete" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <?php require "components/footer.php" ?>