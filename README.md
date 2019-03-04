# MO Cache

This plugin implements an object cache to prevent reading MO files for each page request.
CAUTION: This is an experimental module. Use it under your responsability.

## Getting Started

Just download and enable it. No configuration required. This module will make your page load fast only if you are managing your object cache with a permanent storage, redis and memcache are good tools for it.
Check:
 - https://wordpress.org/plugins/redis-cache/
 - https://wordpress.org/plugins/w3-total-cache/

For further documentation about object caching, check:
 - https://codex.wordpress.org/Class_Reference/WP_Object_Cache

## How to update translations

This plugin will cache your translations for 1 day. If you update any translation in your site you should clear your cache to force the new translations to be loaded:
 - You can flush your cache with your favorite [cache plugin](https://www.hostinger.com/tutorials/wordpress/how-to-clear-wordpress-cache).
 - Use `wp-cli` to do it more granular with [`wp cache delete`](https://developer.wordpress.org/cli/commands/cache/delete/) flushing only `override_load_textdomain` group.
