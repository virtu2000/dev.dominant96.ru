<?php
$announce    = get_field('announce');
$white_block1 = get_field('white_block1');
$white_block2 = get_field('white_block2');


?>
<main id="primary" class="single-service">
    <section class="section-single-top">
        <div class="container">
            <div class="row">
                <div class="col">
                    <?= print_breadcrumbs(); ?>

                </div>

            </div>
        </div>
    </section>


    <div class="container">
        <section class="section-form-text">
            <div class="row">
                <div class="col">
                    <div class="section-title service-title">
                        <h1><?php the_title() ?></h1>
                    </div>
                    <?php the_content() ?>



                </div>
                <div class="col-1">
                </div>
                <div class="col">
                    <?= do_shortcode('[contact-form-7 id="9724a77"]') ?>
                    <div>
                    </div>
        </section>
    </div>

<? if ( ! empty( $announce ) ) { ?>
    <section class="section-desc-text">
        <div class="container">

            <div class="single-top-announce"><?= $announce ?></div>
        </div>
    </section>
<? } ?>

<? if ( ! empty( $white_block1 ) && is_array( $white_block1 ) ) { ?>
    <section class="section-desc-text">
        <div class="container">

            <div class="section-title">Кого мы защищаем</div>

            <div class="row">
                <div class="col col-first">
                    <div class="services-title"><?= $white_block1['title1'] ?></div>
                    <div class="services-text"><?= $white_block1['text_1'] ?></div>
                </div>
                <div class="col col-second">
                    <div class="services-title"><?= $white_block1['title2'] ?></div>
                    <div class="services-text"><?= $white_block1['text_2'] ?></div>
                </div>

            </div>
            <div class="row">
                <div class="col col-third">
                    <div class="services-title"><?= $white_block1['title3'] ?></div>
                    <div class="services-text"><?= $white_block1['text_3'] ?></div>
                </div>
                <div class="col col-fourth">
                    <div class="services-title"><?= $white_block1['title4'] ?></div>
                    <div class="services-text"><?= $white_block1['text_4'] ?></div>
                </div>

            </div>


        </div>
    </section>

<? } ?>


<? if ( ! empty( $white_block2 ) && is_array( $white_block2 ) ) { ?>
    <section class="section-strateg-text">
        <div class="container">

            <div class="section-title">Пошаговая стратегия защиты</div>

            <div class="row">
                <div class="col col-first">
                    <div class="services-title"><?= $white_block2['title1_1'] ?></div>
                    <div class="services-text"><?= $white_block2['text_1_1'] ?></div>
                </div>
                <div class="col col-second">
                    <div class="services-title"><?= $white_block2['title2_1'] ?></div>
                    <div class="services-text"><?= $white_block2['text_2_1'] ?></div>
                </div>

                <div class="col col-third">
                    <div class="services-title"><?= $white_block2['title3_1'] ?></div>
                    <div class="services-text"><?= $white_block2['text_3_1'] ?></div>
                </div>
                <div class="col col-fourth">
                    <div class="services-title"><?= $white_block2['title4_1'] ?></div>
                    <div class="services-text"><?= $white_block2['text_4_1'] ?></div>
                </div>

            </div>


        </div>
    </section>
<? } ?>

    <?php get_template_part( 'template-parts/about' ); ?>

  <?php get_template_part( 'template-parts/consult' ); ?>


    
</main>
