<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd156f13018eb4b492c8a127d3e6e13eb
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'EasyRdf\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'EasyRdf\\' => 
        array (
            0 => __DIR__ . '/..' . '/easyrdf/easyrdf/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd156f13018eb4b492c8a127d3e6e13eb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd156f13018eb4b492c8a127d3e6e13eb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd156f13018eb4b492c8a127d3e6e13eb::$classMap;

        }, null, ClassLoader::class);
    }
}
