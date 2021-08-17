<?php require 'views/partials/header.view.php' ?>

<?php foreach($vars['hobbies'] as $hobbie): ?>
    <div><?= $hobbie->name ?></div>
    <div><?= $hobbie->info ?></div>



    <a href="/hobbie/<?= $hobbie->id ?>/destroy" class="btn btn-primary"> Delete </a>
    <a href="/hobbie/<?= $hobbie->id ?>/edit" class="btn btn-primary"> Edit </a>
    

<?php endforeach ?>



<?php require 'views/partials/footer.view.php' ?>