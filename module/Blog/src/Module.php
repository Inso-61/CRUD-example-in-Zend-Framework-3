<?php
/**
 * Created by PhpStorm.
 * User: damie
 * Date: 08/08/2016
 * Time: 17:27
 */

namespace Blog;


class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}