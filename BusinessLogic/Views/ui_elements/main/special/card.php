<div class="row g-3 gx-lg-4">
    <?php //dd($news)?>
    <?php foreach ($news['list'] as $key => $item) : $isFirst = $key === 0?>
        <div class="<?php echo $isFirst ? 'col-md-6 col-xxl-8' : 'col-md-6 col-xxl-4'?>">
            <a href="<?php echo $item['url']?>" class="<?php echo $isFirst ? 'services__card__big' : 'services__card'?> card" title="<?php echo $item['title']?>">
                <div class="<?php echo $isFirst ? 'services__first' : 'services__second__body'?>">
                    <div class="<?php echo $isFirst ? 'services__image__big' : ''?>">
                        <img data-src="<?php echo $item['image']['original']?>" class="<?php echo $isFirst ? 'img-fluid' : 'services__image'?> img-background lozad" alt="<?php echo $item['slug']?>">
                    </div>
                    <div class="<?php echo $isFirst ? 'services__first__body' : ''?>">
                        <h5 class="<?php echo $isFirst ? 'services__first__title' : 'card__title'?>">
                            <?php echo $item['attributes']['content_seo']['title']?>
                        </h5>
                        <div class="<?php echo $isFirst ? 'services__first__text' : 'card__text'?>">
                            <span><?php echo $item['anons']?></span>
                        </div>
                        <div class="<?php echo $isFirst ? 'services__first__more' : 'card__more'?>">
                            Подробнее
                            <span class="card__chevrons">
                                <?php echo getIcon('bi-chevron-double-right', ['class' => $isFirst ? 'services__icon__big' : 'card__chevrons'])?>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach;?>
</div>
