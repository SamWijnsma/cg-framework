<?php require 'views/partials/header.view.php' ?>

<?php foreach($vars['educations'] as $education): ?>
    <div><?= $education->name ?></div>
    <div><?= $education->info ?></div>
    <a></a>
<?php endforeach ?>


<?php require 'views/partials/footer.view.php' ?>


