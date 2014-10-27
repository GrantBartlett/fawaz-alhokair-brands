<?php

/**
 * Author:      Grant Bartlett
 * Author URI:  http://grant-bartlett.com
 * License:     GPLv2+
 */


/**
 * @param $content
 * @return string
 */

    echo "</div>"; // END CONTAINER
echo "</div>"; // END WRAP

function copyright( $content ) {
    $overwrite = $content = "<div class='smswmedia-copyright'><p class='alignleft'><a href='http://smswmedia.com' title='SMSW Media' target='_blank'><img src='".FAWAZBRANDS_URL."admin/images/smswmedia.png'></a></p></div>";
    return $overwrite;
}

add_action('admin_footer_text', 'copyright');
