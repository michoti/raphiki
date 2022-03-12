
<?php
include 'partials/head_admin.php';
?>

<body>
  <?php
  include 'partials/header_admin.php';

  include 'partials/sidebar_admin.php';
  ?>



  <main id="main" class="main">

    <section class="section dashboard">
        <div class="row">
            <div class=" col-6 offset-3 ">
                <div class="my-3">
                    <h3>Counsellor registration form</h3>
                    <?php include '../views/message.php'; ?>
                </div>
                <form action="" method="POST">
                   <div class="d-flex mb-3 flex-row">
                       <div>
                            <label for="exampleInput" class="form-label">First name</label>
                            <input type="text" class="form-control" name="first_name" id="exampleInput" required>
                        </div>
                        <div class="px-5">
                            <label for="exampleInput" class="form-label">second name</label>
                            <input type="text" class="form-control" name="second_name" id="exampleInput" required>
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
                        <input type="email" class="form-control" name="counselloremail" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3 d-flex">
                        <div>
                            <label for="exampleInputEmail1" class="form-label">ID number</label>
                            <input type="text" class="form-control" name="counsellorId"  id="exampleInputEmail1" required>
                        </div>
                        <div class="px-5">
                            <label for="exampleInputEmail1" class="form-label">Telephone number</label>
                            <input type="tel" class="form-control" name="counsellorTel" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="specialty" aria-label="Default select example">
                        <option selected>Counsellor specialty</option>
                        <option value="1">Rape</option>
                        <option value="2">Bullying</option>
                        <option value="3">child labour</option>
                        </select>
                    </div>
                    <button type="submit" name="regCounsellor-btn" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>

  </main><!-- End #main -->


<?php
include 'partials/footer_admin.php';
?>
</body>

</html>