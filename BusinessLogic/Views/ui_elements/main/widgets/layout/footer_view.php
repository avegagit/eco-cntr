<?php helper('business_logic');?>
<?php $profile = service('template')->getProfile('');?>
<?php $phone = $profile['contacts']['phones']['phone_1']?>
<?php $phone2 = $profile['contacts']['phones']['phone_2']?>
<?php $mail = $profile['contacts']['emails']['email_2']?>
<?php $mail2 = $profile['contacts']['emails']['email_2']?>
<?php $geo = $profile['geolocation']['map_address']?>

<footer class="footer bg">
    <div class="container pt-40 pt-md-80 border-start border-end">
        <div class="row">
            <div class="col-12 col-xl-5 order-2 order-xl-1">
                <div class="ms-0 ms-xl-4">
                    <div class="footer-title mb-40 mb-lg-60">
                        <b>Разработаем любой вид природоохранной документации для Вас.</b>
                    </div>
                    <button
                        type="button"
                        class="btn btn-secondary footer-btn"
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
            <div class="col-12 col-xl-7 order-1 order-xl-2">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                    <div class="сol">
                        <nav class="footer-nav">
                            <ul class="footer-list">
                                <?php foreach (service('Content')->getMenu('footer_top')['list'] ?? [] as $menu):?>
                                    <li class="nav-item">
                                        <?php echo anchor(
                                            $menu['url'],
                                            $menu['name'],
                                            [
                                                'class' => 'nav-link',
                                                'title' => $menu['name']
                                            ]
                                        );?>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                        </nav>
                    </div>
                    <div class="сol mt-3 mt-md-0">
                        <nav class="footer-nav">
                            <ul class="footer-list">
                                <?php foreach (service('Content')->getMenu('footer_bottom')['list'] ?? [] as $menu) : $hasChildren = $menu['list'] ?? false?>
                                    <li class="<?php echo sprintf('nav-item%s', $hasChildren ? ' dropdown' : '')?>">
                                        <?php echo anchor(
                                            $menu['url'],
                                            $menu['name'],
                                            array_merge(
                                                [
                                                    'class' => implode(' ', ['nav-link', ...($hasChildren ? ['dropdown-toggle'] : [])]),
                                                    'title' => $menu['name']
                                                ],
                                                $hasChildren
                                                    ? [
                                                    'data-bs-toggle' => 'dropdown'
                                                ]
                                                    : []
                                            )

                                        );?>
                                        <?php if ($hasChildren):?>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <?php foreach ($menu['list'] as $submenu):?>
                                                    <li>
                                                        <?php echo anchor(
                                                            $submenu['url'],
                                                            $submenu['name'],
                                                            [
                                                                'class' => 'dropdown-item',
                                                                'title' => $submenu['name']
                                                            ]
                                                        );?>
                                                    </li>
                                                <?php endforeach;?>
                                            </ul>
                                        <?php endif;?>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                        </nav>
                    </div>
                    <div class="сol mt-3 mt-md-0">
                        <ul class="footer-list">
                            <?php if ($profile['contacts']['phones']):?>
                                <li>
                                    <a href="<?php echo "tel:{$phone}"?>" title="<?php echo $phone?>" class="mb-1 d-block"><?php echo $phone?></a>
                                </li>
                            <?php endif;?>
                            <?php if ($profile['contacts']['phones']):?>
                                <li>
                                    <a href="<?php echo "tel:{$phone2}"?>" title="<?php echo $phone2?>" class="mb-1 d-block"><?php echo $phone2?></a>
                                </li>
                            <?php endif;?>
                            <li class="pb-2">
                                <a href="<?php echo "mailto: {$mail2}"?>" title="<?php echo $mail2?>">
                                    <?php echo $mail2?>
                                </a>
                            </li>
                            <li>
                                <a href="https://ecocntr.avega-soft.ru/cookie" class="border-top pt-2">
                                    Файлы Cookie
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 mb-3">
                    <div>
                        <?php echo getIcon('zip', ['class' => 'footer-svg'])?>
                        <a href="/uploads/content/Uchreditelnie_dokumenti.rar" download class="footer-teal">
                            Комплект документов
                        </a>
                    </div>
                    <div>
                        <?php echo getIcon('pdf')?>
                        <a href="/uploads/content/Rekviziti_IP_Pleshova_YaM.pdf" download class="footer-teal">
                            Реквизиты ООО
                        </a>
                    </div>
                    <div>
                        <?php echo getIcon('pdf')?>
                        <a href="/uploads/content/Rekviziti_IP_Pleshova_YaM.pdf" download class="footer-teal">
                            Реквизиты ИП
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center mt-40 mt-lg-60 py-4 pb-lg-40 border-top">
            <div class="col-12 col-md-6 me-0 me-md-auto ms-0 ms-xl-4">
                <div class="footer-text">
                    ©2014-<?php echo date("Y"); echo $profile['site']['sitename']?> <a href="https://ecocntr.avega-soft.ru/policy" class="footer-teal">Политика конфиденциальности</a>
                </div>
            </div>
            <div class="col-12 col-md-4 d-none d-md-block">
                <?php if ($profile['geolocation']):?>
                    <span class="footer-teal">
                        <?php echo $geo?>
                    </span>
                <?php endif;?>
            </div>
        </div>
        <div class="warning">
            <div class="container">
                <div class="warning__wrapper d-flex flex-column flex-md-row align-items-center">
                    <div class="warning__text">Этот сайт использует <a href="/cookie" class="footer-teal">файлы cookies</a> и сервисы сбора технических данных посетителей (данные об IP-адресе, местоположении и др.)
                        для обеспечения работоспособности и улучшения качества обслуживания.
                    </div>
                    <button class="warning__apply btn btn-primary mx-auto m-lg-0 mt-2 mt-lg-0" type="button">OK</button>
                </div>
            </div>
        </div>
    </div>
</footer>
