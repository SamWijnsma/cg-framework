<form method="<?= $vars['method'] ?>" action="<?= $vars['action'] ?>">
    <div class="container mt-5">
        
        <div class="row mb-3">
            <div class="col-md-6">
                <input type="text" name="name" placeholder="naam" value="<?= isset($vars['education']) ? $vars['education']->name : '' ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <input type="text" name="info" placeholder="beschrijving" value="<?= isset($vars['education']) ? $vars['education']->info : '' ?>">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label>Start Jaar</label><br/>
                <input type="int" name="start_year" value="<?= isset($vars['education']) ? $vars['education']->start_year : '' ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <label>Eind Jaar</label><br/>
                <input type="int" name="end_year" value="<?= isset($vars['education']) ? $vars['education']->end_year : '' ?>">
            </div>
        </div>

        <input type="hidden" name="f_token" value="<?= createToken() ?>">

        <input type="submit" value="Opslaan">
    </div>
</form>