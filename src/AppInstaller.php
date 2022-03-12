<?php

namespace Lliure\Composer\AppInstallerPlugin;

use Composer\Installer\InstallerInterface;
use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;
use InvalidArgumentException;

class AppInstaller extends LibraryInstaller implements InstallerInterface
{
    private const PATH_MAP = [
        'lliure-app' => 'app',
        'lliure-opt' => 'opt',
        'lliure-api' => 'api'
    ];

    /**
     * @param PackageInterface $package
     * @return string
     */
    public function getInstallPath(PackageInterface $package)
    {
        $extras = $package->getExtra();

        if (empty($extras['lliure']['targetPath'])) {
            throw new InvalidArgumentException('Missing "extra": lliure > targetPath');
        }

        if (!preg_match('/^[A-Z][a-zA-Z0-9\-_]*$/', $extras['lliure']['targetPath'])) {
            throw new InvalidArgumentException('Invalid "extra" format: lliure > targetPath; This MUST not include spacing or special characters. Also MUST start with uppercase character (non-numeric)');
        }

        return self::PATH_MAP[$package->getType()].'/'.$extras['lliure']['targetPath'];
    }

    /**
     * @param $packageType
     * @return bool
     */
    public function supports($packageType)
    {
        return in_array($packageType, array_keys(self::PATH_MAP));
    }
}
