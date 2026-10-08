<?php
/**
 * Шаблон отдельной записи (single.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */

get_header(); // подключаем header.php ?>
<section>
	<div class="container">
		<div class="row">

			<div class="<?php content_class_by_sidebar(); // функция подставит класс в зависимости от того есть ли сайдбар, лежит в functions.php ?>">
				<?=print_breadcrumbs();?>
                <?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <?php // контэйнер с классами и id ?>
                        <?php
                        $_product_h1 = get_field('product_h1');
                        if(!$_product_h1){
                            $_product_h1 = get_the_title();
                        }
                        $_product_price = get_field('product_price');

                        $_product_files = get_field('product_files');

                        $_product_show_form = get_field('product_show_form');
                        $_product_show_popup_button = get_field('product_show_popup_button');

                        if($_product_show_popup_button){
                            h1_with_button($_product_h1, '[contact-form-7 id="52" title="Оставить заявку (всплывающее окно)"]', 'popup_form1');
                        }else{
                            ?><h1><?=$_product_h1?></h1><?
                        }
                        ?>
                        <?php if ( $_product_price ) { ?>
                        <div class="product_info">
                            <div class="product_image col-sm-6 col-xs-12">
                                <?php if ( has_post_thumbnail() ) {  the_post_thumbnail($post->ID, 'full');  } ?>
                            </div>
                            <div class="product_price col-sm-6 col-xs-12">
                                <div class="product_price_value"><?=$_product_price?> ₽/шт.</div>
                                <a href="#orderform" class="product_price_button fancybox-inline btn btn-primary btn-block btn-primary-custom btn-rounded" onclick="jQuery('#product_name').val(jQuery('h1').text());">Заказать</a>
                                <?=print_popup_form('orderform', '[contact-form-7 id="735" title="Заказать (всплывающее окно)"]', 'Заказать')?>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="product_content" style="width: 100%">
                            <?php the_content(); // контент ?>
                        </div>
                        <?php
                        if($_product_show_form){
                            ?>
                            <div class="product_bottom_form row">
                                <div class="col-lg-3 hidden-xs"></div>
                                <div class="col-lg-6 col-xs-12">
                                    <div class="form_header">Оставьте заявку и мы перезвоним вам</div>
                                        <?=do_shortcode('[contact-form-7 id="53" title="Оставьте заявку и мы перезвоним вам"]')?>
                                    </div>
                                <div class="col-lg-3 hidden-xs"></div>
                            </div>
                            <?
                        }

                        if($_product_files){
                        ?>
                        <div class="row">
                            <div class="product_files_block col-lg-12">
                                <div class="product_files_block_header h2">Файлы для скачивания</div>
                                <ul>
                                <?php
                                foreach($_product_files as $_file){
                                    $_link = $_file['product_file']['url'];
                                    $_file_header = $_file['product_file_header'];
                                    $_file_size = size_format($_file['product_file']['filesize'], 1);
                                    ?>
                                    <li><a href="<?=$_link?>"><?=$_file_header?></a> (<?=$_file_size?>)</li>
                                    <?
                                }
                                ?>
                                </ul>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
					</article>
				<?php endwhile; // конец цикла ?>
				<?php previous_post_link('%link', '<- Предыдущий пост: %title', TRUE); // ссылка на предыдущий пост ?> 
				<?php next_post_link('%link', 'Следующий пост: %title ->', TRUE); // ссылка на следующий пост ?> 
				<?php if (comments_open() || get_comments_number()) comments_template('', true); // если комментирование открыто - мы покажем список комментариев и форму, если закрыто, но кол-во комментов > 0 - покажем только список комментариев ?>
			</div>
            <?php get_sidebar(); // подключаем sidebar.php ?>
		</div>
	</div>
</section>
<?php get_footer(); // подключаем footer.php ?>
