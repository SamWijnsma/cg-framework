<?php require 'views/partials/header.view.php' ?>

<?php foreach($vars['skills'] as $skill): ?>
    <div><?= $skill->name ?></div>
    <div><?= $skill->info ?></div>
   
   
    <a href="/skill/<?= $skill->id ?>/destroy" class="btn btn-primary"> Delete </a>
    <a href="/skill/<?= $skill->id ?>/edit" class="btn btn-primary"> Edit </a>
<?php endforeach ?>

<div><?= $skill->name ?></div>


<?php require 'views/partials/footer.view.php' ?>