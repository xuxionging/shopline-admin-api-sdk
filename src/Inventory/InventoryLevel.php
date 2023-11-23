<?php

declare(strict_types=1);

namespace Verdient\Shopline\Inventory;

use Verdient\Shopline\AbstractComponent;
use Verdient\Shopline\Response;
use Verdient\Shopline\Traits\HasList;

/**
 * 库存水平
 * @author Verdient。
 */
class InventoryLevel extends AbstractComponent
{
    use HasList;

    /**
     * 调整某个位置的库存项目的库存水平
     * @param array $data 数据
     * @return Response
     * @author Verdient。
     */
    public function adjust($data = []): Response
    {
        return $this->request($this->resource() . '/adjust')
            ->setMethod('POST')
            ->setBody($data)
            ->send();
    }

    /**
     * 将库存项目连接到位置
     * @param array $data 数据
     * @return Response
     * @author Verdient。
     */
    public function connect($data = []): Response
    {
        return $this->request($this->resource() . '/connect')
            ->setMethod('POST')
            ->setBody($data)
            ->send();
    }

    /**
     * 为某个位置的库存项目设置库存水平
     * @param array $data 数据
     * @return Response
     * @author Verdient。
     */
    public function set($data = []): Response
    {
        return $this->request($this->resource() . '/set')
            ->setMethod('POST')
            ->setBody($data)
            ->send();
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'inventory_levels';
    }
}
