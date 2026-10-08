<?php
/**
 * Шаблон отдельной записи (single.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */

get_header(); // подключаем header.php
$text_blocks = get_field('text_blocks');
$work_conditions = get_field('work_conditions');
?>
<section class="section-vacancy-body">
    <div class="container">
        <div class="row">
            <div class="col">
                <?=print_breadcrumbs();?>
                <div class="section-title contacts-title"><h1><?php the_title() ?></h1></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="vacancy-body-left">
                <?foreach ($text_blocks as $text):?>
                    <div class="vacancy-text-block">
                        <div class="vacancy-text-header"><?=$text['header']?></div>
                        <div class="vacancy-text-body"><?=$text['text']?></div>
                    </div>
                <?endforeach;?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="vacancy-body-right">
                    <div class="vacancy-work-conditions-title">Условия работы</div>
                    <div class="vacancy-work-conditions">
                        <?if($work_conditions['filial']):?>
                        <div class="vacancy-work-condition">
                            <div class="vacancy-work-condition-label">Филиал:</div>
                            <div class="vacancy-work-condition-value"><?=$work_conditions['filial']?></div>
                        </div><br>
                        <?endif;?>
                        <?if($work_conditions['stage']):?>
                        <div class="vacancy-work-condition">
                            <div class="vacancy-work-condition-label">Опыт работы:</div>
                            <div class="vacancy-work-condition-value"><?=$work_conditions['stage']?></div>
                        </div><br>
                        <?endif;?>
                        <?if($work_conditions['work_time']):?>
                        <div class="vacancy-work-condition">
                            <div class="vacancy-work-condition-label">Занятость:</div>
                            <div class="vacancy-work-condition-value"><?=$work_conditions['work_time']?></div>
                        </div><br>
                        <?endif;?>
                        <?if($work_conditions['salary']):?>
                        <div class="vacancy-work-condition">
                            <div class="vacancy-work-condition-label">Зарплата:</div>
                            <div class="vacancy-work-condition-value"><?=$work_conditions['salary']?></div>
                        </div><br>
                        <?endif;?>
                        <?if($work_conditions['email']):?>
                        <div class="vacancy-work-condition">
                            <div class="vacancy-work-condition-label">Почта для связи:</div>
                            <div class="vacancy-work-condition-value"><a href="mailto:<?=$work_conditions['email']?>"><?=$work_conditions['email']?></a></div>
                        </div><br>
                        <?endif;?>
                        <?if($work_conditions['phone']):?>
                        <div class="vacancy-work-condition">
                            <div class="vacancy-work-condition-label">Телефон:</div>
                            <div class="vacancy-work-condition-value"><a href="tel:<?=clear_phone($work_conditions['phone'])?>"><?=$work_conditions['phone']?></a></div>
                        </div><br>
                        <?endif;?>
                    </div>
                </div>
            </div>
        </div>

</section>
<?php get_footer(); // подключаем footer.php ?>
