#!/bin/bash
##
# Example: Install the plugin and disable WooCommerce updates
##
set -e

WEB_ROOT=${WEB_ROOT:-/var/www/htdocs}
WP_CONTENT=${WP_CONTENT:-$WEB_ROOT/wp-content}

# Install the plugin under mu-plugins
echo "----> Installing the plugin..."
wget \
  -O $WP_CONTENT/mu-plugins/wp-disable-any-plugin-updates.php \
  https://raw.githubusercontent.com/anttiviljami/wp-disable-any-plugin-updates/master/wp-disable-any-plugin-updates.php


# Add configuration lines to wp-config to disable updates for WooCommerce
echo "----> Disabling updates for WooCommerce..."
grep "PLUGINS_DISABLED_FOR_UPDATE" $WEB_ROOT/wp-config.php &> /dev/null || sed -i "/That's all/i \
/** \n\
 * Disable updates for these plugins \n\
 */ \n\
define( 'PLUGINS_DISABLED_FOR_UPDATE', serialize( array( \n\
  'woocommerce/woocommerce.php', \n\
) ) );\n" $WEB_ROOT/wp-config.php

echo "----> Done!"

