
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
                <table class="table" id="all-users">
                <thead>
                    <th>ID</th>
                    <th>first name</th>
                    <th>second name</th>
                    <th>gender</th>
                    <th>national ID</th>
                    <th>Tel number</th>
                    <th>email</th>
                </thead>
                <tbody>
                <?php 
                            $q = "SELECT * FROM users ";
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
                                    </tr>
                                    <?php }

                                }
                                else
                                {
                                    redirect("no data was retrieved", "danger", "admin/all_users.php");
                                }
                            }
                            else
                            {
                                redirect("query error", "danger", "admin/all_users.php");
                            }
                            
                            ?>

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

<script>
    $(document).ready(function(){

        $('#all-users').DataTable();

    });
</script>

</html>