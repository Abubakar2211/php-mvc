<?php require "components/header.php" ?>
<?php require "components/sidebar.php" ?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">User</h4>
                        <p class="card-description">
                            User Update Form
                        </p>
                        <form method="POST" action="/user-update">
                            <input type="hidden" value="PUT" name="__method">
                            <input type="hidden" value="<?= $user['id'] ?>" name="id">
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" class="form-control" value="<?= $_POST['name'] ?? $user['name'] ?>"
                                    id="exampleInputName1" name="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail3"
                                    placeholder="Email" value="<?= $_POST['email'] ?? $user['email'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword4"
                                    placeholder="Password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Confirm Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword4"
                                    placeholder="Confirm Password" name="password_confirmation">
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <?php require "components/footer.php" ?>