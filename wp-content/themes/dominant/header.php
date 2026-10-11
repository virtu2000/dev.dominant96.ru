<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dominant
 */



$org_name   = get_field('org_name', 'options');
$work_time  = get_field('work_time', 'options');
//$phone      = get_field('phone', 'options');
$phones     = get_field('phones', 'options');
$email      = get_field('email', 'options');
$address    = get_field('address', 'options');
$social     = get_field('social', 'options');
$map        = get_field('map', 'options');
$logo       = get_field('logo_header', 'options');
$logo_inverse       = get_field('logo_header_inverse', 'options');

$args['term_args']['meta_query'] = array(
    array(
        'key'       => 'show_main',
        'value'     => 1,
        'compare' => '='
    )
);
$services_tree = get_taxonomy_tree('services', 'service');
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>

    <!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function(m,e,t,r,i,k,a){
        m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();
        for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
        k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)
    })(window, document,'script','https://mc.yandex.ru/metrika/tag.js?id=110873922', 'ym');

    ym(110873922, 'init', {ssr:true, webvisor:true, clickmap:true, ecommerce:"dataLayer", referrer: document.referrer, url: location.href, accurateTrackBounce:true, trackLinks:true});
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/110873922" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->


</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>


<div id="page" class="site">
    <header id="masthead" class="site-header">
        <div class="header-top-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="header-top">
                            <div class="header-logo">
                                <div class="logo"><img src="<?=$logo?>" alt=""></div>
                            </div>
							
			                <div class="header-menu">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'main',
                                        'menu_id'        => 'main-menu',
                                    )
                                );
                                ?>				
                            </div>


							
                            <div class="header-top-contacts">
                                <div class="contacts-phones">
                                    <div class="contacts-phones-opener">
                                     
                                        <a href="tel:<?=clear_phone($phones[0]['phone']) ?>"><?=$phones[0]['phone'] ?></a>
                                    </div>
                                    <?if(count($phones) > 1):?>
                                    <div class="contacts-phones-full">
                                        <? foreach($phones as $phone): ?>
                                            <a href="tel:<?=clear_phone($phone['phone']) ?>"><?=$phone['phone']?></a>
                                        <? endforeach; ?>
                                    </div>
                                    <?endif;?>
                                </div>
                                
                            </div>
                            <div class="header-top-buttons">
<!--                                <a class="button button-white" href="#">Обратный звонок</a>-->
                                <button class="button button-white open-popup-btn" data-popup-id="recall">Отправить заявку</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom-wrapper">

            <div class="mobile">
                <div class="mobile-header">
                    
                    <div class="mobile-logo">
                        <?php if(is_front_page()): ?>
                            <div class="logo"><img src="<?=$logo?>" alt=""></div>
                            <div class="logo-inverse"><img src="<?=$logo_inverse?>" alt=""></div>
                        <?php else: ?>
                            <a class="logo" href="/" title=""><img src="<?=$logo?>" alt=""></a>
                            <a class="logo-inverse" href="/" title=""><img src="<?=$logo_inverse?>" alt=""></a>
                        <?php endif; ?>
                    </div>
                    <div class="mobile-phone">
                        <a href="tel:<?=clear_phone($phones[0]['phone']) ?>"><?=$phones[0]['phone'] ?></a>  

                    </div>
                    <div class="mobile-menu-toggler">
                        <div class="open-mobile-menu"><img src="<?= get_template_directory_uri() . '/assets/images/icons/hamb-b.svg' ?>" alt=""></div>
                        <div class="close-mobile-menu"><img src="<?= get_template_directory_uri() . '/assets/images/icons/close_black.svg' ?>" alt=""></div>
                    </div>
                </div>
                <div class="mobile-menu">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'main',
                            'menu_id'        => 'main-menu',
                        )
                    );
                    ?>
                    <div class="mobile-menu-info">
                        <div class="menu-info-phone">
                            <? foreach($phones as $phone): ?>
                                <p><a href="tel:<?=clear_phone($phone['phone']) ?>"><?=$phone['phone']?></a></p>
                            <? endforeach; ?>
                        </div>
                        <div class="menu-info-worktime"><?=$work_time?></div>
                        <div class="menu-info-addr"><?=$address['city'] .', '. $address['addr'] ?></div>
                        <div class="menu-info-email"><a href="mailto:<?=$email ?>"><?=$email ?></a></div>
                        <div class="menu-info-social">
                            <?php if($social['vk']): ?><a class="social-link" href="<?=$social['vk']?>"><img src="<?=get_template_directory_uri() . '/assets/images/icons/vk_black.svg'?>" alt="VK"></a><?php endif; ?>
                            <?php if($social['wa']): ?><a class="social-link" href="<?=$social['wa']?>"><img src="<?=get_template_directory_uri() . '/assets/images/icons/wa_black.svg'?>" alt="WhatsApp"></a><?php endif; ?>
                            <?php if($social['tg']): ?><a class="social-link" href="<?=$social['tg']?>"><img src="<?=get_template_directory_uri() . '/assets/images/icons/tg_black.svg'?>" alt="Telegram"></a><?php endif; ?>
                        </div>
                    </div>
                    <div class="mobile-menu-services">
                        <div class="mobile-services-listing">
                            <?php foreach($services_tree as $item):?>
                                <div class="mobile-services-listing-category">
                                    <div class="mobile-services-listing-category-opener"><img src="<?= get_template_directory_uri() . '/assets/images/icons/chevron_down.svg' ?>" /></div>
                                    <a href="<?=get_category_link($item['term']->term_id)?>"><?=$item['term']->name?></a>
                                    <div class="mobile-services-listing-posts">
                                        <?php foreach($item['posts'] as $item_child):?>
                                            <a href="<?=get_the_permalink($item_child->ID)?>"><?=$item_child->post_title?></a>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-search">
                <div class="container">
                    <div class="row">
                        <div class="header-search-title">Поиск по сайту</div>
                        <div class="header-search-form">
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header><!-- #masthead -->
