<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3bcef11590547d96d09953cbee559bc4
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
            0 => __DIR__ . '/../..' . '/inc/class',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3bcef11590547d96d09953cbee559bc4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3bcef11590547d96d09953cbee559bc4::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
