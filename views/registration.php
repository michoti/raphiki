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
                   <div class="d-flex mb-3 flex-row">
                       <div>
                            <label for="exampleInput" class="form-label">First name</label>
                            <input type="text" class="form-control" name="fname" id="exampleInput" required>
                        </div>
                        <div class="px-5">
                            <label for="exampleInput" class="form-label">second name</label>
                            <input type="text" class="form-control" name="sname" id="exampleInput" required>
                        </div>
                   </div>
                   <div class="mb-3">
                       <h5>Gender</h5>
                       <div class="d-flex flex-row">
                            <div class="form-check px-5">
                            <input class="form-check-input" type="radio" name="gender" value="male" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Male
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="female" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Female
                            </label>
                            </div>
                       </div>
                   </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3 d-flex">
                        <div>
                            <label for="exampleInputEmail1" class="form-label">ID number</label>
                            <input type="text" class="form-control" name="idNum"  id="exampleInputEmail1" placeholder="optional">
                        </div>
                        <div class="px-5">
                            <label for="exampleInputEmail1" class="form-label">Telephone number</label>
                            <input type="tel" class="form-control" name="Tel" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="optional">
                        </div>
                    </div>
                    <div class="d-flex mb-3 flex-row">
                       <div>
                            <label for="exampleInput" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="exampleInput" required>
                        </div>
                        <div class="px-5">
                            <label for="exampleInput" class="form-label">Confirm password</label>
                            <input type="password" class="form-control" name="c_password" id="exampleInput" required>
                        </div>
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







