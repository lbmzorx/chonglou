<?php
namespace backend\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Response;

/**
 * Site controller
 */
class CommonController extends Controller
{

    public $left_nav_id='';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow'=>true,
                        'roles'=>['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function leftnav(){
        return [
            ['id'=>'home','url'=>Url::to(['/home/default/index']),'icon'=>'home','name'=>'首页',],
            ['id'=>'article','url'=>Url::to(['/article']),'icon'=>'file','name'=>'文章','item'=>
                [
                    ['id'=>'article/default/index','url'=>Url::to(['/article/default/index']),'name'=>'文章','icon'=>'',],
                    ['id'=>'article/cate/index','url'=>Url::to(['/article/cate/index']),'name'=>'分类','icon'=>'',],
                    ['id'=>'article/tag/index','url'=>Url::to(['/article/tag/index']),'name'=>'标签','icon'=>'',],
                    ['id'=>'article/tag/index','url'=>Url::to(['/article/commit/index']),'name'=>'评论管理','icon'=>'',],
                ],

            ],
            ['id'=>'speak','url'=>Url::to(['/speak']),'icon'=>'file','name'=>'说说','item'=>
                [
                    ['id'=>'article/default/index','url'=>Url::to(['/speak/default/index']),'name'=>'说说','icon'=>'',],
                    ['id'=>'article/cate/index','url'=>Url::to(['/speak/cate/index']),'name'=>'分类','icon'=>'',],
                    ['id'=>'article/tag/index','url'=>Url::to(['/speak/tag/index']),'name'=>'标签','icon'=>'',],
                ],

            ],
            ['id'=>'topic','url'=>Url::to(['/topic']),'icon'=>'file','name'=>'话题','item'=>
                [
                    ['id'=>'article/default/index','url'=>Url::to(['/topic/default/index']),'name'=>'文章','icon'=>'',],
                    ['id'=>'article/cate/index','url'=>Url::to(['/topic/cate/index']),'name'=>'分类','icon'=>'',],
                    ['id'=>'article/tag/index','url'=>Url::to(['/topic/tag/index']),'name'=>'标签','icon'=>'',],
                    ['id'=>'article/tag/index','url'=>Url::to(['/topic/commit/index']),'name'=>'评论管理','icon'=>'',],
                ],

            ],

            ['id'=>'user','url'=>Url::to(['/user']),'icon'=>'file','name'=>'用户','item'=>
                [
                    ['id'=>'user/default/index','url'=>Url::to(['/user/default/index']),'name'=>'用户信息','icon'=>'',],
                    ['id'=>'user/cate/index','url'=>Url::to(['/user/cate/index']),'name'=>'用户动态','icon'=>'',],
                    ['id'=>'user/tag/index','url'=>Url::to(['/user/tag/index']),'name'=>'标签','icon'=>'',],
                    ['id'=>'user/commit/index','url'=>Url::to(['/user/commit/index']),'name'=>'评论管理','icon'=>'',],
                    ['id'=>'user/thumbup/index','url'=>Url::to(['/user/thumbup/index']),'name'=>'点赞管理','icon'=>'',],
                    ['id'=>'user/collection/index','url'=>Url::to(['/user/collection/index']),'name'=>'收藏管理','icon'=>'',],
                ],
            ],

            ['id'=>'set','url'=>Url::to(['/set']),'icon'=>'file','name'=>'网站设置','item'=>
                [
                    ['id'=>'article/default/index','url'=>Url::to(['/user/default/index']),'name'=>'','icon'=>'',],
                    ['id'=>'article/cate/index','url'=>Url::to(['/user/cate/index']),'name'=>'分类','icon'=>'',],
                    ['id'=>'article/tag/index','url'=>Url::to(['/user/tag/index']),'name'=>'标签','icon'=>'',],
                    ['id'=>'article/tag/index','url'=>Url::to(['/user/tag/index']),'name'=>'敏感词管理','icon'=>'',],
                ],
            ],


            ['id'=>'auth','url'=>Url::to(['']),'icon'=>'superpowers','name'=>'权限','item'=>
                [
                    ['id'=>'','url'=>Url::to(['']),'name'=>'权限列表','icon'=>'',],
                ],

            ],
            ['id'=>'style','url'=>Url::to(['']),'icon'=>'css3','name'=>'布置','item'=>
                [
                    ['id'=>'','url'=>Url::to(['']),'name'=>'样式模版','icon'=>'',],
                    ['id'=>'','url'=>Url::to(['']),'name'=>'文章布置','icon'=>'',],
                    ['id'=>'','url'=>Url::to(['']),'name'=>'广告布置','icon'=>'',],
                    ['id'=>'','url'=>Url::to(['']),'name'=>'广告布置','icon'=>'',],
                ],

            ],
        ];
    }

    public function beforeAction($action)
    {
        $view=\yii::$app->getView();
        $view->params['left_nav']=$this->leftnav();
        $view->params['left_nav_id']=empty($this->left_nav_id)?$action->getUniqueId():$this->left_nav_id;

        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    protected function reJson(){
        \yii::$app->response->format=Response::FORMAT_JSON;
    }

}
