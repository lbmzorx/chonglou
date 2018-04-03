<?php
/**
* This is the translation array tt
*
*/
return [
    	/*start*Article*/
	'Un remain' =>'未提醒',//'remain'=0, 提醒.0未提醒，1已经提醒
	'Remained' =>'已提醒',//'remain'=1, 提醒.0未提醒，1已经提醒
	'All users' =>'所有人',//'auth'=0, 权限.0所有人，1好友，2加密，3自己
	'Friends' =>'好友',//'auth'=1, 权限.0所有人，1好友，2加密，3自己
	'Encode' =>'加密',//'auth'=2, 权限.0所有人，1好友，2加密，3自己
	'Private' =>'自己',//'auth'=3, 权限.0所有人，1好友，2加密，3自己
	'Draft' =>'草稿',//'publish'=0, 发布.0草稿,1发布
	'Published' =>'发布',//'publish'=1, 发布.0草稿,1发布
	'Waiting Audit' =>'待审核',//'status'=0, 状态值.0待审核,1审核通过,2正在审核,3审核不通过
	'Audit Pass' =>'审核通过',//'status'=1, 状态值.0待审核,1审核通过,2正在审核,3审核不通过
	'Auditing' =>'正在审核',//'status'=2, 状态值.0待审核,1审核通过,2正在审核,3审核不通过
	'Audit Failed' =>'审核不通过',//'status'=3, 状态值.0待审核,1审核通过,2正在审核,3审核不通过
	'Garbage' =>'垃圾',//'level'=0, 文章级别.0垃圾,1较差,2普通,3较好,4优秀,5天才
	'Non nutritive' =>'较差',//'level'=1, 文章级别.0垃圾,1较差,2普通,3较好,4优秀,5天才
	'General' =>'普通',//'level'=2, 文章级别.0垃圾,1较差,2普通,3较好,4优秀,5天才
	'Better' =>'较好',//'level'=3, 文章级别.0垃圾,1较差,2普通,3较好,4优秀,5天才
	'Good' =>'优秀',//'level'=4, 文章级别.0垃圾,1较差,2普通,3较好,4优秀,5天才
	'Genius' =>'天才',//'level'=5, 文章级别.0垃圾,1较差,2普通,3较好,4优秀,5天才
/*end*Article*/



	/*start*ArticleCate*/
	'Unavailable' =>'未开启',//'status'=0, 状态.0未开启，1启用
	'Enable' =>'启用',//'status'=1, 状态.0未开启，1启用
	/*end*ArticleCate*/

	/*start*ArticleCommit*/
	'Waiting audit' =>'待审核',//'status'=0, 状态，0，已发表，1评论成功，3非法评论，2审核不通过
	'Audit Pass' =>'评论成功',//'status'=1, 状态，0，已发表，1评论成功，3非法评论，2审核不通过
	'Audit Failed' =>'非法评论',//'status'=2, 状态，0，已发表，1评论成功，3非法评论，2审核不通过
	/*end*ArticleCommit*/


	/*start*Options*/
	'system' =>'',//'type'=0, 类型.0系统,1自定义,2banner,3广告
	'self' =>'',//'type'=1, 类型.0系统,1自定义,2banner,3广告
	'banner' =>'',//'type'=2, 类型.0系统,1自定义,2banner,3广告
	'ad' =>'',//'type'=3, 类型.0系统,1自定义,2banner,3广告
	'input' =>'',//'input_type'=0, 输入框类型
	'texteare' =>'',//'input_type'=1, 输入框类型
	'img' =>'',//'input_type'=2, 输入框类型
	'markdown' =>'',//'input_type'=3, 输入框类型
	'no' =>'',//'autoload'=0, 自动加载.0否,1是
	'yes' =>'',//'autoload'=1, 自动加载.0否,1是
	/*end*Options*/


	/*start*Maintain*/
	'Image' =>'',//'show_type'=0, 显示类型.0图片,2文字,3markdown
	'Text' =>'',//'show_type'=1, 显示类型.0图片,2文字,3markdown
	'Markdown' =>'',//'show_type'=2, 显示类型.0图片,2文字,3markdown
	'Unavailable' =>'',//'status'=0, 状态.0禁用,1启用
	'Available' =>'',//'status'=1, 状态.0禁用,1启用
/*end*Maintain*/



	/*start*Log*/
	'All' =>'',//'level'=0, 级别.0x00=所有,0x01=致命错误,0x02=警告,0x04=信息,0x08=追踪,0x40=PROFILE,0x50=PROFILE_BEGIN,0x60=PROFILE_END
	'Error' =>'',//'level'=1, 级别.0x00=所有,0x01=致命错误,0x02=警告,0x04=信息,0x08=追踪,0x40=PROFILE,0x50=PROFILE_BEGIN,0x60=PROFILE_END
	'Warning' =>'',//'level'=2, 级别.0x00=所有,0x01=致命错误,0x02=警告,0x04=信息,0x08=追踪,0x40=PROFILE,0x50=PROFILE_BEGIN,0x60=PROFILE_END
	'info' =>'',//'level'=4, 级别.0x00=所有,0x01=致命错误,0x02=警告,0x04=信息,0x08=追踪,0x40=PROFILE,0x50=PROFILE_BEGIN,0x60=PROFILE_END
	'tracing' =>'',//'level'=8, 级别.0x00=所有,0x01=致命错误,0x02=警告,0x04=信息,0x08=追踪,0x40=PROFILE,0x50=PROFILE_BEGIN,0x60=PROFILE_END
	'Profile' =>'',//'level'=32, 级别.0x00=所有,0x01=致命错误,0x02=警告,0x04=信息,0x08=追踪,0x40=PROFILE,0x50=PROFILE_BEGIN,0x60=PROFILE_END
	'Profile Begin' =>'',//'level'=40, 级别.0x00=所有,0x01=致命错误,0x02=警告,0x04=信息,0x08=追踪,0x40=PROFILE,0x50=PROFILE_BEGIN,0x60=PROFILE_END
	'Profile End' =>'',//'level'=48, 级别.0x00=所有,0x01=致命错误,0x02=警告,0x04=信息,0x08=追踪,0x40=PROFILE,0x50=PROFILE_BEGIN,0x60=PROFILE_END
	/*end*Log*/


	/*start*Admin*/
	'Delete' =>'',//'status'=0, 状态
	'Frozen' =>'',//'status'=1, 状态
	'Audit Failed' =>'',//'status'=2, 状态
	'Limit Login' =>'',//'status'=3, 状态
	'Limit Active' =>'',//'status'=4, 状态
	'Login Error' =>'',//'status'=5, 状态
	'Active Error' =>'',//'status'=6, 状态
	'Active' =>'',//'status'=10, 状态
	/*end*Admin*/


	/*start*AdminMessage*/
	'Broadcast' =>'广播',//'spread_type'=0, 消息类型.0=广播,1组,3私信
	'Group' =>'组',//'spread_type'=1, 消息类型.0=广播,1组,3私信
	'Personal' =>'私信',//'spread_type'=2, 消息类型.0=广播,1组,3私信
	'Normal' =>'一般',//'level'=0, 级别.0一般,1=1星,2=2星,3=3星,4=4星,5=5星
	'Info' =>'信息',//'level'=1, 级别.0一般,1=1星,2=2星,3=3星,4=4星,5=5星
	'Warning' =>'警告',//'level'=2, 级别.0一般,1=1星,2=2星,3=3星,4=4星,5=5星
	'Danger' =>'危机',//'level'=3, 级别.0一般,1=1星,2=2星,3=3星,4=4星,5=5星
	'Important' =>'重大',//'level'=4, 级别.0一般,1=1星,2=2星,3=3星,4=4星,5=5星
	'Emergency' =>'紧急',//'level'=5, 级别.0一般,1=1星,2=2星,3=3星,4=4星,5=5星
	'Unread' =>'未读',//'read'=0, 已读.0未读,1已读
	'Read' =>'已读',//'read'=1, 已读.0未读,1已读
	'Administrator' =>'管理员',//'from_type'=0, 来源类型.0管理员,1用户,2路人,10操作系统,11其他
	'User' =>'用户',//'from_type'=1, 来源类型.0管理员,1用户,2路人,10操作系统,11其他
	'Guest' =>'游客',//'from_type'=2, 来源类型.0管理员,1用户,2路人,10操作系统,11其他
	'Operation System' =>'操作系统',//'from_type'=10, 来源类型.0管理员,1用户,2路人,10操作系统,11其他
	'Other' =>'其他',//'from_type'=100, 来源类型.0管理员,1用户,2路人,10操作系统,11其他
	/*end*AdminMessage*/

];