<?php

namespace Vimu\Composer\AppInstallerPlugin;

use Composer\Installer\InstallerInterface;
use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;
use InvalidArgumentException;

class AppInstaller extends LibraryInstaller implements InstallerInterface
{
    /**
     * @param PackageInterface $package
     * @return string
     */
    public function getInstallPath(PackageInterface $package)
    {
        $extras = $package->getExtra();

        if (empty($extras['vimu']['app-path'])) {
            throw new InvalidArgumentException('Missing "extra": vimu > app-path');
        }

        if (!preg_match('/^[A-Z][a-zA-Z0-9\-_]*$/', $extras['vimu']['app-path'])) {
            throw new InvalidArgumentException('Invalid "extra" format: vimu>app-path; This MUST not include spacing or special characters.');
        }

        return 'app/'.$package->getPrettyName();
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
