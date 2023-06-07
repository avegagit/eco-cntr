<?php //dd($page);?>
<?php helper('business_logic');?>
<?php $news = service('Content')->getPosts(
    [
        'slug'   => service('request')->uri->getSegment(1),
        'limit'  => 3,
        'filter' => [
            'not_in' => $page['location_id']
        ]
    ]
);?>
<section class="border-top">
    <div class="container border-start border-end py-40">
        <h1 class="title-text mb-4">
            <?php echo $page['title']?>
        </h1>
        <div class="row mb-4">
            <?php $isArray = empty($news['list'])?>
            <div class="col-12'">
                <div class="mt-3 mt-xl-4">
                   <b class="card-title">
                       <?php echo $page['publish_date']?>
                   </b>
                    <?php echo $page['content']?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h3 class="<?php echo $isArray ? 'd-none' : 'mb-3'?> card-title"><b>Последние новости</b></h3>
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-3 g-md-5">
                    <?php foreach ($news['list'] as $item):?>
                    <?php //dd($item);?>
                        <div class="col">
                            <?php echo service('Content')->getView(
                                [
                                    'path' => 'main/widgets/post_card',
                                    'post' => $item
                                ]
                            );?>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</section>
