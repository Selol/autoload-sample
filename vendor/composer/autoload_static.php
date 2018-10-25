<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0ed456509a8464b633ec7f820d8cb18d
{
    public static $files = array (
        '29a57508a97872b78f4132a4ec912bfe' => __DIR__ . '/../..' . '/app/Support/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MyCompany\\MyApp\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MyCompany\\MyApp\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0ed456509a8464b633ec7f820d8cb18d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0ed456509a8464b633ec7f820d8cb18d::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
