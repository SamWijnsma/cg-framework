<form method="<?= $vars['method'] ?>" action="<?= $vars['action'] ?>">
    <div class="container mt-5">
        
        <div class="row mb-3">
            <div class="col-md-6">
                <input type="text" name="name" placeholder="naam" value="<?= isset($vars['hobbie']) ? $vars['hobbie']->name : '' ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <input type="text" name="info" placeholder="beschrijving" value="<?= isset($vars['hobbie']) ? $vars['hobbie']->info : '' ?>">
            </div>
        </div>

       
        <input type="hidden" name="f_token" value="<?= createToken() ?>">

        <input type="submit" value="Opslaan">
    </div>
</form>