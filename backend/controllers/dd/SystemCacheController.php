<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-12-03
 * Time: 2:16
 */
namespace app\modules\admin\controllers;

use app\models\redis\RedisOperation;
use yii\db\Query;
use yii\helpers\Url;
use yii\base\Exception;


class SystemCacheController extends CommonController
{
    function init()
    {
        parent::init();
        $view=$this->getView();
        $view->params['item']=$this->menu['系统']['item'];
    }

    public function actionIndex(){
        $cache=\yii::$app->cache;
        $cacheClass=get_class($cache);

        $cackeType = '';
        $data=[];
        if($cacheClass == \yii\redis\Cache::className() ){  //redis 缓存
            $cackeType=['name'=>'redis缓存','type'=>'_redisCache'];
            $redis=new RedisOperation(['redis'=>$cache->redis]);
            //遍历redis
            $cursor=0;
            do{
                $keys = $redis->scanAll($cursor,"MATCH",'*','COUNT',1000);
                $data=array_merge($data,$keys[1]);
                $cursor=$keys[0];
            }while($keys[0] != 0);


        }else if( $cacheClass==\yii\caching\FileCache::className()){    //原生缓存
            $cackeType=['name'=>'文件缓存','type'=>'_fileCache'];

            $dir=\Yii::getAlias('@runtime/cache/');
            if (is_dir($dir)) {
                if ($dh = opendir($dir)) {
                    $i=0;
                    while (($file = readdir($dh)) !== false) {
                        $type=filetype($dir . $file); //dir, block, link, file, socket and unknown.
                        if($file=='.' || $file =='..'){
                            continue;
                        }
                        $data[$i]=['name'=>$file,'type'=>$type];
                        if($type=='dir'){
                            $dirsub=$dir.'/'.$file.'/';
                            if ($dhsub = opendir($dirsub)) {
                                $j=0;
                                while (($filesub = readdir($dhsub)) !== false) {
                                    if($filesub=='.' || $filesub =='..'){
                                        continue;
                                    }
                                    $type=filetype($dirsub.$filesub); //dir, block, link, file, socket and unknown.
                                    $data[$i]['child'][$j]=['name'=>$filesub,'type'=>$type];
                                    $j++;
                                }
                                closedir($dhsub);
                            }
                        }
                        $i++;
                    }
                    closedir($dh);
                }
            }
        }else {
            $cackeType=['name'=>$cacheClass,'type'=>'_classCache'];
        }
        return $this->renderPartial('index',['data'=>$data,'cacheType'=>$cackeType]);
    }


    public function actionDelAll(){
        $this->re_json();
        $status=\Yii::$app->cache->flush();
        if($status){
            return ['status'=>true,'msg'=>'删除成功'];
        }else{
            return ['status'=>false,'msg'=>'删除失败'];
        }
    }

    public function actionDelRedisDel(){
        $key=\yii::$app->request->post('key');
        $cache=\yii::$app->cache;
        $redis=$cache->redis;
        $this->re_json();
        if($key){
            try{
                $del=$redis->del($key);
                if($del){
                    return ['status'=>true,'msg'=>'删除成功'];
                }
                $msg = '删除失败';
            }catch (Exception $e){
                $msg= 'redis连接错误:'.$e->getMessage();
            }
        }else{
            $msg='请求非法参数';
        }
        return ['status'=>false,'msg'=>$msg];
    }

    public function actionGetRedisKey(){
        $key=\yii::$app->request->get('key');
        $cache=\yii::$app->cache;
        $redis=$cache->redis;
        $this->re_json();
        if($key){
            try{
                if($value=$redis->get($key)){
                    $data['origin']=$value;
                    $data['analysis'] = $this->dump(unserialize($value),false);
                    return ['status'=>true,'msg'=>'Get successful!','data'=>$data];
                }else{
                    $msg = 'redis中无key:'.$key;
                }
            }catch (Exception $e){
                $msg= 'redis连接错误:'.$e->getMessage();
            }
        }else{
            $msg='请求非法参数';
        }
        return ['status'=>false,'msg'=>$msg];
    }

    public function actionDelFileKey(){
        $key=\yii::$app->request->post('key');
        $kkey=\yii::$app->request->post('kkey');

        $this->re_json();
        if($key){
            $dir= \Yii::getAlias('@runtime/cache/'.$key);
            try{
                $this->gcRecursive($dir,false);
                $status=@unlink($dir);
            }catch (Exception $e){
                $status=false;
                $msg= '缓存文件删除错误:'.$e->getMessage();
            }
            if($status==true){
                return ['status'=>true,'msg'=>'删除成功'];
            }
        }else{
            $msg='请求非法参数';
        }
        return ['status'=>false,'msg'=>isset($msg)?$msg:'删除失败'];
    }


    protected function gcRecursive($path, $expiredOnly=true)
    {
        if (($handle = opendir($path)) !== false) {
            while (($file = readdir($handle)) !== false) {
                if ($file[0] === '.') {
                    continue;
                }
                $fullPath = $path . DIRECTORY_SEPARATOR . $file;
                if (is_dir($fullPath)) {
                    $this->gcRecursive($fullPath, $expiredOnly);
                    if (!$expiredOnly) {
                        if (!@rmdir($fullPath)) {
                            $error = error_get_last();
                            \Yii::warning("Unable to remove directory '{$fullPath}': {$error['message']}", __METHOD__);
                        }
                    }
                } elseif (!$expiredOnly || $expiredOnly && @filemtime($fullPath) < time()) {
                    if (!@unlink($fullPath)) {
                        $error = error_get_last();
                        \Yii::warning("Unable to remove file '{$fullPath}': {$error['message']}", __METHOD__);
                    }
                }
            }
            closedir($handle);
        }
    }


    public function actionGetFileKey(){
        $key=\yii::$app->request->get('key');
        $kkey=\yii::$app->request->get('kkey');

        $this->re_json();
        if($key && $kkey){
            $dir=\Yii::getAlias('@runtime/cache/'.$key.'/'.$kkey);
            if(file_exists($dir)){
                try{
                    $value=file_get_contents($dir);
                    if($value){
                        $data['origin']=$value;
                        $data['analysis'] = $this->dump(unserialize($value),false);
                        return ['status'=>true,'msg'=>'Get successful!','data'=>$data];
                    }else{
                        $msg = '无缓存文件:'.$key;
                    }
                }catch (Exception $e){
                    $msg= '读取缓存文件失败:'.$e->getMessage();
                }
            }else{
                $msg='无缓存文件';
            }
        }else{
            $msg='请求非法参数';
        }
        return ['status'=>false,'msg'=>$msg];
    }



    protected function dump($var, $echo=true, $label=null, $strict=true) {
        $label = ($label === null) ? '' : rtrim($label) . ' ';
        if (!$strict) {
            if (ini_get('html_errors')) {
                $output = print_r($var, true);
                $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
            } else {
                $output = $label . print_r($var, true);
            }
        } else {
            ob_start();
            var_dump($var);
            $output = ob_get_clean();
            if (!extension_loaded('xdebug')) {
                $output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);
                $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
            }
        }
        if ($echo) {
            echo($output);
            return null;
        }else
            return $output;
    }

    public function actionClearCache(){
        $request=\yii::$app->request;
        if($request->isPost){
            $this->re_json();
            $name=$request->post('name');
            try{
                switch ($name){
                    case 'enableSchemaCache':
                        \Yii::$app->db->schema->refresh();
                        $status=true;
                        break;
                    case 'cache':
                        \Yii::$app->cache->flush();
                        $status=true;
                        break;
                    case 'redis0':
                        try{
                            $redis=\yii::$app->redis;
                            if($redis instanceof \yii\redis\Connection){
                                $redis->flushdb();
                                $status=true;
                            }else{
                                $msg='未配置Redis连接';
                                $status=false;
                            }
                        }catch(Exception $e){
                            $status=false;
                            return ['status'=>false,'msg'=>'清理失败<br>'.$e->getMessage()];
                        }
                        break;
                    case 'redis1':
                        $cache=\yii::$app->cache;
                        if($cache instanceof \yii\redis\Cache){
                            $cache->flush();
                            $status=true;
                        }else{
                            $msg='未开启redis缓存';
                            $status=false;
                        }
                        break;
                    case 'redis2':
                        $session=\yii::$app->session;
                        if($session instanceof \yii\redis\Session){
                            $session->redis->flushdb();
                            $status=true;
                        }else{
                            $msg='未开启redis session'.get_class($session);
                            $status=false;
                        }
                        break;
                    default :
                        $msg='非法操作';
                        $status=false;
                        break;
                }
            }catch (Exception $e){
                return ['status'=>false,'msg'=>'清理失败<br>'.$e->getMessage()];
            }
            if($status==true){
                return ['status'=>true,'msg'=>'清理成功'];
            }else{
                $msg=isset($msg)?'清理失败:'.$msg:'清理失败';
                return ['status'=>false,'msg'=>$msg];
            }
        }

        return $this->renderPartial('clear-cache');
    }
}