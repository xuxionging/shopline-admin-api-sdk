<?php

declare(strict_types=1);

namespace Verdient\Shopline\Traits;

use Verdient\Shopline\Response;

/**
 * 包含详情
 * @author Verdient。
 */
trait HasDetail
{
    /**
     * 获取详情
     * @return Response
     * @author Verdient。
     */
    public function detail(): Response
    {
        return $this->request($this->resource())
            ->setMethod('GET')
            ->send();
    }
}
