<?php
/**
* This is the translation array
*
*/
return [
    
/*start*NameCommon*/
'ID'=>'ID',
    'User ID'=>'用户ID',
	'Position'=>'位置',//0左，1上',
	'Parent ID'=>'上级ID',
	'Name'=>'名称',
	'Icon'=>'图标',
	'Add Time'=>'创建时间',
	'Edit Time'=>'修改时间',
	'Sort'=>'排序',
    'Level'=>'文章级别',//0垃圾,1较差,2普通,3较好,4优秀,5天才',',
	'Status'=>'状态值',//0待审核,1审核通过,2正在审核,3审核不通过',',
    //	'User ID'=>'用户ID',',
    'Content'=>'内容',
    'Value'=>'值',
	'Url'=>'url地址',
    'Route'=>'路由',
    'Description'=>'描述',
    'Type'=>'类型',
    'Category'=>'分类',
	/*end*NameCommon*/





	/*start*Menu*/
	'App Type'=>'菜单类型',//0后台,1前台,
	////'Url'=>'url地址',
	////////////'Sort'=>'排序',
	'Target'=>'打开方式',//_blank新窗口,_self本窗口',
	'Is Absolute Url'=>'是否绝对地址',
	'Is Display'=>'是否显示',//0否,1是',
	'Top ID'=>'顶部菜单',
	'Module'=>'模块',
	'Controller'=>'控制器',
	'Action'=>'方法',
	/*end*Menu*/

	/*start*Article*/
	////////'User ID'=>'用户ID',
	'Cate ID'=>'分类',
	'Title'=>'标题',
	'Author'=>'作者',
	'Cover'=>'封面',
	'Abstract'=>'摘要',
	'Content ID'=>'文章内容',
	'Remain'=>'提醒',//0未提醒，1已经提醒',
	'Auth'=>'权限',//0所有人，1好友，2加密，3自己',
	'Tag'=>'标签',
	'Commit'=>'评论',
	'View'=>'浏览',
	'Collection'=>'收藏',
	'Thumbup'=>'赞',
	////'Level'=>'文章级别',//0垃圾,1较差,2普通,3较好,4优秀,5天才',
	'Score'=>'评分',
	'Publish'=>'发布',//0草稿,1发布',
	//////'Status'=>'状态值',//0待审核,1审核通过,2正在审核,3审核不通过',
	/*end*Article*/

	/*start*ArticleCate*/
	'Path'=>'路径',
	/*end*ArticleCate*/

	/*start*Tag*/
	'Frequence'=>'频率',
	'Content Type'=>'标签类型',
	/*end*Tag*/	/*start*ArticleCommit*/
	'Article ID'=>'文章ID',
	'Commit ID'=>'评论ID',
	//'Content'=>'内容',
	/*end*ArticleCommit*/
	/*start*ArticleContent*/
	/*end*ArticleContent*/
	
/*start*ImgUpload*/
	'File Path'=>'文件路径',
	'Admin ID'=>'管理员ID',
	/*end*ImgUpload*/


    'There is no {$attribut}!'=>'无{$attribut}!',
    'Incorrect username or password!'=>'用户名或密码错误',
    'You have failed to try login at least fifth , please wait {time}s'=>'您已经登录失败超过5次了，请等待{time}秒',
    'You have failed to try login more than {count}times, please wait {time}s'=>'您已经登录失败超过{count}次了，请等待{time}秒',
    'You have failed to try login more than 10times, please try tomorrow!'=>'您登录失败超过10次，请联系管理员，或者明天再试一试',
	/*start*Options*/
	//'Type'=>'类型',//0系统,1自定义,2banner,3广告',
	////'Value'=>'值',
	'Input Type'=>'输入框类型',
	'Autoload'=>'自动加载',//0否,1是',
	'Tips'=>'提示',
	/*end*Options*/
	/*start*AdminLog*/
	/*end*AdminLog*/
	
    /*start*Maintain*/
	'Options ID'=>'位置类型',//0首页轮播,1侧栏1,2侧栏2',
	'Show Type'=>'显示类型',//0图片,2文字,3markdown',
	'Sign'=>'标识',
	'Info'=>'备注',
	/*end*Maintain*/

    /*start*Rbac*/
    'HTTP Method'=>'请求方式',
    'Permissions'=>'权限',
    'Group'=>'组',
    //'Category'=>'分类',
    'Role'=>'角色',
    /*end*Rbac*/
	/*start*Log*/
	'Log Time'=>'记录时间',
	'Prefix'=>'前缀',
	'Message'=>'信息',
	/*end*Log*/

];