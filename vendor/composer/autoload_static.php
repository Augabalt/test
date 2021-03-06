<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd2d0a3416937017e7d95df90ad2e048e
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
            0 => __DIR__ . '/../..' . '/app/classes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd2d0a3416937017e7d95df90ad2e048e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd2d0a3416937017e7d95df90ad2e048e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd2d0a3416937017e7d95df90ad2e048e::$classMap;

        }, null, ClassLoader::class);
    }
}
