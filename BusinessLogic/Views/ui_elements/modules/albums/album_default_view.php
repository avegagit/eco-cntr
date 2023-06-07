<?php foreach ($albumData as $image):?>
    <?php if ($image['is_video']):?>
        <div class="col-12 col-md-4 col-lg-3">
            <?php echo anchor(
                $image['video_src'],
                img(
                    [
                        'data-src' => base_url(checkImage(AVEGACMS['UPLOADS']."albums/thumbs/thumb_{$image['image_src']}")),
                        'class'    => 'img-background project_image b-lazy',
                        'title'    => $image['title']
                    ]
                ),
                [
                    'class'         => 'viewProductImage project fancybox.iframe video',
                    'title'         => $image['title'],
                    'data-fancybox' => 'gallery',
                    'rel'           => 'gallery'
                ]
            )?>
        </div>
    <?php else:?>
        <div class="col">
            <div class="media__body__single">
                <?php echo anchor(
                    checkImage(AVEGACMS['UPLOADS']."albums/{$image['image_src']}"),
                    img(
                        [
                            'data-src' => base_url(checkImage(AVEGACMS['UPLOADS']."albums/thumbs/thumb_{$image['image_src']}")),
                            'class'    => 'img-background project_image lozad',
                            'title'    => $image['title']
                        ]
                    ),
                    [
                        'class'         => 'viewProductImage project',
                        'data-fancybox' => 'gallery',
                        'rel'           => 'gallery',
                        'title'         => $image['title'],
                        'data-fslightbox' => ''
                    ]
                )?>
            </div>
            </div>
    <?php endif;?>
<?php endforeach;?>
