
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
           <div class="col-8 offset-2">
           <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM stray_msg ";
                        $stmt = $db->conn->query($query);
                        
                        while ($row = $stmt->fetch_assoc()) { 
                    ?>
                        <tr>
                        <th><?=  $row['name']?></th>
                        <td><?=  $row['email']?></td>
                        <td><?=  $row['subject']?></td>
                        <td><?=  $row['message']?></td>
                        <td><?=  $row['date']?></td>
                        <td>
                           <a>Delete</a>
                        </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
           </div>
        </div>
    </section>

  </main><!-- End #main -->


<?php
include 'partials/footer_admin.php';
?>
</body>

</html>