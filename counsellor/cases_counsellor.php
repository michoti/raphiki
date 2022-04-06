
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
        <?php include '../views/message.php'; ?>
        <div class="row">
            <div class="col-10 offset-1">
                <table id="cases-table" class="table">
                    <thead>
                        <th>case ID</th>
                        <th>offender's name</th>
                        <th>offender's relation</th>
                        <th>incident location</th>
                        <th>witness present</th>
                        <th>status</th>
                        <th>action</th>
                    </thead>
                    <tbody>
                        
                        <?php 
                           $q = "SELECT * FROM cases ";
                           $exc = $db->conn->query($q);
                           if($exc)
                           {
                               if($exc->num_rows > 0)
                               {
                                   while( $row = $exc->fetch_assoc())
                                   { ?>
                                       <tr>
                                       <td><?=$row['case_id']?></td>
                                       <td><?=$row['offenderName']?></td>
                                       <td><?=$row['offenderRelation']?></td>
                                       <td><?=$row['incidentLocation']?></td>
                                       <td><?=$row['witnessPresent']?></td>
                                       <td>
                                           <?php 
                                               if($row['status'] == 0)
                                               {
                                                   echo '<button class="btn btn-danger">Not solved</button>';
                                               }
                                               elseif($row['status'] == 1)
                                               {
                                                   echo '<button class="btn" style="background: orange;">In progress</button>';
                                               }
                                               else
                                               {
                                                echo '<button class="btn btn-success">Solved</button>';
                                               }
                                           ?>
                                       </td>
                                       <td><button class="btn" style="background: #012970; color: #fff;"  data-bs-toggle="modal" data-bs-target="#update-status<?= $row['case_id']?>">update</button></td>
                                           
                                       <div class="modal fade" id="update-status<?= $row['case_id']?>" tabindex="-1" aria-labelledby="update-status<?= $row['case_id']?>" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="py-3 d-flex align-content-center justify-content-center">
                                                        <div>
                                                            <div class="pb-3">
                                                                <h5>Update case status</h5>
                                                            </div>
                                                        <form action="" method="POST">
                                                            <div class="form-check">
                                                            <input class="form-check-input" type="hidden" name="case-id" value="<?= $row['case_id'] ?>">
                                                            <input class="form-check-input" type="radio" name="status-update" value="1" id="flexRadioDefault1">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                Start solving
                                                            </label>
                                                            </div>
                                                            <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status-update" value="2" id="flexRadioDefault2" checked>
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                                Case solved
                                                            </label>
                                                            </div>
                                                            <div class="pt-3">
                                                                <button name="update-status" class="btn btn-primary">Update status</button>
                                                            </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                   </tr>
                                  <?php }

                               }
                               else
                               {
                                redirect("no data was retrieved", "danger", "counsellor/cases_counsellor.php");
                               }
                           }
                           else
                           {
                               redirect("query error", "danger", "counsellor/cases_counsellor.php");
                           }
                        
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </section>

  </main><!-- End #main -->


<?php
include 'partials/footer_counsellor.php';
?>

<script>
    $(document).ready(function(){

        $('#cases-table').DataTable();

    });
</script>
</body>

</html>

