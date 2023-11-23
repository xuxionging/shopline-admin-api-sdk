<?php

declare(strict_types=1);

namespace Verdient\Shopline\Orders;

use Verdient\Shopline\AbstractComponent;
use Verdient\Shopline\Response;
use Verdient\Shopline\Traits\HasCreate;
use Verdient\Shopline\Traits\HasUpdate;

/**
 * 履约
 * @author Verdient。
 */
class Fulfillment extends AbstractComponent
{
    use HasCreate;

    /**
     * @var string 订单编号
     * @author Verdient。
     */
    protected $orderId;

    /**
     * @inheritdoc
     * @param string $orderId 订单编号
     * @param string $host 店铺域名
     * @param string $accessToken 授权秘钥
     * @author Verdient。
     */
    public function __construct($orderId, $host, $accessToken)
    {
        $this->orderId = $orderId;
        $this->host = $host;
        $this->accessToken = $accessToken;
    }

    /**
     * 更新跟踪信息
     * @param string $id 编号
     * @param array $data 要更新的数据
     * @return Response
     * @author Verdient。
     */
    public function updateTracking($id, $data): Response
    {
        return $this->request($this->resource() . '/' . $id . '/update_tracking')
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
        return 'orders/' . $this->orderId . '/fulfillments';
    }
}
