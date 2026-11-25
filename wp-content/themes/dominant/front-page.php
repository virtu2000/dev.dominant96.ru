<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dominant
 */

get_header();

$main_banner = get_field('main_banner');
$about = get_field('about');
$partners = get_field('partners');
$form_block = get_field('form_block');

$reviews = get_field('reviews', 'options');
$advantages = get_field('advantages', 'options');

$org_name   = get_field('org_name', 'options');
$phone      = get_field('phone', 'options');
$email      = get_field('email', 'options');
$address    = get_field('address', 'options');
$social     = get_field('social', 'options');
$map        = get_field('map', 'options');

$args['term_args']['meta_query'] = array(
    array(
        'key'       => 'show_main',
        'value'     => 1,
        'compare' => '='
    )
);
$services_tree = get_taxonomy_tree('services', 'service', $args);

$blog_items = get_posts( array(
    'numberposts' => 3,
    //'category'    => $cat_id_arr,
    'orderby'     => 'date',
    //'order'       => 'DESC',
    'include'     => array(),
    //'exclude'     => array($post->ID),
    'meta_key'    => '',
    'meta_value'  =>'',
    'post_type'   => 'post',
    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
) );


?>

    <main id="primary" class="site-main">
        <section class="section-main-banner">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="main-banner">
                            <div class="main-banner-content">
                                <h1 class="main-banner-title"><?=$main_banner['header']?></h1>
                                <div class="main-banner-text"><?=$main_banner['text']?></div>
                                <div class="main-banner-contacts">
                                    <div class="main-banner-contacts-title">Связаться с нами</div>
                                    <div class="main-banner-contacts-buttons">
                                        <?php
                                        $banner_phones = get_field('phones', 'options');
                                        $banner_phone = (is_array($banner_phones) && !empty($banner_phones[0]['phone'])) ? $banner_phones[0]['phone'] : '';
                                        $max_url = (is_array($social) && !empty($social['wa'])) ? $social['wa'] : '';
                                        $tg_url = (is_array($social) && !empty($social['tg'])) ? $social['tg'] : '';
                                        ?>
                                        <?php if ($max_url): ?>
                                        <a class="contact-pill contact-pill-fill" href="<?= esc_url($max_url) ?>" target="_blank" rel="noopener">
                                            <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill="currentColor" d="M12.1 3.1c-4.9.2-8.8 4.2-8.8 9 0 1.7.5 3.3 1.4 4.6l-.9 3.4c-.2.6.4 1.1.9.8l3.7-1.6c1.1.5 2.4.7 3.7.7 5.1 0 9.2-4 9.2-9.1 0-5-4.1-9-9.2-8.8z"/></svg>
                                            Max
                                        </a>
                                        <?php endif; ?>
                                        <?php if ($tg_url): ?>
                                        <a class="contact-pill contact-pill-fill" href="<?= esc_url($tg_url) ?>" target="_blank" rel="noopener">
                                            <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill="currentColor" d="M21.8 4.2 18.2 20.1c-.3 1.2-1 1.5-2 .9l-5.6-4.1-2.7 2.6c-.3.3-.5.5-1.1.5l.4-5.7 10.4-9.4c.4-.4-.1-.6-.6-.2L6.5 13 1.1 11.3C-.1 10.9-.1 10.1 1.3 9.5L20.2 2.6c1-.4 1.9.2 1.6 1.6z"/></svg>
                                            Telegram
                                        </a>
                                        <?php endif; ?>
                                        <?php if ($banner_phone): ?>
                                        <a class="contact-pill contact-pill-outline" href="tel:<?= esc_attr(clear_phone($banner_phone)) ?>">
                                            <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" d="M7 3.8h2.1c.4 0 .7.3.8.6l.8 2.5a.8.8 0 0 1-.2.8l-1.3 1.3a12 12 0 0 0 5.5 5.5l1.3-1.3c.2-.2.5-.3.8-.2l2.5.8c.3.1.6.4.6.8V17a1.8 1.8 0 0 1-2 1.8A14.8 14.8 0 0 1 5.2 6.8 1.8 1.8 0 0 1 7 3.8z"/></svg>
                                            <?= esc_html($banner_phone) ?>
                                        </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="main-banner-image" ><?php if($main_banner['image']): ?><img src="<?= $main_banner['image'] ?>" alt="<?=$main_banner['header']?>"><?php endif; ?></div>
                            <div class="main-banner-bg <?=( $main_banner['bg_image'] ? 'main-banner-bg-image' : '') ?>"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-services">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section-title services-title">Наши услуги</div>
                        <div class="services-listing">
                            <?php foreach($services_tree as $item):?>
                            <div class="services-listing-category">
                                <div class="services-listing-category-img"><?=$item['term']->description?></div>
                                <span><?=$item['term']->name?></span>
                                <?/*<a href="<?=get_category_link($item['term']->term_id)?>"><?=$item['term']->name?></a>*/?>
                                <div class="services-listing-posts">
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
        </section>
        

            <?php get_template_part( 'template-parts/about' ); ?>


       
    
<?php if($form_block['form']): ?>
        <section class="section-form">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section-title form-text-1"><?= $form_block['text_1'] ?></div>
                        <div class="form-text-2-before"></div>
                        <div class="form-text-2"><?= $form_block['text_2'] ?></div>
                        <div class="form-text-2-after"></div>
                        <div class="form"><?= do_shortcode($form_block['form']) ?></div>
                    </div>
                </div>
            </div>
        </section>
<?php endif; ?>
      
        <?php
        while ( have_posts() ) :
            the_post();



        endwhile; // End of the loop.
        ?>

    </main><!-- #main -->

<?php
get_sidebar();
get_footer();
