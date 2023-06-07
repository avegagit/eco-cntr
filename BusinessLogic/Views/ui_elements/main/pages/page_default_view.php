<?php helper('business_logic');?>

<section class="default">
    <div class="container border-start border-end py-40">
        <h1 class="title-text mb-40">
            <?php echo $page['title']?>
            <?php ($page);?>
        </h1>
        <div class="mb-4">
            <div class="mt-3 mt-xl-4">
                <div class="single__body mt-3 mt-xl-4">
                    <?php echo $page['content']?>
                </div>
           </div>
            <div>
                <?php if ($page['post_image']):?>
                    <img src="<?php echo base_url(checkImage(AVEGACMS['UPLOADS'] . "content/{$page['post_image']}"))?>" class="img-fluid mh-100" alt="single01">
                <?php endif;?>
            </div>
        </div>
    </div>
</section>