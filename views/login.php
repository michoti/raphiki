<?php
include '../config/db_config.php';

$auth->isLoggedin();

include './partials/header.php';
?>

<body>
<?php
include './partials/top_nav.php';

?>

<section>
    <div class="container">
        <h2 class="my-2">Login</h2>

        <?php include 'message.php'; ?>

        <form action="" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" name="login_btn" class="btn btn-primary">Submit</button>
        </form>
        <a href=" <?php base_url('registration.php') ?>">Click here to register</a>
    </div>
</section> 
    
</body>
<?php
include './partials/footer.php';
?>