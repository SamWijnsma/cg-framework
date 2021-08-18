<div class="container">
  <div class="row">
    <div class="col">
    <a href="/education" class="btn btn-primary"> Alleen de Opleidingen</a>
    </div>
    <div class="col">
    <a href="/job" class="btn btn-primary"> Alleen de Werkervaring</a>
    </div>
    <div class="col">
    <a href="/skill" class="btn btn-primary"> Alleen de Vaardigheden</a>
    </div>
    <div class="col">
    <a href="/hobbie" class="btn btn-primary"> Alleen de Hobbies</a>
    </div>
  </div>
  <div class="row">
    <div class="col">
    <a href="/education/create" class="btn btn-warning"> Of voeg een toe</a>
    </div>
    <div class="col">
    <a href="/job/create" class="btn btn-warning"> Of voeg een toe</a>
    </div>
    <div class="col">
    <a href="/skill/create" class="btn btn-warning"> Of voeg een toe</a>
    </div>
    <div class="col">
    <a href="/hobbie/create" class="btn btn-warning"> Of voeg een toe</a>
    </div>
  </div>
</div>

<h1> Opleidingen </h1>

<?php foreach($vars['educations'] as $education): ?>
    <div><?= $education->name ?></div>
    <div><?= $education->info ?></div>
    <div><?= $education->start_year ?></div>
    <div><?= $education->end_year ?></div>
    
    <a href="/education/<?= $education->id ?>/destroy" class="btn btn-primary"> Delete </a>
    <a href="/education/<?= $education->id ?>/edit" class="btn btn-primary"> Edit </a>
    
    <a></a>
<?php endforeach ?> 

<h1> Werkervaring </h1>
<?php foreach($vars['jobs'] as $job): ?>
    <div><?= $job->name ?></div>
    <div><?= $job->info ?></div>
    <div><?= $job->start_year ?></div>
    <div><?= $job->end_year ?></div>

    <a href="/job/<?= $job->id ?>/destroy" class="btn btn-primary"> Delete </a>
    <a href="/job/<?= $job->id ?>/edit" class="btn btn-primary"> Edit </a>
<?php endforeach ?>

    
<h1> Vaardigheden </h1>
<?php foreach($vars['skills'] as $skill): ?>
    <div><?= $skill->name ?></div>
    <div><?= $skill->info ?></div>

    <a href="/skill/<?= $skill->id ?>/destroy" class="btn btn-primary"> Delete </a>
    <a href="/skill/<?= $skill->id ?>/edit" class="btn btn-primary"> Edit </a>
<?php endforeach ?>

<h1> Hobbies </h1>
<?php foreach($vars['hobbies'] as $hobbie): ?>
    <div><?= $hobbie->name ?></div>
    <div><?= $hobbie->info ?></div>

    <a href="/hobbie/<?= $hobbie->id ?>/destroy" class="btn btn-primary"> Delete </a>
    <a href="/hobbie/<?= $hobbie->id ?>/edit" class="btn btn-primary"> Edit </a>   
<?php endforeach ?>    