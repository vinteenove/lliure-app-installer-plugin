<?php

namespace Vimu\Composer\AppInstallerPlugin;

use Composer\Installer\InstallerInterface;
use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;

class AppInstaller extends LibraryInstaller implements InstallerInterface
{
    /**
     * @param PackageInterface $package
     * @return string
     */
    public function getInstallPath(PackageInterface $package)
    {
        return 'app';
    }

    /**
     * @param $packageType
     * @return bool
     */
    public function supports($packageType)
    {
        return "vimu-app" == $packageType;
    }
}
