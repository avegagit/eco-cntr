<div class="swiper partners-slider">
    <div class="swiper-wrapper">
        <?php foreach ($partners as $partner):?>
            <div class="swiper-slide swiper-slide-visible">
                <a href="<?php echo $partner['link'] ? base_url($partner['link']) : '#'?>" class="partner-item" title="<?php echo $partner['title'] ?: $partner['name']?>">
                    <?php echo img(['data-src' => base_url($partner['image_src']), 'class' => 'img-fluid swiper-lazy', 'alt' => $partner['alt'] ?: $partner['name']])?>
                    <div class="swiper-lazy-preloader"></div>
                </a>
            </div>
        <?php endforeach;?>
    </div>
</div>