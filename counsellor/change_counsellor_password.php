
<?php
include 'partials/head_counsellor.php';
?>

<body>
  <?php
  include 'partials/header_counsellor.php';

  include 'partials/sidebar_counsellor.php';
  ?>



  <main id="main" class="main">

    <section class="section dashboard">
        <div class="d-flex justify-content-center justify-content-center">
            <div class="row">
                <div class="col-12 py-4">
                    <div class="py-3">
                        <h3>Change password</h3>
                        <?php include '../views/message.php'; ?>
                    </div>
                    <?php 
                    if(isset($_GET['userid']))
                    {
                        $id = validate($db->conn,$_GET['userid']);
                    }  

                        $Profile = new ProfileController;

                        $result = $Profile->fetchUserData($id);

                        if($result)
                        {
                            $data = $result->fetch_assoc();                   
                    
                        ?>

                        
                        
                    <form action="" method="POST">
                    <input type="hidden" name="user_id" class="form-control" value="<?= $data['id']?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Current password</label>
                        <input type="text" name="currentpassword" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"> New Password</label>
                        <input type="text" name="newpassword" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" name="counsellor-changepassword-btn" class="btn btn-primary">Submit</button>
                    </form>
                    <?php } 
                    ?>

                </div>
            </div>
        </div>
    </section>

  </main><!-- End #main -->


<?php
include 'partials/footer_counsellor.php';
?>
</body>

</html>