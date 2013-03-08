<?php

/**
 * This file is part of the Otnegamy package.
 *
 * Copyright (c)  David Buros <david.buros@gmail.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * PHP version >=5.3
 * 
 * @category  Otnegamy 
 * @package   Otnegamy
 * @author    David Buros <david.buros@gmail.fr> 
 * @copyright 2013-2013 David Buros.
 * @license   New BSD License
 * @link      https://github.com/lanfisis/otnegamy
 */

namespace Otnegamy;

/**
 * Exception for Otnegamy
 *
 * @category  Otnegamy 
 * @package   Otnegamy
 * @author    David Buros <david.buros@gmail.fr> 
 * @copyright 2013-2013 David Buros.
 * @license   New BSD License
 * @link      https://github.com/lanfisis/otnegamy
 */
class Exception extends \Exception
{
    /**
     * TThis function allows you to turn a warning into an exception.
     * Use for DOMDocument::loadXML
     * 
     * @param int    $errno   Level of the error
     * @param string $errstr  Error message
     * @param string $errfile Filename that the error was raised
     * @param int    $errline Line number the error was raised at
     * 
     * @return void
     * @throws self
     */
    public function throwConfigException($errno, $errstr, $errfile, $errline)
    {
        if ($errno == E_WARNING) {
            throw new self('This is not a Magento module config file !');
            //throw new \DOMException($errstr);
        }  
    }
}
