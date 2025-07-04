<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1287e5b17d95591c4a4a41f1a76ef44f
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1287e5b17d95591c4a4a41f1a76ef44f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1287e5b17d95591c4a4a41f1a76ef44f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1287e5b17d95591c4a4a41f1a76ef44f::$classMap;

        }, null, ClassLoader::class);
    }
}
