<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit17edaa9e5c6e682312c03c75bc6cc5cd
{
    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/src',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->fallbackDirsPsr4 = ComposerStaticInit17edaa9e5c6e682312c03c75bc6cc5cd::$fallbackDirsPsr4;

        }, null, ClassLoader::class);
    }
}
