<?php
/**
 * @date_of_create: 4/3/2022 AD 11:57
 */

namespace Yiiman\MedianaSms\RequestClasses;

/**
 * @property string $pattern_code0 pattern code that is created in sms panel
 * @property string $originator0   sms line number that using for send message
 * @property string $recipient0    receiver mobile number
 * @property string $values0       pattern variables
 */
class SendPatternRequest extends \YiiMan\ApiStorm\Post\BasePostData
{

    public string $pattern_code0;
    public string $originator0;
    public string $recipient0;
    public array $values0;

    /**
     * @inheritDoc
     */
    public function rules(): array
    {
        return
            [
                'pattern_code' => 'string',
                'originator'   => 'string',
                'recipient'    => 'string',
                'values'       => 'array',
            ];
    }
}