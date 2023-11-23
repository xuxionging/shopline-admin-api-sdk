<?php

declare(strict_types=1);

namespace Verdient\Shopline\Merchants;

use Verdient\Shopline\AbstractComponent;
use Verdient\Shopline\Traits\HasDetail;

/**
 * 店铺
 * @author Verdient。
 */
class Shop extends AbstractComponent
{
    use HasDetail;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'merchants/shop';
    }
}
