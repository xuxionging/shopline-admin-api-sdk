<?php

declare(strict_types=1);

namespace Verdient\Shopline\Orders;

use Verdient\Shopline\AbstractComponent;
use Verdient\Shopline\Traits\HasList;

/**
 * 订单
 * @author Verdient。
 */
class Order extends AbstractComponent
{
    use HasList;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'orders';
    }
}
