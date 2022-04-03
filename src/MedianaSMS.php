<?php
/**
 * @author YiiMan <info@yiiman.ir>
 * @link   https://yiiman.ir
 */

namespace Yiiman\MedianaSms;

use YiiMan\ApiStorm\Core\Connection;
use YiiMan\ApiStorm\Core\Res;
use YiiMan\ApiStorm\Post\BasePostDataInterface;
use Yiiman\MedianaSms\RequestClasses\SendPatternRequest;
use Yiiman\MedianaSms\RequestClasses\SendSMSRequest;
use Yiiman\MedianaSms\Responses\BulkIdResponse;
use Yiiman\MedianaSms\Responses\CreditResponse;
use Yiiman\MedianaSms\Responses\MessageInfoResponse;

class MedianaSMS
{

    public $protocol = 'https';
    public $baseURl = 'rest.ippanel.com';

    public $apiKey = '';

    /**
     * @param  BasePostDataInterface|null  $dataClass
     * @param  string                      $path
     * @return Res
     */
    private function call(string $path, BasePostDataInterface $dataClass = null, $method = 'post')
    {
        $servedArrayOfDataClass = !empty($dataClass) ? $dataClass->serve() : [];
        $connection = new Connection();
        $connection->baseURL = $this->baseURl;
        $connection->protocol = 'https';
        $userAgent = sprintf("IPPanel/ApiClient/%s PHP/%s", "1.0.1", phpversion());

        return $connection->call($path, [], $servedArrayOfDataClass, [], $method,
            [
                "Authorization: AccessKey ".$this->apiKey,
                "User-Agent: ".$userAgent,
                'Accept: application/json',
                'Content-Type: application/json'
            ],
            true
        );

    }

    /**
     * دریافت موجودی ریالی پنل پیامک
     * @return Res|CreditResponse
     */
    public function getCredit()
    {
        $response = $this->call("v1/credit", null, 'get');
        if ($response->isSuccess()) {
            return new CreditResponse($response);
        } else {
            return $response;
        }
    }


    /**
     * @param  SendSMSRequest  $data  needed data for send
     * @return false|BulkIdResponse|Res if false,its mean posted data is not valid
     */
    public function send(SendSMSRequest $data)
    {
        if ($data->validate()) {
            $res = $this->call("v1/messages", $data);
            if ($res->isSuccess()) {
                return new BulkIdResponse($res);
            } else {
                return $res;
            }
        } else {
            return false;
        }
    }


    /**
     * get message info using bulk id
     * @param  int  $bulkID
     * @return Res|MessageInfoResponse
     */
    public function getMessage(int $bulkID)
    {
        $res = $this->call(sprintf("v1/messages/%d", $bulkID), null, 'get');
        if ($res->isSuccess()) {
            return new MessageInfoResponse($res);
        } else {
            return $res;
        }
    }


    /**
     * Send message with pattern
     * @param  SendPatternRequest  $data
     * @return false|Res
     */
    public function sendPattern(SendPatternRequest $data)
    {
        if ($data->validate()) {
            $res = $this->call("v1/messages/patterns/send", $data);
            if ($res->isSuccess()) {
                return new BulkIdResponse($res);
            } else {
                return $res;
            }
        } else {
            return false;
        }
    }

}