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
                                <div class="main-banner-button">
                                    <?php if($main_banner['button']['popup']): ?>
                                        <button class="button button-white open-popup-btn" data-popup-id="consult"><?=$main_banner['button']['text']?></button>
                                    <?php else: ?>
                                        <a class="button button-white" href="<?=$main_banner['button']['link']?>"><?=$main_banner['button']['text']?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="main-banner-image" ><?php if($main_banner['image']): ?><img src="<?= $main_banner['image'] ?>" alt="<?=$main_banner['header']?>"><?php endif; ?></div>
                            <div class="main-banner-bg <?=( $main_banner['bg_image'] ? 'main-banner-bg-image' : '') ?>" <?=( $main_banner['bg_image'] ? 'style="background-image: url(\''.$main_banner['bg_image'].'\')"' : '') ?>></div>
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
        <section class="section-about-us">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="row">
                        <div class="col section-title about-us-title"><?=$about['header'] ?></div>
                        <div class="col about-us-text"><?=$about['text'] ?></div>
                                    </div>
                        <div class="abut-us-advantages">
                            <?php $i = 1;
                            ?>
                            <div class="abut-us-advantages-left">
                            <?php foreach ($about['elements'] as $item):  ?>
                                <?php if ($i == 1):?>
                                    <div class="abut-us-advantages-item item_<?=$i?>">
                                        <div class="advantages-item-header"><?=$item['header']?></div>
                                        <div class="advantages-item-text"><?=$item['text']?></div>
                                    </div>
                                </div>
                                <div class="abut-us-advantages-right">
                                <?php else:?>
                                    <div class="abut-us-advantages-item item_<?=$i?>">
                                        <div class="advantages-item-header"><?=$item['header']?></div>
                                        <div class="advantages-item-text"><?=$item['text']?></div>
                                    </div>
                                <?php endif;?>
                                <?php $i++;?>
                            <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


       
    
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
