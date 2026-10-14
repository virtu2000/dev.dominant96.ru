<?php

get_header(); // подключаем header.php

if ( $post->post_parent ) {
    // Подключаем отдельный файл шаблона для подуслуг из папки template-parts/
  get_template_part( 'template-parts/content', 'child-service' );
} else {
    // Подключаем шаблон для главных (родительских) услуг
  get_template_part( 'template-parts/content', 'parent-service' );
}


 get_footer(); // подключаем footer.php ?>
