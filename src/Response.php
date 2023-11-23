<?php

declare(strict_types=1);

namespace Verdient\Shopline;

use Verdient\http\Response as HttpResponse;
use Verdient\HttpAPI\AbstractResponse;
use Verdient\HttpAPI\Result;

/**
 * 响应
 * @author Verdient。
 */
class Response extends AbstractResponse
{
    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function normailze(HttpResponse $response): Result
    {
        $result = new Result;
        $statusCode = $response->getStatusCode();
        $data = $response->getBody();
        if ($statusCode >= 200 && $statusCode < 300) {
            if (isset($data['code'])) {
                $code = $data['code'];
                if ($code >= 200 && $code < 300) {
                    $result->isOK = true;
                    $result->data = $data['data'] ?? $data;
                }
            } else {
                $result->isOK = true;
                $result->data = $data['data'] ?? $data;
            }
        }
        if (!$result->isOK) {
            $result->errorCode = $code ?? $statusCode;
            $result->errorMessage = $data['message'] ?? ($data['errors'] ?? $response->getRawContent());
        }
        return $result;
    }
}
