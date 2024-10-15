<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfe5594ecd0cbb42f2d661be8223480d8
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Config\\' => 7,
        ),
        'A' => 
        array (
            'AP34\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Config\\' => 
        array (
            0 => __DIR__ . '/../..' . '/config',
        ),
        'AP34\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitfe5594ecd0cbb42f2d661be8223480d8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfe5594ecd0cbb42f2d661be8223480d8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfe5594ecd0cbb42f2d661be8223480d8::$classMap;

        }, null, ClassLoader::class);
    }
}
