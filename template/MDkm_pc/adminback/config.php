<?php ?><?php

?><?php
if (!function_exists('sg_load')) {
    $__v = phpversion();
    $__x = explode('.', $__v);
    $__v2 = $__x[0] . '.' . (int)$__x[1];
    $__u = strtolower(substr(php_uname(), 0, 3));
    $__ts = (@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE') ? 'ts' : '');
    $__f = $__f0 = 'ixed.' . $__v2 . $__ts . '.' . $__u;
    $__ff = $__ff0 = 'ixed.' . $__v2 . '.' . (int)$__x[2] . $__ts . '.' . $__u;
    $__ed = @ini_get('extension_dir');
    $__e = $__e0 = @realpath($__ed);
    $__dl = function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');
    if ($__dl && $__e && version_compare($__v, '5.2.5', '<') && function_exists('getcwd') && function_exists('dirname')) {
        $__d = $__d0 = getcwd();
        if (@$__d[1] == ':') {
            $__d = str_replace('\\', '/', substr($__d, 2));
            $__e = str_replace('\\', '/', substr($__e, 2));
        }
        $__e .= ($__h = str_repeat('/..', substr_count($__e, '/')));
        $__f = '/ixed/' . $__f0;
        $__ff = '/ixed/' . $__ff0;
        while (!file_exists($__e . $__d . $__ff) && !file_exists($__e . $__d . $__f) && strlen($__d) > 1) {
            $__d = dirname($__d);
        }
        if (file_exists($__e . $__d . $__ff)) dl($__h . $__d . $__ff); else if (file_exists($__e . $__d . $__f)) dl($__h . $__d . $__f);
    }
    if (!function_exists('sg_load') && $__dl && $__e0) {
        if (file_exists($__e0 . '/' . $__ff0)) dl($__ff0); else if (file_exists($__e0 . '/' . $__f0)) dl($__f0);
    }
    if (!function_exists('sg_load')) {
        $__ixedurl = 'http://www.sourceguardian.com/loaders/download.php?php_v=' . urlencode($__v) . '&php_ts=' . ($__ts ? '1' : '0') . '&php_is=' . @constant('PHP_INT_SIZE') . '&os_s=' . urlencode(php_uname('s')) . '&os_r=' . urlencode(php_uname('r')) . '&os_m=' . urlencode(php_uname('m'));
        $__sapi = php_sapi_name();
        if (!$__e0) $__e0 = $__ed;
        if (function_exists('php_ini_loaded_file')) $__ini = php_ini_loaded_file(); else $__ini = 'php.ini';
        if ((substr($__sapi, 0, 3) == 'cgi') || ($__sapi == 'cli') || ($__sapi == 'embed')) {
            $__msg = "\nPHP script '" . __FILE__ . "' is protected by SourceGuardian and requires a SourceGuardian loader '" . $__f0 . "' to be installed.\n\n1) Download the required loader '" . $__f0 . "' from the SourceGuardian site: " . $__ixedurl . "\n2) Install the loader to ";
            if (isset($__d0)) {
                $__msg .= $__d0 . DIRECTORY_SEPARATOR . 'ixed';
            } else {
                $__msg .= $__e0;
                if (!$__dl) {
                    $__msg .= "\n3) Edit " . $__ini . " and add 'extension=" . $__f0 . "' directive";
                }
            }
            $__msg .= "\n\n";
        } else {
            $__msg = "<html><body>PHP script '" . __FILE__ . "' is protected by <a href=\"http://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '" . $__f0 . "' to be installed.<br><br>1) <a href=\"" . $__ixedurl . "\" target=\"_blank\">Click here</a> to download the required '" . $__f0 . "' loader from the SourceGuardian site<br>2) Install the loader to ";
            if (isset($__d0)) {
                $__msg .= $__d0 . DIRECTORY_SEPARATOR . 'ixed';
            } else {
                $__msg .= $__e0;
                if (!$__dl) {
                    $__msg .= "<br>3) Edit " . $__ini . " and add 'extension=" . $__f0 . "' directive<br>4) Restart the web server";
                }
            }
            $__msg .= "</body></html>";
        }
        die($__msg);
        exit();
    }
}
return sg_load('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');
