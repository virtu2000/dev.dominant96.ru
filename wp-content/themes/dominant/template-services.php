<?php
/**
 * Шаблон страницы Услуги
 * @package WordPress
 * Template Name: Услуги
 */
get_header(); // подключаем header.php


$services_tree = get_taxonomy_tree('services', 'service');
?>


<main id="primary" class="services-main">
    <section class="section-services">
        <div class="container">
            <div class="row">
                <div class="col">
                    <?=print_breadcrumbs();?>
                    <div class="section-title services-title"><h1><?php the_title(); ?></h1></div>
                    <div class="services-listing">
                        <?php foreach($services_tree as $item):?>
                            <div class="services-listing-category">
                                <span><?=$item['term']->name?></span>
                                <? /*<a href="<?=get_category_link($item['term']->term_id)?>"><?=$item['term']->name?></a> */?>
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
</main>

<?php get_footer(); // подключаем footer.php ?>