<?php

declare(strict_types=1);

namespace Verdient\Shopline\Traits;

use Verdient\Shopline\Response;

/**
 * 包含获取单条
 * @author Verdient。
 */
trait HasOne
{
    /**
     * 获取单个条目
     * @param int $id 编号
     * @return Response
     * @author Verdient。
     */
    public function one($id): Response
    {
        return $this->request($this->resource() . '/' . $id)->send();
    }
}
