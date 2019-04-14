<?php

declare(strict_types=1);

namespace NunoMaduro\PhpInsights\Domain\Metrics\Dependencies;

use NunoMaduro\PhpInsights\Domain\Collector;
use NunoMaduro\PhpInsights\Domain\Contracts\HasPercentage;
use NunoMaduro\PhpInsights\Domain\Contracts\HasValue;

/**
 * @internal
 */
final class AttributeAccessesStatic implements HasValue, HasPercentage
{
    /**
     * {@inheritdoc}
     */
    public function getValue(Collector $collector): string
    {
        return sprintf('%d', $collector->getStaticAttributeAccesses());
    }

    /**
     * {@inheritdoc}
     */
    public function getPercentage(Collector $collector): float
    {
        return $collector->getAttributeAccesses() > 0 ?
            ($collector->getStaticAttributeAccesses() / $collector->getAttributeAccesses()) * 100 : 0;
    }
}