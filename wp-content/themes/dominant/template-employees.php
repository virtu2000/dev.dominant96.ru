<?php
/**
 * Шаблон страницы с Сотрудниками
 * @package WordPress
 * Template Name: Сотрудники
 */
get_header(); // подключаем header.php


?>
<section class="section-employees">
    <div class="container">
        <div class="row">
            <div class="col">
                <?=print_breadcrumbs();?>
                <div class="section-title employees-title"><h1><?php the_title(); ?></h1></div>
                <div class="employees-listing">
                    <?php
                    $args = array(
                        'post_type'      => 'employes',
                        'post_status'    => 'publish',
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();
                            $employe_post = get_field('employe_post');
                    ?>
                    <div class="employees-listing-item">
                        <span class="employe-post"><?=$employe_post?></span>
                        <a href="<?=get_the_permalink()?>"><?php the_title(); ?></a>
                    </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo 'Сотрудники не найдены.';
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); // подключаем footer.php ?>