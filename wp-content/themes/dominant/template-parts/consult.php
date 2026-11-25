    <?
$phone      = get_field('phone', 'options');
$email      = get_field('email', 'options');
$social     = get_field('social', 'options');
$max_url = (is_array($social) && !empty($social['wa'])) ? $social['wa'] : '';
$tg_url = (is_array($social) && !empty($social['tg'])) ? $social['tg'] : '';
?>
    <div class="container">
        <section class="consult-form">
            <div class="row">
                <div class="col-xs-12 col-sm-8">
                    <div class="section-title service-title">
                        Получить консультацию
                    </div>
                    После получения заявки с вами свяжется <br>наш специалист для уточнения подробностей


 <div class="main-banner-contacts">
                                    <div class="main-banner-contacts-title">Связаться с нами</div>
                                    <div class="main-banner-contacts-buttons">
                                    
                                        <?php if ($max_url): ?>
                                        <a class="contact-pill contact-pill-fill" href="<?= esc_url($max_url) ?>" target="_blank" rel="noopener">
                                           <img src="<?= get_template_directory_uri() ?>/assets/images/max-header.svg"  alt="Max">
                                            Max
                                        </a>
                                        <?php endif; ?>
                                        <?php if ($tg_url): ?>
                                        <a class="contact-pill contact-pill-fill" href="<?= esc_url($tg_url) ?>" target="_blank" rel="noopener">
                                            <img src="<?= get_template_directory_uri() ?>/assets/images/tg-header.svg"  alt="Telegram">
                                            Telegram
                                        </a>
                                        <?php endif; ?>
                                        <?php if ($phone): ?>
                                        <a class="contact-pill contact-pill-outline" href="tel:<?= esc_attr(clear_phone($phone)) ?>">
                                            <img src="<?= get_template_directory_uri() ?>/assets/images/phone2.svg"  alt="Phone">
                                            <?= esc_html($phone) ?>
                                        </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                </div>

                </div>
             
    
                    </div>
        </section>
    </div>
