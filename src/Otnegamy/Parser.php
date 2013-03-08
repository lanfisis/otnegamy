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
    /**
     * Config as xml document
     * 
     * @var DOMDocument 
     */
    protected $config;
    
    /**
     * Build a parsr obejct to work with
     * 
     * @param string $path Absolute path of the Magento module to parse
     * 
     * @return void
     */
    public function __construct($path) 
    {
        if ($this->isMagentoModule($path)) {
            $this->config = $this->loadConfig(rtrim($path, '/').'/etc/config.xml');
        }
    }
    
    /**
     * Check that it is a Magento module ie. there is a config file.
     * 
     * @param string $path Absolute path of the module
     * 
     * @return boolean
     * @throws \Otnegamy\Exception
     */
    public function isMagentoModule($path)
    {
        if (!is_string($path) or !is_dir($path)) {
            throw new Exception('This module directory not seem to exist !');
        }
        if (!file_exists(rtrim($path, '/').'/etc/config.xml')) {
            throw new Exception('This directory does not seem to be a Magento module !');
        }
        return true;
    }
    
    /**
     * Try to load a Mageto module config file.
     * 
     * @param path $config Absolute path to a Mageno module config file 
     * 
     * @return \DOMDocument
     */
    public function loadConfig($config)
    {
        set_error_handler(array('\Otnegamy\Exception', 'throwConfigException'));
        $dom = new \DOMDocument();
        $dom->load($config);    
        restore_error_handler();
        return $dom;
    }
}
