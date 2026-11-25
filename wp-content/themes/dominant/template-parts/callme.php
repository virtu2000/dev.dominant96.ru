<?
$phone      = get_field('phone', 'options');
$email      = get_field('email', 'options');
$social     = get_field('social', 'options');
$max_url = (is_array($social) && !empty($social['wa'])) ? $social['wa'] : '';
$tg_url = (is_array($social) && !empty($social['tg'])) ? $social['tg'] : '';
?>
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
                                        <?php if ($phone): ?>
                                        <a class="contact-pill contact-pill-outline" href="tel:<?= esc_attr(clear_phone($phone)) ?>">
                                            <img src="<?= get_template_directory_uri() ?>/assets/images/phone.svg"  alt="Phone">
                                            <?= esc_html($phone) ?>
                                        </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                </div>
