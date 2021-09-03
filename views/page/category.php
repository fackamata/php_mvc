<?php

// \App\Utils::print_r_pre($categories);
$category = $category[0];
?>

<div class="row">
    <div class="col-12">
        <h1 class="text-center"><?= $category->NomCategorie?></h1>
    </div>
    <div class="container-fluid">
        <div class="d-flex flex-wrap justify-content-center">
                <div class="col-12 col-sm-6 col-md-4 my-3" style="width: 18rem;">
                    <div class="card m-2" id="<?= $category->id ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $category->NomCategorie?></h5>
                            <p class="card-text"><?= $category->Description ?></p>
                            <a href="?p=categories#<?= $category->id ?>" class="btn btn-primary">Categories</a>                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <h1 class="text-center">Home</h1>
    </div>
    <div class="container-fluid">
        <div class="d-flex flex-wrap justify-content-center">
            <?php 
            // var_dump($posts);
            foreach ($posts as $post) : ?>
                <div class="col-12 col-sm-6 col-md-4 my-3" style="width: 18rem;">
                    <div class="card m-2" id="<?= $post->id ?>">
                        <img src="<?= "./image/".$post->thumb?>" alt="Images">
                        <div class="card-body">
                            <h5 class="card-title"><?= $post->title." - ".$post->category?></h5>
                            <p class="card-text"><?= $post->excerpt ?></p>
                            <p class="card-text"><?= $post->date ?></p>
                            <a href="<?= $post->getUrl() ?>" class="btn btn-primary">Read More</a>
                            <a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>