<a href="<?php echo $post['url']?>" class="news-card">
    <div class="card-body">
        <div class="news-card-image">
            <img data-src="<?php echo $post['image']['original']?>" class="lozad" alt="<?php echo $post['slug']?>">
        </div>
        <h5 class="news-card-slogan pt-4">
            <?php echo $post['title']?>
        </h5>

        <div class="news-link pt-4">
            Узнать подробнее
            <?php echo getIcon('bi-arrow-left', ['class' => 'text-end'])?>
        </div>
    </div>
</a>