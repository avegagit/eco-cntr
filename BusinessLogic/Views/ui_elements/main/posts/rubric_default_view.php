<?php helper('business_logic');?>
<?php $news = service('Content')->getPosts(['slug' => $page['slug'], 'limit' => service('request')->getGet('limit') ?? 6])?>

<section>
    <div class="container border-start border-end py-40">
        <h1 class="title-text mb-4">
            <?php echo $page['title']?>
        </h1>
        <?php if ($news['list']):?>
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-3 g-lg-5">
                <?php foreach ($news['list'] as $new):?>
                    <div class="col">
                        <?php echo service('Content')->getView(
                            [
                                'path' => 'main/widgets/post_card',
                                'post' => $new
                            ]
                        )?>
                    </div>
                <?php endforeach;?>
            </div>
            <?php echo $news['pagination']['total'] > $news['pagination']['perPage']
                ? service('pager')->makeLinks(
                    $news['pagination']['page'],
                    $news['pagination']['perPage'],
                    $news['pagination']['total'],
                    'frontend'
                )
                : '';?>
        <?php else:?>
            <p>
                Список записей пуст.
            </p>
        <?php endif;?>
</section>