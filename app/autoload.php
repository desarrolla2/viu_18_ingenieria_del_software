<?php

/*
 * This file is part of the devtia package
 *
 * Copyright (c) 2016-2020 Daniel González
 * All right reserved
 *
 * @author Daniel González <daniel@devtia.com>
 */

use Composer\Autoload\ClassLoader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Symfony\Component\VarDumper\VarDumper;

/**
 * @var ClassLoader $loader
 */
$loader = require __DIR__.'/../vendor/autoload.php';

AnnotationRegistry::registerLoader([$loader, 'loadClass']);

function ldd()
{
    dump(func_get_args());
    die();
}

function ld()
{
    dump(func_get_args());
}

if (!function_exists('dump')) {
    function dump()
    {
        foreach (func_get_args() as $var) {
            VarDumper::dump($var);
        }
    }
}

return $loader;
