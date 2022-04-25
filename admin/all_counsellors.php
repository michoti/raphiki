
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
            <div class="col-10 offset-1">
                <table class="table" id="all-counsellors">
                <thead>
                    <th>ID</th>
                    <th>first name</th>
                    <th>second name</th>
                    <th>gender</th>
                    <th>national ID</th>
                    <th>Tel number</th>
                    <th>email</th>
                    <th>delete</th>
                </thead>
                <tbody>
                <?php 
                            $q = "SELECT * FROM users WHERE role_as=2";
                            $exc = $db->conn->query($q);
                            if($exc)
                            {
                                if($exc->num_rows > 0)
                                {
                                    while( $row = $exc->fetch_assoc())
                                    { ?>
                                        <tr>
                                        <td><?=$row['id']?></td>
                                        <td><?=$row['fname']?></td>
                                        <td><?=$row['sname']?></td>  
                                        <td><?=$row['gender']?></td> 
                                        <td><?=$row['id_number']?></td>
                                        <td><?=$row['tel_number']?></td> 
                                        <td><?=$row['email']?></td>
                                        <td>
                                            <form method="POST">
                                                <input type="hidden" name="counsellor_id" value="<?=$row['id']?>">
                                                <button class="btn" type="submit" name="delete_counsellor"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </form>
                                        </td>                                      
                                    </tr>
                                    <?php }

                                }
                                else
                                {
                                    redirect("no data was retrieved", "danger", "admin/all_counsellors.php");
                                }
                            }
                            else
                            {
                                redirect("query error", "danger", "admin/all_counsellors.php");
                            }
                            
                            ?>

                </tbody>
            </table> 

            <?php

              if(isset($_POST['delete_counsellor']))
              {
                  $id = $_POST['id'];
                  $query = "DELETE FROM users WHERE id='$id'";
                  $execute_counsellor_delete = $db->conn->query($query);

                  if($execute_counsellor_delete)
                  {
                     redirect("counsellor deleted", "danger", "admin/all_counsellors.php");
                  }
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

<script>
    $(document).ready(function(){

        $('#all-counsellors').DataTable();

    });
</script>

</html>