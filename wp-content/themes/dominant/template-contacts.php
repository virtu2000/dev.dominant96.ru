<?php
/**
 * Шаблон страницы Контакты
 * @package WordPress
 * Template Name: Контакты
 */
get_header(); // подключаем header.php

$org_name   = get_field('org_name', 'options');
$phones      = get_field('phones', 'options');
$email      = get_field('email', 'options');
$address    = get_field('address', 'options');
$social     = get_field('social', 'options');
$map        = get_field('map', 'options');
$work_time  = get_field('work_time', 'options');

$requisites       = get_field('requisites', 'options');
?>

<main id="primary" class="contacts-page">
    <section class="section-contacts-body">
        <div class="container">
            <div class="row">
                <div class="col">
                    <?=print_breadcrumbs();?>
                    <div class="section-title contacts-title"><h1><?php the_title() ?></h1></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="contacts-info">
                        <div class="contacts-info-item contacts-info-title">
                            <?=$org_name?>
                        </div>
                        <div class="contacts-info-item contacts-info-address">
                            <div>Адрес</div>
                            <div><?=$address['postal_code'] .', '. $address['city'] .', '. $address['addr'] ?></div>
                        </div>
                        <div class="contacts-info-item contacts-info-worktime">
                            <div>Режим работы</div>
                            <div><?=$work_time ?></div>
                        </div>
                        <div class="contacts-info-item contacts-info-phone">
                            <div>Телефон</div>
                            <div>
                                <? foreach($phones as $phone): ?>
                                    <p><a href="tel:<?=clear_phone($phone['phone']) ?>"><?=$phone['phone']?></a></p>
                                <? endforeach; ?>
                            </div>
                        </div>
                        <div class="contacts-info-item contacts-info-mail">
                            <div>Почта</div>
                            <div><a href="mailto:<?=$email ?>"><?=$email ?></a></div>
                        </div>
                        <div class="contacts-info-item contacts-info-social">
                            <?php if($social['vk']): ?><a class="social-link" href="<?=$social['vk']?>"><img src="<?=get_template_directory_uri() . '/assets/images/icons/vk_black.svg'?>" alt="VK"></a><?php endif; ?>
                            <?php if($social['wa']): ?><a class="social-link" href="<?=$social['wa']?>"><img src="<?=get_template_directory_uri() . '/assets/images/icons/wa_black.svg'?>" alt="WhatsApp"></a><?php endif; ?>
                            <?php if($social['tg']): ?><a class="social-link" href="<?=$social['tg']?>"><img src="<?=get_template_directory_uri() . '/assets/images/icons/tg_black.svg'?>" alt="Telegram"></a><?php endif; ?>
                        </div>
                        <div class="contacts-info-button">
                            <!--                                <a class="button button-white" href="#">Обратиться в компанию</a>-->
                            <button class="button button-white button-bordered open-popup-btn" data-popup-id="consult">Обратиться в компанию</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="contacts-map">
						<?=$map?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-requisits">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title">Реквизиты компании «Доминант»</div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="requisits">
                        <div class="requisits-item">
                            <div class="label">Полное название компании</div>
                            <div class="value"><?= $requisites['name'] ?></div>
                        </div>
                        <div class="requisits-item">
                            <div class="label">Организационно-правовая форма</div>
                            <div class="value"><?= $requisites['org_form'] ?></div>
                        </div>
                        <div class="requisits-item">
                            <div class="label">Юридический адрес</div>
                            <div class="value"><?= $requisites['legal_addr'] ?></div>
                        </div>
                        <div class="requisits-item">
                            <div class="label">Почтовый адрес</div>
                            <div class="value"><?= $requisites['post_addr'] ?></div>
                        </div>
                        <div class="requisits-item">
                            <div class="label">ИНН</div>
                            <div class="value"><?= $requisites['inn'] ?></div>
                        </div>
                        <div class="requisits-item">
                            <div class="label">КПП</div>
                            <div class="value"><?= $requisites['kpp'] ?></div>
                        </div>
                        <div class="requisits-item">
                            <div class="label">КПП</div>
                            <div class="value"><?= $requisites['ogrn'] ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); // подключаем footer.php ?>