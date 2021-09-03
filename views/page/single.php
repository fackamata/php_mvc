<?php
// App\Utils::var_dump_pre($posts[0]);
$posts = $posts[0];
// App\Utils::print_r_pre($_SERVER);

?> 

<div class="container-fluid">
    <div class="d-flex justify-content-center align-item-center">
        <div class="card m-2" style="width: 18rem;">
            <img src="<?= is_file("./image/".$posts->image) ? "./image/".$posts->image : "./image/oeuf.jpg" ; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $posts->title?></h5>
                <p class="card-text"><?= $posts->text ?></p>
                <p class="card-text"><?= $posts->date ?></p>
                <a href="?p=home#<?= $posts->id ?>" class="btn btn-primary">Home</a>
                <a href="javascript:history.back()" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</div>