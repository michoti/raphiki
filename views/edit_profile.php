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

    <div class="d-flex justify-content-center justify-content-center">
        <div class="row">
            <div class="col-10 offset-2">
                <div class="py-2">
                    <h3>Edit profile</h3>
                </div>
                <?php 
                   if(isset($_GET['id']))
                   {
                      $id= validate($db->conn,$_GET['id']);}

                      $Profile = new ProfileController;

                      $result = $Profile->fetchUserData($id);

                      if($result)
                      {
                        $data = $result->fetch_assoc();                   
                   
                    ?>
                          <div class="pb-2">
                          <form action="" method="POST">
                                <div class="d-flex mb-3 flex-row">
                                    <div>
                                            <label for="exampleInput" class="form-label">First name</label>
                                            <input type="hidden" class="form-control" name="editedId" value="<?= $data['id'] ?>" id="exampleInput" required>
                                            <input type="text" class="form-control" name="editedfname" value="<?= $data['fname'] ?>" id="exampleInput" required>
                                        </div>
                                        <div class="px-5">
                                            <label for="exampleInput" class="form-label">second name</label>
                                            <input type="text" class="form-control" name="editedsname" value="<?= $data['sname'] ?>" id="exampleInput" required>
                                        </div>
                                </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" name="editedemail" value="<?= $data['email'] ?>" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                    </div>
                                    <div class="mb-3 d-flex">
                                        <div>
                                            <label for="exampleInputEmail1" class="form-label">ID number</label>
                                            <input type="text" class="form-control" name="editedIdNum" value="<?= $data['id_number'] ?>"  id="exampleInputEmail1" required>
                                        </div>
                                        <div class="px-5">
                                            <label for="exampleInputEmail1" class="form-label">Telephone number</label>
                                            <input type="tel" class="form-control" name="editedTel" value="<?= $data['tel_number'] ?>" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                        </div>
                                    </div>
                                    <button type="submit" name="edit-profile-btn" class="btn btn-primary">Save changes</button>
                                </form>
                    <?php }                    
                   
                    ?>
                </div>
            </div>
        </div>
    </div>

    </section>
</main>


<?php include 'partials/footer.php'; ?>

  </body>

</html>