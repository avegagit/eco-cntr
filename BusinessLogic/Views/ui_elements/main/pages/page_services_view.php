<?php helper('business_logic');?>

<section class="default">
    <div class="container border-start border-end py-40">
        <h1 class="title-text mb-40">
            <?php echo $page['title']?>
        </h1>
        <?php service('Content')->getPages(['slug' => $page['slug']])?>
        <?php //dd($page)?>
        <?php //dd(service('Content')->getPages(['slug' => $page['slug']]));?>
        <?php //dd(service('Content')->getPages(['locationID'  => $page['locationID']]));?>
        <div class="row">
            <div class="col-lg-3">
                <?php foreach (service('Content')->getPages(['slug' => $page['slug']]) as $service):?>
                    <a href="<?php echo $service['url'];?>" class="btn btn-secondary text-start btn-border"><?php echo $service['title']?></a>
                <?php endforeach;?>
            </div>
            <div class="col-lg-9 pt-4 pt-lg-0">
                <?php echo $page['content']?>
            </div>
        </div>
    </div>
</section>