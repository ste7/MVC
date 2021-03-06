<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit224b7363b8563c00f408bc03e40685e2
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit224b7363b8563c00f408bc03e40685e2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit224b7363b8563c00f408bc03e40685e2::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
