<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 justify-content-center">
    <?php foreach ($banners as $banner):?>
    <div class="col">
        <a href="<?php echo $banner['link'] ? base_url($banner['link']) : '#'?>" class="banner-item ratio" title="<?php echo $banner['title']?>">
            <?php echo img(['data-src' => base_url($banner['image_src']), 'class' => 'img-background lozad', 'alt' => $banner['alt'] ?: $banner['title']])?>
        </a>
    </div>
    <?php endforeach;?>
</div>