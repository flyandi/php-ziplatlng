<?php

/**
 * flyandi:php-ziplatlng
 *
 * A simple and easy to use ZIP to Latitude/Longitude converter
 *
 * @version: v1.0.3
 * @author: Andy Schwarz
 *
 * Created by Andy Schwarz. Please report any bug at http://github.com/flyandi/php-ziplatlng
 *
 * Copyright (c) 2015 Andy Schwarz http://github.com/flyandi
 *
 * The MIT License (http://www.opensource.org/licenses/mit-license.php)
 *
 * Permission is hereby granted, free of charge, to any person
 * obtaining a copy of this software and associated documentation
 * files (the "Software"), to deal in the Software without
 * restriction, including without limitation the rights to use,
 * copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the
 * Software is furnished to do so, subject to the following
 * conditions:
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
 * OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 * OTHER DEALINGS IN THE SOFTWARE.
 */

/**
 * (Constants).
 */
define("ZIPLATLNG_DATABASE", dirname(__FILE__) . "/ziplatlng.txt");

/**
 * ZIPLatLng main function
 * @param [type] $zipCode [description]
 */
function ZIPLatLng($zipCode) {

    $handle = @fopen(ZIPLATLNG_DATABASE, "r");

    if ($handle) {
        while (($buffer = fgets($handle, 128)) !== false) {

            $parts = explode(",", $buffer);

            if(trim(@$parts[0]) == $zipCode) {

                fclose($handle);

                return (object) [
                    "zip" => trim(@$parts[0]),
                    "latitude" => trim(@$parts[1]),
                    "longitude" => trim(@$parts[2])
                ];
            }
        }

        fclose($handle);
    }

    return false;
}
