<?php

namespace Vimu\Composer\AppInstallerPlugin;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class AppInstallerPlugin implements PluginInterface
{
    /**
     * @param Composer $composer
     * @param IOInterface $io
     * @return void
     */
    public function activate(Composer $composer, IOInterface $io)
    {
        $installer = new AppInstaller($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }
}
