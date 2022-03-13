
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
    <div class="container">
        <div class="row my-5">
           
           <?php include '../views/message.php';?>
            <?php 
            $user = new ProfileController;
            $id = $_SESSION['auth_user']['user_id'];
            $result = $user->fetchUserData($id);

            if($result)
            {
                $row = $result->fetch_assoc();
            
                ?>
                <div class="col-lg-7 offset-lg-2">
                    <div class="my-2">
                        <h4><?= $row['fname'] ?>'s profile</h4>
                    </div>
                    <div class="pb-2 table-responsive">
                        <table class="table table-borderless w-50">
                        <tbody>
                            <tr>
                            <th>Name</th>
                            <td><?= $row['fname'].'  '.$row['sname'] ?></td>
                            </tr>
                            <tr>
                            <th>Gender</th>
                            <td><?= $row['gender']?></td>
                            </tr>
                            <tr>
                            <th>ID Number</th>
                            <td><?= $row['id_number']?></td>
                            </tr>
                            <tr>
                            <th>Telephone number</th>
                            <td><?= $row['tel_number']?></td>
                            </tr>
                            <tr>
                            <th>Specialty</th>
                            <td><?= $row['specialty'] ?></td>
                            </tr>
                            <tr>
                            <th>Email</th>
                            <td><?= $row['email'] ?></td>
                            </tr>
                            <tr>
                            <th>Joined on:</th>
                            <td><?= $row['created_at'] ?></td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
                
            
                <div class="col-lg-3 border-start">
                    <div class="d-flex flex-column">
                        <a href="edit_counsellor_profile.php?id=<?= $row['id'] ?>" class="mb-2 btn btn-primary nav-link">edit profile</a>
                        <a href="change_counsellor_password.php?userid=<?= $row['id'] ?>" class="mb-2 btn btn-primary nav-link">change password</a>                        
                    </div>
                </div>
                <?php 
        }?>
        </div>
    </div>
    </section>

  </main><!-- End #main -->


<?php
include 'partials/footer_counsellor.php';
?>
</body>

</html>