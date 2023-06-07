<?php helper('business_logic');?>
<div class="main-slider swiper">
    <div class="swiper-wrapper">
        <?php foreach ($sliderData as $slide):?>
            <a href="<?php echo $slide['slide_src'] ? base_url($slide['slide_src']) : '#'?>" class="swiper-slide swiper-slide-visible ratio" data-swiper-autoplay="<?php echo $slide['duration']?>" title="<?php echo $slide['title']?>" style="<?php echo sprintf('background-color: %s;', $slide['color'])?>">
                <?php echo img(['data-src' => base_url($slide['back_src']), 'class' => 'img-background swiper-lazy', 'alt' => $slide['title']])?>
                <div class="swiper-lazy-preloader"></div>
            </a>
        <?php endforeach; ?>
    </div>
    <div class="main-slider-overlay">
        <div class="main-slider-controls">
            <?php echo form_button(['class' => 'btn-unstyled main-slider-navigation main-slider-navigation-prev', 'content' => getIcon('bi-caret-left-fill'), 'title' => 'Назад'])?>
            <span class="main-slider-count"></span>
            <?php echo form_button(['class' => 'btn-unstyled main-slider-navigation main-slider-navigation-next', 'content' => getIcon('bi-caret-right-fill'), 'title' => 'Вперёд'])?>
        </div>
        <span class="main-slider-progress"></span>
    </div>
</div>