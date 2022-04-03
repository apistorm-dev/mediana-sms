<?php
/**
 * @date_of_create: 4/3/2022 AD 11:48
 */

namespace Yiiman\MedianaSms\Responses;

/**
 * @property int    $bulk_id                Message id , Sample value: {int} 330787636
 * @property string $number                 Receiver mobile number , Sample value: "+983000234900"
 * @property string $message                Sms message, Sample value: "this is test"
 * @property string $status                 Sent status, Sample value: "active"
 * @property string $type                   Type of request, Sample value: "webservice"
 * @property string $confirm_state          Sample value: ""
 * @property string $created_at             Sample value: "2022-04-03T11:47:08Z"
 * @property string $sent_at                Sample value: "2022-04-03T11:47:08Z"
 * @property int    $recipients_count       Count of receivers, Sample value: {int} 1
 * @property int    $valid_recipients_count Count of valid receivers, Sample value: {int} 0
 * @property int    $page                   Sample value: {int} 1
 * @property int    $cost                   Sample value: {int} 0
 * @property int    $payback_cost           Sample value: {int} 0
 * @property string $description            Sample value: "ارسال تکی به0شماره<br>"
 */
class MessageInfoResponse extends \YiiMan\ApiStorm\Response\BaseResponse
{
    public $bulk_id = 'key_in_object: data.message.bulk_id';
    public $number = "key_in_object: data.message.number";
    public $message = "key_in_object: data.message.message";
    public $status = "key_in_object: data.message.status";
    public $type = "key_in_object: data.message.type";
    public $confirm_state = "key_in_object: data.message.confirm_state";
    public $created_at = "key_in_object: data.message.created_at";
    public $sent_at = "key_in_object: data.message.sent_at";
    public $recipients_count = 'key_in_object: data.message.recipients_count';
    public $valid_recipients_count = 'key_in_object: data.message.valid_recipients_count';
    public $page = 'key_in_object: data.message.page';
    public $cost = 'key_in_object: data.message.cost';
    public $payback_cost = 'key_in_object: data.message.payback_cost';
    public $description = "key_in_object: data.message.description";

}