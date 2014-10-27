<?php

/**
 * Author:      Grant Bartlett
 * Author URI:  http://grant-bartlett.com
 * License:     GPLv2+
 */


ob_start();?>
<div class="wrap">
    <div class="container">
        <div class="header">
            <img src="<?php echo FAWAZBRANDS_URL ?>admin/images/alhokairfashion.png">

            <div class="mt-20">
                <ul class="brand-stats">
                    <li><span id="js_total_brands" class="figure"><?php $total_brands = get_option( 'fawazbrands_settings_total', $default ); echo $total_brands['total_brands'];?></span> brands</li>
                    <li><span id="js_total_stores" class="figure"><?php $total_stores = get_option( 'fawazbrands_settings_total', $default ); echo $total_stores['total_stores']; ?></span> stores</li>
                    <li>based in <span id="js_total_countries" class="figure"><?php $total_countries = get_option( 'fawazbrands_settings_total', $default ); echo $total_countries['total_countries']; ?></span> countries</li>
                </ul>
            </div>

        </div>

        <?php echo ob_get_clean();