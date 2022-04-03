<?php
/**
 * @date_of_create: 3/29/2022 AD 18:13
 */

namespace Yiiman\MedianaSms\Responses;

/**
 * @property string $status  وضعیت
 * @property string $code    کد وضعیت
 * @property string $message متن پاسخ
 */
class BaseResponse extends \YiiMan\ApiStorm\Response\BaseResponse
{
    public $status = 'string';
    public $code = 'string';
    public $message = 'string';
}