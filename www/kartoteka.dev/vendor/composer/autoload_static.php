<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd662e6fce2972a5498822068032667aa
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

    public static $classMap = array (
        'App\\Connector' => __DIR__ . '/../..' . '/app/Connector.php',
        'App\\Film' => __DIR__ . '/../..' . '/app/Film.php',
        'App\\Services\\Router' => __DIR__ . '/../..' . '/app/Services/Router.php',
        'App\\Shell' => __DIR__ . '/../..' . '/app/Shell.php',
        'App\\Test' => __DIR__ . '/../..' . '/app/Test.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd662e6fce2972a5498822068032667aa::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd662e6fce2972a5498822068032667aa::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd662e6fce2972a5498822068032667aa::$classMap;

        }, null, ClassLoader::class);
    }
}