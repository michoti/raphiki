
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

    <div class="row">
           <div class="col-8 offset-2">
           <table class="table" id="counsellor-msg">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Sender email</th>
                        <th scope="col">Recipient email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                        <th scope="col">Date received</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $account_email = $_SESSION['auth_user']['user_email'];
                        $query = "SELECT * FROM counsellor_msg WHERE recipient_email = '$account_email' ";
                        $stmt = $db->conn->query($query);
                        
                        while ($row = $stmt->fetch_assoc()) { 
                    ?>
                        <tr class="py-1" <?php if($row['status'] == 0){ echo 'style="background: #ccddff"';} ?>>
                        <th><?=  $row['name']?></th>
                        <td><?=  $row['sender_email']?></td>
                        <td><?=  $row['recipient_email']?></td>
                        <td><?=  $row['subject']?></td>
                        <td><?=  $row['message']?></td>
                        <td><?=  $row['received_date']?></td>
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
                  $query = "UPDATE counsellor_msg SET status = 1 WHERE id='$id'";
                  $execute_counsellor_msg_status_update = $db->conn->query($query);
              }

              if(isset($_POST['delete-msg']))
              {
                  $id = $_POST['id'];
                  $query = "DELETE FROM counsellor_msg WHERE id='$id'";
                  $execute_counsellor_msg_delete = $db->conn->query($query);
              }
            ?>
           </div>
        </div>
    </section>

  </main><!-- End #main -->


<?php
include 'partials/footer_counsellor.php';
?>
</body>

</html>
<script>
$(document).ready(function(){

$('#counsellor-msg').DataTable();

});
</script>