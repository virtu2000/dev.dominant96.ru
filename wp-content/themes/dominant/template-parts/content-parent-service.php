<?php



$announce    = get_field('announce');

$backg = get_field('backg');





?>

<main id="primary" class="single-parent-service">
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
                <div class="col-sm-6">
                    <div class="section-title service-title">
                        <h1><?php the_title() ?></h1>
                    </div>
                    <?php the_content() ?>
                    <?= do_shortcode('[contact-form-7 id="fd26338"]') ?>
                </div>
   <div class="col-sm-2">
</div>
                <div class="col-sm-1">
                        
                    <? if ( ! empty($backg['url']) ) { ?>
        
      <img src="<?=$backg['url'] ?>"/>         
            <? } ?>

                <div>
            </div>
        </section>
    </div>


    <section class="section-white-text">
        <div class="container">
            <div class="row">
                <div class="col">
                   
                    <div class="single-top-announce"><?= $announce ?></div>


                </div>
             
                    </div>


<?php
$args = array(
    'post_type'      => 'service', // Ваше название CPT
    'post_parent'    => get_the_ID(), // Берет подуслуги текущей записи
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
);

$sub_services = new WP_Query( $args );

if ( $sub_services->have_posts() ) : ?>
    <div class="row service-list">
        <?php while ( $sub_services->have_posts() ) : $sub_services->the_post(); ?>
            <div class="service-card col-sm-6">
                
            <div class="col">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <hr>
               <?php the_content(); ?>
                
            </div>
            <div class="col-1"><img  src="/wp-content/themes/dominant/assets/images/icons/list-right.svg" alt="Right arrow"></div>
            </div>
        <?php endwhile; ?>
    </div>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>


                </div>


    </section>





    <?php get_template_part('template-parts/consult'); ?>


</main>


