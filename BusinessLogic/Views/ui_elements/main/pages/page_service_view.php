<section class="default">
    <div class="container border-start border-end py-40">
        <h1 class="title-text mb-40">
            <?php echo $page['title']?>
            <?php ($page);?>
        </h1>
        <div class="mb-4">
            <div class="row mt-3 mt-xl-4">
                <div class="col-xl-4 col-xxl-3">
                    <?php foreach (service('Content')->getPages(['slug' => $page['slug']]) as $service):?>
                        <a href="<?php echo $service['url'];?>" class="btn btn-secondary text-start btn-border"><?php echo $service['title']?></a>
                    <?php endforeach;?>
                </div>
                <div class="col-xl-5 col-xxl-6 mt-4 mt-xl-0">
                    <?php echo $page['content']?>
                </div>
                <div class="col-xl-3">
                    <?php if ($page['post_image']):?>
                        <img src="<?php echo base_url(checkImage(AVEGACMS['UPLOADS'] . "content/{$page['post_image']}"))?>" class="img-fluid mh-100" alt="single01">
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</section>