<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dominant
 */

$org_name   = get_field('org_name', 'options');
$work_time  = get_field('work_time', 'options');
$phones      = get_field('phones', 'options');
$email      = get_field('email', 'options');
$address    = get_field('address', 'options');
$social     = get_field('social', 'options');
$map        = get_field('map', 'options');
$logo       = get_field('logo_footer', 'options');
$copyright   = get_field('copyright', 'options');
$phone      = get_field('phone', 'options');
$email      = get_field('email', 'options');
$address    = get_field('address', 'options');
$social     = get_field('social', 'options');
$max_url = (is_array($social) && !empty($social['wa'])) ? $social['wa'] : '';
$tg_url = (is_array($social) && !empty($social['tg'])) ? $social['tg'] : '';

$button_block = get_field('button_block', 'options');

$hide_blocks = get_field('hide_blocks');
if(!$hide_blocks){
    $reviews = get_field('reviews', 'options');
    $advantages = get_field('advantages', 'options');
}
global $post;
$blog_items = get_posts( array(
    'numberposts' => 3,
    //'category'    => $cat_id_arr,
    'orderby'     => 'date',
    //'order'       => 'DESC',
    'include'     => array(),
    'exclude'     => array($post->ID),
    'meta_key'    => '',
    'meta_value'  =>'',
    'post_type'   => 'post',
    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
) );
?>
<?php if(!$hide_blocks): ?>
 

<?php endif; ?>
	<footer id="footer" class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="footer-row">
                        <div class="footer-logo">
                      <div class="row">
                        <div class="col">
                               <div> <img src="<?=$logo?>" alt=""></div>
                                <div><?=get_the_privacy_policy_link()?></div>
                        </div>
                        <div class="col">
                                        <div class="main-banner-contacts">
                                    <div class="main-banner-contacts-title">Связаться с нами</div>
                                    <div class="main-banner-contacts-buttons">         
                              
                                        <?php if ($max_url): ?>
                                        <a class="contact-pill contact-pill-fill" href="<?= esc_url($max_url) ?>" target="_blank" rel="noopener">
                                           <img src="<?= get_template_directory_uri() ?>/assets/images/max-hero.svg"  alt="Max">
                                            Max
                                        </a>
                                        <?php endif; ?>
                                        <?php if ($tg_url): ?>
                                        <a class="contact-pill contact-pill-fill" href="<?= esc_url($tg_url) ?>" target="_blank" rel="noopener">
                                            <img src="<?= get_template_directory_uri() ?>/assets/images/tg-hero.svg"  alt="Telegram">
                                            Telegram
                                        </a>
                                        <?php endif; ?>
                                                     </div>
                        </div> 
                        </div>
                             
                        </div>
                        </div> 
                        </div>
                    </div>
                        <div class="footer-row">
                        <div class="footer-addr">
                            
                            <div class="footer-col-content">
                                <div class="addr">
                                    <div class="row">
                                    <div class="col-1">
                                    <img src="<?=get_template_directory_uri() . '/assets/images/icons/geo.svg'?>" alt="Адрес"/>
                                    </div>
                                    <div class="col">
                                    <?=$address['postal_code'] .', '. $address['city'] .', '. $address['addr'] ?>
                                    </div>
                                    </div>
                                </div>
                                
                            </div>

                        </div>

                        <div class="worktime">
                        <div class="footer-col-content">
                                  <div class="row">
                                    <div class="col-1">
                                    <img src="<?=get_template_directory_uri() . '/assets/images/icons/time_black.svg'?>" alt="Время работы"/>
                                    </div>
                                    <div class="col">
                                    <?=$work_time?>
                            </div>            
                            </div>
                            </div>
                        </div>

                        <div class="footer-phone">
                            
                            <div class="footer-col-content">
                                <div class="row">
                                    <div class="col-1">
                                    <img src="<?=get_template_directory_uri() . '/assets/images/icons/phone_black.svg'?>" alt="Телефон">
                                    </div>
                                    <div class="col">
                                    <? foreach($phones as $phone): ?>
                                    <div class="phone">
                                    <a href="tel:<?=clear_phone($phone['phone']) ?>"><?=$phone['phone'] ?></a>
                                    </div>
                                        <? endforeach; ?>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                        <div class="footer-email">
                            
                            <div class="footer-col-content">
                                <div class="email">
                                    <img src="<?=get_template_directory_uri() . '/assets/images/icons/mail_black.svg'?>" alt="E-mail">
                                    <a href="mailto:<?=$email ?>"><?=$email ?></a>
                                </div>

                            </div>
                        </div>
                     
                    </div>
                    <div class="footer-row">
           

                    <div class="footer-menu-1">
                            <div class="footer-col-title">
                                Взыскание задолженностей
                            </div>
                            <div class="footer-col-content">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'footer3',
                                        'menu_id'        => 'footer3-menu',
                                    )
                                );
                                ?>
                            </div>
                        </div>

                        <div class="footer-menu-2">
                            <div class="footer-col-title">
                                Банкротство
                            </div>
                            <div class="footer-col-content">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'footer2',
                                        'menu_id'        => 'footer2-menu',
                                    )
                                );
                                ?>
                            </div>
                        </div>
                        
                        <div class="footer-menu-3">
                             <div class="footer-col-title">
                                Услуги в сфере недвижимости
                            </div>
                            <div class="footer-col-content">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'footer5',
                                        'menu_id'        => 'footer5-menu',
                                    )
                                );
                                ?>
                            </div>
                            <div class="footer-col-title">
                                Разрешение споров
                            </div>
                            <div class="footer-col-content">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'footer4',
                                        'menu_id'        => 'footer4-menu',
                                    )
                                );
                                ?>
                            </div>
                        </div>
                        <div class="footer-menu-4">
                            <div class="footer-col-title">
                                Компания
                            </div>
                            <div class="footer-col-content">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'footer1',
                                        'menu_id'        => 'footer1-menu',
                                    )
                                );
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<div class="popup" id="recall">
    <div class="popup-content">
        <span class="close-popup-btn"><img src="<?=get_template_directory_uri() . '/assets/images/icons/close2.svg'?>" alt="Закрыть"></span>
        <div class="popup-form">
            <div class="popup-form-header">Оставить заявку</div>
            <div class="popup-form-wrapper"><?=do_shortcode('[contact-form-7 id="9724a77"]')?></div>
            <div class="popup-form-success">
                <div class="popup-form-success-inner">
                    <div class="popup-form-success-title">Спасибо за ваше сообщение!</div>
                    <div class="popup-form-success-body">Наш специалист свяжется <br>с Вами в ближайшее время.</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup" id="consult">
    <div class="popup-content">
        <span class="close-popup-btn"><img src="<?=get_template_directory_uri() . '/assets/images/icons/close2.svg'?>" alt="Закрыть"></span>
        <div class="popup-form">

            <div class="popup-form-wrapper"><?=do_shortcode('[contact-form-7 id="d3d7718"]')?></div>
            <div class="popup-form-success">
                <div class="popup-form-success-inner">
                    <div class="popup-form-success-title">Спасибо за ваше сообщение!</div>
                    <div class="popup-form-success-body">Наш специалист свяжется <br>с Вами в ближайшее время.</div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
