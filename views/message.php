<?php

if(isset($_SESSION['message']) && isset($_SESSION['type']))
{ ?>

  <div class="alert alert-<?= $_SESSION['type']; ?> alert-dismissible fade show" role="alert">

     <h5><?=$_SESSION['message']; ?></h5>
     <button type="button" class="btn-close close" data-bs-dismiss="alert" aria-label="Close"></button>

  </div>

<?php
  unset($_SESSION['message']);
}

?>



