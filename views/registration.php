<?php
include '../config/db_config.php';

include './partials/header.php';
?>

<body>
<?php
include './partials/top_nav.php';

?>

<section>
    <div class="container">        

    <div class="d-flex justify-content-center align-content-center">

        <div class="py-5">  
            
        <div class="pb-3 d-flex justify-content-center align-content-center">
                <h2 class="my-2">Register</h2>
        </div>

            <?php include 'message.php'; ?>


            <form action="" method="POST">
                   <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="fname" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword2" class="form-label">Confirm assword</label>
                        <input type="password" name="c_password" class="form-control" id="exampleInputPassword2">
                    </div>

                    <button type="submit" name="register_btn" class="btn btn-primary">Submit</button>
        </form>

        
        </div>

    </div>

    </div>
</section> 
    
</body>
<?php
include './partials/footer.php';
?>







