<?php
namespace App\Tools;
use OSS\OssClient;
use OSS\Core\OssException;
use Config;
class ToolsOss
{
    protected $endpoint = null;//服务器节点信息
    protected $accessKeyId = null;// 阿里云主账号AccessKey
    protected $accessKeySecret = null;//账号秘钥

    protected $bucket= null;// 存储空间名称
    protected $ossClient = null;
    //Oss构造函数
    public function __construct()
    {
        $accessKeyId = Config::get('oss.accessKeyId');
        $accessKeySecret = Config::get("oss.accessKeySecret");
        $this->bucket = Config::get('oss.bucket');
        $this->endpoint = Config::get('oss.endpoint');
        try{
            $this->ossClient = new OssClient($accessKeyId,$accessKeySecret,$this->endpoint);
        }catch(\OssException $e){
            \Log::error($e->getMessage());
        }
    }
    /**
     * oss添加文件信息
     * @params  $file 文件信息
     * @params $filePath
     */
    public function putFile($files, $namespace = "uploads")
    {
        // dd($files);
        try{
            $object = $namespace."/".date("Ymd",time());//对象路径
            $filename = date("YmdHis",time()).rand(100,10000).".".$files->extension();//文件名
            $this->ossClient->uploadFile($this->bucket, $object."/".$filename,$files->getRealPath());
            return $object."/".$filename;
        }catch(OssException $e){
            \Log::error('数据推送到oss失败 '.$e->getMessage());
            return "";
        }
    }
    //获取页面的路径
    public function getFileUrl($path, $private = true)
    {
        //dd($path);
        if($private){
            $timeout = 300;
            return $this->ossClient->signUrl($this->bucket,$path,$timeout);
        }

        return "http://".$this->bucket.".".$this->endpoint.'/'.$path;
    }
}