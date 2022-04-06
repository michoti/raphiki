
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
          <?php include '../views/message.php'; ?>
        <div class="col-lg-8">
          <div class="d-flex flex-column">
          <div class="card">
              <div class="card-header">
                <h4 class="py-2">Active accounts</h4>
              </div>
              <div class="card-body">
                <canvas id="bar-chart">

                </canvas>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4 class="py-2">Cases over time</h4>
              </div>
              <div class="card-body">
                <canvas id="line-graph">

                </canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="d-flex flex-column">
            <div class="card">
              <div class="card-header">
                <h4 class="py-2 text-center">Users total</h4>
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-center align-content-center">
                  <?php
                     $query = "SELECT COUNT(*) AS total FROM users";
                     $execute_query = $db->conn->query($query);
                     if($execute_query)
                     { 
                       $rows = $execute_query->fetch_assoc();                  
                  ?>
                    <h1 class="fs-1"><?=$rows['total']; ?></h1>
                    <?php } ?>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4 class="py-2 text-center">Total cases</h4>
              </div>
              <div class="card-body">
              <div class="d-flex justify-content-center align-content-center">
                  <?php
                     $query = "SELECT COUNT(*) AS total FROM cases";
                     $execute_query = $db->conn->query($query);
                     if($execute_query)
                     { 
                       $rows = $execute_query->fetch_assoc();                  
                  ?>
                    <h1><?=$rows['total']; ?></h1>
                    <?php } ?>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4 class="py-2">Cases pie chart</h4>
              </div>
              <div class="card-body">
                <canvas id="pie-chart">

                </canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->


<?php
include 'partials/footer_admin.php';
?>
</body>

</html>