<?php
include '../config/db_config.php';

include 'partials/header.php';
?>

<body>

    <?php
    include 'partials/top_nav.php';

    include 'partials/hero_section.php';
    ?>

        <main id="main">

            <?php
                include 'partials/about_section.php';

                include 'partials/services_section.php';

                include 'partials/team_section.php';

                include 'partials/contact_section.php';
            ?>

        </main>   
     
   
</body>
<?php
    include 'partials/footer.php';
?>