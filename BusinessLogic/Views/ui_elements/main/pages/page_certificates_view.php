<?php helper('business_logic');?>

<section class="default">
    <div class="container border-start border-end py-40">
        <h1 class="title-text mb-40">
            <?php echo $page['title']?>
        </h1>
        <div class="mb-4">
            <?php if ( $slides = service('Album')->getImages(['album_id' => '1'])):?>
              <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4 g-lg-60">
                  <?php foreach ($slides as $slide):?>
                  <div class="col d-flex flex-column">
                          <a data-fslightbox="gallery-1" href="<?php echo $slide['image']['original']?>" title="<?php echo $slide['title']?>">
                              <?php echo
                              img(
                                  [
                                      'data-src'=>$slide['image']['original'],
                                      'class'=>'certificate-height lozad',
                                      'alt'=>$slide['image_src']
                                  ]
                              )?>
                          </a>
                         <div class="pt-1 pt-md-3"><?php echo $slide['title']?></div>
                  </div>
                  <?php endforeach;?>
              </div>
            <?php endif;?>
        </div>
    </div>
</section>