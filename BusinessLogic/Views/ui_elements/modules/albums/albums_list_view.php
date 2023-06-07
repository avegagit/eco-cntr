<?php //d($albumsData)?>
<?php helper('business_logic');?>

<section class="my-4">
    <div class="container">
        <h1 class="title-text mb-4">
            <?php echo $title?>
        </h1>
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 gy-lg-4  mb-4">
            <?php foreach ($albumsData as $album):?>
                <div class="col">
                    <a href="<?php echo $album['url']?>" class="card">
                        <div class="media__img">
                            <img data-src="<?php echo $album['image']['original']?>" class="img-background lozad" alt="photoalbum">
                        </div>
                        <h5 class="card__title text-center pt-3"><?php echo $album['title']?></h5>
                    </a>
                </div>
            <?php endforeach;?>
        </div>
        <div>
            <p>
                Рыба в веб-дизайне — временное наполнение макета страницы для имитации её законченного вида. У дизайнера не всегда есть под рукой материалы, которые планируется публиковать на веб-сайте и поэтому нужно использовать что-то иное чтобы показать как дизайн будет работать в естественных условиях. При этом рыбное содержимое не обязано обладать смыслом — здесь важно визуальное восприятие.
            </p>
        </div>
    </div>
</section>
