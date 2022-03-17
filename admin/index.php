
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
                <h4 class="py-2">Chart topic</h4>
              </div>
              <div class="card-body">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                   Earum quos facilis totam fugit quam numquam,
                   obcaecati dolorem nemo sed voluptates, nulla nisi commodi perspiciatis blanditiis cumque officiis ex incidunt inventore!</p>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4 class="py-2">Chart topic</h4>
              </div>
              <div class="card-body">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                   Earum quos facilis totam fugit quam numquam,
                   obcaecati dolorem nemo sed voluptates, nulla nisi commodi perspiciatis blanditiis cumque officiis ex incidunt inventore!</p>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4 class="py-2">Chart topic</h4>
              </div>
              <div class="card-body">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                   Earum quos facilis totam fugit quam numquam,
                   obcaecati dolorem nemo sed voluptates, nulla nisi commodi perspiciatis blanditiis cumque officiis ex incidunt inventore!</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="d-flex flex-column">
            <div class="card">
              <div class="card-header">
                <h4 class="py-2">Card header</h4>
              </div>
              <div class="card-body">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                   Earum quos facilis totam fugit quam numquam,
                   obcaecati dolorem nemo sed voluptates, nulla nisi commodi perspiciatis blanditiis cumque officiis ex incidunt inventore!</p>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4 class="py-2">Card header</h4>
              </div>
              <div class="card-body">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                   Earum quos facilis totam fugit quam numquam,
                   obcaecati dolorem nemo sed voluptates, nulla nisi commodi perspiciatis blanditiis cumque officiis ex incidunt inventore!</p>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4 class="py-2">Card header</h4>
              </div>
              <div class="card-body">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                   Earum quos facilis totam fugit quam numquam,
                   obcaecati dolorem nemo sed voluptates, nulla nisi commodi perspiciatis blanditiis cumque officiis ex incidunt inventore!</p>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4 class="py-2">Card header</h4>
              </div>
              <div class="card-body">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                   Earum quos facilis totam fugit quam numquam,
                   obcaecati dolorem nemo sed voluptates, nulla nisi commodi perspiciatis blanditiis cumque officiis ex incidunt inventore!</p>
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