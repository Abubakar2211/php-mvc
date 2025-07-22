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
                        <?php
                        if (!empty($success)) {
                            echo "User Created Successfully";
                        }
                        ?>
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
                                    <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td>
                                                <?= $user['name'] ?>
                                            </td>
                                            <td>
                                                <?= $user['email'] ?>
                                            </td>
                                            <td class="d-flex">
                                                <a href="/user-edit?id=<?= $user['id'] ?>" class="btn btn-success mx-2">Edit</a>
                                                <form action="/user-delete" method="POST">
                                                    <input type="hidden" value="DELETE" name="__method" id="">
                                                    <input type="hidden" value="<?= $user['id'] ?>" name="id">
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
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