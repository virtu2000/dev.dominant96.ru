<?php
/**
 * Шаблон страницы с вакансисями
 * @package WordPress
 * @subpackage your-clean-template-3
 * Template Name: Вакансии
 */
get_header(); // подключаем header.php ?>
    <section class="section-vacancy">
        <div class="container">
            <div class="row">
                <div class="col">
                    <?=print_breadcrumbs();?>
                    <div class="section-title vacancy-title"><h1><?php the_title(); ?></h1></div>
                    <div class="vacancy-text"><?php the_content(); ?></div>
                    <div class="vacancy-listing">
                        <?php
                        $args = array(
                            'post_type'      => 'vacancy',
                            'post_status'    => 'publish',
                        );
                        $query = new WP_Query($args);
                        if ($query->have_posts()) :
                            while ($query->have_posts()) : $query->the_post();
                                $work_conditions = get_field('work_conditions');
                                ?>
                                <a class="vacancy-listing-item" href="<?=get_the_permalink()?>">
                                    <span class="vacancy-listing-item-inner">
                                        <span class="vacancy-name"><?php the_title(); ?></span>
                                        <span>Зарплата <?=$work_conditions['salary']?></span>
                                    </span>
                                </a>
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