<?php
/**
 * Страница архивов записей (archive.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
$term = get_queried_object();
// vars
$_category_h1 = get_field('category_h1', $term);
if(!$_category_h1){
    $_category_h1 = single_cat_title( '', 0 );
}
$_category_show_popup_button = get_field('category_show_popup_button', $term);
$_category_text_content = get_field('category_text_content', $term);
$_category_show_form = get_field('category_show_form', $term);
//$_category_show_products = get_field('category_show_products', $term); //TO DO доработать отображение листинга
get_header(); // подключаем header.php ?>
<section>
	<div class="container">
		<div class="row">

			<div class="<?php content_class_by_sidebar(); // функция подставит класс в зависимости от того есть ли сайдбар, лежит в functions.php ?>">
                <?=print_breadcrumbs();?>
                <?php
                if($_category_show_popup_button){
                    h1_with_button($_category_h1, '[contact-form-7 id="52" title="Оставить заявку (всплывающее окно)"]', 'popup_form1');
                }else{
                    ?><h1><?=$_category_h1?></h1><?
                }
                ?>
                <?if($_category_show_products){?>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp ?>
                        <?php get_template_part('loop'); // для отображения каждой записи берем шаблон loop.php ?>
                    <?php endwhile; // конец цикла
                    else: echo '<p>Нет записей.</p>'; endif; // если записей нет, напишим "простите" ?>
                    <?php pagination(); // пагинация, функция нах-ся в function.php ?>
                <?}?>
                <? if($_category_text_content){ ?>
                    <div class="category_text_content">
                        <?=$_category_text_content?>
                    </div>
                <? } ?>
                <? if($_category_show_form){ ?>
                    <div class="product_bottom_form row">
                        <div class="col-lg-3 hidden-xs"></div>
                        <div class="col-lg-6 col-xs-12">
                            <div class="form_header">Оставьте заявку и мы перезвоним вам</div>
                            <?=do_shortcode('[contact-form-7 id="53" title="Оставьте заявку и мы перезвоним вам"]')?>
                        </div>
                        <div class="col-lg-3 hidden-xs"></div>
                    </div>
                <? } ?>
			</div>
            <?php get_sidebar(); // подключаем sidebar.php ?>
		</div>
	</div>
</section>
<?php get_footer(); // подключаем footer.php ?>