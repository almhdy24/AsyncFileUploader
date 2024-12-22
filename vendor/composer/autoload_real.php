<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitd5b9cec75f3122a4b7e5c2c6410fdf90
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitd5b9cec75f3122a4b7e5c2c6410fdf90', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitd5b9cec75f3122a4b7e5c2c6410fdf90', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitd5b9cec75f3122a4b7e5c2c6410fdf90::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}