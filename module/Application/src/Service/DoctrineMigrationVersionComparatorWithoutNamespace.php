<?php

declare(strict_types=1);

namespace Application\Service;

use Doctrine\Migrations\Version\Comparator;
use Doctrine\Migrations\Version\Version;

use function array_pop;
use function explode;
use function strcmp;

/**
 * With Doctrine Migrations 3.2, they made possible to save Migrations in different Namespaces.
 * Execution Order is determined by namespaces (yes, i know, that's bull).
 *
 * To circumvent this problem, I've added this Comparator.
 * It does exactly what the name says.
 *
 * @author Maximilian Klingert <maximilian.klingert@uni-wuerzburg.de>
 */
class DoctrineMigrationVersionComparatorWithoutNamespace implements Comparator
{
    public function compare(Version $a, Version $b): int
    {
        return strcmp($this->versionWithoutNamespace($a), $this->versionWithoutNamespace($b));
    }

    private function versionWithoutNamespace(Version $version): string
    {
        $path = explode('\\', (string) $version);

        return array_pop($path);
    }
}
