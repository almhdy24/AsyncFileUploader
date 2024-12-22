<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd5b9cec75f3122a4b7e5c2c6410fdf90
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'AsyncFileUploader\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'AsyncFileUploader\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd5b9cec75f3122a4b7e5c2c6410fdf90::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd5b9cec75f3122a4b7e5c2c6410fdf90::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd5b9cec75f3122a4b7e5c2c6410fdf90::$classMap;

        }, null, ClassLoader::class);
    }
}