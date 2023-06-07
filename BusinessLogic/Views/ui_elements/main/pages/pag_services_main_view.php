<?php helper('business_logic');?>

<section class="default">
    <div class="container border-start border-end py-40">
        <h1 class="title-text mb-40">
            <?php echo $page['title']?>
        </h1>
        <?php $services = service('Content')->getPages(['slug' => 'services'])?>

        <div class="col-12">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-1">
                <?php $number = 01; ?>
                <?php foreach ($services as $key => $service):?>
                    <div class="col">
                        <a href="<?php echo $service['url']?>" title="<?php echo $service['url']?>" class="card">
                            <div class="card-body">
                                <h5 class="card-title"><b><?php echo '0'.$number++;?></b></h5>
                                <h6 class="card-subtitle"><?php echo $service['title']?></b></h6>
                                <span class="card-text"><b><?php echo $service['anons']?></b></span>
                                <div class="card-icons mt-3 d-flex">
                                    <div>
                                        <?php $slug = $service['slug']?>
                                        <?php echo getIcon($slug)?>
                                    </div>
                                    <div class="ms-auto">
                                        <?php echo getIcon('bi-arrow-left', ['class' => 'text-end'])?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</section>