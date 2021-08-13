<?php require 'views/partials/header.view.php' ?>

<?php foreach($vars['jobs'] as $job): ?>
    <div><?= $job->name ?></div>
    <div><?= $job->info ?></div>
    <div><?= $job->start_year ?></div>
    <div><?= $job->end_year ?></div>
    <a></a>

    <div>
    <a href="<?= $job->id ?>/destroy" class="btn btn-primary"> Delete </a>
    <a href="<?= $job->id ?>/edit" class="btn btn-primary"> Edit </a>
    </div>
<?php endforeach ?>






