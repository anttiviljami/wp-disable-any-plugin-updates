# WP Disable Any Plugin Updates
[![Latest Stable Version](https://poser.pugx.org/anttiviljami/wp-disable-any-plugin-updates/v/stable)](https://packagist.org/packages/anttiviljami/wp-disable-any-plugin-updates) [![Total Downloads](https://poser.pugx.org/anttiviljami/wp-disable-any-plugin-updates/downloads)](https://packagist.org/packages/anttiviljami/wp-disable-any-plugin-updates) [![Latest Unstable Version](https://poser.pugx.org/anttiviljami/wp-disable-any-plugin-updates/v/unstable)](https://packagist.org/packages/anttiviljami/wp-disable-any-plugin-updates) [![License](https://poser.pugx.org/anttiviljami/wp-disable-any-plugin-updates/license)](https://packagist.org/packages/anttiviljami/wp-disable-any-plugin-updates)

Disables updates for a list of plugins permanently without editing them

Just add these lines to your wp-config to disable updates for these plugins:

```
/**
 * Disable updates for these plugins
 */
define( 'DISABLED_PLUGINS', serialize( array(
  'jetpack/jetpack.php',
  'woocommerce/woocommerce.php',
) ) );
```

## Installation

### The Composer Way (preferred)

Install the plugin via [Composer](https://getcomposer.org/)
```
composer require anttiviljami/wp-disable-any-plugin-updates
```

Activate the plugin
```
wp plugin activate wp-disable-any-plugin-updates
```

