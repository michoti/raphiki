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

      <a href="#" class="logo d-flex align-items-center">
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
</body>

<main id="main">
     <section id="auth_user_section">
          <div class="container">
            <div class="row mt-3">             
            <?php include 'message.php'; ?>
              <div class="pr-3 col-lg-6 col-sm-12 col-md-6">
                     <div class="py-3">
                       <h3>Report a case</h3>

                     </div>
                    <form action="report_case.php" method="POST">
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name of offender</label>
                        <input type="text" name="offender_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                      </div>
                      <div class="mb-3">
                        <select class="form-select" name="relation" aria-label="Default select example">
                          <option selected>Type of relationship with offender</option>
                          <option value="parent">parent</option>
                          <option value="sibling">sibling</option>
                          <option value="neighbour">neighbour</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <select class="form-select" aria-label="Default select example">
                          <option selected>Type of offense</option>
                          <option value="1">sexual abuse</option>
                          <option value="2">Bullying</option>
                          <option value="3">child labour</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Location of incident</label>
                        <input type="text" name="location" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name of person who can backup the claim</label>
                        <input type="text" name="witness" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Under what circumstances did it happen?</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" required></textarea>
                      </div>
                      <button type="submit" name="report_btn" class="btn btn-primary">Submit</button>
                    </form>
              </div>
              <div class="col-lg-6 col-sm-12 col-md-6">
                <div class="pb-4">
                    <div class="py-3">
                      <h3>Previously reported cases</h3>
                    </div>
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Date</th>
                          <th scope="col">Offender's name</th>
                          <th scope="col">offender's relation</th>
                          <th scope="col">IncidentLocation</th>
                        </tr>
                      </thead>
                      <tbody>
                           <?php

                            $cases = new CaseController;

                            $result = $cases->fetchCase();

                            

                            if($result)
                            {
                              while($row = $result->fetch_assoc())
                              {
                            ?>
                                <tr>
                                  <th scope="row"><?= $row['created_at'] ?></th>
                                  <td><?= $row['offenderName'] ?></td>
                                  <td><?= $row['offenderRelation'] ?></td>
                                  <td><?= $row['incidentLocation'] ?></td>
                                </tr>
                             <?php
                              }
                            }
                             else
                             {
                               echo "No case has been reported";
                             } ?>
                        
                      </tbody>
                    </table>
                </div>
                <div class="">
                     <div class="py-3">
                       <h3>Speak to our counsellors</h3>
                     </div>
                    <form>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Body</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
     </section>
</main>


  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12 text-center">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
          </div>
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <img src="assets/img/logo.png" alt="">
              <span>FlexStart</span>
            </a>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Michoti</span></strong>. All Rights Reserved
      </div>     
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>