<?php

/**
 * Overrides the default asset() method, which generates an asset path for the application.
 *
 * @param  string $path
 * @param  bool   $secure
 *
 * @return string
 */
function asset ($path, $secure = null) {
    if (Request::server('HTTP_X_FORWARDED_PROTO') == 'https' || Request::server('HTTPS') == 'on') {
        $secure = TRUE;
    }

    return app('url')->asset($path, $secure);
}