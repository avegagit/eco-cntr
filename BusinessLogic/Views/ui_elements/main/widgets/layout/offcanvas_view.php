<?php helper('business_logic');?>
<?php $profile = service('template')->getProfile('');?>
<?php $phone = $profile['contacts']['phones']['phone_1']?>
<?php $phone2 = $profile['contacts']['phones']['phone_2']?>
<?php $mail = $profile['contacts']['emails']['email_2']?>
<?php $mail2 = $profile['contacts']['emails']['email_2']?>
<?php $geo = $profile['geolocation']['map_address']?>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header px-3">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Меню</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column">
        <ul class="nav d-block">
            <?php foreach (service('Content')->getMenu('menu')['list'] ?? [] as $menu) : $hasChildren = $menu['list'] ?? false?>
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
            <?php endforeach;?>            </ul>
        <div class="p-3 mt-auto">
            <?php if ($profile['contacts']['emails']):?>
                <a href="<?php echo "mailto: {$mail}"?>" title="<?php echo $mail?>" class="mt-2 d-block offcanvas-contact">
                    <?php echo getIcon('bi-envelope', ['class' => 'bi me-1 mt-1'])?>
                    <span>
                        <b><?php echo $mail?></b>
                    </span>
                </a>
            <?php endif;?>
            <?php if ($profile['contacts']['phones']):?>
                <a href="<?php echo "tel:{$phone}"?>" title="<?php echo $phone?>" class="mt-2 d-block offcanvas-contact">
                    <?php echo getIcon('bi-telephone')?>
                    <span>
                        <b><?php echo $phone?></b>
                    </span>
                </a>
            <?php endif;?>
            <?php if ($profile['contacts']['phones']):?>
                <a href="<?php echo "tel:{$phone2}"?>" title="<?php echo $phone2?>" class="mt-2 d-block offcanvas-contact">
                    <?php echo getIcon('bi-telephone')?>
                    <span>
                        <b><?php echo $phone2?></b>
                    </span>
                </a>
            <?php endif;?>
            <?php if ($profile['geolocation']):?>
                <div class="d-block">
                    <p class="mt-2">
                        <?php echo getIcon('bi-geo', ['class' => 'bi me-1'])?>
                        <span>
                            <b><?php echo $geo?></b>
                        </span>
                    </p>
                </div>
            <?php endif;?>
            <div>
                <span>
                    пн-пт: 08:00 - 17:00,
                    <br>
                    обед: 12:00 - 13:00
                </span>
            </div>
            <button
                    type="button"
                    class="btn btn-primary d-lg-block w-100 mt-40"
                    data-bs-toggle="modal"
                    data-bs-target="#serviceModal"
                    title="Заказать звонок"
            >
                <b class="d-block d-lg-none d-xl-block">Заказать звонок</b>
            </button>
        </div>
    </div>
</div>

