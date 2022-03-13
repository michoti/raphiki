
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
                                            <input type="hidden" class="form-control" name="counsellor_editID" value="<?= $data['id'] ?>" id="exampleInput" required>
                                            <input type="text" class="form-control" name="first_name" value="<?= $data['fname'] ?>" id="exampleInput" required>
                                        </div>
                                        <div class="px-5">
                                            <label for="exampleInput" class="form-label">second name</label>
                                            <input type="text" class="form-control" name="second_name" value="<?= $data['sname'] ?>" id="exampleInput" required>
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
                                        <input type="email" class="form-control" name="counselloremail" value="<?= $data['email'] ?>" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                    </div>
                                    <div class="mb-3 d-flex">
                                        <div>
                                            <label for="exampleInputEmail1" class="form-label">ID number</label>
                                            <input type="text" class="form-control" name="counsellorId" value="<?= $data['id_number'] ?>"  id="exampleInputEmail1" required>
                                        </div>
                                        <div class="px-5">
                                            <label for="exampleInputEmail1" class="form-label">Telephone number</label>
                                            <input type="tel" class="form-control" name="counsellorTel" value="<?= $data['tel_number'] ?>" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-select" name="specialty" aria-label="Default select example">
                                        <option selected>Counsellor specialty</option>
                                        <option value="rape">Rape</option>
                                        <option value="bullying">Bullying</option>
                                        <option value="child labour">child labour</option>
                                        </select>
                                    </div>
                                    <button type="submit" name="edit-counsellor-btn" class="btn btn-primary">Save changes</button>
                                </form>
                    <?php }                    
                   
                    ?>
                </div>
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