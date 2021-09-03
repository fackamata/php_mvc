<?php

// \App\Utils::print_r_pre($categories);

?>

<div class="row">
    <div class="col-12">
        <h1 class="text-center">Categories</h1>
    </div>
    <div class="container-fluid">
        <div class="d-flex flex-wrap justify-content-center">
            <?php 
            // var_dump($categories);
            foreach ($categories as $categorie) : ?>
                <div class="col-12 col-sm-6 col-md-4 my-3" style="width: 18rem;">
                    <div class="card m-2" id="<?= $categorie->id ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $categorie->NomCategorie?></h5>
                            <p class="card-text"><?= $categorie->Description ?></p>
                            <a href="<?= $categorie->url ?>" class="btn btn-primary">view <?= $categorie->NomCategorie?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>