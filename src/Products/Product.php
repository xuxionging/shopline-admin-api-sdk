<?php

declare(strict_types=1);

namespace Verdient\Shopline\Products;

use Verdient\Shopline\AbstractComponent;
use Verdient\Shopline\Response;
use Verdient\Shopline\Traits\HasCreate;
use Verdient\Shopline\Traits\HasList;
use Verdient\Shopline\Traits\HasOne;
use Verdient\Shopline\Traits\HasUpdate;

/**
 * 商品
 * @author Verdient。
 */
class Product extends AbstractComponent
{
    use HasList;
    use HasOne;
    use HasUpdate;

    /**
     * 创建
     * @param array $data 数据
     * @return Response
     * @author Verdient。
     */
    public function create($data = []): Response
    {
        return $this->request($this->resource() . '/' . $this->resource())
            ->setMethod('POST')
            ->setBody($data)
            ->send();
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public function list($query = []): Response
    {
        return $this->request($this->resource() . '/' . $this->resource())->setQuery($query)->send();
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function resource(): string
    {
        return 'products';
    }
}
