<?php ?><?php
/* 更多精品源码百度搜索：新源代源码，xydai.cn */
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
