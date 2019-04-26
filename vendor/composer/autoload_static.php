<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite8495388fcb254a7e17a322ee7bd8ca5
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'model\\' => 6,
        ),
        'c' => 
        array (
            'controller\\' => 11,
        ),
        'T' => 
        array (
            'Twig\\' => 5,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Ctype\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/model',
        ),
        'controller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controller',
        ),
        'Twig\\' => 
        array (
            0 => __DIR__ . '/..' . '/twig/twig/src',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
    );

    public static $prefixesPsr0 = array (
        'T' => 
        array (
            'Twig_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/twig/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite8495388fcb254a7e17a322ee7bd8ca5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite8495388fcb254a7e17a322ee7bd8ca5::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInite8495388fcb254a7e17a322ee7bd8ca5::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
