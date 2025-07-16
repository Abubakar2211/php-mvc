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
                            User Create Form
                        </p>
                        <form class="forms-sample" method="POST">
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" name="name" value="<?= $_POST['name'] ?? '' ?>" class="form-control"
                                    id="exampleInputName1" placeholder="Name">
                            </div>
                            <p class="text-danger"><?= $errors['name'] ?? '' ?></p>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Email address</label>
                                <input type="email" name="email" value="<?= $_POST['email'] ?? '' ?>"  class="form-control" id="exampleInputEmail3" placeholder="Email">
                            </div>
                            <p class="text-danger"><?= $errors['email'] ?? '' ?></p>

                            <div class="form-group">
                                <label for="exampleInputPassword4">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword4"
                                    placeholder="Password">
                            </div>
                            <p class="text-danger"><?= $errors['password'] ?? '' ?></p>

                            <div class="form-group">
                                <label for="exampleInputPassword4">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    id="exampleInputPassword4" placeholder="Confirm Password">
                            </div>
                            <p class="text-danger"><?= $errors['password_confirmation'] ?? '' ?></p>

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