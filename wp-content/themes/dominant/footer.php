<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dominant
 */

$org_name   = get_field('org_name', 'options');
$work_time  = get_field('work_time', 'options');
$phones      = get_field('phones', 'options');
$email      = get_field('email', 'options');
$address    = get_field('address', 'options');
$social     = get_field('social', 'options');
$map        = get_field('map', 'options');
$logo       = get_field('logo_footer', 'options');
$copyright   = get_field('copyright', 'options');


$button_block = get_field('button_block', 'options');

$hide_blocks = get_field('hide_blocks');
if(!$hide_blocks){
    $reviews = get_field('reviews', 'options');
    $advantages = get_field('advantages', 'options');
}
global $post;
$blog_items = get_posts( array(
    'numberposts' => 3,
    //'category'    => $cat_id_arr,
    'orderby'     => 'date',
    //'order'       => 'DESC',
    'include'     => array(),
    'exclude'     => array($post->ID),
    'meta_key'    => '',
    'meta_value'  =>'',
    'post_type'   => 'post',
    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
) );
?>
<?php if(!$hide_blocks): ?>
    <section class="section-block-button">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="block-button-text-1"><?=$button_block['text_1'] ?></div>
                    <div class="block-button-text-2"><?=$button_block['text_2'] ?></div>
                    <div class="block-button-text-3-before"></div>
                    <div class="block-button-text-3"><?=$button_block['text_3'] ?></div>
                    <div class="block-button-text-3-after"></div>
                    <div class="block-button-button">
                        <?php if($button_block['button']['popup']): ?>
                            <button class="button button-black open-popup-btn" data-popup-id="consult"><?=$button_block['button']['text']?></button>
                        <?php else:?>
                            <a class="button button-black" href="<?=$button_block['button']['link']?>"><?=$button_block['button']['text']?></a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-reviews">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title reviews-title">Почему мы</div>
                    <div class="reviews-tabs">
                        <div class="reviews-tab-titles">
                            <div class="tab-title active" data-tab="1">Отзывы</div>
                            <div class="tab-sep"> / </div>
                            <div class="tab-title" data-tab="2">Достижения</div>
                        </div>
                        <div class="reviews-tab-contents">
                            <div class="tab-body active" data-tab="1">
                                <div class="owl-carousel reviews-carousel" >
                                    <?php foreach ($reviews as $item): ?>
                                        <div class="reviews-carousel-item">
                                            <div class="carousel-item-top">
                                                <div class="carousel-item-top-icon"><img src="<?=get_template_directory_uri() . '/assets/images/icons/user_gray.svg'?>"></div>
                                                <div class="carousel-item-top-title"><?=$item['author']?></div>
                                            </div>
                                            <div class="carousel-item-bottom"><?=$item['text']?></div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="tab-body" data-tab="2">
                                <div class="owl-carousel advantages-carousel" >
                                    <?php foreach ($advantages as $item): ?>
                                        <div class="advantages-carousel-item">
                                            <div class="carousel-item-top">
                                                <div class="carousel-item-top-icon"><img src="<?=get_template_directory_uri() . '/assets/images/icons/user_gray.svg'?>"></div>
                                                <div class="carousel-item-top-title"><?=$item['reward']?></div>
                                            </div>
                                            <div class="carousel-item-bottom"><?=$item['text']?></div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-blog">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title blog-title">Блог</div>
                    <div class="blog-items owl-carousel">
                        <!--                            <div>-->
                        <?php foreach ($blog_items as $item): ?>
                            <a class="blog-item" href="<?=get_the_permalink($item->ID)?>">
                                <span class="blog-item-image" style="background-image: url('<?=get_the_post_thumbnail_url($item->ID, 'large')?>')"></span>
                                <span class="blog-item-date"><?=get_the_date('j F Y', $item->ID);?></span>
                                <span class="blog-item-name"><?=$item->post_title?></span>
                            </a>
                        <?php endforeach; ?>
                        <!--                            </div>-->
                    </div>
                    <div class="blog-all-items">
                        <a href="#">Все статьи</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>
	<footer id="footer" class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="footer-row">
                        <div class="footer-logo">
                            <?php if(is_front_page()): ?>
                                <div><img src="<?=$logo?>" alt=""></div>
                            <?php else: ?>
                                <a href="" title=""><img src="<?=$logo?>" alt=""></a>
                            <?php endif; ?>
                        </div>
                        <div class="footer-addr">
                            <div class="footer-col-title">
                                Адрес
                            </div>
                            <div class="footer-col-content">
                                <div class="addr">
                                    <?=$address['postal_code'] .', '. $address['city'] .', '. $address['addr'] ?>
                                </div>
                                <div class="worktime">
                                    <img src="<?=get_template_directory_uri() . '/assets/images/icons/time_white.svg'?>" alt="Время работы"/>
                                    <?=$work_time?>
                                </div>
                            </div>
                        </div>
                        <div class="footer-phone">
                            <div class="footer-col-title">
                                Телефон
                            </div>
                            <div class="footer-col-content">
                                <? foreach($phones as $phone): ?>
                                <div class="phone">
                                    <img src="<?=get_template_directory_uri() . '/assets/images/icons/phone_white.svg'?>" alt="Телефон">
                                    <a href="tel:<?=clear_phone($phone['phone']) ?>"><?=$phone['phone'] ?></a>
                                </div>
                                <? endforeach; ?>
                            </div>
                        </div>
                        <div class="footer-email">
                            <div class="footer-col-title">
                                Почта
                            </div>
                            <div class="footer-col-content">
                                <div class="email">
                                    <img src="<?=get_template_directory_uri() . '/assets/images/icons/mail_white.svg'?>" alt="E-mail">
                                    <a href="mailto:<?=$email ?>"><?=$email ?></a>
                                </div>

                            </div>
                        </div>
                        <div class="footer-social">
                            <div class="footer-col-title">
                                Социальные сети
                            </div>
                            <div class="footer-col-content">
                                <?php if($social['vk']): ?><a class="social-link" href="<?=$social['vk']?>">Вконтакте</a><?php endif; ?>
                                <?php if($social['wa']): ?><a class="social-link" href="<?=$social['wa']?>">WhatsApp</a><?php endif; ?>
                                <?php if($social['tg']): ?><a class="social-link" href="<?=$social['tg']?>">Telegram</a><?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="footer-row">
                        <div class="footer-menu-0">
                        </div>
                        <div class="footer-menu-1">
                            <div class="footer-col-title">
                                Компания
                            </div>
                            <div class="footer-col-content">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'footer1',
                                        'menu_id'        => 'footer1-menu',
                                    )
                                );
                                ?>
                            </div>
                        </div>
                        <div class="footer-menu-2">
                            <div class="footer-col-title">
                                Банкротство
                            </div>
                            <div class="footer-col-content">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'footer2',
                                        'menu_id'        => 'footer2-menu',
                                    )
                                );
                                ?>
                            </div>
                        </div>
                        <div class="footer-menu-3">
                            <div class="footer-col-title">
                                Взыскание задолженностей
                            </div>
                            <div class="footer-col-content">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'footer3',
                                        'menu_id'        => 'footer3-menu',
                                    )
                                );
                                ?>
                            </div>
                        </div>
                        <div class="footer-menu-4">
                            <div class="footer-col-title">
                                Разрешение споров
                            </div>
                            <div class="footer-col-content">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'footer4',
                                        'menu_id'        => 'footer4-menu',
                                    )
                                );
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="footer-bottom">
                        <div class="footer-bottom-left">
                            <div><?=$copyright?></div>
                            <div><?=get_the_privacy_policy_link()?></div>
                        </div>
                        <div class="footer-bottom-right">
                            <div>Created by <a href="https://promoexpert.pro/" target="_blank">Promoexpert</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<div class="popup" id="recall">
    <div class="popup-content">
        <span class="close-popup-btn"><img src="<?=get_template_directory_uri() . '/assets/images/icons/close_black.svg'?>" alt="Закрыть"></span>
        <div class="popup-form">
            <div class="popup-form-wrapper"><?=do_shortcode('[contact-form-7 id="9724a77"]')?></div>
            <div class="popup-form-success">
                <div class="popup-form-success-inner">
                    <div class="popup-form-success-title">Спасибо за ваше сообщение!</div>
                    <div class="popup-form-success-body">Наш специалист свяжется <br>с Вами в ближайшее время.</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup" id="consult">
    <div class="popup-content">
        <span class="close-popup-btn"><img src="<?=get_template_directory_uri() . '/assets/images/icons/close_black.svg'?>" alt="Закрыть"></span>
        <div class="popup-form">

            <div class="popup-form-wrapper"><?=do_shortcode('[contact-form-7 id="d3d7718"]')?></div>
            <div class="popup-form-success">
                <div class="popup-form-success-inner">
                    <div class="popup-form-success-title">Спасибо за ваше сообщение!</div>
                    <div class="popup-form-success-body">Наш специалист свяжется <br>с Вами в ближайшее время.</div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
