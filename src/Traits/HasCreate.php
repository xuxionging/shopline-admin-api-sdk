<?php

declare(strict_types=1);

namespace Verdient\Shopline\Traits;

use Verdient\Shopline\Response;

/**
 * 包含创建
 * @author Verdient。
 */
trait HasCreate
{
    /**
     * 创建
     * @param array $data 数据
     * @return Response
     * @author Verdient。
     */
    public function create($data = []): Response
    {
        return $this->request($this->resource())
            ->setMethod('POST')
            ->setBody($data)
            ->send();
    }
}
