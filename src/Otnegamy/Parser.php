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

use \Otnegamy\Exception;

/**
 * Description of Parser
 *
 * @category  Otnegamy 
 * @package   Otnegamy
 * @author    David Buros <david.buros@gmail.fr> 
 * @copyright 2013-2013 David Buros.
 * @license   New BSD License
 * @link      https://github.com/lanfisis/otnegamy
 */
class Parser
{
    public function __construct($path) 
    {
        if (!is_string($path) or !is_dir($path)) {
            throw new Exception('This module directory not seem to exist !');
        }
        if (!file_exists(rtrim($path, '/').'/etc/config.xml')) {
            throw new Exception('This directory does not seem to be a Magento module !');
        }
    }
}
