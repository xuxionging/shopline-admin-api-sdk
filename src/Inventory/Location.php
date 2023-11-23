<?php

declare(strict_types=1);

namespace Verdient\Shopline\Inventory;

use Verdient\Shopline\AbstractComponent;
use Verdient\Shopline\Traits\HasCount;
use Verdient\Shopline\Traits\HasList;
use Verdient\Shopline\Traits\HasOne;

/**
 * 位置
 * @author Verdient。
 */
class Location extends AbstractComponent
{
    use HasList;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'locations';
    }
}
