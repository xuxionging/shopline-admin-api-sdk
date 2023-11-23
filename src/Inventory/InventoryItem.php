<?php

declare(strict_types=1);

namespace Verdient\Shopline\Inventory;

use Verdient\Shopline\AbstractComponent;
use Verdient\Shopline\Traits\HasList;
use Verdient\Shopline\Traits\HasOne;
use Verdient\Shopline\Traits\HasUpdate;

/**
 * 库存条目
 * @author Verdient。
 */
class InventoryItem extends AbstractComponent
{
    use HasOne;
    use HasList;
    use HasUpdate;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'inventory_items';
    }
}
