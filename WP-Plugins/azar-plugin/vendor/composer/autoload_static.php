<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0aef1e2d026c8d3f240c6d0784e27173
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Inc\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0aef1e2d026c8d3f240c6d0784e27173::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0aef1e2d026c8d3f240c6d0784e27173::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0aef1e2d026c8d3f240c6d0784e27173::$classMap;

        }, null, ClassLoader::class);
    }
}
