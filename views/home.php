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
                            <h5 class="card-title"><?= $post->title ?></h5>
                            <p class="card-text"><?= $post->text ?></p>
                            <p class="card-text"><?= $post->date ?></p>
                            <a href="<?= $post->getUrl() ?>" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>