<?php
if(have_posts()):
        while(have_posts()):the_post();
                the_title(); // imprime el título del post
                echo 'title en index';
                the_permalink(); // imprime el enlace al post
                the_excerpt(); // imprime el resumen post
                the_time(); // imprime la hora post
                the_time(get_option('date_format')); // imprime la fecha del post
                the_category(', '); // imprime las categorías del post separadas por comas con espacio

        endwhile;
else:
        echo '<h3>'. _e('no hay posts', 'apk'). '</h3>';
        get_search_form();
endif;

if(get_next_posts_link() || get_previous_posts_link()):
        previous_posts_link(__('previos','apk'));
        next_posts_link(__('recientes','apk'));
endif;
