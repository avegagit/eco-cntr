<?php helper('business_logic');
$profile = service('template')->getProfile('');
$phone = $profile['contacts']['phones']['phone_1'];
$phone2 = $profile['contacts']['phones']['phone_2'];
$mail = $profile['contacts']['emails']['email_2'];
$geo = $profile['geolocation']['map_address']; ?>

<section class="contacts">
    <div class="container pt-40 border-start border-end">
        <div class="mb-3 mb-lg-60">
            <h1 class="mb-lg-4">
                <?php echo $page['title']?>
            </h1>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <main-form></main-form>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="contacts__info">
                        <?php echo $page['content']?>
                        <div class="pt-40 pt-lg-0">
                            <b><?php echo $page['title']?></b>
                        </div>
                        <ul class="list-unstyled">
                            <?php if ($profile['contacts']['phones']):?>
                                <li class="contacts__item">
                                    <a href="<?php echo "tel:$phone"?>" title="<?php echo $phone?>" class="mb-1 d-block">
                                        <?php echo getIcon('bi-telephone')?>
                                        <?php echo $phone?>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if ($profile['contacts']['phones']):?>
                                <li class="contacts__item">
                                    <a href="<?php echo "tel:$phone2"?>" title="<?php echo $phone2?>" class="mb-1 d-block">
                                        <?php echo getIcon('bi-telephone')?>
                                        <?php echo $phone2?>
                                    </a>
                                </li>
                            <?php endif;?>
                            <li class="contacts__item">
                                <a href="<?php echo "mailto: {$mail}"?>" title="<?php echo $mail?>">
                                    <?php echo getIcon('bi-envelope')?>
                                    <?php echo $mail?>
                                </a>
                            </li>
                            <li class="contacts__item">
                                <?php if ($profile['geolocation']):?>
                                    <span class="text-basic">
                                        <?php echo getIcon('bi-telegram')?>
                                        <?php echo $geo?>
                                    </span>
                                <?php endif;?>
                            </li>
                            <li class="contacts__item">
                                <?php echo getIcon('bi-clock-fill')?>
                                пн-пт: 08:00 - 17:00, обед: 12:00 - 13:00
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
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
        <?php endif;?>
    </div>
</section>