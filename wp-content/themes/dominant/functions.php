<?php
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Основные настройки',
        'menu_title'	=> 'Доп. настройки темы',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false, // скрыть станицу и редирект на первую дочернюю, если поставить false - будет отображаться
        'update_button'		=> __('Сохранить', 'acf'),
        'updated_message'	=> __("Изменения сохранены", 'acf'),
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Контакты',
        'menu_title'	=> 'Контакты',
        'parent_slug'	=> 'theme-general-settings',
        'menu_slug'     => 'contacts-settings',
        'capability' => 'edit_posts',
        'update_button'		=> __('Сохранить', 'acf'),
        'updated_message'	=> __("Изменения сохранены", 'acf'),
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Сковзные блоки',
        'menu_title'	=> 'Сковзные блоки',
        'parent_slug'	=> 'theme-general-settings',
        'menu_slug'     => 'blocks-settings',
        'capability' => 'edit_posts',
        'update_button'		=> __('Сохранить', 'acf'),
        'updated_message'	=> __("Изменения сохранены", 'acf'),
    ));



}

/**
 * Удаление версий (?ver=) у стилей и скриптов
 */
function remove_css_js_version( $src ) {
    if ( strpos( $src, 'ver=' ) ) {
        $src = remove_query_arg( 'ver', $src );
    }
    return $src;
}




add_filter( 'style_loader_src', 'remove_css_js_version', 9999 );
add_filter( 'script_loader_src', 'remove_css_js_version', 9999 );


add_theme_support('title-tag'); // теперь тайтл управляется самим вп
add_theme_support( 'menus' );

register_nav_menus(array( // Регистрируем 2 меню
    'main'    => 'Основное', // Верхнее
    'footer1' => 'Меню в футере1', // Внизу
    'footer2' => 'Меню в футере2', // Внизу
    'footer3' => 'Меню в футере3', // Внизу
    'footer4' => 'Меню в футере4', // Внизу
    'footer5' => 'Меню в футере5', // Внизу
    
));

add_theme_support('post-thumbnails'); // включаем поддержку миниатюр
set_post_thumbnail_size(250, 150); // задаем размер миниатюрам 250x150
add_image_size('big-thumb', 400, 400, true); // добавляем еще один размер картинкам 400x400 с обрезкой


add_action('wp_footer', 'add_scripts'); // приклеем ф-ю на добавление скриптов в футер
if (!function_exists('add_scripts')) { // если ф-я уже есть в дочерней теме - нам не надо её определять
    function add_scripts() { // добавление скриптов
        if(is_admin()) return false; // если мы в админке - ничего не делаем
        //wp_deregister_script('jquery'); // выключаем стандартный jquery
        //wp_enqueue_script('jquery','//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js','','',true); // добавляем свой
        wp_localize_script('custom-script', 'ajax_params', array(
            'ajax_url' => admin_url('admin-ajax.php'),
        ));

        wp_enqueue_script('jquery');
        //wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap/bootstrap.min.js','','',true); // бутстрап
        wp_enqueue_script('owlcarousel', get_template_directory_uri().'/assets/js/owlcarousel/owl.carousel.min.js','','',true); // карусель для слайдера
        wp_enqueue_script('inputmask', get_template_directory_uri().'/assets/js/jquery.inputmask.min.js','','',true); // маска ввода
        wp_enqueue_script('main', get_template_directory_uri().'/assets/js/main.js','','',true); // и скрипты шаблона
    }
}

add_action('wp_print_styles', 'add_styles'); // приклеем ф-ю на добавление стилей в хедер
if (!function_exists('add_styles')) { // если ф-я уже есть в дочерней теме - нам не надо её определять
    function add_styles() { // добавление стилей
        if(is_admin()) return false; // если мы в админке - ничего не делаем
        wp_enqueue_style( 'bs', get_template_directory_uri().'/assets/css/bootstrap/bootstrap.min.css' ); // бутстрап
        wp_enqueue_style( 'main', get_template_directory_uri().'/assets/css/style.css' ); // основные стили шаблона
        wp_enqueue_style( 'responsive', get_template_directory_uri().'/assets/css/responsive.css' ); // mob стили темы
        wp_enqueue_style( 'owlcarousel', get_template_directory_uri().'/assets/js/owlcarousel/owl.carousel.min.css' ); // стили карусели для слайдера
    }
}

function my_print_r($var, $print = false){
    echo '<pre style="background: palegreen; padding: 10px">';
    print_r($var, $print);
    echo '</pre>';
}

function clear_phone($_phone){ // очищаем телефон перед тем как разместить его в ссылке
    if($_phone != ''){
        $_phone = str_replace([' ', '(', ')', '-'], '', strip_tags( $_phone ));
    }
    return $_phone;
}

function print_popup_form($_id_form, $_shortcode,  $_header_form){
    if($_shortcode){ ?>
        <div style="display:none" class="fancybox-hidden">
            <div id="<?=$_id_form?>">
                <div class="form_header"><?=$_header_form?></div>
                <?=do_shortcode($_shortcode);?>
            </div>
        </div>
    <?  }
}

function print_button($_id_form, $_text_button){
    if($_id_form && $_text_button){ ?>
        <a href="#<?=$_id_form?>" class="fancybox-inline"><?=$_text_button?></a>
    <?  }
}

function print_breadcrumbs(){
    ?>
    <div class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList" id="breadcrumbs">
        <?php
        if(function_exists('bcn_display'))
        {
            bcn_display();
        }
        ?>
    </div>
    <?php
}

add_action( 'wp_footer', 'metrika_goals' );
function metrika_goals() {
    /*
    ?>
    <script type="text/javascript">
        document.addEventListener( 'wpcf7mailsent', function( event ) {
            if ( '107' == event.detail.contactFormId ) {
                ym(21784879, 'reachGoal', 'zayavka-glavnaya');
                gtag('event', 'click', {
                    'event_category': 'Form',
                    'event_label': 'zayavkaglavnayabanner'
                });
            }
            if ( '52' == event.detail.contactFormId ) {
                gtag('event', 'click', {
                    'event_category': 'Form',
                    'event_label': 'zayavkanasvai'
                });
            }
            if ( '53' == event.detail.contactFormId ) {
                ym(21784879, 'reachGoal', 'call_me_back');
                gtag('event', 'click', {
                    'event_category': 'Form',
                    'event_label': 'ostavtezayavkuperezvonim'
                });
            }
        }, false );
        jQuery('a[href="/wp-content/uploads/2019/11/2019_03_01_price_nkt.xlsx"]').click(function(){
            ym(21784879, 'reachGoal', 'download_price_list');
        });
        jQuery('a[href="tel:+79655259975"]').click(function(){
            ym(21784879, 'reachGoal', 'clik_89655259975');
            gtag('event', 'click', {
                'event_category': 'Call',
                'event_label': 'clik89655259975'
            });
        });
        jQuery('a[href="tel:+73432667176"]').click(function(){
            ym(21784879, 'reachGoal', 'clik_83432667176');
            gtag('event', 'click', {
                'event_category': 'Call',
                'event_label': 'clik83432667176'
            });
        });
        jQuery('a[href^="mailto:"]').click(function(){
            gtag('event', 'click', {
                'event_category': 'Call',
                'event_label': 'clickemail'
            });
        });

    </script>
    <?php
    */
}




function get_taxonomy_tree( $taxonomy, $post_type, $args = [] ){

    // Проверка на обязательные параметры
    if ( empty( $taxonomy ) || empty( $post_type ) ) {
        return new WP_Error( 'missing_params', 'Необходимо указать таксономию и тип записи.' );
    }

    // Параметры для get_terms
    $term_args = wp_parse_args( $args['term_args'] ?? [], [
        'taxonomy'   => $taxonomy,
        'hide_empty' => false,
        'parent'     => 0, // Только корневые термины (верхний уровень)
    ] );


    // Получаем корневые термины
    $terms = get_terms( $term_args );

    if ( is_wp_error( $terms ) ) {
        return $terms; // Возвращаем ошибку, если get_terms вернул ошибку
    }

    $tree = [];

    foreach ( $terms as $term ) {
        $term_data = [
            'term'     => $term,
            'posts'    => get_posts( [  // Получаем посты для каждого термина
                'post_type'   => $post_type,
                'numberposts' => -1, // all posts
                'tax_query'   => [
                    [
                        'taxonomy' => $taxonomy,
                        'field'    => 'term_id',
                        'terms'    => $term->term_id,
                    ],
                ],
                ...wp_parse_args( $args['post_args'] ?? [], [] )
            ], ),

            'children' => get_taxonomy_tree( $taxonomy, $post_type, [ // Recursive call for children
                'term_args' => [
                    'parent' => $term->term_id,
                ],
                'post_args' => $args['post_args'] ?? []

            ] ),
        ];

        $tree[] = $term_data; // Add current term data to the tree
    }


    return $tree;
}

add_filter('wpcf7_autop_or_not', '__return_false');


// Обработчик AJAX для подгрузки записей
add_action('wp_ajax_load_more_auctions', 'load_more_auctions');
add_action('wp_ajax_nopriv_load_more_auctions', 'load_more_auctions');

function load_more_auctions() {
    $page = $_POST['page']; // Номер страницы
    $posts_per_page = 4;    // Количество записей для подгрузки

    $args = array(
        'post_type'      => 'auctions',
        'posts_per_page' => $posts_per_page,
        'post_status'    => 'publish',
        'paged'          => $page, // Указываем страницу
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            $type = get_field('');
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
                        <div class="info auction-item-label"><?=$type . ' | ' . $source . ' | ' . $lot?></div>
                        <div class="date auction-item-label"><?=get_the_date('d.m.Y');?></div>
                    </div>
                    <div class="auction-item-name"><?php the_title(); ?></div>
                    <div class="auction-item-status">
                        <div class="auction-item-label">Статус:</div>
                        <div class="auction-item-value <?=$status['value']?>"><?= $status['label'] ?></div>
                    </div>
                </div>
                <div class="auction-item-body">
                    <div class="auction-item-image" style="background-image: url('<?=the_post_thumbnail_url()?>')"></div>
                    <div class="auction-item-description">
                        <div class="auction-item-label">Описание:</div>
                        <div class="auction-item-value"><?php the_content(); ?></div>
                    </div>
                </div>
                <div class="auction-item-bottom">
                    <div class="auction-item-price">
                        <div class="auction-item-label">Начальная цена</div>
                        <div class="auction-item-value"><?=$price?></div>
                    </div>
                    <div class="auction-item-endorder">
                        <div class="auction-item-label">Дата и время окончания подачи заявок</div>
                        <div class="auction-item-value"><?=$date_order_end?></div>
                    </div>
                    <div class="auction-item-region">
                        <div class="auction-item-label">Город/Регион</div>
                        <div class="auction-item-value"><?=$region?></div>
                    </div>
                    <div class="auction-item-link button"><a target="_blank" href="<?=$link?>" class="">Подробнее</a></div>
                </div>
            </div>
        <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo 'Записи закончились.';
    endif;

    wp_die(); // Обязательно завершаем выполнение скрипта
}

if(WP_DEBUG){
    ## Какой шаблон используется в текущий момент
    add_filter( 'template_include', 'echo_cur_tplfile', 99 );
    function echo_cur_tplfile( $template ){
        echo '<span style="color:red">'. wp_basename( $template ) .'</span>';
        return $template;
    }
}
