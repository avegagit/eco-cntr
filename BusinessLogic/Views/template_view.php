<?php helper('business_logic');
$profile = service('template')->getProfile('');
$phone = $profile['contacts']['phones']['phone_1'];
$phone2 = $profile['contacts']['phones']['phone_2'];
$mail = $profile['contacts']['emails']['email_2'];
$mail2 = $profile['contacts']['emails']['email_2'];
$geo = $profile['geolocation']['map_address']
?>

<div id="app" class="d-flex flex-column min-vh-100">
    <header class="header">
        <div class="container">
            <div class="header-wrp d-flex align-items-center">
                <a href="/" class="header-logo">
                    <?php echo
                    img(
                        [
                            'data-src'=>'/template/ecocentr/assets/images/logo.svg',
                            'class'=>'img-background lozad',
                            'alt'=>'logo'
                        ]
                    )?>
                </a>
                <button class="btn header-burger-temporary p-0 mx-auto" id="header-nav-temporary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasServices" aria-controls="offcanvasServices">
                    <?php echo getIcon('bi-list')?>
                </button>
                <div class="d-none d-lg-block mx-auto">
                    <?php if ($profile['geolocation']):?>
                        <div class="d-flex align-items-center">
                            <?php echo getIcon('bi-geo', ['class' => 'bi me-1'])?>
                            <span>
                                <?php echo $geo?>
                            </span>
                        </div>
                    <?php endif;?>
                    <div class="d-flex align-items-center">
                        <?php echo getIcon('bi-time', ['class' => 'bi me-1'])?>
                        <span>
                            пн-пт: 08:00 - 17:00, обед: 12:00 - 13:00
                        </span>
                    </div>
                </div>
               <div class="d-none d-md-block mx-auto mx-lg-0">
                   <?php if ($profile['contacts']['emails']):?>
                       <a href="<?php echo "mailto: {$mail}"?>" title="<?php echo $mail?>">
                           <?php echo getIcon('bi-envelope', ['class' => 'bi me-1'])?>
                           <b><?php echo $mail?></b>
                       </a>
                   <?php endif;?>
                   <div class="d-flex">
                       <?php if ($profile['contacts']['phones']):?>
                           <a href="<?php echo "tel:{$phone}"?>" title="<?php echo $phone?>">
                               <?php echo getIcon('bi-telephone')?>
                               <b><?php echo $phone?></b>
                           </a>
                       <?php endif;?>
                       <span>,&ensp;</span>
                       <?php if ($profile['contacts']['phones']):?>
                           <a href="<?php echo "tel:{$phone2}"?>" title="<?php echo $phone2?>">
                               <b><?php echo $phone2?></b>
                           </a>
                       <?php endif;?>
                   </div>
               </div>
                <button class="btn d-block d-lg-none navbar-btn header-burger" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <?php echo getIcon('bi-list')?>
                </button>
            </div>
            <?php echo service('Content')->getView([
                'path' => 'main/widgets/layout/menu'
            ])?>
        </div>
    </header>

    <div class="main flex-shrink-0 mb-auto border-top">
        <?php if ((!$is404 = service('response')->getStatusCode() === 404) && !$isMain):?>
            <div class="container d-none d-md-block border-start border-end py-1">
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb my-3">
                        <?php $last = array_key_last($breadcrumbs); foreach ($breadcrumbs as $key => $item)
                            : echo sprintf(
                                    '<li class="breadcrumb-item%s"%s>%s</li>',
                                    $key === $last ? ' active' : '',
                                    $key === $last ? ' aria-current="page"' : '',
                                    $key !== $last ? anchor($item['url'], $item['title'], ['title' => $item['title']]) : $item['title']
                        );
                        endforeach;?>
                    </ul>
                </nav>
            </div>
        <?php endif; echo $pageContent;?>
    </div>

    <?php echo service('Content')->getView([
        'path' => 'main/widgets/layout/footer'
    ])?>

    <?php $services = array_column(
        current(
            array_filter(
                service('Content')->getMenu('menu')['list'] ?? [],
                fn($el) => $el['name'] === 'Услуги'
            )
        )['list'] ?? [],
        'name',
    );?>

    <service-modal
            :services="<?php echo esc(json_encode($services, JSON_UNESCAPED_UNICODE))?>"
    ></service-modal>

    <?php echo service('Content')->getView([
        'path' => 'main/widgets/layout/offcanvas'
    ])?>

    <?php echo service('Content')->getView([
        'path' => 'main/widgets/layout/offcanvas_services'
    ])?>

    <?php echo service('Content')->getView([
        'path' => 'main/widgets/layout/cookies'
    ])?>

    <notifications position="bottom right" :width="null">
        <template #body="props">
            <div class="toast show" :class="props.item.type" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-body d-flex bg-secondary">
                    <div class="toast-body-text text-white" v-html="props.item.text"></div>
                    <button type="button" class="btn-close" aria-label="Close" @click="props.close"></button>
                </div>
            </div>
        </template>
    </notifications>

</div>

<?php require_once('template_svg.php');?>


