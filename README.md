=== MO Cache ===

This plugin implements an object cache to prevent reading MO files for each page request.
CAUTION: This is an experimental module. Use it under your responsability.

== Getting Started ==

Just download and enable it. No configuration required. This module will make your page load fast only if you are managing your object cache with a permanent storage, redis and memcache are good tools for it.
Check:
 - https://wordpress.org/plugins/redis-cache/
 - https://wordpress.org/plugins/w3-total-cache/

For further documentation about object caching, check:
 - https://codex.wordpress.org/Class_Reference/WP_Object_Cache

== Development ==

Development of this plugin happens on github: https://github.com/netzstrategen/wordpress-mo-cache

== Changelog ==

= 1.1 =

* Fixed only one mo file is loaded per domain.
* Fixed mo cache items are not refreshed when files are changed.
* Removed superfluous code and loading of own string translations.
