# Mediana-sms
MedianaSMS API - created by APIStorm package

This package is fully classified responses and send data
In this package you can validate data before send to server with internal validation method,then this package is safe for programmers that want to know different between server errors and posted data errors or etc
## Install
You can install this package easily by composer 

Just type this code on command line:

`composer require yiiman/mediana-sms`

## Usage 
Usage of this package is easy and safe.

Let's start together:

In this example we want to know credit:

```php
$api = new Yiiman\MedianaSms\MedianaSMS();
$api->apiKey = 'Your SMS panel API key';
$creditResult = $api->getCredit();
if ($creditResult->isSuccess()) {
    echo $creditResult->credit;//is Float
}else{
    echo "Response has some errors:\n\n";
    var_dump($creditResult->getError()->message);
}
```

In this example we want to validate our data and then send new SMS:

```php
    $api = new Yiiman\MedianaSms\MedianaSMS();
    $api->apiKey = 'Your SMS panel API key';
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
            $message_info = $api->getMessage($sendResult->bulk_id);
            if ($message_info->isSuccess()) {
                echo "Message info :\n\n";
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

```

## Sample codes
You can find samples in `test.php` file

For run `test.php` file ,you should change `env-example.php` to `env.php` and fill data in that

When `env.php` file is ready, open terminal and type:

```bash 
php test.php
```
## API Documents
* [UpStream repository](https://github.com/ippanel)
* [Document](https://sms.ariaservice.net/files/upload/api.pdf)

## Credits
* Programmed by [YiiMan](https://github.com/yiiman-dev)
* Sponsored by [AriaService](https://ariaservice.net/)
* Powered by [APIStorm](https://github.com/yiiman-dev/apistorm)