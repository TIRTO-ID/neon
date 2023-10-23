<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit067b85bce91bfefdf9371c538c32bad9
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Tirtoid\\Neon\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Tirtoid\\Neon\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit067b85bce91bfefdf9371c538c32bad9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit067b85bce91bfefdf9371c538c32bad9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit067b85bce91bfefdf9371c538c32bad9::$classMap;

        }, null, ClassLoader::class);
    }
}
