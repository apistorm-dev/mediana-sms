<?php
/**
 * @date_of_create: 4/3/2022 AD 10:46
 */

namespace Yiiman\MedianaSms\RequestClasses;

/**
 * @property  string $originator0 this is line number, that using for send new message
 * @property  array  $recipients0 this is an array of receivers numbers
 * @property  string $message0    your message
 */
class SendSMSRequest extends \YiiMan\ApiStorm\Post\BasePostData
{

    public string $originator0;
    public array $recipients0;
    public string $message0;

    public function rules(): array
    {
        return
            [
                'originator' => 'string',
                'recipients' => 'array',
                'message'    => 'string'
            ];
    }
}