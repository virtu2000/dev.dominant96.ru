<?php
/**
 * Шаблон страницы Аукционы
 * @package WordPress
 * Template Name: Аукционы
 */
get_header(); // подключаем header.php

?>
<main id="primary" class="auctions-page">
    <section class="section-single-top" style="padding: 60px 0">
        <div class="container">
            <div class="row">
                <div class="col">
                    <?=print_breadcrumbs()?>
                    <div class="section-title about-title"><h1><?php the_title(); ?></h1></div>
                    <div class="single-top-announce"><?php the_content(); ?></div>
                </div>
            </div>
        </div>
    </section>

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="auction-list">
                        <?php
                        $args = array(
                            'post_type'      => 'auctions', // Тип записи
                            'posts_per_page' => 4,          // Количество записей на первой загрузке
                            'post_status'    => 'publish',  // Только опубликованные записи
                        );

                        $query = new WP_Query($args);

                        if ($query->have_posts()) :
                            while ($query->have_posts()) : $query->the_post();
                                $type = get_field('type');
                                $source = get_field('source');
                                $lot = get_field('lot');
                                $status = get_field('status');
                                $price = get_field('price');
                                $date_order_end = get_field('date_order_end');
                                $region = get_field('region');
                                $link = get_field('link');
                                ?>
                                <div class="auction-item">
                                    <div class="auction-item-top">
                                        <div class="auction-item-info">
                                            <div class="info auction-item-label"><?= $type . ' | ' . $source . ' | ' . $lot ?></div>
                                            <div class="date auction-item-label"><?=get_the_date('d.m.Y')?></div>
                                        </div>
                                        <div class="auction-item-name"><?php the_title(); ?></div>
                                        <div class="auction-item-status">
                                            <div class="auction-item-label">Статус:</div>
                                            <div class="auction-item-value <?=$status['value']?>"><?= $status['label'] ?></div>
                                        </div>
                                    </div>
                                    <div class="auction-item-body">
                                        <div class="auction-item-image" style="background-image: url('<?= the_post_thumbnail_url() ?>')"></div>
                                        <div class="auction-item-description">
                                            <div class="auction-item-label">Описание:</div>
                                            <div class="auction-item-value"><?php the_content(); ?></div>
                                        </div>
                                    </div>
                                    <div class="auction-item-bottom">
                                        <div class="auction-item-price">
                                            <div class="auction-item-label">Начальная цена</div>
                                            <div class="auction-item-value"><?= $price ?></div>
                                        </div>
                                        <div class="auction-item-endorder">
                                            <div class="auction-item-label">Дата и время окончания подачи заявок</div>
                                            <div class="auction-item-value"><?= $date_order_end['date_time'] . ($date_order_end['desc'] ? ' ('.$date_order_end['desc'].')' : '') ?></div>
                                        </div>
                                        <div class="auction-item-region">
                                            <div class="auction-item-label">Город/Регион</div>
                                            <div class="auction-item-value"><?= $region ?></div>
                                        </div>

                                        <div class="auction-item-link button"><a target="_blank" href="<?= $link ?>" class="">Подробнее</a></div>
                                    </div>
                                </div>
                            <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                            echo 'Записи не найдены.';
                        endif;
                        ?>
                    </div>
                    <?php if ($query->found_posts > 4) : ?>
                    <button id="load-more" data-page="1">Показать еще</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
 
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loadMoreButton = document.getElementById('load-more');

            if (loadMoreButton) {
                loadMoreButton.addEventListener('click', function() {
                    const page = parseInt(loadMoreButton.getAttribute('data-page')) + 1;

                    fetch('/wp-admin/admin-ajax.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: `action=load_more_auctions&page=${page}`,
                    })
                        .then(response => response.text())
                        .then(data => {
                            if (data.trim() !== 'Записи закончились.') {
                                loadMoreButton.setAttribute('data-page', page);
                                document.querySelector('.auction-list').insertAdjacentHTML('beforeend', data);
                            } else {
                                loadMoreButton.disabled = true;
                                loadMoreButton.textContent = 'Записи закончились';
                            }
                        })
                        .catch(error => console.error('Ошибка:', error));
                });
            }
        });
    </script>
</main>
<?php get_footer(); // подключаем footer.php ?>
