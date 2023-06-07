<?php helper('business_logic');?>

<section class="default">
    <div class="container border-start border-end py-40">
        <h1 class="title-text mb-40">
            <?php echo $page['title']?>
        </h1>
        <?php echo $page['content']?>
        <div class="mb-4">
            <?php if ( $slides = service('Album')->getImages(['album_id' => '2', 'limit' => 100])):?>
                <div class="row  row-cols-2 row-cols-sm-3 row-cols-lg-5 gy-4 gy-xl-80 gx-2 gx-sm-40 align-items-center">
                    <?php foreach ($slides as $slide):?>
                        <div class="col">
                            <a href="<?php echo $slide['title']?>" target="_blank" class="clients-img" title="<?php echo $slide['title']?>">
                                <?php echo
                                img(
                                    [
                                        'data-src'=>$slide['image']['original'],
                                        'class'=>'img-background lozad',
                                        'alt'=>'client'
                                    ]
                                )?>
                            </a>
                        </div>
                    <?php endforeach;?>

                </div>
            <?php endif;?>
        </div>
    </div>
</section>