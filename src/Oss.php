<?php
namespace Kd\Oss;

use JohnLui\AliyunOSS;
use Datetime;
class Oss
{
    private $config;
    private $ossClient;
    public function __construct($config)
    {
        $this->config    = $config->get('alioss');
        $this->ossClient = AliyunOSS::boot(
            $this->config['city'],
            $this->config['networkType'],
            $this->config['isInternal'],
            $this->config['AccessKeyId'],
            $this->config['AccessKeySecret']
        );
        $this->ossClient->setBucket($this->config['BucketName']);
    }
    /**
     *上传图片到Oss
     * @param  [type] $ossKey   [oss文件名]
     * @param  [type] $filePath [本地图片绝对路径]
     * @return [type]           [description]
     */
    public function upload($key, $filePath)
    {
        return $this->ossClient->uploadFile($key, $filePath);
    }
    public function remove($key){
        $this->ossClient->deleteObject($this->config['BucketName'],$key);
    }
    /**
     * 获取对外的路径
     * @param  [type] $key [阿里的路径]
     * @return [type]      [description]
     */
    public function getPublicUrl($key)
    {
        return $this->ossClient->getPublicUrl($key);
    }
    /**
     * 上传内容
     * @param  [type] $key     [description]
     * @param  [type] $content [description]
     * @return [type]          [description]
     */
    public function uploadContent($key, $content){
        return $this->ossClient->uploadContent($key,$content);
    }

    public function getUrl($key, $expire_time)
    {
        $datetime = new Datetime(date('Y-m-d H:i:s',time() + $expire_time * 1000));
        return $this->ossClient->getUrl($key,$datetime);
    }
}
