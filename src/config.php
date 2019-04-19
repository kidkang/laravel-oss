<?php
return [
    'AccessKeyId'       => env('ALIOSS_KEYID', null), // key
    'city'              => env('ALIOSS_CITY', ''), //城市
    'networkType'       => env('ALIOSS_NETWORKTYPE', '经典网络'),
    'isInternal'        => env('ALIOSS_ISINTERNAL', 0),
    'AccessKeySecret'   => env('ALIOSS_KEYSECRET', null), // secret
    'BucketName'        => env('ALIOSS_BUCKETNAME', null), // bucket
];
