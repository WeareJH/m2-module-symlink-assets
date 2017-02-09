<?php

namespace Jh\SymlinkAssetDeploys\App\View\Asset\MaterializationStrategy;

use Magento\Framework\App\View\Asset\MaterializationStrategy\Copy;
use Magento\Framework\App\View\Asset\MaterializationStrategy\Factory as MaterializationStrategyFactory;
use Magento\Framework\App\View\Asset\MaterializationStrategy\Symlink;
use Magento\Framework\View\Asset;

/**
 * @author Michael Woodward <michael@wearejh.com>
 */
class Factory extends MaterializationStrategyFactory
{
    const PREFERRED_STRATEGY = Symlink::class;
    const FALLBACK_STRATEGY  = Copy::class;

    public function create(Asset\LocalInterface $asset)
    {
        if (empty($this->strategiesList)) {
            $this->strategiesList[] = $this->objectManager->get(self::PREFERRED_STRATEGY);
            $this->strategiesList[] = $this->objectManager->get(self::FALLBACK_STRATEGY);
        }

        foreach ($this->strategiesList as $strategy) {
            if ($strategy->isSupported($asset)) {
                return $strategy;
            }
        }

        throw new \LogicException('No materialization strategy is supported');
    }
}
