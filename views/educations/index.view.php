<?php require 'views/partials/header.view.php' ?>

<?php foreach($vars['educations'] as $education): ?>
    <div><?= $education->name ?></div>
    <div><?= $education->info ?></div>
    <div><?= $education->start_year ?></div>
    <div><?= $education->end_year ?></div>
    


    <a href="<?= $education->id ?>/destroy" class="btn btn-primary"> Delete </a>
    <a href="<?= $education->id ?>/edit" class="btn btn-primary"> Edit </a>
    
    <a></a>
<?php endforeach ?>



<?php require 'views/partials/footer.view.php' ?>


