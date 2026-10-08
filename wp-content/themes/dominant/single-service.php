<?php
/**
 * Шаблон отдельной записи (single.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */

get_header(); // подключаем header.php

$announce    = get_field('announce');
$accordions  = get_field('accordeons_block');
$white_block = get_field('white_block');
$black_block = get_field('black_block');
$form_block  = get_field('form_block');

//$form_block  = get_field('form_block', 'options');
//$args['term_args']['meta_query'] = array(
//    array(
//        'key'       => 'show_main',
//        'value'     => 1,
//        'compare' => '='
//    )
//);
//$related_services = get_taxonomy_tree('services', 'service');

?>

<main id="primary" class="single-service">
    <section class="section-single-top">
        <div class="container">
            <div class="row">
                <div class="col">
                    <?=print_breadcrumbs();?>
                    <div class="section-title service-title"><h1><?php the_title() ?></h1></div>
                    <div class="single-top-announce"><?=$announce?></div>
                </div>
            </div>
        </div>
    </section>


    <section class="section-service-accordions">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title service-accordions-title"><?=$accordions['header'] ?></div>
                    <div class="service-accordions-before"><?=$accordions['before_accrodeons']?></div>
                    <div class="service-accordions">
                        <?php foreach ($accordions['accordeons'] as $item): ?>
                            <div class="accordion-item">
                                <div class="accordion-title">
                                    <div><?= $item['title'] ?></div>
                                </div>
                                <div class="accordion-body"><?= $item['text'] ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="service-accordions-after"><?=$accordions['after_accrodeons'] ?></div>
                </div>
            </div>
        </div>
    </section>


    <section class="section-white-text">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title"><?= $white_block['title']?></div>
                    <div class="white-text-blue"><?= $white_block['text_1'] ?></div>
                    <div class="white-text-black"><?= $white_block['text_2'] ?></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-black-text">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title"><?=$black_block['title']?></div>
                    <div class="black-text"><?=$black_block['text']?></div>
                </div>
            </div>
        </div>
    </section>



<? /*
    <section class="section-related-services">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title related-services-title"><?= $form_block['text_1'] ?></div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($related_services as $cat): ?>
                <div class="col-3">
                    <div class="related-services-cat">
                        <a href="<?=get_category_link($cat['term']->term_id)?>"><?=$cat['term']->name?></a>
                        <div class="related-services-items">
                            <?php foreach ($cat['child'] as $item): ?>
                            <a href="<?=get_the_permalink($item->ID)?>"><?=$item->post_title?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
*/ ?>

</main>
<?php get_footer(); // подключаем footer.php ?>
