<?php

declare(strict_types=1);

namespace Verdient\Shopline\OAuth2;

use Verdient\HttpAPI\AbstractClient;
use Verdient\Shopline\Request;

/**
 * 令牌
 * @author Verdient。
 */
class Token extends AbstractClient
{
    /**
     * @inheritdoc
     * @author Verdient。
     */
    public $protocol = 'https';

    /**
     * @var string App标识
     * @author Verdient。
     */
    public $appKey = null;

    /**
     * @var string App秘钥
     * @author Verdient。
     */
    public $appSecret = null;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public $request = Request::class;

    /**
     * @param string $host 店铺域名
     * @param string $appKey App标识
     * @param string $appSecret App秘钥
     * @author Verdient。
     */
    public function __construct($host, $appKey, $appSecret)
    {
        $this->host = $host;
        $this->appKey = $appKey;
        $this->appSecret = $appSecret;
    }

    /**
     * 创建授权秘钥
     * @param string $code 授权码
     * @return Request
     * @author Verdient。
     */
    public function create($code): Request
    {
        $timestamp = time();
        $content = json_encode(['code' => $code]);
        return $this
            ->request('/admin/oauth/token/create')
            ->setMethod('POST')
            ->addHeader('timestamp', $timestamp)
            ->addHeader('sign', $this->signature($content, $timestamp))
            ->addHeader('appkey', $this->appKey)
            ->addHeader('Content-Type', 'application/json')
            ->setContent($content);
    }

    /**
     * 刷新授权秘钥
     * @return Request
     * @author Verdient。
     */
    public function refresh(): Request
    {
        $timestamp = time();
        return $this
            ->request('/admin/oauth/token/refresh')
            ->setMethod('POST')
            ->addHeader('timestamp', $timestamp)
            ->addHeader('sign', $this->signature('', $timestamp))
            ->addHeader('appkey', $this->appKey);
    }

    /**
     * 签名
     * @param string $data 要签名的数据
     * @param int $timestamp 时间戳
     * @return string
     * @author Verdient。
     */
    public function signature($data, $timestamp)
    {
        return hash_hmac('sha256', $data . $timestamp, config('shopline.appSecret'));
    }
}
