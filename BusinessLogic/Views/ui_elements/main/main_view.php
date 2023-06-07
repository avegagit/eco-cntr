<?php helper('business_logic');?>
<?php $profile = service('template')->getProfile('');?>
<?php $phone = $profile['contacts']['phones']['phone_1']?>
<?php $phone2 = $profile['contacts']['phones']['phone_2']?>
<?php $mail = $profile['contacts']['emails']['email_2']?>
<section class="company">
    <?php $slides = service('Slider')->getSlider(['group' => 'main'])?>
    <div class="company__body">
        <div class="company__body-bcg">
            <div class="swiper slider__image-bcg slider-bcg">
                <div class="swiper-wrapper swiper-wrapper-bcg">
                    <?php foreach ($slides as $slide):?>
                        <div class="swiper-slide swiper-bcg">
                            <div class="slider__image slider__image-bcg">
                                <?php echo
                                img(
                                    [
                                        'data-src'=>$slide['back_src'],
                                        'class'=>'swiper-lazy',
                                        'alt'=>'Экологический центр'
                                    ]
                                )?>
                            </div>
                            <div class="container">
                                <h1 class="visually-hidden"><?php echo $profile['site']['sitename']?></h1>
                                <div class="company__body-desc text-center d-flex flex-column">
                                    <h2 class="company-title"><?php echo $slide['title']?></h2>
                                    <span class="company-info"><?php echo $slide['description']?></span>
                                    <div class="company-btn">
                                        <form class="d-flex">
                                            <button
                                                    type="button"
                                                    class="btn btn-secondary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#serviceModal"
                                                    title="Заказать звонок"
                                            >
                                                <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.0294 10.7531C16.0294 8.12805 18.1664 6 20.8025 6H24.5V9.68201C24.5 12.3071 22.363 14.4351 19.7269 14.4351H16.9706V22H16.0294V17.6485H13.2731C10.637 17.6485 8.5 15.5205 8.5 12.8954V9.21339H12.1975C13.7669 9.21339 15.1594 9.96769 16.0294 11.1321V10.7531ZM16.9706 12.8352L20.4698 9.35064L21.1353 10.0134L17.6361 13.4979H19.7269C21.8432 13.4979 23.5588 11.7895 23.5588 9.68201V6.93724H20.8025C18.6862 6.93724 16.9706 8.64568 16.9706 10.7531V12.8352ZM16.0294 16.0486V13.9665C16.0294 11.8591 14.3138 10.1506 12.1975 10.1506H9.44118V12.8954C9.44118 15.0029 11.1568 16.7113 13.2731 16.7113H15.3639L11.8647 13.2268L12.5302 12.564L16.0294 16.0486Z" fill="#5F6826"/>
                                                </svg>
                                                </svg>
                                                <b>Заказать звонок</b>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
                <div class="swiper-pagination swiper-pagination-bcg swiper-pagination-fraction swiper-pagination-horizontal text-end"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
</section>

<section class="services">
    <div class="bb">
        <div class="container pt-40 pt-md-80 border-start border-end">
            <span class="subtitle">Услуги</span>
            <h3 class="mt-4">Услуги разработки природоохранной документации</h3>
            <div class="mt-4 mt-md-80">
                <div class="row g-0">
                    <div class="col-12 col-xl-3">
                        <div class="services-body">
                            <div class="services-text me-0 me-md-5">
                                <p>
                                    <b>
                                        ООО «Экологический центр» осуществляет разработку проектной документации для проектируемых, реконструируемых и существующих объектов, также сотрудничает с рядом аккредитованных лабораторий, постоянно расширяя для своих клиентов перечень оказываемых услуг.
                                    </b>
                                </p>
                            </div>
                            <div class="services-img d-none d-xl-block mb-4">
                                <?php echo
                                img(
                                    [
                                        'data-src'=>'/template/ecocentr/assets/images/ex-photo.webp',
                                        'class'=>'img-background lozad',
                                        'alt'=>'image-service'
                                    ]
                                )?>
                            </div>
                            <a href="/services" class="services-link">
                                Смотреть все услуги
                                <?php echo getIcon('bi-arrow-left', ['class' => 'text-end'])?>
                            </a>
                        </div>
                    </div>

                    <?php $services = service('Content')->getPages(['slug' => 'services'])?>

                    <div class="col-12 col-xl-9">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-1">
                            <?php $number = 01; ?>
                            <?php foreach ($services as $key => $service):?>
                                <div class="col">
                                <a href="<?php echo $service['url']?>" title="<?php echo $service['url']?>" class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><b><?php echo '0'.$number++;?></b></h5>
                                        <h6 class="card-subtitle"><b></b><?php echo $service['title']?></b></h6>
                                        <span class="card-text"><b><?php echo $service['anons']?></b></span>
                                        <div class="card-icons">
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
            </div>
            <button
                    type="button"
                    class="btn btn-secondary services-btn d-block mx-auto mt-4 mt-lg-100"
                    data-bs-toggle="modal"
                    data-bs-target="#serviceModal"
                    title="Заказать звонок"
            >
                <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.0294 10.7531C16.0294 8.12805 18.1664 6 20.8025 6H24.5V9.68201C24.5 12.3071 22.363 14.4351 19.7269 14.4351H16.9706V22H16.0294V17.6485H13.2731C10.637 17.6485 8.5 15.5205 8.5 12.8954V9.21339H12.1975C13.7669 9.21339 15.1594 9.96769 16.0294 11.1321V10.7531ZM16.9706 12.8352L20.4698 9.35064L21.1353 10.0134L17.6361 13.4979H19.7269C21.8432 13.4979 23.5588 11.7895 23.5588 9.68201V6.93724H20.8025C18.6862 6.93724 16.9706 8.64568 16.9706 10.7531V12.8352ZM16.0294 16.0486V13.9665C16.0294 11.8591 14.3138 10.1506 12.1975 10.1506H9.44118V12.8954C9.44118 15.0029 11.1568 16.7113 13.2731 16.7113H15.3639L11.8647 13.2268L12.5302 12.564L16.0294 16.0486Z" fill="#5F6826"/>
                </svg>
                <b>Заказать звонок</b>
            </button>
        </div>
    </div>
</section>

<section class="scheme">
    <div class="bb">
        <div class="container py-40 py-md-80 border-start border-end">
            <span class="subtitle">Схема нашей работы</span>
            <h3 class="mt-4">Работаем по всей России</h3>
            <div class="scheme-wrapper">
                <div class="row row-cols-1 row-cols-lg-5 mt-40 mt-lg-80 gy-40 gy-lg-0">
                    <div class="col">
                        <div class="scheme-card">
                            <div class="scheme-card-number">
                                <span>
                                    1
                                </span>
                            </div>
                            <div class="scheme-card-title">
                                Заявка на
                                <a href="/">
                                    сайте
                                </a>
                                или
                                <?php if ($profile['contacts']['phones']):?>
                                    <a href="<?php echo "tel: {$phone}"?>" title="<?php echo $phone?>">звонок</a>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="scheme-card">
                            <div class="scheme-card-number">
                                <span>
                                    2
                                </span>
                            </div>
                            <div class="scheme-card-title">
                                Консультация
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="scheme-card">
                            <div class="scheme-card-number">
                                <span>
                                    3
                                </span>
                            </div>
                            <div class="scheme-card-title">
                                Подписание договора и предоплата
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="scheme-card">
                            <div class="scheme-card-number">
                                <span>
                                    4
                                </span>
                            </div>
                            <div class="scheme-card-title">
                                Выполнение работ
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="scheme-card">
                            <div class="scheme-card-number">
                                <span>
                                    5
                                </span>
                            </div>
                            <div class="scheme-card-title">
                                Сдача работ и оплата
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="benefits">
    <div class="bb">
        <div class="container pt-40 pt-md-80 border-start border-end">
            <span class="subtitle">Преимущества</span>
            <h3 class="mt-4">Почему выбирают нашу компанию</h3>
            <div class="py-40 py-md-80">
                <div class="row g-0">
                    <div class="col-12 col-md-6 col-lg-7 col-xl-8 col-xxl-9">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-0">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-icon">
                                            <?php echo getIcon('bi-benefits-icon01')?>
                                        </div>
                                        <h6 class="card-slogan"><b>индивидуальный подход к каждому клиенту </b></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-image">
                                        <?php echo
                                        img(
                                            [
                                                'data-src'=>'/template/ecocentr/assets/images/benefit02.webp',
                                                'class'=>'img-background lozad',
                                                'alt'=>'benefit'
                                            ]
                                        )?>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-icon">
                                            <?php echo getIcon('bi-benefits-icon02')?>
                                        </div>
                                        <h6 class="card-slogan"><b>выполнение работ любого уровня сложности</b></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-image">
                                        <?php echo
                                        img(
                                            [
                                                'data-src'=>'/template/ecocentr/assets/images/benefit01.webp',
                                                'class'=>'img-background lozad',
                                                'alt'=>'benefit'
                                            ]
                                        )?>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-icon">
                                            <?php echo getIcon('bi-benefits-icon03')?>
                                        </div>
                                        <h6 class="card-slogan"><b>специалисты высокой квалификафии </b></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-image">
                                        <?php echo
                                        img(
                                            [
                                                'data-src'=>'/template/ecocentr/assets/images/benefit03.webp',
                                                'class'=>'img-background lozad',
                                                'alt'=>'benefit'
                                            ]
                                        )?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-5 col-xl-4 col-xxl-3 mt-3 mt-md-0">
                        <?php if ( $slides = service('Album')->getImages(['album_id' => '1'])):?>
                        <div class="benefits-body ms-md-40">
                            <div class="slider swiper pb-40 pb-md-80">
                                    <div class="swiper slider-bottom">
                                        <div class="swiper-wrapper">
                                            <?php foreach ($slides as $slide):?>
                                                <?php //dd($slides);?>
                                                <div class="swiper-slide swiper-bottom">
                                                    <a data-fslightbox="gallery-1" href="<?php echo $slide['image']['original']?>" class="slider__image benefits-image" title="<?php echo $slide['title']?>" atl="<?php echo $slide['title']?>">
                                                        <?php echo
                                                        img(
                                                            [
                                                                'data-src'=> $slide['image']['original'],
                                                                'class'=>'swiper-lazy img-background',
                                                                'alt'=>$slide['image_src']
                                                            ]
                                                        )?>
                                                    </a>
                                                </div>
                                            <?php endforeach;?>
                                        </div>
                                    </div>
                                </div>
                            <a href="/certificates" class="benefits-link">
                                <b>
                                    Больше благодарностей
                                    <?php echo getIcon('bi-arrow-left', ['class' => 'text-end'])?>
                                </b>
                            </a>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="clients">
    <div class="bb">
        <div class="container py-40 py-md-80 border-start border-end">
            <span class="subtitle">Клиенты</span>
            <h3 class="mt-4">Среди наших клиентов</h3>
            <div class="row mt-40 align-items-end">
                <div class="col-12 col-lg-4 order-2 order-lg-1">
                    <a href="/clients" class="news-link pt-4 pb-0 pb-lg-4 pt-lg-0">
                        Смотреть всех клиентов
                        <?php echo getIcon('bi-arrow-left', ['class' => 'text-end'])?>
                    </a>
                    <div class="clients-text pt-40 pt-xl-0">
                        <b>
                            Наша организация зарекомендовала себя как надежный исполнитель при подготовке всей необходимой экологической документации. К каждому клиенту мы подходим индивидуально, вникая в возникшие проблемы и всегда помогаем в решении экологических проблем.
                        </b>
                    </div>
                    <button
                            type="button"
                            class="btn btn-secondary d-block mt-4 mt-md-40"
                            data-bs-toggle="modal"
                            data-bs-target="#serviceModal"
                            title="Заказать звонок"
                    >
                        <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.0294 10.7531C16.0294 8.12805 18.1664 6 20.8025 6H24.5V9.68201C24.5 12.3071 22.363 14.4351 19.7269 14.4351H16.9706V22H16.0294V17.6485H13.2731C10.637 17.6485 8.5 15.5205 8.5 12.8954V9.21339H12.1975C13.7669 9.21339 15.1594 9.96769 16.0294 11.1321V10.7531ZM16.9706 12.8352L20.4698 9.35064L21.1353 10.0134L17.6361 13.4979H19.7269C21.8432 13.4979 23.5588 11.7895 23.5588 9.68201V6.93724H20.8025C18.6862 6.93724 16.9706 8.64568 16.9706 10.7531V12.8352ZM16.0294 16.0486V13.9665C16.0294 11.8591 14.3138 10.1506 12.1975 10.1506H9.44118V12.8954C9.44118 15.0029 11.1568 16.7113 13.2731 16.7113H15.3639L11.8647 13.2268L12.5302 12.564L16.0294 16.0486Z" fill="#5F6826"/>
                        </svg>
                        <b>Заказать звонок</b>
                    </button>
                </div>
                <div class="col-12 col-lg-8 order-1 order-lg-2">
                    <?php if ( $slides = service('Album')->getImages(['album_id' => '2', 'limit' => 8])):?>
                    <div class="row row-cols-2 row-cols-xl-3 row-cols-xxl-4 gy-4 gy-xl-80 gx-2 gx-sm-40 align-items-center">
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
        </div>
    </div>
</section>

<section class="about">
    <div class="container py-40 py-md-80 border-start border-end">
            <span class="subtitle">О компании</span>
            <h3 class="mt-4">ООО “Экологический центр”</h3>
            <div class="row mt-4 mt-md-80">
                <div class="col-12 col-xl-8">
                    <div class="about-image">
                        <?php echo
                        img(
                            [
                                'data-src'=>'/template/ecocentr/assets/images/ex-photo03.webp',
                                'class'=>'img-background lozad',
                                'alt'=>'image-about'
                            ]
                        )?>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="about-text">
                        <b>
                            ООО «Экологический центр» осуществляет разработку проектной документации для проектируемых, реконструируемых и существующих объектов в соответствии с действующими нормативными документами, а также предоставляет комплексное экологическое сопровождение в согласовании природоохранной документации в соответствующих инстанциях.
                        </b>
                    </div>
                    <a href="/about" class="about-link mt-4 mt-md-40">
                        Подробнее о компании
                        <?php echo getIcon('bi-arrow-left', ['class' => 'text-end'])?>
                    </a>
                </div>
            </div>
        </div>
</section>

<section class="form bg">
    <div class="container pt-40 pt-md-80 border-start border-end">
        <span class="subtitle">Обратная связь</span>
        <h3 class="mt-4">Если у Вас возникли вопросы свяжитесь с нами</h3>
        <div class="row pt-4 pb-40 py-md-80">
            <div class="col-12 col-lg-7 col-xxl-6 offset-0 offset-xxl-1">
                <div class="form-img">
                    <?php echo
                    img(
                        [
                            'data-src'=>'/template/ecocentr/assets/images/form.webp',
                            'class'=>'img-background lozad',
                            'alt'=>'form-img'
                        ]
                    )?>
                </div>
            </div>
            <div class="col-12 col-lg-5 col-xxl-3 pe-xxl-4">
                <main-form></main-form>
            </div>
        </div>
    </div>
</section>

<section class="news">
    <div class="bb">
        <div class="container pt-40 pt-md-80 border-start border-end">
            <span class="subtitle">Блог</span>
            <h3 class="mt-3 mt-md-4">Новости и полезный материал</h3>
            <div class="py-3 py-lg-80">
                <div class="row g-0">
                    <?php $news = service('Content')->getPosts(['slug' => 'news', 'limit' => 7])?>
                    <?php //dd($news);?>
                    <div class="col-12 col-xl-3">
                        <div class="news-body">
                            <a href="/news" class="news-link pb-3 pb-md-0">
                                Смотреть все новости
                                <?php echo getIcon('bi-arrow-left', ['class' => 'text-end'])?>
                            </a>
                            <a href="<?php echo $news['list']['0']['url']?>" class="card border-0" title="<?php echo $news['list']['0']['title']?>">
                                <div class="card-body" >
                                    <span class="card-date"><b><?php echo $news['list']['0']['publish_date']?></b></span>
                                    <div class="card-pic">
                                        <?php echo
                                        img(
                                            [
                                                'data-src'=>$news['list']['0']['image']['original'],
                                                'class'=>'img-background lozad',
                                                'alt'=>'ews-image'
                                            ]
                                        )?>
                                    </div>
                                    <h6 class="card-desc">
                                        <b>
                                            <b><?php echo $news['list']['0']['attributes']['content_seo']['title']?></b>
                                        </b>
                                    </h6>
                                    <div class="news-link">
                                        Узнать подробнее
                                        <?php echo getIcon('bi-arrow-left', ['class' => 'text-end'])?>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-xl-9 mt-100 mt-lg-6">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-0">
                            <?php foreach ($news['list'] as $key => $item) : $isFirst = $key === 0?>
                                <?php if ($isFirst){
                                    $isFirst = false;
                                    continue;
                                }
                                ?>
                                <div class="col">
                                    <a href="<?php echo $item['url']?>" class="card border-0">
                                        <div class="card-body">
                                            <span class="card-date"><?php echo $item['publish_date']?></span>
                                            <h6 class="card-desc">
                                                <b><?php echo $item['attributes']['content_seo']['title']?></b>
                                            </h6>
                                            <div class="news-link">
                                                Узнать подробнее
                                                <?php echo getIcon('bi-arrow-left', ['class' => 'text-end'])?>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contacts">
    <div class="bb">
        <div class="container pt-40 pt-md-80 border-start border-end">
            <span class="subtitle">Контакты</span>
            <div class="my-40 my-lg-80">
                <?php if (($geo = service('template')->getProfile('geolocation')) && $geo['map_lat'] && $geo['map_lon']):?>
                    <!--Передать данные в js-->
                    <yandex-map
                            :options="{
                                    map_address: '<?php echo $geo['map_address']?>',
                                    map_lat: <?php echo $geo['map_lat']?>,
                                    map_lon: <?php echo $geo['map_lon']?>,
                                    map_api_key: '<?php echo $geo['map_api_key']?>'
                                    }"
                    ></yandex-map>
                <?php endif;?>            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 pb-40 pb-md-80">
                <div class="col">
                    <div class="contacts-body border-top">
                        <span class="contacts-title">
                            <b>Адрес:</b>
                        </span>
                            <br>
                        <span class="contacts-text">
                            г. Омск, ул. Красный путь,
                            <br>
                            дом 103 офис 48
                        </span>
                    </div>
                </div>
                <div class="col">
                    <div class="contacts-body border-top">
                        <span class="contacts-title">
                            <b>Режим работы:</b>
                        </span>
                            <br>
                        <span class="contacts-text">
                            пн-пт: 08:00 - 17:00
                        </span>
                           <br>
                        <span class="contacts-text">
                            обед: 12:00 - 13:00
                        </span>
                    </div>
                </div>
                <div class="col">
                    <div class="contacts-body border-top">
                        <span class="contacts-title">
                            <b>E–mail:</b>
                        </span>
                            <br>
                        <span class="contacts-text">
                              <a href="<?php echo "mailto: {$mail}"?>" title="<?php echo $mail?>">
                                   <?php echo $mail?>
                              </a>
                        </span>
                    </div>
                </div>
                <div class="col">
                    <div class="contacts-body border-top">
                        <span class="contacts-title">
                            <b>Телефон:</b>
                        </span>
                            <br>
                        <span class="contacts-text">
                             <?php if ($profile['contacts']['phones']):?>
                                    <a href="<?php echo "tel: {$phone}"?>" title="<?php echo $phone?>" class="mb-1 d-block"><?php echo $phone?></a>
                             <?php endif;?>
                        </span>
                            <br>
                        <span class="contacts-text">
                             <?php if ($profile['contacts']['phones']):?>
                                 <a href="<?php echo "tel: {$phone2}"?>" title="<?php echo $phone2?>" class="mb-1 d-block"><?php echo $phone2?></a>
                             <?php endif;?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>