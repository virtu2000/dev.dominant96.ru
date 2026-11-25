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

<link rel="icon" href="<?= get_template_directory_uri() . '/assets/images/icons/favicon-light.png" media="(prefers-color-scheme: light)' ?> ">
<link rel="icon" href="<?= get_template_directory_uri() . '/assets/images/icons/favicon-dark.png" media="(prefers-color-scheme: dark)' ?> ">

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
                                <div class="logo"><a href="/"><img src="<?=$logo?>" alt=""></a></div>
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
                                <div class="header-socials">
                                    <?php if(!empty($social['wa'])): ?>
                                    <a class="header-social" href="<?=esc_url($social['wa'])?>" target="_blank" rel="noopener" aria-label="Max">
                                        <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill="currentColor" d="M12.1 3.1c-4.9.2-8.8 4.2-8.8 9 0 1.7.5 3.3 1.4 4.6l-.9 3.4c-.2.6.4 1.1.9.8l3.7-1.6c1.1.5 2.4.7 3.7.7 5.1 0 9.2-4 9.2-9.1 0-5-4.1-9-9.2-8.8z"/></svg>
                                    </a>
                                    <?php endif; ?>
                                    <?php if(!empty($social['tg'])): ?>
                                    <a class="header-social" href="<?=esc_url($social['tg'])?>" target="_blank" rel="noopener" aria-label="Telegram">
                                        <svg width="16" height="16" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill="currentColor" d="M21.8 4.2 18.2 20.1c-.3 1.2-1 1.5-2 .9l-5.6-4.1-2.7 2.6c-.3.3-.5.5-1.1.5l.4-5.7 10.4-9.4c.4-.4-.1-.6-.6-.2L6.5 13 1.1 11.3C-.1 10.9-.1 10.1 1.3 9.5L20.2 2.6c1-.4 1.9.2 1.6 1.6z"/></svg>
                                    </a>
                                    <?php endif; ?>
                                </div>
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
                        <div class="close-mobile-menu"><img src="<?= get_template_directory_uri() . '/assets/images/icons/close2.svg' ?>" alt=""></div>
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
                            <?php if($social['wa']): ?><a class="social-link" href="<?=$social['wa']?>"><img src="<?=get_template_directory_uri() . '/assets/images/icons/wa_black.svg'?>" alt="Max"></a><?php endif; ?>
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
