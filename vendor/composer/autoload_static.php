<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4fb488f14143cc9d2c7a6dd2ef7d5072
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
            0 => __DIR__ . '/../..' . '/Application',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4fb488f14143cc9d2c7a6dd2ef7d5072::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4fb488f14143cc9d2c7a6dd2ef7d5072::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4fb488f14143cc9d2c7a6dd2ef7d5072::$classMap;

        }, null, ClassLoader::class);
    }
}
