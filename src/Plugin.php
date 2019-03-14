<?php

namespace Netzstrategen\MoCache;

/**
 * Main caching functionality.
 */
class Plugin {

  /**
   * Prefix for naming.
   *
   * @var string
   */
  const PREFIX = 'mo-cache';

  /**
   * Gettext localization domain.
   *
   * @var string
   */
  const L10N = self::PREFIX;

  /**
   * Overrides the textdomain loading to implement a object cache for it.
   *
   * This code is borrowed from wp-includes/l10n.php:load_textdomain().
   * Unfortunately is not hookable enough so there is no chance to implement it
   * in a most proper way.
   *
   * @see load_textdomain()
   *
   * @return bool TRUE
   *   Always return true to force the override.
   */
  public static function override_load_textdomain($override, $domain, $mofile) {
    global $l10n, $l10n_unloaded;
    $l10n_unloaded = (array) $l10n_unloaded;

    $l10n_domain = \wp_cache_get($domain, __FUNCTION__);

    if ($l10n_domain !== FALSE) {
      $l10n[$domain] = $l10n_domain;
      return TRUE;
    }

    \do_action('load_textdomain', $domain, $mofile);
    $mofile = \apply_filters('load_textdomain_mofile', $mofile, $domain);

    if (!is_readable($mofile)) {
      return FALSE;
    }

    $mo = new \MO();
    if (!$mo->import_from_file($mofile)) {
      return FALSE;
    }

    if (isset($l10n[$domain])) {
      $mo->merge_with($l10n[$domain]);
    }

    unset($l10n_unloaded[$domain]);
    $l10n[$domain] = &$mo;

    \wp_cache_set($domain, $mo, __FUNCTION__, time() + 24 * 60 * 60);

    return TRUE;
  }

}
