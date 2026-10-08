<?php
/**
 * Шаблон страницы О нас
 * @package WordPress
 * Template Name: О нас
 */
get_header(); // подключаем header.php

$announce = get_field('announce');
$nums_block = get_field('nums_block');
$white_text_block = get_field('white_text_block');
$black_text_block = get_field('black_text_block');
$advantages_block = get_field('advantages_block');
$form_block = get_field('form_block');

$reviews = get_field('reviews', 'options');
?>

<main id="primary" class="about-page">
    <section class="section-single-top">
        <div class="container">
            <div class="row">
                <div class="col">
                    <?=print_breadcrumbs();?>
                    <div class="section-title about-title"><h1><?php the_title() ?></h1></div>
                    <div class="single-top-announce"><?=$announce?></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-about-us">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title about-us-title"><?=$nums_block['header'] ?></div>
                    <?php if($nums_block['text']):?><div class="about-us-text"><?=$nums_block['text'] ?></div><?php endif;?>
                    <div class="abut-us-advantages">
                        <?php $i = 1;
                        ?>
                        <div class="abut-us-advantages-left">
                            <?php foreach ($nums_block['elements'] as $item):  ?>
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


    <section class="section-about-white">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title about-white-title"><?=$white_text_block['header']?></div>
                    <div class="about-white-text"><?=$white_text_block['text']?></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-about-dark">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title about-dark-title"><?=$black_text_block['header']?></div>
                    <div class="about-dark-text"><?=$black_text_block['text']?></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-about-advantages">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title about-advantages-title"><?=$advantages_block['header']?></div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($advantages_block['advantages'] as $item):  ?>
                <div class="col-4">
                    <div class="about-advantages-item">
                        <div class="about-advantages-item-icon"><img src="<?= $item['image'] ?>" alt="icon"></div>
                        <div class="about-advantages-item-text"><?= $item['text'] ?></div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
            </div>
        </div>
    </section>

</main>
<?php get_footer(); // подключаем footer.php ?>