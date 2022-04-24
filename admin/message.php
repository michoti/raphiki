
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
           <table class="table" id="stray-msg">
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
                        <tr class="py-1" <?php if($row['status'] == 0){ echo 'style="background: #ccddff"';} ?>>
                        <th><?=  $row['name']?></th>
                        <td><?=  $row['email']?></td>
                        <td><?=  $row['subject']?></td>
                        <td><?=  $row['message']?></td>
                        <td><?=  $row['created_at']?></td>
                        <td>
                           <div class="d-flex justify-content-around">
                            <form method="POST">
                                <input type="hidden" name="id" value="<?= $row['id']?>">    
                                <button class="btn" type="submit" name="read-msg"><i class="fa fa-envelope-open" aria-hidden="true"></i></button>
                            </form>
                            <form method="POST">
                                <input type="hidden" name="id" value="<?= $row['id']?>">    
                                <button class="btn" type="submit" name="delete-msg"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                           </div>
                        </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php
              if(isset($_POST['read-msg']))
              {
                  $id = $_POST['id'];
                  $query = "UPDATE stray_msg SET status = 1 WHERE id='$id'";
                  $execute_stray_msg_status_update = $db->conn->query($query);
              }

              if(isset($_POST['delete-msg']))
              {
                  $id = $_POST['id'];
                  $query = "DELETE FROM stray_msg WHERE id='$id'";
                  $execute_stray_msg_delete = $db->conn->query($query);
              }
            ?>
           </div>
        </div>
    </section>

  </main><!-- End #main -->


<?php
include 'partials/footer_admin.php';
?>
</body>

</html>

<script>
    $(document).ready(function(){

        $('#stray-msg').DataTable();

    });
</script>