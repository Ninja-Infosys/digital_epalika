<?php

namespace App\Helper\Installer;

class RequirementsChecker
{

    private string $_minPhpVersion = '8.0';

    /**
     * Check for the server requirements.
     *
     * @param array $requirements
     * @return array
     */
    public function check(array $requirements): array
    {
        $results = [];

        foreach($requirements as $requirement)
        {
            $results['requirements'][$requirement] = true;

            if(!extension_loaded($requirement))
            {
                $results['requirements'][$requirement] = false;

                $results['errors'] = true;
            }
        }

        return $results;
    }

    public function checkPhpVersion(string $minPhpVersion = null): array
    {
        $minVersionPhp = $minPhpVersion;
        $currentPhpVersion = $this->getPhpVersionInfo();
        $supported = false;
        if ($minPhpVersion == null) {
            $minVersionPhp = $this->getMinPhpVersion();
        }
        if (version_compare($currentPhpVersion['version'], $minVersionPhp) >= 0) {
            $supported = true;
        }
        return [
            'full' => $currentPhpVersion['full'],
            'current' => $currentPhpVersion['version'],
            'minimum' => $minVersionPhp,
            'supported' => $supported
        ];
    }
    /**
     * Get current Php version information
     *
     * @return array
     */
    private static function getPhpVersionInfo(): array
    {
        $currentVersionFull = PHP_VERSION;
        preg_match("#^\d+(\.\d+)*#", $currentVersionFull, $filtered);
        $currentVersion = $filtered[0];
        return [
            'full' => $currentVersionFull,
            'version' => $currentVersion
        ];
    }
    /**
     * Get minimum PHP version ID.
     *
     * @return string _minPhpVersion
     */
    protected function getMinPhpVersion(): string
    {
        return $this->_minPhpVersion;
    }
}
