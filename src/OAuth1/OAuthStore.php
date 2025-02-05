<?php

namespace OAuth1;

/**
 * Storage container for the oauth credentials, both server and consumer side.
 * This is the factory to select the store you want to use
 *
 * @version $Id: OAuthStore.php 67 2010-01-12 18:42:04Z brunobg@corollarium.com $
 * @author Marc Worrell <marcw@pobox.com>
 * @date  Nov 16, 2007 4:03:30 PM
 *
 *
 * The MIT License
 *
 * Copyright (c) 2007-2008 Mediamatic Lab
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
class OAuthStore
{
    private static $instance;

    /**
     * Request an instance of the OAuthStore
     */
    public static function instance($store = 'MySQLi', $options = array())
    {
        if (!self::$instance) {
            // Select the store you want to use
            if (strpos($store, '/') === false) {
                $class = 'OAuth1\\store\\OAuthStore' . $store;
                $file = __DIR__ . '/store/' . $class . '.php';
            } else {
                $file = $store;
                $store = basename($file, '.php');
                $class = $store;
            }

            self::$instance = new $class($options);
        }
        return self::$instance;
    }
}

/* vi:set ts=4 sts=4 sw=4 binary noeol: */
