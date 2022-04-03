<?php
/**
 * @var $api_key
 * @var $sms_line
 * @var $test_mobile_number
 * @var $pattern_code
 * @var $pattern_values
 */
require "vendor/autoload.php";

use Yiiman\MedianaSms\MedianaSMS;
use Yiiman\MedianaSms\RequestClasses\SendPatternRequest;
use Yiiman\MedianaSms\RequestClasses\SendSMSRequest;


require __DIR__.'/env.php';
$api = new MedianaSMS();
$api->apiKey = $api_key;
$creditResult = $api->getCredit();
if ($creditResult->isSuccess() && $creditResult->credit > 1000) {

    // < Initializing data >
    {
        $dataSms = new SendSMSRequest();
        $dataSms->originator0 = $sms_line;
        $dataSms->recipients0 = [$test_mobile_number];
        $dataSms->message0 = 'this is test';
    }
    // </ Initializing data >
    if ($dataSms->validate()) {
        $sendResult = $api->send($dataSms);
        if ($sendResult && $sendResult->bulk_id) {
            echo "Sms sent and bulk id is :\n";
            echo $sendResult->bulk_id."\n";
            $message_info = $api->getMessage($sendResult->bulk_id);
            if ($message_info->isSuccess()) {
                echo "Message info for normal send message is :\n\n";
                echo '-- message:'.$message_info->message."\n";
                echo '-- status:'.$message_info->status."\n";
                echo '-- created at:'.$message_info->created_at."\n";
                echo '-- type:'.$message_info->type."\n";
                echo '-- confirm status:'.$message_info->confirm_state."\n";
                echo '-- number:'.$message_info->number."\n";
                echo '-- sent at:'.$message_info->sent_at."\n";
                echo '-- cost:'.$message_info->cost."\n";
                echo '-- payback cost:'.$message_info->payback_cost."\n";
                echo '-- count of receivers:'.$message_info->recipients_count."\n";
                echo '-- count of valid receivers:'.$message_info->valid_recipients_count."\n";
            } else {
                echo "Server returned some errors:\n\n";
                var_dump($message_info->getError()->message);
            }
        }
    } else {
        echo "Your posted data has some errors:\n\n";
        var_dump($dataSms->errors());
    }


    $dataPattern = new SendPatternRequest();
    $dataPattern->originator0 = $sms_line;
    $dataPattern->recipient0 = $test_mobile_number;
    $dataPattern->pattern_code0 = $pattern_code;
    $dataPattern->values0 = $pattern_values;
    if ($dataPattern->validate()) {
        $patternResult = $api->sendPattern($dataPattern);
        if ($patternResult->isSuccess()) {
            echo 'Bulk id for sent pattern is :'.$patternResult->bulk_id."\n\n";


            $message_info = $api->getMessage($patternResult->bulk_id);
            if ($message_info->isSuccess()) {
                echo "Message info for pattern is :\n\n";
                echo '-- message:'.$message_info->message."\n";
                echo '-- status:'.$message_info->status."\n";
                echo '-- created at:'.$message_info->created_at."\n";
                echo '-- type:'.$message_info->type."\n";
                echo '-- confirm status:'.$message_info->confirm_state."\n";
                echo '-- number:'.$message_info->number."\n";
                echo '-- sent at:'.$message_info->sent_at."\n";
                echo '-- cost:'.$message_info->cost."\n";
                echo '-- payback cost:'.$message_info->payback_cost."\n";
                echo '-- count of receivers:'.$message_info->recipients_count."\n";
                echo '-- count of valid receivers:'.$message_info->valid_recipients_count."\n";
            } else {
                echo "Server returned some errors:\n\n";
                var_dump($message_info->getError()->message);
            }



        } else {
            echo "Server returned some errors:\n\n";
            var_dump($patternResult->getError()->message);
        }
    } else {
        echo "Your posted data has some errors:\n\n";
        var_dump($dataPattern->errors());
    }
} else {
    echo "Server returned some errors:\n\n";
    var_dump($creditResult->getError()->message);
}

