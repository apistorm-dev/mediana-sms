<?php
/**
 * @date_of_create: 4/3/2022 AD 11:19
 */

namespace Yiiman\MedianaSms\Responses;

/**
 * @property int $bulk_id you can use this id for check status of messages
 */
class BulkIdResponse extends BaseResponse
{
    public  $bulk_id='key_in_object: data.bulk_id';
}