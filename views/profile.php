<?php

include_once '../controllers/authenticationController.php';

$data = $authenticated->authUserDetail();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Raphiki</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href=".././assets/vendor/aos/aos.css" rel="stylesheet">
  <link href=".././assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href=".././assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href=".././assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href=".././assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href=".././assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href=".././assets/css/style.css" rel="stylesheet">

</head>
<body>
      <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="home.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span>Raphiki</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><?= $_SESSION['auth_user']['user_fname']; ?></a>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="profile.php">My profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="" method="POST" class="dropdown-item">
                        <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>
                    </form>
                </li>
                </ul>
            </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


<main id="main">
    <section>

    <div class="container">
        <div class="row my-5">
           
           <?php include 'message.php';?>
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
                            <th>Full name</th>
                            <td><?= $row['fname'].' '.$row['sname'] ?></td>
                            </tr>
                            <tr>
                            <th>Gender</th>
                            <td><?= $row['gender'] ?></td>
                            </tr>
                            <tr>
                            <th>ID number</th>
                            <td><?= $row['id_number'] ?></td>
                            </tr>
                            <tr>
                            <th>Telephone number</th>
                            <td><?= $row['tel_number'] ?></td>
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
                        <a href="edit_profile.php?id=<?= $row['id'] ?>" class="mb-2 btn btn-primary nav-link">edit profile</a>
                        <a href="change_password.php?userid=<?= $row['id'] ?>" class="mb-2 btn btn-primary nav-link">change password</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete">Delete account</button>
                    </div>
                    <div class="modal" id="confirmDelete">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          
                          <div class="modal-body">
                             <div class="py-2">
                               <p>Are you sure? You will not be able to undo this.</p>
                               <div class="d-flex flex-row">
                                 <div class="p-3">
                                  <form action="" method="POST">
                                    <input type="hidden" name="user_id" value="<?= $row['id'] ?>">
                                    <button class="btn btn-danger" name="btn-yes">yes</button>
                                  </form>
                                 </div>

                                 <div class="p-3">
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">cancel</button>
                                 </div>
                               </div>
                             </div>
                          </div>

                        </div>
                      </div>
                    </div>
                </div>
                <?php 
        }?>
        </div>
    </div>

    </section>
</main>


<?php include 'partials/footer.php'; ?>

  </body>

</html>