<?php

use yii\db\Schema;

class m180507_011906_start extends \yii\db\Migration
{
    public function safeUp()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        if (!in_array(Yii::$app->db->tablePrefix.'active', $tables))  {
        $this->createTable('{{%active}}', [
              'id' => $this->primaryKey(),
              'user_id' => $this->integer(11)->comment(''),
              'type' => $this->smallInteger(4)->defaultValue(1)->comment('活动类型.commit:slfjk累死了地方.code:1=asd f,2=s adf.tran:1=冷静考虑，2=是浪费点卡.'),
              'action_id' => $this->integer(11)->comment('活动'),
              'table' => $this->string(255)->comment('表名'),
              'content' => $this->string(255)->comment('内容'),
              'name' => $this->string(255)->comment('活动名称'),
              'add_time' => $this->integer(11)->comment(''),
              'money' => $this->decimal(17,3)->notNull()->defaultValue('0.000')->comment('金额'),
        ], $tableOptions);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."active` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'admin', $tables))  {
        $this->createTable('{{%admin}}', [
              'id' => $this->primaryKey(),
              'name' => $this->string(50)->notNull()->unique()->comment('名称'),
              'head' => $this->string(255)->notNull()->comment('头像'),
              'email' => $this->string(20)->notNull()->comment('邮箱'),
              'mobile' => $this->string(20)->notNull()->comment('手机号'),
              'status' => $this->smallInteger(4)->notNull()->comment('状态'),
              'auth_key' => $this->string(255)->notNull()->comment('授权登录'),
              'password' => $this->string(255)->notNull()->comment('密码'),
              'password_reset_token' => $this->string(255)->notNull()->comment('密码重置口令'),
              'role_id' => $this->integer(11)->notNull()->defaultValue(10)->comment('角色'),
              'add_time' => $this->integer(11)->notNull()->comment('添加时间'),
              'edit_time' => $this->integer(11)->notNull()->comment('修改时间'),
        ], $tableOptions);
        $this->batchInsert('{{%admin}}', ['id','name','head','email','mobile','status','auth_key','password','password_reset_token','role_id','add_time','edit_time'],
        [
          	['2','admin1','','orx@la.com','18911179839','10','','$2y$13$gH74ONxbW91v10zPDb5UxuWPdV.p8Th.WHkSWfcNJUFtB.WQifTby','1234567','10','1523451258','1523632505'],
          	['1','orx','/upload/img/743185a1e6ca5007891c48150595d011.png','lbmzorx@163.com','123456','10','sadklfkasfjkl','$2y$13$gH74ONxbW91v10zPDb5UxuWPdV.p8Th.WHkSWfcNJUFtB.WQifTby','','10','0','1523632540'],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."admin` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'admin_info', $tables))  {
        $this->createTable('{{%admin_info}}', [
              'id' => $this->primaryKey(),
              'admin_id' => $this->integer(11)->notNull()->comment('管理员ID'),
              'real_name' => $this->string(50)->notNull()->defaultValue('')->comment('实名'),
              'sex' => $this->smallInteger(4)->notNull()->defaultValue(1)->comment('性别.0女,1男'),
              'birthday' => $this->string(20)->notNull()->defaultValue('')->comment('生日'),
              'province' => $this->string(20)->notNull()->defaultValue('')->comment('省'),
              'city' => $this->string(20)->notNull()->defaultValue('')->comment('市'),
              'county' => $this->string(20)->notNull()->defaultValue('')->comment('县/区'),
              'address' => $this->string(255)->notNull()->defaultValue('')->comment('详细地址'),
              'identified_card' => $this->string(18)->notNull()->defaultValue('')->comment('身份证'),
              'status' => $this->smallInteger(4)->notNull()->defaultValue(0)->comment('状态.0未实名,1已实名'),
              'qq' => $this->string(12)->notNull()->defaultValue('')->comment('QQ'),
              'wechat' => $this->string(20)->notNull()->defaultValue('0')->comment('微信'),
              'weibo' => $this->string(20)->notNull()->defaultValue('0')->comment('微博'),
              'other_mongodb' => $this->string(255)->notNull()->defaultValue('0')->comment('其他信息'),
              'add_time' => $this->integer(11)->notNull()->defaultValue(0)->comment('添加时间'),
              'edit_time' => $this->integer(11)->notNull()->defaultValue(0)->comment('修改时间'),
        ], $tableOptions);
        $this->batchInsert('{{%admin_info}}', ['id','admin_id','real_name','sex','birthday','province','city','county','address','identified_card','status','qq','wechat','weibo','other_mongodb','add_time','edit_time'],
        [
          	['1','1','orx','1','19910901','贵州省','黔南州','荔波县','贵州省荔波县','522722199109010714','0','234234','042342341','021341234','0213412432阿斯蒂芬','1523199335','1523201831'],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."admin_info` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'admin_log', $tables))  {
        $this->createTable('{{%admin_log}}', [
              'id' => $this->primaryKey(),
              'user_id' => $this->integer(11)->notNull()->unsigned()->comment('管理员用户id'),
              'route' => $this->string(255)->notNull()->defaultValue('')->comment('操作路由'),
              'description' => $this->text()->comment('操作描述'),
              'add_time' => $this->integer(11)->notNull()->unsigned()->comment('添加时间'),
              'edit_time' => $this->integer(11)->notNull()->unsigned()->defaultValue('0')->comment('修改时间'),
        ], $tableOptions);
        $this->batchInsert('{{%admin_log}}', ['id','user_id','route','description','add_time','edit_time'],
        [
          	['67','1','role/delete','{{%ADMIN_USER%}} [ orx ] {{%BY%}} backend\\models\\form\\Rbac   {{%DELETED%}}  {{%RECORD%}}: <br>角色(name) => \"\\u5362\\u65af\\u79d1\\u62c9\\u4f1a\\u8ba1\\u6cd5\",<br>Type(type) => null,<br>描述(description) => \"\\u5206\\u5f00\\u62c9\\u5c71\\u53e3\",<br>Rule Name(ruleName) => null,<br>Data(data) => null,<br>路由(route) => null,<br>请求方式(method) => null,<br>组(group) => null,<br>分类(category) => null,<br>排序(sort) => \"4\",<br>权限(permissions) => {\"\\/article\\/default\\/index:GET\":\"\\/article\\/default\\/index:GET\",\"\\/article\\/default\\/update:GET\":\"\\/article\\/default\\/update:GET\",\"\\/article\\/default\\/update:POST\":\"\\/article\\/default\\/update:POST\",\"\\/asdfasfsafasdf\\/asdfasf:GET\":\"\\/asdfasfsafasdf\\/asdfasf:GET\",\"\\/aslkdfjk\\/aslkdfj:GET\":\"\\/aslkdfjk\\/aslkdfj:GET\",\"\\/fsdff\\/asdfasd\\/f\\/asdfdasf:GET\":\"\\/fsdff\\/asdfasd\\/f\\/asdfdasf:GET\"},<br>角色(roles) => [\"\\u5362\\u65af\\u79d1\\u62c9\\u4f1a\\u8ba1\\u6cd5\"]','1522682985','0'],
          	['66','1','role/create','{{%ADMIN_USER%}} [ orx ] {{%BY%}} backend\\models\\form\\Rbac  {{%CREATED%}}  {{%RECORD%}}: <br>角色(name) => \"\\u963f\\u8428\\u5fb7\\u53d1\\u9001\\u65b9\",<br>Type(type) => null,<br>描述(description) => \"\\u963f\\u8428\\u5fb7\\u53d1\\u9001\",<br>Rule Name(ruleName) => null,<br>Data(data) => null,<br>路由(route) => null,<br>请求方式(method) => null,<br>组(group) => null,<br>分类(category) => null,<br>排序(sort) => \"1\",<br>权限(permissions) => {\"\\/article\\/default\\/update:GET\":\"\\/article\\/default\\/update:GET\",\"\\/article\\/default\\/update:POST\":\"\\/article\\/default\\/update:POST\",\"\\/article\\/default\\/index:GET\":\"\\/article\\/default\\/index:GET\",\"\\/asdfasfsafasdf\\/asdfasf:GET\":\"\\/asdfasfsafasdf\\/asdfasf:GET\",\"\\/fsdff\\/asdfasd\\/f\\/asdfdasf:GET\":\"\\/fsdff\\/asdfasd\\/f\\/asdfdasf:GET\"},<br>角色(roles) => null','1522682981','0'],
          	['65','1','role/create','{{%ADMIN_USER%}} [ orx ] {{%BY%}} backend\\models\\form\\Rbac  {{%CREATED%}}  {{%RECORD%}}: <br>角色(name) => \"\\u5362\\u65af\\u79d1\\u62c9\\u4f1a\\u8ba1\\u6cd5\",<br>Type(type) => null,<br>描述(description) => \"\\u5206\\u5f00\\u62c9\\u5c71\\u53e3\",<br>Rule Name(ruleName) => null,<br>Data(data) => null,<br>路由(route) => null,<br>请求方式(method) => null,<br>组(group) => null,<br>分类(category) => null,<br>排序(sort) => \"3\",<br>权限(permissions) => {\"\\/article\\/default\\/update:GET\":\"\\/article\\/default\\/update:GET\",\"\\/article\\/default\\/index:GET\":\"\\/article\\/default\\/index:GET\",\"\\/asdfasfsafasdf\\/asdfasf:GET\":\"\\/asdfasfsafasdf\\/asdfasf:GET\",\"\\/fsdff\\/asdfasd\\/f\\/asdfdasf:GET\":\"\\/fsdff\\/asdfasd\\/f\\/asdfdasf:GET\",\"\\/aslkdfjk\\/aslkdfj:GET\":\"\\/aslkdfjk\\/aslkdfj:GET\"},<br>角色(roles) => null','1522682166','0'],
          	['64','1','permission/create','{{%ADMIN_USER%}} [ orx ] {{%BY%}} backend\\models\\form\\Rbac  {{%CREATED%}}  {{%RECORD%}}: <br>角色(name) => /article/default/update:POST,<br>Type(type) => ,<br>描述(description) => 文章更新(确定),<br>Rule Name(ruleName) => ,<br>Data(data) => ,<br>路由(route) => /article/default/update,<br>请求方式(method) => POST,<br>组(group) => asdfaasdfasdf,<br>分类(category) => 连连看,<br>排序(sort) => 0,<br>权限(permissions) => ,<br>角色(roles) => ','1522514529','0'],
          	['63','1','permission/create','{{%ADMIN_USER%}} [ orx ] {{%BY%}} backend\\models\\form\\Rbac  {{%CREATED%}}  {{%RECORD%}}: <br>角色(name) => /article/default/update:GET,<br>Type(type) => ,<br>描述(description) => 文章更新(查看),<br>Rule Name(ruleName) => ,<br>Data(data) => ,<br>路由(route) => /article/default/update,<br>请求方式(method) => GET,<br>组(group) => asdfaasdfasdf,<br>分类(category) => 连连看,<br>排序(sort) => 0,<br>权限(permissions) => ,<br>角色(roles) => ','1522513356','0'],
          	['62','1','permission/create','{{%ADMIN_USER%}} [ orx ] {{%BY%}} backend\\models\\form\\Rbac  {{%CREATED%}}  {{%RECORD%}}: <br>角色(name) => /article/default/index:GET,<br>Type(type) => ,<br>描述(description) => 文章(查看),<br>Rule Name(ruleName) => ,<br>Data(data) => ,<br>路由(route) => /article/default/index,<br>请求方式(method) => GET,<br>组(group) => asdfaasdfasdf,<br>分类(category) => 连连看,<br>排序(sort) => 0,<br>权限(permissions) => ,<br>角色(roles) => ','1522513308','0'],
          	['61','1','permission/create','{{%ADMIN_USER%}} [ orx ] {{%BY%}} backend\\models\\form\\Rbac  {{%CREATED%}}  {{%RECORD%}}: <br>角色(name) => /asdfasfsafasdf/asdfasf:GET,<br>Type(type) => ,<br>描述(description) => asdfasfasasdfasfasf,<br>Rule Name(ruleName) => ,<br>Data(data) => ,<br>路由(route) => /asdfasfsafasdf/asdfasf,<br>请求方式(method) => GET,<br>组(group) => asdfaasdfasdf,<br>分类(category) => ddd,<br>排序(sort) => 4,<br>权限(permissions) => ,<br>角色(roles) => ','1522497443','0'],
          	['60','1','permission/create','{{%ADMIN_USER%}} [ orx ] {{%BY%}} backend\\models\\form\\Rbac  {{%CREATED%}}  {{%RECORD%}}: <br>角色(name) => /fsdff/asdfasd/f/asdfdasf:GET,<br>Type(type) => ,<br>描述(description) => asdfasfasfasfsfsfasdffasdfsf,<br>Rule Name(ruleName) => ,<br>Data(data) => ,<br>路由(route) => /fsdff/asdfasd/f/asdfdasf,<br>请求方式(method) => GET,<br>组(group) => asdfaasdfasdf,<br>分类(category) => asdfsdfsfsfs,<br>排序(sort) => 0,<br>权限(permissions) => ,<br>角色(roles) => ','1522497377','0'],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."admin_log` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'admin_message', $tables))  {
        $this->createTable('{{%admin_message}}', [
              'id' => $this->bigPrimaryKey(),
              'to_admin_id' => $this->integer(11)->notNull()->unsigned()->defaultValue('0')->comment('收信管理员'),
              'from_admin_id' => $this->integer(11)->notNull()->unsigned()->defaultValue('0')->comment('发信管理员'),
              'spread_type' => $this->smallInteger(4)->notNull()->unsigned()->defaultValue(3)->comment('消息类型.0=广播,1组,3私信'),
              'level' => $this->smallInteger(4)->notNull()->defaultValue(0)->comment('级别.0一般,1=1星,2=2星,3=3星,4=4星,5=5星'),
              'name' => $this->string(20)->notNull()->comment('消息名'),
              'content' => $this->string(255)->notNull()->comment('内容'),
              'read' => $this->smallInteger(4)->notNull()->unsigned()->defaultValue(0)->comment('已读.0未读,1已读'),
              'from_type' => $this->smallInteger(3)->notNull()->unsigned()->defaultValue(0)->comment('来源类型.0管理员,1用户,2路人,10操作系统,11其他'),
              'add_time' => $this->integer(11)->notNull()->defaultValue(0)->comment('添加时间'),
        ], $tableOptions);
        $this->batchInsert('{{%admin_message}}', ['id','to_admin_id','from_admin_id','spread_type','level','name','content','read','from_type','add_time'],
        [
          	['36','1','1','2','0','0阿萨德发送方','0啊岁的发撒地方','1','0','1523545302'],
          	['35','2','1','2','0','0阿萨德发送方','0阿萨德发送方','0','0','1523545262'],
          	['34','2','2','2','0','0','0','1','0','1523463974'],
          	['33','1','2','3','0','0asfdasdf','0asdfasfdasfsdf','0','0','1523463966'],
          	['32','1','1','2','0','0asdfas','0asdfasdfas','1','0','1523463926'],
          	['31','1','1','2','0','0asdfasdfas','0fasdfasdfadsfas','1','0','1523463837'],
          	['30','2','1','2','0','0asdfasfas','0asdfasdfadsf','1','0','1523463654'],
          	['29','2','2','0','0','0asdfdasfa','0asdfasdfasf','1','0','1523463516'],
          	['28','2','2','0','0','0asdfasdfasdf','0asdfasdf','1','0','1523462542'],
          	['27','2','2','2','0','0环境规划机构合计','0高官厚爵','1','0','1523462236'],
          	['26','2','2','2','0','0环境规划机构合计','0高官厚爵','1','0','1523462212'],
          	['25','2','2','2','0','0环境规划机构合计','0高官厚爵','1','0','1523462196'],
          	['24','2','2','2','0','0环境规划机构合计','0高官厚爵','1','0','1523462012'],
          	['23','2','2','2','0','0环境规划机构合计','0高官厚爵','1','0','1523461986'],
          	['22','2','2','2','0','0环境规划机构合计','0高官厚爵','1','0','1523461950'],
          	['21','2','2','0','0','0','0','1','0','1523461857'],
          	['20','2','2','2','0','0阿斯短发岁的法第三方的萨芬的','0阿萨德发','1','0','1523461504'],
          	['19','2','2','2','0','0阿斯短发岁的法第三方的萨芬的','0阿萨德发','1','0','1523461502'],
          	['18','2','2','2','0','0阿斯短发岁的法第三方的萨芬的','0阿萨德发','1','0','1523461500'],
          	['17','2','2','2','0','0阿斯短发岁的法第三方的萨芬的','0阿萨德发','1','0','1523461498'],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."admin_message` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'admin_message_log', $tables))  {
        $this->createTable('{{%admin_message_log}}', [
              'admin_message_id' => $this->integer(11)->notNull()->comment(''),
              'admin_id' => $this->integer(11)->notNull()->comment(''),
              'PRIMARY KEY ([[admin_message_id]], [[admin_id]])',
        ], $tableOptions);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."admin_message_log` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'article', $tables))  {
        $this->createTable('{{%article}}', [
              'id' => $this->bigPrimaryKey(),
              'user_id' => $this->integer(11)->notNull()->comment('用户ID'),
              'cate_id' => $this->integer(11)->comment('分类'),
              'sort' => $this->integer(11)->comment('排序'),
              'title' => $this->string(50)->unique()->comment('标题'),
              'author' => $this->string(255)->comment('作者'),
              'cover' => $this->string(255)->comment('封面'),
              'abstract' => $this->string(255)->comment('摘要'),
              'content_id' => $this->bigInteger(20)->notNull()->comment('文章内容'),
              'remain' => $this->smallInteger(4)->defaultValue(0)->comment('提醒.0未提醒，1已经提醒'),
              'auth' => $this->smallInteger(4)->defaultValue(0)->comment('权限.0所有人，1好友，2加密，3自己'),
              'tag' => $this->string(20)->comment('标签'),
              'commit' => $this->integer(11)->unsigned()->defaultValue('0')->comment('评论'),
              'view' => $this->integer(11)->unsigned()->defaultValue('0')->comment('浏览'),
              'collection' => $this->integer(11)->unsigned()->defaultValue('0')->comment('收藏'),
              'thumbup' => $this->integer(11)->defaultValue(0)->comment('赞'),
              'level' => $this->smallInteger(4)->defaultValue(2)->comment('文章级别.0垃圾,1较差,2普通,3较好,4优秀,5天才'),
              'score' => $this->smallInteger(4)->defaultValue(0)->comment('评分'),
              'publish' => $this->smallInteger(4)->defaultValue(1)->comment('发布.0草稿,1发布'),
              'status' => $this->smallInteger(4)->defaultValue(0)->comment('状态值.0待审核,1审核通过,2正在审核,3审核不通过'),
              'add_time' => $this->integer(11)->defaultValue(0)->comment('添加时间'),
              'edit_time' => $this->integer(11)->comment('编辑时间'),
              'type' => $this->smallInteger(4)->defaultValue(0)->comment('类型.0用户,1单页'),
        ], $tableOptions);
        $this->batchInsert('{{%article}}', ['id','user_id','cate_id','sort','title','author','cover','abstract','content_id','remain','auth','tag','commit','view','collection','thumbup','level','score','publish','status','add_time','edit_time','type'],
        [
          	['17','0','12','0','lasdkjlf','lsakdfjklsa','/upload/img/a1394f470bfb41b26bf2fa8a0e17031e.png','asdfasfs','15','0','0','asdfasf','0','0','0','0','2','0','0','0','1521906949','',''],
          	['16','0','10','1','阿萨德发s','阿斯蒂芬','','暗室逢灯','14','0','0','啊df','0','0','0','0','4','0','0','0','1521564659','1521867600',''],
          	['15','0','10','1','阿萨德发','阿斯蒂芬','','暗室逢灯','13','0','0','啊df','0','0','0','0','4','0','0','0','1521564629','1521867600',''],
          	['14','1','9','','凯利数据看来飞机看来','','','','9','1','0','理了理','0','0','0','0','4','0','1','1','1518937954','1521867600',''],
          	['13','1','10','','啊岁的发撒地方','','','','8','0','0','as阿萨德发送方','0','0','0','0','4','0','1','1','1517747893','1521867600',''],
          	['12','1','10','','阿萨德发送方','','','','7','0','0','阿萨德发送方','0','0','0','0','4','0','0','0','1517747813','1521867600',''],
          	['10','1','11','','阿萨德发送s','','','','6','1','0','asd阿萨德发送','0','0','0','0','4','0','1','1','1517737870','1521867600',''],
          	['9','1','12','','阿萨德发送','','','','5','1','0','asd阿斯蒂芬as阿斯','0','0','0','0','4','0','1','1','1517737578','1521867600',''],
          	['5','0','10','','所得税','得到','','撒旦发射反','4','1','0','','0','0','0','0','4','0','0','1','1515085778','1521867600',''],
          	['3','0','29','','酸酸的发射点发大厦发生','是的发射发as','阿萨德发送方','阿萨德发送方','3','0','1','','0','0','0','0','4','0','1','1','1515082835','1521867600',''],
          	['2','0','10','','扫扫地','得到','','撒旦发射点发生','2','1','1','','0','0','0','0','4','0','0','1','1515082482','1521867600',''],
          	['1','1','16','1','sdfsafa','sdfasfsf','http://www.chongloua.com/upload/img/eedd49bd0c6de401ae0770d919070b10.png','asdfdasfsa','1','1','1','','0','0','0','0','4','0','0','1','','1521867600',''],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."article` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'article_cate', $tables))  {
        $this->createTable('{{%article_cate}}', [
              'id' => $this->primaryKey(),
              'name' => $this->string(50)->defaultValue('0')->comment('名称'),
              'parent_id' => $this->integer(11)->defaultValue(0)->comment('父级分类'),
              'level' => $this->smallInteger(4)->defaultValue(0)->comment('级别'),
              'path' => $this->string(255)->defaultValue('0')->comment('路径'),
              'status' => $this->smallInteger(4)->defaultValue(1)->comment('状态.0未开启，1启用'),
              'add_time' => $this->integer(11)->comment('添加时间'),
              'edit_time' => $this->integer(11)->comment('编辑时间'),
        ], $tableOptions);
        $this->batchInsert('{{%article_cate}}', ['id','name','parent_id','level','path','status','add_time','edit_time'],
        [
          	['31','淋漓畅快','','0','0','','1514392772',''],
          	['30','1立刻就可的','','0','0','','1514392765',''],
          	['29','模式23489','25','0','0','1','1514392759','1521134090'],
          	['28','按错vasadffdds','','0','0','','1514392751',''],
          	['27','按错vasadf','','0','0','','1514392740',''],
          	['26','按错v','','0','0','','1514392734',''],
          	['25','12vdfd','','0','0','','1514392727',''],
          	['24','123个是','','0','0','','1514392718',''],
          	['23','234','','0','0','','1514392711',''],
          	['22','买那个','','0','0','','1514392696',''],
          	['21','123个','','0','0','','1514392685',''],
          	['20','功夫','','0','0','','1514392676',''],
          	['19','432但是','','0','0','','1514392664',''],
          	['18','撒撒旦','','0','0','','1514392657',''],
          	['17','扫扫地','','0','0','','1514392649',''],
          	['16','得到','','0','0','','1514392644',''],
          	['15','撒旦法','','0','0','','1514392637',''],
          	['12','案例','','0','0','','1514390294',''],
          	['11','话题','','0','0','','1514390238',''],
          	['10','说说','','0','0','','1514390230',''],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."article_cate` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'article_collection', $tables))  {
        $this->createTable('{{%article_collection}}', [
              'id' => $this->primaryKey(),
              'article_id' => $this->integer(11)->unsigned()->comment('文章ID'),
              'user_id' => $this->integer(11)->unsigned()->comment('用户ID'),
              'add_time' => $this->integer(11)->unsigned()->comment('添加时间'),
        ], $tableOptions);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."article_collection` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'article_commit', $tables))  {
        $this->createTable('{{%article_commit}}', [
              'id' => $this->primaryKey(),
              'article_id' => $this->integer(11)->unsigned()->comment('文章ID'),
              'user_id' => $this->integer(11)->unsigned()->comment('用户ID'),
              'commit_id' => $this->integer(11)->unsigned()->comment('评论ID'),
              'content' => $this->string(400)->comment('内容'),
              'status' => $this->smallInteger(4)->defaultValue(0)->comment('状态.0，已发表，1评论成功，3非法评论，2审核不通过'),
              'add_time' => $this->integer(11)->unsigned()->comment('添加时间'),
        ], $tableOptions);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."article_commit` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'article_content', $tables))  {
        $this->createTable('{{%article_content}}', [
              'id' => $this->bigPrimaryKey(),
              'content' => $this->text()->notNull()->comment('文章内容'),
        ], $tableOptions);
        $this->batchInsert('{{%article_content}}', ['id','content'],
        [
          	['15','asdfasdfasdfasf'],
          	['14','电费阿斯蒂芬a\n阿萨德发送 '],
          	['13','电费阿斯蒂芬a\n阿萨德发送 '],
          	['12','电费阿斯蒂芬a\n阿萨德发送 '],
          	['11','电费阿斯蒂芬a\n阿萨德发送 '],
          	['10','asdfasdfasfd'],
          	['9','asdfasasdfas'],
          	['8','dfdsfaf'],
          	['7','asdfff'],
          	['6','asdf'],
          	['5','asdf'],
          	['4','asdf'],
          	['3','asdf'],
          	['2','sdfas![](www.chongloua.com/upload/img/9dff0094b9b0b6d2314bb2177253d8f3.png)'],
          	['1','![](http://www.chongloua.com/upload/img/aa90b32dbdeb45398ac5790777afba84.png)md\n\n\n\n\nasdfasdf\n\nasdf\na\nf\nasd\nfa\nsdf\nasf\nasd\nfa\ns\nfs\nfsd\nf\ndas\nf\nasf\nasd\nfsd\na'],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."article_content` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'article_thumbup', $tables))  {
        $this->createTable('{{%article_thumbup}}', [
              'id' => $this->primaryKey(),
              'article_id' => $this->integer(11)->unsigned()->comment('文章ID'),
              'user_id' => $this->integer(11)->unsigned()->comment('用户ID'),
              'add_time' => $this->integer(11)->unsigned()->comment('添加时间'),
        ], $tableOptions);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."article_thumbup` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'auth_assignment', $tables))  {
        $this->createTable('{{%auth_assignment}}', [
              'item_name' => $this->string(64)->notNull()->comment(''),
              'user_id' => $this->string(64)->notNull()->comment(''),
              'created_at' => $this->integer(11)->comment(''),
              'PRIMARY KEY ([[item_name]], [[user_id]])',
        ], $tableOptions);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."auth_assignment` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'auth_item', $tables))  {
        $this->createTable('{{%auth_item}}', [
              'name' => $this->string(64)->notNull()->comment(''),
              'type' => $this->smallInteger(6)->notNull()->comment(''),
              'description' => $this->text()->comment(''),
              'rule_name' => $this->string(64)->comment(''),
              'data' => $this->binary()->comment(''),
              'created_at' => $this->integer(11)->comment(''),
              'updated_at' => $this->integer(11)->comment(''),
              'PRIMARY KEY ([[name]])',
        ], $tableOptions);
        $this->batchInsert('{{%auth_item}}', ['name','type','description','rule_name','data','created_at','updated_at'],
        [
          	['/article/default/index:GET','2','文章(查看)','','s:68:\"{\"group\":\"asdfaasdfasdf\",\"sort\":\"3\",\"category\":\"\\u8fde\\u8fde\\u770b\"}\";','1522513308','1522515271'],
          	['/article/default/update:GET','2','文章更新(查看)','','s:68:\"{\"group\":\"asdfaasdfasdf\",\"sort\":\"0\",\"category\":\"\\u8fde\\u8fde\\u770b\"}\";','1522513356','1522759224'],
          	['/article/default/update:POST','2','文章更新(确定)','','s:68:\"{\"group\":\"asdfaasdfasdf\",\"sort\":\"0\",\"category\":\"\\u8fde\\u8fde\\u770b\"}\";','1522514528','1522514528'],
          	['/asdfasfsafasdf/asdfasf:GET','2','asdfasfasasdfasfasf','','s:54:\"{\"group\":\"asdfaasdfasdf\",\"sort\":\"11\",\"category\":\"ddd\"}\";','1522497442','1522500042'],
          	['/aslkdfjk/aslkdfj:GET','2','asdfasfas[get]','','s:43:\"{\"group\":\"as\",\"sort\":\"13\",\"category\":\"ddd\"}\";','1522489665','1522500023'],
          	['/fsdff/asdfasd/f/asdfdasf:GET','2','asdfasfasfasfsfsfasdffasdfsf','','s:63:\"{\"group\":\"asdfaasdfasdf\",\"sort\":\"11\",\"category\":\"asdfsdfsfsfs\"}\";','1522497377','1522500019'],
          	['阿萨德发送方','1','阿萨德发送','','s:12:\"{\"sort\":\"1\"}\";','1522682981','1522758940'],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."auth_item` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'auth_item_child', $tables))  {
        $this->createTable('{{%auth_item_child}}', [
              'parent' => $this->string(64)->notNull()->comment(''),
              'child' => $this->string(64)->notNull()->comment(''),
              'PRIMARY KEY ([[parent]], [[child]])',
        ], $tableOptions);
        $this->batchInsert('{{%auth_item_child}}', ['parent','child'],
        [
          	['asdfasdf','/article/default/index:GET'],
          	['asdfasdf','/article/default/update:GET'],
          	['asdfasdf','/article/default/update:POST'],
          	['asdfasdf','/asdfasfsafasdf/asdfasf:GET'],
          	['asdfasdf','/aslkdfjk/aslkdfj:GET'],
          	['asdfasdf','/fsdff/asdfasd/f/asdfdasf:GET'],
          	['卢斯科拉会计法','/article/default/index:GET'],
          	['卢斯科拉会计法','/article/default/update:GET'],
          	['卢斯科拉会计法','/article/default/update:POST'],
          	['卢斯科拉会计法','/asdfasfsafasdf/asdfasf:GET'],
          	['卢斯科拉会计法','/aslkdfjk/aslkdfj:GET'],
          	['卢斯科拉会计法','/fsdff/asdfasd/f/asdfdasf:GET'],
          	['阿萨德发送方','/article/default/index:GET'],
          	['阿萨德发送方','/article/default/update:GET'],
          	['阿萨德发送方','/article/default/update:POST'],
          	['阿萨德发送方','/asdfasfsafasdf/asdfasf:GET'],
          	['阿萨德发送方','/aslkdfjk/aslkdfj:GET'],
          	['阿萨德发送方','/fsdff/asdfasd/f/asdfdasf:GET'],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."auth_item_child` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'auth_rule', $tables))  {
        $this->createTable('{{%auth_rule}}', [
              'name' => $this->string(64)->notNull()->comment(''),
              'data' => $this->binary()->comment(''),
              'created_at' => $this->integer(11)->comment(''),
              'updated_at' => $this->integer(11)->comment(''),
              'PRIMARY KEY ([[name]])',
        ], $tableOptions);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."auth_rule` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'img_upload', $tables))  {
        $this->createTable('{{%img_upload}}', [
              'id' => $this->primaryKey(),
              'filePath' => $this->string(255)->comment('文件路径'),
              'add_time' => $this->integer(11)->comment(''),
              'user_id' => $this->integer(11)->comment('用户ID'),
              'admin_id' => $this->integer(11)->comment('管理员ID'),
        ], $tableOptions);
        $this->batchInsert('{{%img_upload}}', ['id','filePath','add_time','user_id','admin_id'],
        [
          	['25','E:\\www\\Yii\\chonglou/backend/web/upload/img/743185a1e6ca5007891c48150595d011.png','1523201828','','1'],
          	['24','E:\\www\\Yii\\chonglou/backend/web/upload/img/dd3b8c5073c7c8aa29c296d5343ae1f3.png','1523200811','','1'],
          	['23','E:\\www\\Yii\\chonglou/backend/web/upload/img/2d7bdf7e59c11eb3bc40e8445efd60c3.png','1523200785','','1'],
          	['22','E:\\www\\Yii\\chonglou/backend/web/upload/img/1e0e90083a9d2a9108c455a7f2505644.png','1523200724','','1'],
          	['21','E:\\www\\Yii\\chonglou/backend/web/upload/img/8e6e94a366f4c5628df21bd27d27b670.png','1523200700','','1'],
          	['20','E:\\www\\Yii\\chonglou/backend/web/upload/img/bc2a7cce6f59dd45556ddaf0a1e8bf21.png','1523200615','','1'],
          	['19','E:\\www\\Yii\\chonglou/backend/web/upload/img/fedde1f51cdad3f87df632a61b6da59d.png','1523200434','','1'],
          	['18','E:\\www\\Yii\\chonglou/backend/web/upload/img/3bbe5be57e95ed4f3dad547957e3d103.png','1523200382','','1'],
          	['17','E:\\www\\Yii\\chonglou/backend/web/upload/img/31af545be947f44a6ce648104f6c5f44.png','1523200326','','1'],
          	['16','E:\\www\\Yii\\chonglou/backend/web/upload/img/3cc641c103a653119e5c316fcd8a4dfb.png','1523200214','','1'],
          	['15','E:\\www\\Yii\\chonglou/backend/web/upload/img/e84b3f3e7af44392ea0cbb7560ea350d.png','1523200046','','1'],
          	['14','E:\\www\\Yii\\chonglou/backend/web/upload/img/7705e4d76d760ea2533c0878702eda79.png','1523199966','','1'],
          	['13','E:\\www\\Yii\\chonglou/backend/web/upload/img/7c0c6f27bf0d43e611dd712483d01542.png','1523199281','','1'],
          	['12','E:\\www\\Yii\\chonglou/backend/web/upload/img/8c8b571a6cbb423ee76cf9cadb368d7d.png','1523194102','','1'],
          	['11','E:\\www\\Yii\\chonglou/frontend/web/upload/img/9f89537a5e40a04aba9a98f56b86222d.png','1522462928','','1'],
          	['10','E:\\www\\Yii\\chonglou/frontend/web/upload/img/7930639c2d0c4e54ff99df7659df649d.png','1522251814','','1'],
          	['9','E:\\www\\Yii\\chonglou/frontend/web/upload/img/e9b9fc1372553d3ed05916c6d0b5b20b.png','1522251600','','1'],
          	['8','E:\\www\\Yii\\chonglou/frontend/web/upload/img/cdec4647d197ae82277f4b92fd53c2e5.png','1522251387','','1'],
          	['7','E:\\www\\Yii\\chonglou/frontend/web/upload/img/a1394f470bfb41b26bf2fa8a0e17031e.png','1521906907','','1'],
          	['6','E:\\www\\Yii\\chonglou/frontend/web/upload/img/e1e1d82036791630101d97da6920fe36.png','1521563984','','1'],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."img_upload` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'layout', $tables))  {
        $this->createTable('{{%layout}}', [
              'id' => $this->primaryKey(),
              'templateClass' => $this->integer(11)->comment('模版类'),
              'name' => $this->string(50)->comment('名称'),
              'sequence' => $this->string(255)->comment('排序'),
        ], $tableOptions);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."layout` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'log', $tables))  {
        $this->createTable('{{%log}}', [
              'id' => $this->bigPrimaryKey(),
              'level' => $this->integer(11)->comment('级别.0x00=所有,0x01=致命错误,0x02=警告,0x04=信息,0x08=追踪,0x40=PROFILE,0x50=PROFILE_BEGIN,0x60=PROFILE_END'),
              'category' => $this->string(255)->comment('分类'),
              'log_time' => $this->float()->comment('记录时间'),
              'prefix' => $this->text()->comment('前缀'),
              'message' => $this->text()->comment('信息'),
        ], $tableOptions);
        $this->batchInsert('{{%log}}', ['id','level','category','log_time','prefix','message'],
        [
          	['415','4','application','1525620000','[127.0.0.1][-][-]','$_GET = [\n    \'id\' => \'giitool-crudall\'\n]\n\n$_POST = [\n    \'_csrf-backend\' => \'ZFhXdlZxeEQIOmI.BQYPfQ4hPBFjOxFpLRYnNz4ePXwPPQ06HgEPAg==\'\n    \'Generator\' => [\n        \'modelNamespace\' => \'common\\\\models\\\\data\'\n        \'namespace\' => \'backend\\\\controllers\'\n        \'onlyModel\' => \'\'\n        \'exceptModel\' => \'\'\n        \'searchNamespace\' => \'common\\\\models\\\\search\'\n        \'isLogin\' => \'1\'\n        \'commonControllerClass\' => \'backend\\\\controllers\\\\BaseCommonController\'\n        \'statusCode\' => \'1\'\n        \'sort\' => \'1\'\n        \'baseControllerClass\' => \'yii\\\\web\\\\Controller\'\n        \'indexWidgetType\' => \'grid\'\n        \'enableI18N\' => \'1\'\n        \'enablePjax\' => \'1\'\n        \'messageCategory\' => \'app\'\n        \'template\' => \'default\'\n    ]\n    \'answers\' => [\n        \'472e37df827efe21d503b368f7b19484\' => \'1\'\n        \'0c4fe4803fd1fe8c1a21e8c8c7236594\' => \'1\'\n        \'f9f48060cd4d3e55d5b3538028b3cbfd\' => \'1\'\n        \'4de5790aec1bbd8ce5cf49ea462cb936\' => \'1\'\n        \'1bf3b32f434161a0c506cebc4728036b\' => \'1\'\n        \'8bf9844fde2ef6eee02145f5bcde8927\' => \'1\'\n        \'6d267649ef0be12c3cbb32e59e246d98\' => \'1\'\n        \'d9089ac22224959a74d12c639bfe4877\' => \'1\'\n        \'282f5cd84bc6464605c5f47ee314e127\' => \'1\'\n        \'80ebda30c5172e9566968d9bb40946ab\' => \'1\'\n        \'749d30e810daa785f29620c7da99ae5a\' => \'1\'\n        \'5e718bed488ab49c4c8a03ef386d4f05\' => \'1\'\n        \'178a145fdd5e56496acd823720c4432f\' => \'1\'\n        \'2b432e7594bd1dd0f5bbc1b6ba25d4b0\' => \'1\'\n        \'4ba83995668f883e5dc1da1f55e2b49c\' => \'1\'\n        \'18aba55bdcd29aa7a963dedb166594d8\' => \'1\'\n        \'2652b93439a773808a15630fbdbd5167\' => \'1\'\n        \'0918455c18d06b66f9b1adf543b3e206\' => \'1\'\n        \'cf2499d3ae552dd5b33c2f89e3e2cd6f\' => \'1\'\n        \'c613c9caeabb02101e2f61f3e5abec61\' => \'1\'\n        \'82ec2c6cb69d05b343e5fc937bcd4f36\' => \'1\'\n        \'354927c58347d153c62dac0155116a8c\' => \'1\'\n        \'b4c990e6280480f6199b78a28d5effd5\' => \'1\'\n        \'48e6cd4209d58274dbf001fa2fa4245a\' => \'1\'\n        \'b38855a695ce4438a77269c8f3b2a1b8\' => \'1\'\n        \'af3c192392516b0117ffcb8d5041f27c\' => \'1\'\n        \'af11cee883bcc222507f902fe5353441\' => \'1\'\n        \'06285fe8fdadc9d585070fac057b726f\' => \'1\'\n    ]\n    \'preview\' => \'\'\n]\n\n$_COOKIE = [\n    \'_csrf-backend\' => \'be936186111fc528528ba8c11fed906fac9c50d4f9b631b180c1e157263b6ec0a:2:{i:0;s:13:\\\"_csrf-backend\\\";i:1;s:32:\\\"lb5HSww9jykg5Ji-INpAhoE8keZLHpwF\\\";}\'\n]\n\n$_SERVER = [\n    \'PATH\' => \'C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;D:\\\\ProgramFiles\\\\mingw64\\\\bin;D:\\\\Program Files\\\\PTC\\\\Creo Elements\\\\Pro5.0\\\\bin;C:\\\\Program Files (x86)\\\\NVIDIA Corporation\\\\PhysX\\\\Common;D:\\\\Program Files\\\\Java\\\\jdk1.8.0_111\\\\bin;D:\\\\Program Files\\\\Java\\\\jre1.8.0_111\\\\bin;D:\\\\Go\\\\bin;D:\\\\phpStudy\\\\php\\\\php-7.0.12-nts;D:\\\\ProgramFiles\\\\redis;D:\\\\ProgramFiles\\\\sphinx-2.2.11-release-win64\\\\bin;D:\\\\Program Files\\\\graphviz-2.38\\\\release\\\\bin;D:\\\\Program Files\\\\Git\\\\cmd;D:\\\\Program Files\\\\node-v8.11.1-win-x64;\'\n    \'SYSTEMROOT\' => \'C:\\\\Windows\'\n    \'COMSPEC\' => \'C:\\\\Windows\\\\system32\\\\cmd.exe\'\n    \'PATHEXT\' => \'.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC\'\n    \'WINDIR\' => \'C:\\\\Windows\'\n    \'PHP_FCGI_MAX_REQUESTS\' => \'1000\'\n    \'PHPRC\' => \'D:/phpStudy/php/php-7.0.12-nts/\'\n    \'_FCGI_SHUTDOWN_EVENT_\' => \'1812\'\n    \'SCRIPT_NAME\' => \'/index.php\'\n    \'REQUEST_URI\' => \'/gii/default/view?id=giitool-crudall\'\n    \'QUERY_STRING\' => \'id=giitool-crudall\'\n    \'REQUEST_METHOD\' => \'POST\'\n    \'SERVER_PROTOCOL\' => \'HTTP/1.1\'\n    \'GATEWAY_INTERFACE\' => \'CGI/1.1\'\n    \'REDIRECT_QUERY_STRING\' => \'id=giitool-crudall\'\n    \'REDIRECT_URL\' => \'/gii/default/view\'\n    \'REMOTE_PORT\' => \'61852\'\n    \'SCRIPT_FILENAME\' => \'E:/www/Yii/chonglou_test/backend/web/index.php\'\n    \'SERVER_ADMIN\' => \'admin@phpStudy.net\'\n    \'CONTEXT_DOCUMENT_ROOT\' => \'E:/www/Yii/chonglou_test/backend/web\'\n    \'CONTEXT_PREFIX\' => \'\'\n    \'REQUEST_SCHEME\' => \'http\'\n    \'DOCUMENT_ROOT\' => \'E:/www/Yii/chonglou_test/backend/web\'\n    \'REMOTE_ADDR\' => \'127.0.0.1\'\n    \'SERVER_PORT\' => \'80\'\n    \'SERVER_ADDR\' => \'127.0.0.1\'\n    \'SERVER_NAME\' => \'admin.chongloutest.com\'\n    \'SERVER_SOFTWARE\' => \'Apache/2.4.23 (Win32) OpenSSL/1.0.2j mod_fcgid/2.3.9\'\n    \'SERVER_SIGNATURE\' => \'\'\n    \'SystemRoot\' => \'C:\\\\Windows\'\n    \'HTTP_COOKIE\' => \'_csrf-backend=be936186111fc528528ba8c11fed906fac9c50d4f9b631b180c1e157263b6ec0a%3A2%3A%7Bi%3A0%3Bs%3A13%3A%22_csrf-backend%22%3Bi%3A1%3Bs%3A32%3A%22lb5HSww9jykg5Ji-INpAhoE8keZLHpwF%22%3B%7D\'\n    \'HTTP_ACCEPT_LANGUAGE\' => \'zh-CN,zh;q=0.9\'\n    \'HTTP_ACCEPT_ENCODING\' => \'gzip, deflate\'\n    \'HTTP_REFERER\' => \'http://admin.chongloutest.com/gii/default/view?id=giitool-crudall\'\n    \'HTTP_ACCEPT\' => \'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8\'\n    \'CONTENT_TYPE\' => \'application/x-www-form-urlencoded\'\n    \'HTTP_ORIGIN\' => \'http://admin.chongloutest.com\'\n    \'HTTP_USER_AGENT\' => \'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36\'\n    \'HTTP_UPGRADE_INSECURE_REQUESTS\' => \'1\'\n    \'HTTP_CACHE_CONTROL\' => \'max-age=0\'\n    \'CONTENT_LENGTH\' => \'2142\'\n    \'HTTP_CONNECTION\' => \'close\'\n    \'HTTP_HOST\' => \'admin.chongloutest.com\'\n    \'REDIRECT_STATUS\' => \'200\'\n    \'FCGI_ROLE\' => \'RESPONDER\'\n    \'PHP_SELF\' => \'/index.php\'\n    \'REQUEST_TIME_FLOAT\' => 1525623947.2752\n    \'REQUEST_TIME\' => 1525623947\n]'],
          	['414','2','yii\\log\\Dispatcher::dispatch','1525620000','[127.0.0.1][-][-]','Unable to send log via yii\\log\\DbTarget: Exception (Database Exception) \'yii\\db\\Exception\' with message \'SQLSTATE[42S02]: Base table or view not found: 1146 Table \'chonglou.chonglou_yii_log\' doesn\'t exist\nThe SQL being executed was: INSERT INTO `chonglou_yii_log` (`level`, `category`, `log_time`, `prefix`, `message`)\n                VALUES (1, \'yii\\\\i18n\\\\PhpMessageSource::loadFallbackMessages\', 1525623947.5022, \'[127.0.0.1][-][-]\', \'The message file for category \\\'model\\\' does not exist: E:\\\\www\\\\Yii\\\\chonglou_test\\\\common/messages/zh-CN/model.php Fallback file does not exist as well: E:\\\\www\\\\Yii\\\\chonglou_test\\\\common/messages/zh/model.php\')\' \n\nin E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\db\\Schema.php:636\n\nStack trace:\n#0 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\db\\Command.php(856): yii\\db\\Schema->convertException(Object(PDOException), \'INSERT INTO `ch...\')\n#1 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\log\\DbTarget.php(83): yii\\db\\Command->execute()\n#2 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\log\\Target.php(124): yii\\log\\DbTarget->export()\n#3 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\log\\Dispatcher.php(188): yii\\log\\Target->collect(Array, true)\n#4 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\log\\Logger.php(177): yii\\log\\Dispatcher->dispatch(Array, true)\n#5 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\ErrorHandler.php(113): yii\\log\\Logger->flush(true)\n#6 [internal function]: yii\\base\\ErrorHandler->handleException(Object(yii\\base\\UnknownPropertyException))\n#7 {main}'],
          	['413','4','application','1525620000','[127.0.0.1][-][-]','$_GET = [\n    \'id\' => \'giitool-crudall\'\n]\n\n$_POST = [\n    \'_csrf-backend\' => \'ZFhXdlZxeEQIOmI.BQYPfQ4hPBFjOxFpLRYnNz4ePXwPPQ06HgEPAg==\'\n    \'Generator\' => [\n        \'modelNamespace\' => \'common\\\\models\\\\data\'\n        \'namespace\' => \'backend\\\\controllers\'\n        \'onlyModel\' => \'\'\n        \'exceptModel\' => \'\'\n        \'searchNamespace\' => \'common\\\\models\\\\search\'\n        \'isLogin\' => \'1\'\n        \'commonControllerClass\' => \'backend\\\\controllers\\\\BaseCommonController\'\n        \'statusCode\' => \'1\'\n        \'sort\' => \'1\'\n        \'baseControllerClass\' => \'yii\\\\web\\\\Controller\'\n        \'indexWidgetType\' => \'grid\'\n        \'enableI18N\' => \'1\'\n        \'enablePjax\' => \'1\'\n        \'messageCategory\' => \'app\'\n        \'template\' => \'default\'\n    ]\n    \'answers\' => [\n        \'472e37df827efe21d503b368f7b19484\' => \'1\'\n        \'0c4fe4803fd1fe8c1a21e8c8c7236594\' => \'1\'\n        \'f9f48060cd4d3e55d5b3538028b3cbfd\' => \'1\'\n        \'4de5790aec1bbd8ce5cf49ea462cb936\' => \'1\'\n        \'1bf3b32f434161a0c506cebc4728036b\' => \'1\'\n        \'8bf9844fde2ef6eee02145f5bcde8927\' => \'1\'\n        \'6d267649ef0be12c3cbb32e59e246d98\' => \'1\'\n        \'d9089ac22224959a74d12c639bfe4877\' => \'1\'\n        \'282f5cd84bc6464605c5f47ee314e127\' => \'1\'\n        \'80ebda30c5172e9566968d9bb40946ab\' => \'1\'\n        \'749d30e810daa785f29620c7da99ae5a\' => \'1\'\n        \'5e718bed488ab49c4c8a03ef386d4f05\' => \'1\'\n        \'178a145fdd5e56496acd823720c4432f\' => \'1\'\n        \'2b432e7594bd1dd0f5bbc1b6ba25d4b0\' => \'1\'\n        \'4ba83995668f883e5dc1da1f55e2b49c\' => \'1\'\n        \'18aba55bdcd29aa7a963dedb166594d8\' => \'1\'\n        \'2652b93439a773808a15630fbdbd5167\' => \'1\'\n        \'0918455c18d06b66f9b1adf543b3e206\' => \'1\'\n        \'cf2499d3ae552dd5b33c2f89e3e2cd6f\' => \'1\'\n        \'c613c9caeabb02101e2f61f3e5abec61\' => \'1\'\n        \'82ec2c6cb69d05b343e5fc937bcd4f36\' => \'1\'\n        \'354927c58347d153c62dac0155116a8c\' => \'1\'\n        \'b4c990e6280480f6199b78a28d5effd5\' => \'1\'\n        \'48e6cd4209d58274dbf001fa2fa4245a\' => \'1\'\n        \'b38855a695ce4438a77269c8f3b2a1b8\' => \'1\'\n        \'af3c192392516b0117ffcb8d5041f27c\' => \'1\'\n        \'af11cee883bcc222507f902fe5353441\' => \'1\'\n        \'06285fe8fdadc9d585070fac057b726f\' => \'1\'\n    ]\n    \'preview\' => \'\'\n]\n\n$_COOKIE = [\n    \'_csrf-backend\' => \'be936186111fc528528ba8c11fed906fac9c50d4f9b631b180c1e157263b6ec0a:2:{i:0;s:13:\\\"_csrf-backend\\\";i:1;s:32:\\\"lb5HSww9jykg5Ji-INpAhoE8keZLHpwF\\\";}\'\n]\n\n$_SERVER = [\n    \'PATH\' => \'C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;D:\\\\ProgramFiles\\\\mingw64\\\\bin;D:\\\\Program Files\\\\PTC\\\\Creo Elements\\\\Pro5.0\\\\bin;C:\\\\Program Files (x86)\\\\NVIDIA Corporation\\\\PhysX\\\\Common;D:\\\\Program Files\\\\Java\\\\jdk1.8.0_111\\\\bin;D:\\\\Program Files\\\\Java\\\\jre1.8.0_111\\\\bin;D:\\\\Go\\\\bin;D:\\\\phpStudy\\\\php\\\\php-7.0.12-nts;D:\\\\ProgramFiles\\\\redis;D:\\\\ProgramFiles\\\\sphinx-2.2.11-release-win64\\\\bin;D:\\\\Program Files\\\\graphviz-2.38\\\\release\\\\bin;D:\\\\Program Files\\\\Git\\\\cmd;D:\\\\Program Files\\\\node-v8.11.1-win-x64;\'\n    \'SYSTEMROOT\' => \'C:\\\\Windows\'\n    \'COMSPEC\' => \'C:\\\\Windows\\\\system32\\\\cmd.exe\'\n    \'PATHEXT\' => \'.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC\'\n    \'WINDIR\' => \'C:\\\\Windows\'\n    \'PHP_FCGI_MAX_REQUESTS\' => \'1000\'\n    \'PHPRC\' => \'D:/phpStudy/php/php-7.0.12-nts/\'\n    \'_FCGI_SHUTDOWN_EVENT_\' => \'1812\'\n    \'SCRIPT_NAME\' => \'/index.php\'\n    \'REQUEST_URI\' => \'/gii/default/view?id=giitool-crudall\'\n    \'QUERY_STRING\' => \'id=giitool-crudall\'\n    \'REQUEST_METHOD\' => \'POST\'\n    \'SERVER_PROTOCOL\' => \'HTTP/1.1\'\n    \'GATEWAY_INTERFACE\' => \'CGI/1.1\'\n    \'REDIRECT_QUERY_STRING\' => \'id=giitool-crudall\'\n    \'REDIRECT_URL\' => \'/gii/default/view\'\n    \'REMOTE_PORT\' => \'61852\'\n    \'SCRIPT_FILENAME\' => \'E:/www/Yii/chonglou_test/backend/web/index.php\'\n    \'SERVER_ADMIN\' => \'admin@phpStudy.net\'\n    \'CONTEXT_DOCUMENT_ROOT\' => \'E:/www/Yii/chonglou_test/backend/web\'\n    \'CONTEXT_PREFIX\' => \'\'\n    \'REQUEST_SCHEME\' => \'http\'\n    \'DOCUMENT_ROOT\' => \'E:/www/Yii/chonglou_test/backend/web\'\n    \'REMOTE_ADDR\' => \'127.0.0.1\'\n    \'SERVER_PORT\' => \'80\'\n    \'SERVER_ADDR\' => \'127.0.0.1\'\n    \'SERVER_NAME\' => \'admin.chongloutest.com\'\n    \'SERVER_SOFTWARE\' => \'Apache/2.4.23 (Win32) OpenSSL/1.0.2j mod_fcgid/2.3.9\'\n    \'SERVER_SIGNATURE\' => \'\'\n    \'SystemRoot\' => \'C:\\\\Windows\'\n    \'HTTP_COOKIE\' => \'_csrf-backend=be936186111fc528528ba8c11fed906fac9c50d4f9b631b180c1e157263b6ec0a%3A2%3A%7Bi%3A0%3Bs%3A13%3A%22_csrf-backend%22%3Bi%3A1%3Bs%3A32%3A%22lb5HSww9jykg5Ji-INpAhoE8keZLHpwF%22%3B%7D\'\n    \'HTTP_ACCEPT_LANGUAGE\' => \'zh-CN,zh;q=0.9\'\n    \'HTTP_ACCEPT_ENCODING\' => \'gzip, deflate\'\n    \'HTTP_REFERER\' => \'http://admin.chongloutest.com/gii/default/view?id=giitool-crudall\'\n    \'HTTP_ACCEPT\' => \'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8\'\n    \'CONTENT_TYPE\' => \'application/x-www-form-urlencoded\'\n    \'HTTP_ORIGIN\' => \'http://admin.chongloutest.com\'\n    \'HTTP_USER_AGENT\' => \'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36\'\n    \'HTTP_UPGRADE_INSECURE_REQUESTS\' => \'1\'\n    \'HTTP_CACHE_CONTROL\' => \'max-age=0\'\n    \'CONTENT_LENGTH\' => \'2142\'\n    \'HTTP_CONNECTION\' => \'close\'\n    \'HTTP_HOST\' => \'admin.chongloutest.com\'\n    \'REDIRECT_STATUS\' => \'200\'\n    \'FCGI_ROLE\' => \'RESPONDER\'\n    \'PHP_SELF\' => \'/index.php\'\n    \'REQUEST_TIME_FLOAT\' => 1525623947.2752\n    \'REQUEST_TIME\' => 1525623947\n]'],
          	['412','1','yii\\base\\UnknownPropertyException','1525620000','[127.0.0.1][-][-]','yii\\base\\UnknownPropertyException: Getting unknown property: lbmzorx\\giitool\\generators\\crudall\\Generator::changeStatus in E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\Component.php:147\nStack trace:\n#0 E:\\www\\Yii\\chonglou_test\\vendor\\lbmzorx\\yii2-giitool\\src\\generators\\crudall\\Generator.php(746): yii\\base\\Component->__get(\'changeStatus\')\n#1 E:\\www\\Yii\\chonglou_test\\vendor\\lbmzorx\\yii2-giitool\\src\\generators\\crudall\\default\\views\\index.php(83): lbmzorx\\giitool\\generators\\crudall\\Generator->generateStatusCodeColum(\'id\')\n#2 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\View.php(328): require(\'E:\\\\www\\\\Yii\\\\chon...\')\n#3 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\View.php(250): yii\\base\\View->renderPhpFile(\'E:\\\\www\\\\Yii\\\\chon...\', Array)\n#4 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2-gii\\Generator.php(317): yii\\base\\View->renderFile(\'E:\\\\www\\\\Yii\\\\chon...\', Array, Object(lbmzorx\\giitool\\generators\\crudall\\Generator))\n#5 E:\\www\\Yii\\chonglou_test\\vendor\\lbmzorx\\yii2-giitool\\src\\generators\\crudall\\Generator.php(223): yii\\gii\\Generator->render(\'views/index.php\', Array)\n#6 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2-gii\\controllers\\DefaultController.php(61): lbmzorx\\giitool\\generators\\crudall\\Generator->generate()\n#7 [internal function]: yii\\gii\\controllers\\DefaultController->actionView(\'giitool-crudall\')\n#8 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)\n#9 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\Controller.php(156): yii\\base\\InlineAction->runWithParams(Array)\n#10 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\Module.php(523): yii\\base\\Controller->runAction(\'view\', Array)\n#11 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction(\'gii/default/vie...\', Array)\n#12 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#13 E:\\www\\Yii\\chonglou_test\\backend\\web\\index.php(19): yii\\base\\Application->run()\n#14 {main}'],
          	['411','1','yii\\i18n\\PhpMessageSource::loadFallbackMessages','1525620000','[127.0.0.1][-][-]','The message file for category \'model\' does not exist: E:\\www\\Yii\\chonglou_test\\common/messages/zh-CN/model.php Fallback file does not exist as well: E:\\www\\Yii\\chonglou_test\\common/messages/zh/model.php'],
          	['410','4','application','1525620000','[127.0.0.1][-][-]','$_GET = [\n    \'id\' => \'giitool-crudall\'\n]\n\n$_POST = [\n    \'_csrf-backend\' => \'ZFhXdlZxeEQIOmI.BQYPfQ4hPBFjOxFpLRYnNz4ePXwPPQ06HgEPAg==\'\n    \'Generator\' => [\n        \'modelNamespace\' => \'common\\\\models\\\\data\'\n        \'namespace\' => \'backend\\\\controllers\'\n        \'onlyModel\' => \'\'\n        \'exceptModel\' => \'\'\n        \'searchNamespace\' => \'common\\\\models\\\\search\'\n        \'isLogin\' => \'1\'\n        \'commonControllerClass\' => \'backend\\\\controllers\\\\BaseCommonController\'\n        \'statusCode\' => \'1\'\n        \'sort\' => \'1\'\n        \'baseControllerClass\' => \'yii\\\\web\\\\Controller\'\n        \'indexWidgetType\' => \'grid\'\n        \'enableI18N\' => \'1\'\n        \'enablePjax\' => \'1\'\n        \'messageCategory\' => \'app\'\n        \'template\' => \'default\'\n    ]\n    \'answers\' => [\n        \'472e37df827efe21d503b368f7b19484\' => \'1\'\n        \'0c4fe4803fd1fe8c1a21e8c8c7236594\' => \'1\'\n        \'f9f48060cd4d3e55d5b3538028b3cbfd\' => \'1\'\n        \'4de5790aec1bbd8ce5cf49ea462cb936\' => \'1\'\n        \'1bf3b32f434161a0c506cebc4728036b\' => \'1\'\n        \'8bf9844fde2ef6eee02145f5bcde8927\' => \'1\'\n        \'6d267649ef0be12c3cbb32e59e246d98\' => \'1\'\n        \'d9089ac22224959a74d12c639bfe4877\' => \'1\'\n        \'282f5cd84bc6464605c5f47ee314e127\' => \'1\'\n        \'80ebda30c5172e9566968d9bb40946ab\' => \'1\'\n        \'749d30e810daa785f29620c7da99ae5a\' => \'1\'\n        \'5e718bed488ab49c4c8a03ef386d4f05\' => \'1\'\n        \'178a145fdd5e56496acd823720c4432f\' => \'1\'\n        \'2b432e7594bd1dd0f5bbc1b6ba25d4b0\' => \'1\'\n        \'4ba83995668f883e5dc1da1f55e2b49c\' => \'1\'\n        \'18aba55bdcd29aa7a963dedb166594d8\' => \'1\'\n        \'2652b93439a773808a15630fbdbd5167\' => \'1\'\n        \'0918455c18d06b66f9b1adf543b3e206\' => \'1\'\n        \'cf2499d3ae552dd5b33c2f89e3e2cd6f\' => \'1\'\n        \'c613c9caeabb02101e2f61f3e5abec61\' => \'1\'\n        \'82ec2c6cb69d05b343e5fc937bcd4f36\' => \'1\'\n        \'354927c58347d153c62dac0155116a8c\' => \'1\'\n        \'b4c990e6280480f6199b78a28d5effd5\' => \'1\'\n        \'48e6cd4209d58274dbf001fa2fa4245a\' => \'1\'\n        \'b38855a695ce4438a77269c8f3b2a1b8\' => \'1\'\n        \'af3c192392516b0117ffcb8d5041f27c\' => \'1\'\n        \'af11cee883bcc222507f902fe5353441\' => \'1\'\n        \'06285fe8fdadc9d585070fac057b726f\' => \'1\'\n    ]\n    \'preview\' => \'\'\n]\n\n$_COOKIE = [\n    \'_csrf-backend\' => \'be936186111fc528528ba8c11fed906fac9c50d4f9b631b180c1e157263b6ec0a:2:{i:0;s:13:\\\"_csrf-backend\\\";i:1;s:32:\\\"lb5HSww9jykg5Ji-INpAhoE8keZLHpwF\\\";}\'\n]\n\n$_SERVER = [\n    \'PATH\' => \'C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;D:\\\\ProgramFiles\\\\mingw64\\\\bin;D:\\\\Program Files\\\\PTC\\\\Creo Elements\\\\Pro5.0\\\\bin;C:\\\\Program Files (x86)\\\\NVIDIA Corporation\\\\PhysX\\\\Common;D:\\\\Program Files\\\\Java\\\\jdk1.8.0_111\\\\bin;D:\\\\Program Files\\\\Java\\\\jre1.8.0_111\\\\bin;D:\\\\Go\\\\bin;D:\\\\phpStudy\\\\php\\\\php-7.0.12-nts;D:\\\\ProgramFiles\\\\redis;D:\\\\ProgramFiles\\\\sphinx-2.2.11-release-win64\\\\bin;D:\\\\Program Files\\\\graphviz-2.38\\\\release\\\\bin;D:\\\\Program Files\\\\Git\\\\cmd;D:\\\\Program Files\\\\node-v8.11.1-win-x64;\'\n    \'SYSTEMROOT\' => \'C:\\\\Windows\'\n    \'COMSPEC\' => \'C:\\\\Windows\\\\system32\\\\cmd.exe\'\n    \'PATHEXT\' => \'.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC\'\n    \'WINDIR\' => \'C:\\\\Windows\'\n    \'PHP_FCGI_MAX_REQUESTS\' => \'1000\'\n    \'PHPRC\' => \'D:/phpStudy/php/php-7.0.12-nts/\'\n    \'_FCGI_SHUTDOWN_EVENT_\' => \'1812\'\n    \'SCRIPT_NAME\' => \'/index.php\'\n    \'REQUEST_URI\' => \'/gii/default/view?id=giitool-crudall\'\n    \'QUERY_STRING\' => \'id=giitool-crudall\'\n    \'REQUEST_METHOD\' => \'POST\'\n    \'SERVER_PROTOCOL\' => \'HTTP/1.1\'\n    \'GATEWAY_INTERFACE\' => \'CGI/1.1\'\n    \'REDIRECT_QUERY_STRING\' => \'id=giitool-crudall\'\n    \'REDIRECT_URL\' => \'/gii/default/view\'\n    \'REMOTE_PORT\' => \'61832\'\n    \'SCRIPT_FILENAME\' => \'E:/www/Yii/chonglou_test/backend/web/index.php\'\n    \'SERVER_ADMIN\' => \'admin@phpStudy.net\'\n    \'CONTEXT_DOCUMENT_ROOT\' => \'E:/www/Yii/chonglou_test/backend/web\'\n    \'CONTEXT_PREFIX\' => \'\'\n    \'REQUEST_SCHEME\' => \'http\'\n    \'DOCUMENT_ROOT\' => \'E:/www/Yii/chonglou_test/backend/web\'\n    \'REMOTE_ADDR\' => \'127.0.0.1\'\n    \'SERVER_PORT\' => \'80\'\n    \'SERVER_ADDR\' => \'127.0.0.1\'\n    \'SERVER_NAME\' => \'admin.chongloutest.com\'\n    \'SERVER_SOFTWARE\' => \'Apache/2.4.23 (Win32) OpenSSL/1.0.2j mod_fcgid/2.3.9\'\n    \'SERVER_SIGNATURE\' => \'\'\n    \'SystemRoot\' => \'C:\\\\Windows\'\n    \'HTTP_COOKIE\' => \'_csrf-backend=be936186111fc528528ba8c11fed906fac9c50d4f9b631b180c1e157263b6ec0a%3A2%3A%7Bi%3A0%3Bs%3A13%3A%22_csrf-backend%22%3Bi%3A1%3Bs%3A32%3A%22lb5HSww9jykg5Ji-INpAhoE8keZLHpwF%22%3B%7D\'\n    \'HTTP_ACCEPT_LANGUAGE\' => \'zh-CN,zh;q=0.9\'\n    \'HTTP_ACCEPT_ENCODING\' => \'gzip, deflate\'\n    \'HTTP_REFERER\' => \'http://admin.chongloutest.com/gii/default/view?id=giitool-crudall\'\n    \'HTTP_ACCEPT\' => \'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8\'\n    \'CONTENT_TYPE\' => \'application/x-www-form-urlencoded\'\n    \'HTTP_ORIGIN\' => \'http://admin.chongloutest.com\'\n    \'HTTP_USER_AGENT\' => \'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36\'\n    \'HTTP_UPGRADE_INSECURE_REQUESTS\' => \'1\'\n    \'HTTP_CACHE_CONTROL\' => \'max-age=0\'\n    \'CONTENT_LENGTH\' => \'2142\'\n    \'HTTP_CONNECTION\' => \'close\'\n    \'HTTP_HOST\' => \'admin.chongloutest.com\'\n    \'REDIRECT_STATUS\' => \'200\'\n    \'FCGI_ROLE\' => \'RESPONDER\'\n    \'PHP_SELF\' => \'/index.php\'\n    \'REQUEST_TIME_FLOAT\' => 1525623923.7878\n    \'REQUEST_TIME\' => 1525623923\n]'],
          	['409','2','yii\\log\\Dispatcher::dispatch','1525620000','[127.0.0.1][-][-]','Unable to send log via yii\\log\\DbTarget: Exception (Database Exception) \'yii\\db\\Exception\' with message \'SQLSTATE[42S02]: Base table or view not found: 1146 Table \'chonglou.chonglou_yii_log\' doesn\'t exist\nThe SQL being executed was: INSERT INTO `chonglou_yii_log` (`level`, `category`, `log_time`, `prefix`, `message`)\n                VALUES (1, \'yii\\\\i18n\\\\PhpMessageSource::loadFallbackMessages\', 1525623924.0048, \'[127.0.0.1][-][-]\', \'The message file for category \\\'model\\\' does not exist: E:\\\\www\\\\Yii\\\\chonglou_test\\\\common/messages/zh-CN/model.php Fallback file does not exist as well: E:\\\\www\\\\Yii\\\\chonglou_test\\\\common/messages/zh/model.php\')\' \n\nin E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\db\\Schema.php:636\n\nStack trace:\n#0 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\db\\Command.php(856): yii\\db\\Schema->convertException(Object(PDOException), \'INSERT INTO `ch...\')\n#1 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\log\\DbTarget.php(83): yii\\db\\Command->execute()\n#2 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\log\\Target.php(124): yii\\log\\DbTarget->export()\n#3 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\log\\Dispatcher.php(188): yii\\log\\Target->collect(Array, true)\n#4 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\log\\Logger.php(177): yii\\log\\Dispatcher->dispatch(Array, true)\n#5 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\ErrorHandler.php(113): yii\\log\\Logger->flush(true)\n#6 [internal function]: yii\\base\\ErrorHandler->handleException(Object(yii\\base\\ErrorException))\n#7 {main}'],
          	['408','4','application','1525620000','[127.0.0.1][-][-]','$_GET = [\n    \'id\' => \'giitool-crudall\'\n]\n\n$_POST = [\n    \'_csrf-backend\' => \'ZFhXdlZxeEQIOmI.BQYPfQ4hPBFjOxFpLRYnNz4ePXwPPQ06HgEPAg==\'\n    \'Generator\' => [\n        \'modelNamespace\' => \'common\\\\models\\\\data\'\n        \'namespace\' => \'backend\\\\controllers\'\n        \'onlyModel\' => \'\'\n        \'exceptModel\' => \'\'\n        \'searchNamespace\' => \'common\\\\models\\\\search\'\n        \'isLogin\' => \'1\'\n        \'commonControllerClass\' => \'backend\\\\controllers\\\\BaseCommonController\'\n        \'statusCode\' => \'1\'\n        \'sort\' => \'1\'\n        \'baseControllerClass\' => \'yii\\\\web\\\\Controller\'\n        \'indexWidgetType\' => \'grid\'\n        \'enableI18N\' => \'1\'\n        \'enablePjax\' => \'1\'\n        \'messageCategory\' => \'app\'\n        \'template\' => \'default\'\n    ]\n    \'answers\' => [\n        \'472e37df827efe21d503b368f7b19484\' => \'1\'\n        \'0c4fe4803fd1fe8c1a21e8c8c7236594\' => \'1\'\n        \'f9f48060cd4d3e55d5b3538028b3cbfd\' => \'1\'\n        \'4de5790aec1bbd8ce5cf49ea462cb936\' => \'1\'\n        \'1bf3b32f434161a0c506cebc4728036b\' => \'1\'\n        \'8bf9844fde2ef6eee02145f5bcde8927\' => \'1\'\n        \'6d267649ef0be12c3cbb32e59e246d98\' => \'1\'\n        \'d9089ac22224959a74d12c639bfe4877\' => \'1\'\n        \'282f5cd84bc6464605c5f47ee314e127\' => \'1\'\n        \'80ebda30c5172e9566968d9bb40946ab\' => \'1\'\n        \'749d30e810daa785f29620c7da99ae5a\' => \'1\'\n        \'5e718bed488ab49c4c8a03ef386d4f05\' => \'1\'\n        \'178a145fdd5e56496acd823720c4432f\' => \'1\'\n        \'2b432e7594bd1dd0f5bbc1b6ba25d4b0\' => \'1\'\n        \'4ba83995668f883e5dc1da1f55e2b49c\' => \'1\'\n        \'18aba55bdcd29aa7a963dedb166594d8\' => \'1\'\n        \'2652b93439a773808a15630fbdbd5167\' => \'1\'\n        \'0918455c18d06b66f9b1adf543b3e206\' => \'1\'\n        \'cf2499d3ae552dd5b33c2f89e3e2cd6f\' => \'1\'\n        \'c613c9caeabb02101e2f61f3e5abec61\' => \'1\'\n        \'82ec2c6cb69d05b343e5fc937bcd4f36\' => \'1\'\n        \'354927c58347d153c62dac0155116a8c\' => \'1\'\n        \'b4c990e6280480f6199b78a28d5effd5\' => \'1\'\n        \'48e6cd4209d58274dbf001fa2fa4245a\' => \'1\'\n        \'b38855a695ce4438a77269c8f3b2a1b8\' => \'1\'\n        \'af3c192392516b0117ffcb8d5041f27c\' => \'1\'\n        \'af11cee883bcc222507f902fe5353441\' => \'1\'\n        \'06285fe8fdadc9d585070fac057b726f\' => \'1\'\n    ]\n    \'preview\' => \'\'\n]\n\n$_COOKIE = [\n    \'_csrf-backend\' => \'be936186111fc528528ba8c11fed906fac9c50d4f9b631b180c1e157263b6ec0a:2:{i:0;s:13:\\\"_csrf-backend\\\";i:1;s:32:\\\"lb5HSww9jykg5Ji-INpAhoE8keZLHpwF\\\";}\'\n]\n\n$_SERVER = [\n    \'PATH\' => \'C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;D:\\\\ProgramFiles\\\\mingw64\\\\bin;D:\\\\Program Files\\\\PTC\\\\Creo Elements\\\\Pro5.0\\\\bin;C:\\\\Program Files (x86)\\\\NVIDIA Corporation\\\\PhysX\\\\Common;D:\\\\Program Files\\\\Java\\\\jdk1.8.0_111\\\\bin;D:\\\\Program Files\\\\Java\\\\jre1.8.0_111\\\\bin;D:\\\\Go\\\\bin;D:\\\\phpStudy\\\\php\\\\php-7.0.12-nts;D:\\\\ProgramFiles\\\\redis;D:\\\\ProgramFiles\\\\sphinx-2.2.11-release-win64\\\\bin;D:\\\\Program Files\\\\graphviz-2.38\\\\release\\\\bin;D:\\\\Program Files\\\\Git\\\\cmd;D:\\\\Program Files\\\\node-v8.11.1-win-x64;\'\n    \'SYSTEMROOT\' => \'C:\\\\Windows\'\n    \'COMSPEC\' => \'C:\\\\Windows\\\\system32\\\\cmd.exe\'\n    \'PATHEXT\' => \'.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC\'\n    \'WINDIR\' => \'C:\\\\Windows\'\n    \'PHP_FCGI_MAX_REQUESTS\' => \'1000\'\n    \'PHPRC\' => \'D:/phpStudy/php/php-7.0.12-nts/\'\n    \'_FCGI_SHUTDOWN_EVENT_\' => \'1812\'\n    \'SCRIPT_NAME\' => \'/index.php\'\n    \'REQUEST_URI\' => \'/gii/default/view?id=giitool-crudall\'\n    \'QUERY_STRING\' => \'id=giitool-crudall\'\n    \'REQUEST_METHOD\' => \'POST\'\n    \'SERVER_PROTOCOL\' => \'HTTP/1.1\'\n    \'GATEWAY_INTERFACE\' => \'CGI/1.1\'\n    \'REDIRECT_QUERY_STRING\' => \'id=giitool-crudall\'\n    \'REDIRECT_URL\' => \'/gii/default/view\'\n    \'REMOTE_PORT\' => \'61832\'\n    \'SCRIPT_FILENAME\' => \'E:/www/Yii/chonglou_test/backend/web/index.php\'\n    \'SERVER_ADMIN\' => \'admin@phpStudy.net\'\n    \'CONTEXT_DOCUMENT_ROOT\' => \'E:/www/Yii/chonglou_test/backend/web\'\n    \'CONTEXT_PREFIX\' => \'\'\n    \'REQUEST_SCHEME\' => \'http\'\n    \'DOCUMENT_ROOT\' => \'E:/www/Yii/chonglou_test/backend/web\'\n    \'REMOTE_ADDR\' => \'127.0.0.1\'\n    \'SERVER_PORT\' => \'80\'\n    \'SERVER_ADDR\' => \'127.0.0.1\'\n    \'SERVER_NAME\' => \'admin.chongloutest.com\'\n    \'SERVER_SOFTWARE\' => \'Apache/2.4.23 (Win32) OpenSSL/1.0.2j mod_fcgid/2.3.9\'\n    \'SERVER_SIGNATURE\' => \'\'\n    \'SystemRoot\' => \'C:\\\\Windows\'\n    \'HTTP_COOKIE\' => \'_csrf-backend=be936186111fc528528ba8c11fed906fac9c50d4f9b631b180c1e157263b6ec0a%3A2%3A%7Bi%3A0%3Bs%3A13%3A%22_csrf-backend%22%3Bi%3A1%3Bs%3A32%3A%22lb5HSww9jykg5Ji-INpAhoE8keZLHpwF%22%3B%7D\'\n    \'HTTP_ACCEPT_LANGUAGE\' => \'zh-CN,zh;q=0.9\'\n    \'HTTP_ACCEPT_ENCODING\' => \'gzip, deflate\'\n    \'HTTP_REFERER\' => \'http://admin.chongloutest.com/gii/default/view?id=giitool-crudall\'\n    \'HTTP_ACCEPT\' => \'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8\'\n    \'CONTENT_TYPE\' => \'application/x-www-form-urlencoded\'\n    \'HTTP_ORIGIN\' => \'http://admin.chongloutest.com\'\n    \'HTTP_USER_AGENT\' => \'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36\'\n    \'HTTP_UPGRADE_INSECURE_REQUESTS\' => \'1\'\n    \'HTTP_CACHE_CONTROL\' => \'max-age=0\'\n    \'CONTENT_LENGTH\' => \'2142\'\n    \'HTTP_CONNECTION\' => \'close\'\n    \'HTTP_HOST\' => \'admin.chongloutest.com\'\n    \'REDIRECT_STATUS\' => \'200\'\n    \'FCGI_ROLE\' => \'RESPONDER\'\n    \'PHP_SELF\' => \'/index.php\'\n    \'REQUEST_TIME_FLOAT\' => 1525623923.7878\n    \'REQUEST_TIME\' => 1525623923\n]'],
          	['407','1','yii\\base\\ErrorException:8','1525620000','[127.0.0.1][-][-]','yii\\base\\ErrorException: Undefined variable: mode in E:\\www\\Yii\\chonglou_test\\vendor\\lbmzorx\\yii2-giitool\\src\\generators\\crudall\\default\\views\\index.php:48\nStack trace:\n#0 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\View.php(250): yii\\base\\View->renderPhpFile()\n#1 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2-gii\\Generator.php(317): yii\\base\\View->renderFile()\n#2 E:\\www\\Yii\\chonglou_test\\vendor\\lbmzorx\\yii2-giitool\\src\\generators\\crudall\\Generator.php(223): yii\\gii\\Generator->render()\n#3 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2-gii\\controllers\\DefaultController.php(61): lbmzorx\\giitool\\generators\\crudall\\Generator->generate()\n#4 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): yii\\gii\\controllers\\DefaultController->actionView()\n#5 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): ::call_user_func_array:{E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\InlineAction.php:57}()\n#6 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\Controller.php(156): yii\\base\\InlineAction->runWithParams()\n#7 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\Module.php(523): yii\\base\\Controller->runAction()\n#8 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction()\n#9 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest()\n#10 E:\\www\\Yii\\chonglou_test\\backend\\web\\index.php(19): yii\\base\\Application->run()\n#11 {main}'],
          	['406','1','yii\\i18n\\PhpMessageSource::loadFallbackMessages','1525620000','[127.0.0.1][-][-]','The message file for category \'model\' does not exist: E:\\www\\Yii\\chonglou_test\\common/messages/zh-CN/model.php Fallback file does not exist as well: E:\\www\\Yii\\chonglou_test\\common/messages/zh/model.php'],
          	['405','4','application','1525620000','[127.0.0.1][-][-]','$_GET = [\n    \'id\' => \'giitool-crudall\'\n]\n\n$_POST = [\n    \'_csrf-backend\' => \'ZFhXdlZxeEQIOmI.BQYPfQ4hPBFjOxFpLRYnNz4ePXwPPQ06HgEPAg==\'\n    \'Generator\' => [\n        \'modelNamespace\' => \'common\\\\models\\\\data\'\n        \'namespace\' => \'backend\\\\controllers\'\n        \'onlyModel\' => \'\'\n        \'exceptModel\' => \'\'\n        \'searchNamespace\' => \'common\\\\models\\\\search\'\n        \'isLogin\' => \'1\'\n        \'commonControllerClass\' => \'backend\\\\controllers\\\\BaseCommonController\'\n        \'statusCode\' => \'1\'\n        \'sort\' => \'1\'\n        \'baseControllerClass\' => \'yii\\\\web\\\\Controller\'\n        \'indexWidgetType\' => \'grid\'\n        \'enableI18N\' => \'1\'\n        \'enablePjax\' => \'1\'\n        \'messageCategory\' => \'app\'\n        \'template\' => \'default\'\n    ]\n    \'answers\' => [\n        \'472e37df827efe21d503b368f7b19484\' => \'1\'\n        \'0c4fe4803fd1fe8c1a21e8c8c7236594\' => \'1\'\n        \'f9f48060cd4d3e55d5b3538028b3cbfd\' => \'1\'\n        \'4de5790aec1bbd8ce5cf49ea462cb936\' => \'1\'\n        \'1bf3b32f434161a0c506cebc4728036b\' => \'1\'\n        \'8bf9844fde2ef6eee02145f5bcde8927\' => \'1\'\n        \'6d267649ef0be12c3cbb32e59e246d98\' => \'1\'\n        \'d9089ac22224959a74d12c639bfe4877\' => \'1\'\n        \'282f5cd84bc6464605c5f47ee314e127\' => \'1\'\n        \'80ebda30c5172e9566968d9bb40946ab\' => \'1\'\n        \'749d30e810daa785f29620c7da99ae5a\' => \'1\'\n        \'5e718bed488ab49c4c8a03ef386d4f05\' => \'1\'\n        \'178a145fdd5e56496acd823720c4432f\' => \'1\'\n        \'2b432e7594bd1dd0f5bbc1b6ba25d4b0\' => \'1\'\n        \'4ba83995668f883e5dc1da1f55e2b49c\' => \'1\'\n        \'18aba55bdcd29aa7a963dedb166594d8\' => \'1\'\n        \'2652b93439a773808a15630fbdbd5167\' => \'1\'\n        \'0918455c18d06b66f9b1adf543b3e206\' => \'1\'\n        \'cf2499d3ae552dd5b33c2f89e3e2cd6f\' => \'1\'\n        \'c613c9caeabb02101e2f61f3e5abec61\' => \'1\'\n        \'82ec2c6cb69d05b343e5fc937bcd4f36\' => \'1\'\n        \'354927c58347d153c62dac0155116a8c\' => \'1\'\n        \'b4c990e6280480f6199b78a28d5effd5\' => \'1\'\n        \'48e6cd4209d58274dbf001fa2fa4245a\' => \'1\'\n        \'b38855a695ce4438a77269c8f3b2a1b8\' => \'1\'\n        \'af3c192392516b0117ffcb8d5041f27c\' => \'1\'\n        \'af11cee883bcc222507f902fe5353441\' => \'1\'\n        \'06285fe8fdadc9d585070fac057b726f\' => \'1\'\n    ]\n    \'preview\' => \'\'\n]\n\n$_COOKIE = [\n    \'_csrf-backend\' => \'be936186111fc528528ba8c11fed906fac9c50d4f9b631b180c1e157263b6ec0a:2:{i:0;s:13:\\\"_csrf-backend\\\";i:1;s:32:\\\"lb5HSww9jykg5Ji-INpAhoE8keZLHpwF\\\";}\'\n]\n\n$_SERVER = [\n    \'PATH\' => \'C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;D:\\\\ProgramFiles\\\\mingw64\\\\bin;D:\\\\Program Files\\\\PTC\\\\Creo Elements\\\\Pro5.0\\\\bin;C:\\\\Program Files (x86)\\\\NVIDIA Corporation\\\\PhysX\\\\Common;D:\\\\Program Files\\\\Java\\\\jdk1.8.0_111\\\\bin;D:\\\\Program Files\\\\Java\\\\jre1.8.0_111\\\\bin;D:\\\\Go\\\\bin;D:\\\\phpStudy\\\\php\\\\php-7.0.12-nts;D:\\\\ProgramFiles\\\\redis;D:\\\\ProgramFiles\\\\sphinx-2.2.11-release-win64\\\\bin;D:\\\\Program Files\\\\graphviz-2.38\\\\release\\\\bin;D:\\\\Program Files\\\\Git\\\\cmd;D:\\\\Program Files\\\\node-v8.11.1-win-x64;\'\n    \'SYSTEMROOT\' => \'C:\\\\Windows\'\n    \'COMSPEC\' => \'C:\\\\Windows\\\\system32\\\\cmd.exe\'\n    \'PATHEXT\' => \'.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC\'\n    \'WINDIR\' => \'C:\\\\Windows\'\n    \'PHP_FCGI_MAX_REQUESTS\' => \'1000\'\n    \'PHPRC\' => \'D:/phpStudy/php/php-7.0.12-nts/\'\n    \'_FCGI_SHUTDOWN_EVENT_\' => \'1812\'\n    \'SCRIPT_NAME\' => \'/index.php\'\n    \'REQUEST_URI\' => \'/gii/default/view?id=giitool-crudall\'\n    \'QUERY_STRING\' => \'id=giitool-crudall\'\n    \'REQUEST_METHOD\' => \'POST\'\n    \'SERVER_PROTOCOL\' => \'HTTP/1.1\'\n    \'GATEWAY_INTERFACE\' => \'CGI/1.1\'\n    \'REDIRECT_QUERY_STRING\' => \'id=giitool-crudall\'\n    \'REDIRECT_URL\' => \'/gii/default/view\'\n    \'REMOTE_PORT\' => \'61764\'\n    \'SCRIPT_FILENAME\' => \'E:/www/Yii/chonglou_test/backend/web/index.php\'\n    \'SERVER_ADMIN\' => \'admin@phpStudy.net\'\n    \'CONTEXT_DOCUMENT_ROOT\' => \'E:/www/Yii/chonglou_test/backend/web\'\n    \'CONTEXT_PREFIX\' => \'\'\n    \'REQUEST_SCHEME\' => \'http\'\n    \'DOCUMENT_ROOT\' => \'E:/www/Yii/chonglou_test/backend/web\'\n    \'REMOTE_ADDR\' => \'127.0.0.1\'\n    \'SERVER_PORT\' => \'80\'\n    \'SERVER_ADDR\' => \'127.0.0.1\'\n    \'SERVER_NAME\' => \'admin.chongloutest.com\'\n    \'SERVER_SOFTWARE\' => \'Apache/2.4.23 (Win32) OpenSSL/1.0.2j mod_fcgid/2.3.9\'\n    \'SERVER_SIGNATURE\' => \'\'\n    \'SystemRoot\' => \'C:\\\\Windows\'\n    \'HTTP_COOKIE\' => \'_csrf-backend=be936186111fc528528ba8c11fed906fac9c50d4f9b631b180c1e157263b6ec0a%3A2%3A%7Bi%3A0%3Bs%3A13%3A%22_csrf-backend%22%3Bi%3A1%3Bs%3A32%3A%22lb5HSww9jykg5Ji-INpAhoE8keZLHpwF%22%3B%7D\'\n    \'HTTP_ACCEPT_LANGUAGE\' => \'zh-CN,zh;q=0.9\'\n    \'HTTP_ACCEPT_ENCODING\' => \'gzip, deflate\'\n    \'HTTP_REFERER\' => \'http://admin.chongloutest.com/gii/default/view?id=giitool-crudall\'\n    \'HTTP_ACCEPT\' => \'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8\'\n    \'CONTENT_TYPE\' => \'application/x-www-form-urlencoded\'\n    \'HTTP_ORIGIN\' => \'http://admin.chongloutest.com\'\n    \'HTTP_USER_AGENT\' => \'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36\'\n    \'HTTP_UPGRADE_INSECURE_REQUESTS\' => \'1\'\n    \'HTTP_CACHE_CONTROL\' => \'max-age=0\'\n    \'CONTENT_LENGTH\' => \'2142\'\n    \'HTTP_CONNECTION\' => \'close\'\n    \'HTTP_HOST\' => \'admin.chongloutest.com\'\n    \'REDIRECT_STATUS\' => \'200\'\n    \'FCGI_ROLE\' => \'RESPONDER\'\n    \'PHP_SELF\' => \'/index.php\'\n    \'REQUEST_TIME_FLOAT\' => 1525623869.1867\n    \'REQUEST_TIME\' => 1525623869\n]'],
          	['404','2','yii\\log\\Dispatcher::dispatch','1525620000','[127.0.0.1][-][-]','Unable to send log via yii\\log\\DbTarget: Exception (Database Exception) \'yii\\db\\Exception\' with message \'SQLSTATE[42S02]: Base table or view not found: 1146 Table \'chonglou.chonglou_yii_log\' doesn\'t exist\nThe SQL being executed was: INSERT INTO `chonglou_yii_log` (`level`, `category`, `log_time`, `prefix`, `message`)\n                VALUES (1, \'yii\\\\i18n\\\\PhpMessageSource::loadFallbackMessages\', 1525623869.6097, \'[127.0.0.1][-][-]\', \'The message file for category \\\'model\\\' does not exist: E:\\\\www\\\\Yii\\\\chonglou_test\\\\common/messages/zh-CN/model.php Fallback file does not exist as well: E:\\\\www\\\\Yii\\\\chonglou_test\\\\common/messages/zh/model.php\')\' \n\nin E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\db\\Schema.php:636\n\nStack trace:\n#0 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\db\\Command.php(856): yii\\db\\Schema->convertException(Object(PDOException), \'INSERT INTO `ch...\')\n#1 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\log\\DbTarget.php(83): yii\\db\\Command->execute()\n#2 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\log\\Target.php(124): yii\\log\\DbTarget->export()\n#3 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\log\\Dispatcher.php(188): yii\\log\\Target->collect(Array, true)\n#4 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\log\\Logger.php(177): yii\\log\\Dispatcher->dispatch(Array, true)\n#5 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\ErrorHandler.php(113): yii\\log\\Logger->flush(true)\n#6 [internal function]: yii\\base\\ErrorHandler->handleException(Object(yii\\base\\UnknownPropertyException))\n#7 {main}'],
          	['403','4','application','1525620000','[127.0.0.1][-][-]','$_GET = [\n    \'id\' => \'giitool-crudall\'\n]\n\n$_POST = [\n    \'_csrf-backend\' => \'ZFhXdlZxeEQIOmI.BQYPfQ4hPBFjOxFpLRYnNz4ePXwPPQ06HgEPAg==\'\n    \'Generator\' => [\n        \'modelNamespace\' => \'common\\\\models\\\\data\'\n        \'namespace\' => \'backend\\\\controllers\'\n        \'onlyModel\' => \'\'\n        \'exceptModel\' => \'\'\n        \'searchNamespace\' => \'common\\\\models\\\\search\'\n        \'isLogin\' => \'1\'\n        \'commonControllerClass\' => \'backend\\\\controllers\\\\BaseCommonController\'\n        \'statusCode\' => \'1\'\n        \'sort\' => \'1\'\n        \'baseControllerClass\' => \'yii\\\\web\\\\Controller\'\n        \'indexWidgetType\' => \'grid\'\n        \'enableI18N\' => \'1\'\n        \'enablePjax\' => \'1\'\n        \'messageCategory\' => \'app\'\n        \'template\' => \'default\'\n    ]\n    \'answers\' => [\n        \'472e37df827efe21d503b368f7b19484\' => \'1\'\n        \'0c4fe4803fd1fe8c1a21e8c8c7236594\' => \'1\'\n        \'f9f48060cd4d3e55d5b3538028b3cbfd\' => \'1\'\n        \'4de5790aec1bbd8ce5cf49ea462cb936\' => \'1\'\n        \'1bf3b32f434161a0c506cebc4728036b\' => \'1\'\n        \'8bf9844fde2ef6eee02145f5bcde8927\' => \'1\'\n        \'6d267649ef0be12c3cbb32e59e246d98\' => \'1\'\n        \'d9089ac22224959a74d12c639bfe4877\' => \'1\'\n        \'282f5cd84bc6464605c5f47ee314e127\' => \'1\'\n        \'80ebda30c5172e9566968d9bb40946ab\' => \'1\'\n        \'749d30e810daa785f29620c7da99ae5a\' => \'1\'\n        \'5e718bed488ab49c4c8a03ef386d4f05\' => \'1\'\n        \'178a145fdd5e56496acd823720c4432f\' => \'1\'\n        \'2b432e7594bd1dd0f5bbc1b6ba25d4b0\' => \'1\'\n        \'4ba83995668f883e5dc1da1f55e2b49c\' => \'1\'\n        \'18aba55bdcd29aa7a963dedb166594d8\' => \'1\'\n        \'2652b93439a773808a15630fbdbd5167\' => \'1\'\n        \'0918455c18d06b66f9b1adf543b3e206\' => \'1\'\n        \'cf2499d3ae552dd5b33c2f89e3e2cd6f\' => \'1\'\n        \'c613c9caeabb02101e2f61f3e5abec61\' => \'1\'\n        \'82ec2c6cb69d05b343e5fc937bcd4f36\' => \'1\'\n        \'354927c58347d153c62dac0155116a8c\' => \'1\'\n        \'b4c990e6280480f6199b78a28d5effd5\' => \'1\'\n        \'48e6cd4209d58274dbf001fa2fa4245a\' => \'1\'\n        \'b38855a695ce4438a77269c8f3b2a1b8\' => \'1\'\n        \'af3c192392516b0117ffcb8d5041f27c\' => \'1\'\n        \'af11cee883bcc222507f902fe5353441\' => \'1\'\n        \'06285fe8fdadc9d585070fac057b726f\' => \'1\'\n    ]\n    \'preview\' => \'\'\n]\n\n$_COOKIE = [\n    \'_csrf-backend\' => \'be936186111fc528528ba8c11fed906fac9c50d4f9b631b180c1e157263b6ec0a:2:{i:0;s:13:\\\"_csrf-backend\\\";i:1;s:32:\\\"lb5HSww9jykg5Ji-INpAhoE8keZLHpwF\\\";}\'\n]\n\n$_SERVER = [\n    \'PATH\' => \'C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;D:\\\\ProgramFiles\\\\mingw64\\\\bin;D:\\\\Program Files\\\\PTC\\\\Creo Elements\\\\Pro5.0\\\\bin;C:\\\\Program Files (x86)\\\\NVIDIA Corporation\\\\PhysX\\\\Common;D:\\\\Program Files\\\\Java\\\\jdk1.8.0_111\\\\bin;D:\\\\Program Files\\\\Java\\\\jre1.8.0_111\\\\bin;D:\\\\Go\\\\bin;D:\\\\phpStudy\\\\php\\\\php-7.0.12-nts;D:\\\\ProgramFiles\\\\redis;D:\\\\ProgramFiles\\\\sphinx-2.2.11-release-win64\\\\bin;D:\\\\Program Files\\\\graphviz-2.38\\\\release\\\\bin;D:\\\\Program Files\\\\Git\\\\cmd;D:\\\\Program Files\\\\node-v8.11.1-win-x64;\'\n    \'SYSTEMROOT\' => \'C:\\\\Windows\'\n    \'COMSPEC\' => \'C:\\\\Windows\\\\system32\\\\cmd.exe\'\n    \'PATHEXT\' => \'.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC\'\n    \'WINDIR\' => \'C:\\\\Windows\'\n    \'PHP_FCGI_MAX_REQUESTS\' => \'1000\'\n    \'PHPRC\' => \'D:/phpStudy/php/php-7.0.12-nts/\'\n    \'_FCGI_SHUTDOWN_EVENT_\' => \'1812\'\n    \'SCRIPT_NAME\' => \'/index.php\'\n    \'REQUEST_URI\' => \'/gii/default/view?id=giitool-crudall\'\n    \'QUERY_STRING\' => \'id=giitool-crudall\'\n    \'REQUEST_METHOD\' => \'POST\'\n    \'SERVER_PROTOCOL\' => \'HTTP/1.1\'\n    \'GATEWAY_INTERFACE\' => \'CGI/1.1\'\n    \'REDIRECT_QUERY_STRING\' => \'id=giitool-crudall\'\n    \'REDIRECT_URL\' => \'/gii/default/view\'\n    \'REMOTE_PORT\' => \'61764\'\n    \'SCRIPT_FILENAME\' => \'E:/www/Yii/chonglou_test/backend/web/index.php\'\n    \'SERVER_ADMIN\' => \'admin@phpStudy.net\'\n    \'CONTEXT_DOCUMENT_ROOT\' => \'E:/www/Yii/chonglou_test/backend/web\'\n    \'CONTEXT_PREFIX\' => \'\'\n    \'REQUEST_SCHEME\' => \'http\'\n    \'DOCUMENT_ROOT\' => \'E:/www/Yii/chonglou_test/backend/web\'\n    \'REMOTE_ADDR\' => \'127.0.0.1\'\n    \'SERVER_PORT\' => \'80\'\n    \'SERVER_ADDR\' => \'127.0.0.1\'\n    \'SERVER_NAME\' => \'admin.chongloutest.com\'\n    \'SERVER_SOFTWARE\' => \'Apache/2.4.23 (Win32) OpenSSL/1.0.2j mod_fcgid/2.3.9\'\n    \'SERVER_SIGNATURE\' => \'\'\n    \'SystemRoot\' => \'C:\\\\Windows\'\n    \'HTTP_COOKIE\' => \'_csrf-backend=be936186111fc528528ba8c11fed906fac9c50d4f9b631b180c1e157263b6ec0a%3A2%3A%7Bi%3A0%3Bs%3A13%3A%22_csrf-backend%22%3Bi%3A1%3Bs%3A32%3A%22lb5HSww9jykg5Ji-INpAhoE8keZLHpwF%22%3B%7D\'\n    \'HTTP_ACCEPT_LANGUAGE\' => \'zh-CN,zh;q=0.9\'\n    \'HTTP_ACCEPT_ENCODING\' => \'gzip, deflate\'\n    \'HTTP_REFERER\' => \'http://admin.chongloutest.com/gii/default/view?id=giitool-crudall\'\n    \'HTTP_ACCEPT\' => \'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8\'\n    \'CONTENT_TYPE\' => \'application/x-www-form-urlencoded\'\n    \'HTTP_ORIGIN\' => \'http://admin.chongloutest.com\'\n    \'HTTP_USER_AGENT\' => \'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36\'\n    \'HTTP_UPGRADE_INSECURE_REQUESTS\' => \'1\'\n    \'HTTP_CACHE_CONTROL\' => \'max-age=0\'\n    \'CONTENT_LENGTH\' => \'2142\'\n    \'HTTP_CONNECTION\' => \'close\'\n    \'HTTP_HOST\' => \'admin.chongloutest.com\'\n    \'REDIRECT_STATUS\' => \'200\'\n    \'FCGI_ROLE\' => \'RESPONDER\'\n    \'PHP_SELF\' => \'/index.php\'\n    \'REQUEST_TIME_FLOAT\' => 1525623869.1867\n    \'REQUEST_TIME\' => 1525623869\n]'],
          	['402','1','yii\\base\\UnknownPropertyException','1525620000','[127.0.0.1][-][-]','yii\\base\\UnknownPropertyException: Getting unknown property: lbmzorx\\giitool\\generators\\crudall\\Generator::modelClass in E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\Component.php:147\nStack trace:\n#0 E:\\www\\Yii\\chonglou_test\\vendor\\lbmzorx\\yii2-giitool\\src\\generators\\crudall\\default\\views\\_form.php(10): yii\\base\\Component->__get(\'modelClass\')\n#1 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\View.php(328): require(\'E:\\\\www\\\\Yii\\\\chon...\')\n#2 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\View.php(250): yii\\base\\View->renderPhpFile(\'E:\\\\www\\\\Yii\\\\chon...\', Array)\n#3 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2-gii\\Generator.php(317): yii\\base\\View->renderFile(\'E:\\\\www\\\\Yii\\\\chon...\', Array, Object(lbmzorx\\giitool\\generators\\crudall\\Generator))\n#4 E:\\www\\Yii\\chonglou_test\\vendor\\lbmzorx\\yii2-giitool\\src\\generators\\crudall\\Generator.php(223): yii\\gii\\Generator->render(\'views/_form.php\', Array)\n#5 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2-gii\\controllers\\DefaultController.php(61): lbmzorx\\giitool\\generators\\crudall\\Generator->generate()\n#6 [internal function]: yii\\gii\\controllers\\DefaultController->actionView(\'giitool-crudall\')\n#7 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)\n#8 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\Controller.php(156): yii\\base\\InlineAction->runWithParams(Array)\n#9 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\Module.php(523): yii\\base\\Controller->runAction(\'view\', Array)\n#10 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction(\'gii/default/vie...\', Array)\n#11 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#12 E:\\www\\Yii\\chonglou_test\\backend\\web\\index.php(19): yii\\base\\Application->run()\n#13 {main}'],
          	['401','1','yii\\i18n\\PhpMessageSource::loadFallbackMessages','1525620000','[127.0.0.1][-][-]','The message file for category \'model\' does not exist: E:\\www\\Yii\\chonglou_test\\common/messages/zh-CN/model.php Fallback file does not exist as well: E:\\www\\Yii\\chonglou_test\\common/messages/zh/model.php'],
          	['400','4','application','1525620000','[127.0.0.1][-][-]','$_GET = [\n    \'id\' => \'giitool-crudall\'\n]\n\n$_POST = [\n    \'_csrf-backend\' => \'ZFhXdlZxeEQIOmI.BQYPfQ4hPBFjOxFpLRYnNz4ePXwPPQ06HgEPAg==\'\n    \'Generator\' => [\n        \'modelNamespace\' => \'common\\\\models\\\\data\'\n        \'namespace\' => \'backend\\\\controllers\'\n        \'onlyModel\' => \'\'\n        \'exceptModel\' => \'\'\n        \'searchNamespace\' => \'common\\\\models\\\\search\'\n        \'isLogin\' => \'1\'\n        \'commonControllerClass\' => \'backend\\\\controllers\\\\BaseCommonController\'\n        \'statusCode\' => \'1\'\n        \'sort\' => \'1\'\n        \'baseControllerClass\' => \'yii\\\\web\\\\Controller\'\n        \'indexWidgetType\' => \'grid\'\n        \'enableI18N\' => \'1\'\n        \'enablePjax\' => \'1\'\n        \'messageCategory\' => \'app\'\n        \'template\' => \'default\'\n    ]\n    \'answers\' => [\n        \'472e37df827efe21d503b368f7b19484\' => \'1\'\n        \'0c4fe4803fd1fe8c1a21e8c8c7236594\' => \'1\'\n        \'f9f48060cd4d3e55d5b3538028b3cbfd\' => \'1\'\n        \'4de5790aec1bbd8ce5cf49ea462cb936\' => \'1\'\n        \'1bf3b32f434161a0c506cebc4728036b\' => \'1\'\n        \'8bf9844fde2ef6eee02145f5bcde8927\' => \'1\'\n        \'6d267649ef0be12c3cbb32e59e246d98\' => \'1\'\n        \'d9089ac22224959a74d12c639bfe4877\' => \'1\'\n        \'282f5cd84bc6464605c5f47ee314e127\' => \'1\'\n        \'80ebda30c5172e9566968d9bb40946ab\' => \'1\'\n        \'749d30e810daa785f29620c7da99ae5a\' => \'1\'\n        \'5e718bed488ab49c4c8a03ef386d4f05\' => \'1\'\n        \'178a145fdd5e56496acd823720c4432f\' => \'1\'\n        \'2b432e7594bd1dd0f5bbc1b6ba25d4b0\' => \'1\'\n        \'4ba83995668f883e5dc1da1f55e2b49c\' => \'1\'\n        \'18aba55bdcd29aa7a963dedb166594d8\' => \'1\'\n        \'2652b93439a773808a15630fbdbd5167\' => \'1\'\n        \'0918455c18d06b66f9b1adf543b3e206\' => \'1\'\n        \'cf2499d3ae552dd5b33c2f89e3e2cd6f\' => \'1\'\n        \'c613c9caeabb02101e2f61f3e5abec61\' => \'1\'\n        \'82ec2c6cb69d05b343e5fc937bcd4f36\' => \'1\'\n        \'354927c58347d153c62dac0155116a8c\' => \'1\'\n        \'b4c990e6280480f6199b78a28d5effd5\' => \'1\'\n        \'48e6cd4209d58274dbf001fa2fa4245a\' => \'1\'\n        \'b38855a695ce4438a77269c8f3b2a1b8\' => \'1\'\n        \'af3c192392516b0117ffcb8d5041f27c\' => \'1\'\n        \'af11cee883bcc222507f902fe5353441\' => \'1\'\n        \'06285fe8fdadc9d585070fac057b726f\' => \'1\'\n    ]\n    \'preview\' => \'\'\n]\n\n$_COOKIE = [\n    \'_csrf-backend\' => \'be936186111fc528528ba8c11fed906fac9c50d4f9b631b180c1e157263b6ec0a:2:{i:0;s:13:\\\"_csrf-backend\\\";i:1;s:32:\\\"lb5HSww9jykg5Ji-INpAhoE8keZLHpwF\\\";}\'\n]\n\n$_SERVER = [\n    \'PATH\' => \'C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;D:\\\\ProgramFiles\\\\mingw64\\\\bin;D:\\\\Program Files\\\\PTC\\\\Creo Elements\\\\Pro5.0\\\\bin;C:\\\\Program Files (x86)\\\\NVIDIA Corporation\\\\PhysX\\\\Common;D:\\\\Program Files\\\\Java\\\\jdk1.8.0_111\\\\bin;D:\\\\Program Files\\\\Java\\\\jre1.8.0_111\\\\bin;D:\\\\Go\\\\bin;D:\\\\phpStudy\\\\php\\\\php-7.0.12-nts;D:\\\\ProgramFiles\\\\redis;D:\\\\ProgramFiles\\\\sphinx-2.2.11-release-win64\\\\bin;D:\\\\Program Files\\\\graphviz-2.38\\\\release\\\\bin;D:\\\\Program Files\\\\Git\\\\cmd;D:\\\\Program Files\\\\node-v8.11.1-win-x64;\'\n    \'SYSTEMROOT\' => \'C:\\\\Windows\'\n    \'COMSPEC\' => \'C:\\\\Windows\\\\system32\\\\cmd.exe\'\n    \'PATHEXT\' => \'.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC\'\n    \'WINDIR\' => \'C:\\\\Windows\'\n    \'PHP_FCGI_MAX_REQUESTS\' => \'1000\'\n    \'PHPRC\' => \'D:/phpStudy/php/php-7.0.12-nts/\'\n    \'_FCGI_SHUTDOWN_EVENT_\' => \'1920\'\n    \'SCRIPT_NAME\' => \'/index.php\'\n    \'REQUEST_URI\' => \'/gii/default/view?id=giitool-crudall\'\n    \'QUERY_STRING\' => \'id=giitool-crudall\'\n    \'REQUEST_METHOD\' => \'POST\'\n    \'SERVER_PROTOCOL\' => \'HTTP/1.1\'\n    \'GATEWAY_INTERFACE\' => \'CGI/1.1\'\n    \'REDIRECT_QUERY_STRING\' => \'id=giitool-crudall\'\n    \'REDIRECT_URL\' => \'/gii/default/view\'\n    \'REMOTE_PORT\' => \'58904\'\n    \'SCRIPT_FILENAME\' => \'E:/www/Yii/chonglou_test/backend/web/index.php\'\n    \'SERVER_ADMIN\' => \'admin@phpStudy.net\'\n    \'CONTEXT_DOCUMENT_ROOT\' => \'E:/www/Yii/chonglou_test/backend/web\'\n    \'CONTEXT_PREFIX\' => \'\'\n    \'REQUEST_SCHEME\' => \'http\'\n    \'DOCUMENT_ROOT\' => \'E:/www/Yii/chonglou_test/backend/web\'\n    \'REMOTE_ADDR\' => \'127.0.0.1\'\n    \'SERVER_PORT\' => \'80\'\n    \'SERVER_ADDR\' => \'127.0.0.1\'\n    \'SERVER_NAME\' => \'admin.chongloutest.com\'\n    \'SERVER_SOFTWARE\' => \'Apache/2.4.23 (Win32) OpenSSL/1.0.2j mod_fcgid/2.3.9\'\n    \'SERVER_SIGNATURE\' => \'\'\n    \'SystemRoot\' => \'C:\\\\Windows\'\n    \'HTTP_COOKIE\' => \'_csrf-backend=be936186111fc528528ba8c11fed906fac9c50d4f9b631b180c1e157263b6ec0a%3A2%3A%7Bi%3A0%3Bs%3A13%3A%22_csrf-backend%22%3Bi%3A1%3Bs%3A32%3A%22lb5HSww9jykg5Ji-INpAhoE8keZLHpwF%22%3B%7D\'\n    \'HTTP_ACCEPT_LANGUAGE\' => \'zh-CN,zh;q=0.9\'\n    \'HTTP_ACCEPT_ENCODING\' => \'gzip, deflate\'\n    \'HTTP_REFERER\' => \'http://admin.chongloutest.com/gii/default/view?id=giitool-crudall\'\n    \'HTTP_ACCEPT\' => \'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8\'\n    \'CONTENT_TYPE\' => \'application/x-www-form-urlencoded\'\n    \'HTTP_ORIGIN\' => \'http://admin.chongloutest.com\'\n    \'HTTP_USER_AGENT\' => \'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36\'\n    \'HTTP_UPGRADE_INSECURE_REQUESTS\' => \'1\'\n    \'HTTP_CACHE_CONTROL\' => \'max-age=0\'\n    \'CONTENT_LENGTH\' => \'2142\'\n    \'HTTP_CONNECTION\' => \'close\'\n    \'HTTP_HOST\' => \'admin.chongloutest.com\'\n    \'REDIRECT_STATUS\' => \'200\'\n    \'FCGI_ROLE\' => \'RESPONDER\'\n    \'PHP_SELF\' => \'/index.php\'\n    \'REQUEST_TIME_FLOAT\' => 1525620185.125\n    \'REQUEST_TIME\' => 1525620185\n]'],
          	['399','2','yii\\log\\Dispatcher::dispatch','1525620000','[127.0.0.1][-][-]','Unable to send log via yii\\log\\DbTarget: Exception (Database Exception) \'yii\\db\\Exception\' with message \'SQLSTATE[42S02]: Base table or view not found: 1146 Table \'chonglou.chonglou_yii_log\' doesn\'t exist\nThe SQL being executed was: INSERT INTO `chonglou_yii_log` (`level`, `category`, `log_time`, `prefix`, `message`)\n                VALUES (1, \'yii\\\\i18n\\\\PhpMessageSource::loadFallbackMessages\', 1525620185.475, \'[127.0.0.1][-][-]\', \'The message file for category \\\'model\\\' does not exist: E:\\\\www\\\\Yii\\\\chonglou_test\\\\common/messages/zh-CN/model.php Fallback file does not exist as well: E:\\\\www\\\\Yii\\\\chonglou_test\\\\common/messages/zh/model.php\')\' \n\nin E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\db\\Schema.php:636\n\nStack trace:\n#0 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\db\\Command.php(856): yii\\db\\Schema->convertException(Object(PDOException), \'INSERT INTO `ch...\')\n#1 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\log\\DbTarget.php(83): yii\\db\\Command->execute()\n#2 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\log\\Target.php(124): yii\\log\\DbTarget->export()\n#3 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\log\\Dispatcher.php(188): yii\\log\\Target->collect(Array, true)\n#4 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\log\\Logger.php(177): yii\\log\\Dispatcher->dispatch(Array, true)\n#5 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\ErrorHandler.php(113): yii\\log\\Logger->flush(true)\n#6 [internal function]: yii\\base\\ErrorHandler->handleException(Object(yii\\base\\UnknownPropertyException))\n#7 {main}'],
          	['398','4','application','1525620000','[127.0.0.1][-][-]','$_GET = [\n    \'id\' => \'giitool-crudall\'\n]\n\n$_POST = [\n    \'_csrf-backend\' => \'ZFhXdlZxeEQIOmI.BQYPfQ4hPBFjOxFpLRYnNz4ePXwPPQ06HgEPAg==\'\n    \'Generator\' => [\n        \'modelNamespace\' => \'common\\\\models\\\\data\'\n        \'namespace\' => \'backend\\\\controllers\'\n        \'onlyModel\' => \'\'\n        \'exceptModel\' => \'\'\n        \'searchNamespace\' => \'common\\\\models\\\\search\'\n        \'isLogin\' => \'1\'\n        \'commonControllerClass\' => \'backend\\\\controllers\\\\BaseCommonController\'\n        \'statusCode\' => \'1\'\n        \'sort\' => \'1\'\n        \'baseControllerClass\' => \'yii\\\\web\\\\Controller\'\n        \'indexWidgetType\' => \'grid\'\n        \'enableI18N\' => \'1\'\n        \'enablePjax\' => \'1\'\n        \'messageCategory\' => \'app\'\n        \'template\' => \'default\'\n    ]\n    \'answers\' => [\n        \'472e37df827efe21d503b368f7b19484\' => \'1\'\n        \'0c4fe4803fd1fe8c1a21e8c8c7236594\' => \'1\'\n        \'f9f48060cd4d3e55d5b3538028b3cbfd\' => \'1\'\n        \'4de5790aec1bbd8ce5cf49ea462cb936\' => \'1\'\n        \'1bf3b32f434161a0c506cebc4728036b\' => \'1\'\n        \'8bf9844fde2ef6eee02145f5bcde8927\' => \'1\'\n        \'6d267649ef0be12c3cbb32e59e246d98\' => \'1\'\n        \'d9089ac22224959a74d12c639bfe4877\' => \'1\'\n        \'282f5cd84bc6464605c5f47ee314e127\' => \'1\'\n        \'80ebda30c5172e9566968d9bb40946ab\' => \'1\'\n        \'749d30e810daa785f29620c7da99ae5a\' => \'1\'\n        \'5e718bed488ab49c4c8a03ef386d4f05\' => \'1\'\n        \'178a145fdd5e56496acd823720c4432f\' => \'1\'\n        \'2b432e7594bd1dd0f5bbc1b6ba25d4b0\' => \'1\'\n        \'4ba83995668f883e5dc1da1f55e2b49c\' => \'1\'\n        \'18aba55bdcd29aa7a963dedb166594d8\' => \'1\'\n        \'2652b93439a773808a15630fbdbd5167\' => \'1\'\n        \'0918455c18d06b66f9b1adf543b3e206\' => \'1\'\n        \'cf2499d3ae552dd5b33c2f89e3e2cd6f\' => \'1\'\n        \'c613c9caeabb02101e2f61f3e5abec61\' => \'1\'\n        \'82ec2c6cb69d05b343e5fc937bcd4f36\' => \'1\'\n        \'354927c58347d153c62dac0155116a8c\' => \'1\'\n        \'b4c990e6280480f6199b78a28d5effd5\' => \'1\'\n        \'48e6cd4209d58274dbf001fa2fa4245a\' => \'1\'\n        \'b38855a695ce4438a77269c8f3b2a1b8\' => \'1\'\n        \'af3c192392516b0117ffcb8d5041f27c\' => \'1\'\n        \'af11cee883bcc222507f902fe5353441\' => \'1\'\n        \'06285fe8fdadc9d585070fac057b726f\' => \'1\'\n    ]\n    \'preview\' => \'\'\n]\n\n$_COOKIE = [\n    \'_csrf-backend\' => \'be936186111fc528528ba8c11fed906fac9c50d4f9b631b180c1e157263b6ec0a:2:{i:0;s:13:\\\"_csrf-backend\\\";i:1;s:32:\\\"lb5HSww9jykg5Ji-INpAhoE8keZLHpwF\\\";}\'\n]\n\n$_SERVER = [\n    \'PATH\' => \'C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;D:\\\\ProgramFiles\\\\mingw64\\\\bin;D:\\\\Program Files\\\\PTC\\\\Creo Elements\\\\Pro5.0\\\\bin;C:\\\\Program Files (x86)\\\\NVIDIA Corporation\\\\PhysX\\\\Common;D:\\\\Program Files\\\\Java\\\\jdk1.8.0_111\\\\bin;D:\\\\Program Files\\\\Java\\\\jre1.8.0_111\\\\bin;D:\\\\Go\\\\bin;D:\\\\phpStudy\\\\php\\\\php-7.0.12-nts;D:\\\\ProgramFiles\\\\redis;D:\\\\ProgramFiles\\\\sphinx-2.2.11-release-win64\\\\bin;D:\\\\Program Files\\\\graphviz-2.38\\\\release\\\\bin;D:\\\\Program Files\\\\Git\\\\cmd;D:\\\\Program Files\\\\node-v8.11.1-win-x64;\'\n    \'SYSTEMROOT\' => \'C:\\\\Windows\'\n    \'COMSPEC\' => \'C:\\\\Windows\\\\system32\\\\cmd.exe\'\n    \'PATHEXT\' => \'.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC\'\n    \'WINDIR\' => \'C:\\\\Windows\'\n    \'PHP_FCGI_MAX_REQUESTS\' => \'1000\'\n    \'PHPRC\' => \'D:/phpStudy/php/php-7.0.12-nts/\'\n    \'_FCGI_SHUTDOWN_EVENT_\' => \'1920\'\n    \'SCRIPT_NAME\' => \'/index.php\'\n    \'REQUEST_URI\' => \'/gii/default/view?id=giitool-crudall\'\n    \'QUERY_STRING\' => \'id=giitool-crudall\'\n    \'REQUEST_METHOD\' => \'POST\'\n    \'SERVER_PROTOCOL\' => \'HTTP/1.1\'\n    \'GATEWAY_INTERFACE\' => \'CGI/1.1\'\n    \'REDIRECT_QUERY_STRING\' => \'id=giitool-crudall\'\n    \'REDIRECT_URL\' => \'/gii/default/view\'\n    \'REMOTE_PORT\' => \'58904\'\n    \'SCRIPT_FILENAME\' => \'E:/www/Yii/chonglou_test/backend/web/index.php\'\n    \'SERVER_ADMIN\' => \'admin@phpStudy.net\'\n    \'CONTEXT_DOCUMENT_ROOT\' => \'E:/www/Yii/chonglou_test/backend/web\'\n    \'CONTEXT_PREFIX\' => \'\'\n    \'REQUEST_SCHEME\' => \'http\'\n    \'DOCUMENT_ROOT\' => \'E:/www/Yii/chonglou_test/backend/web\'\n    \'REMOTE_ADDR\' => \'127.0.0.1\'\n    \'SERVER_PORT\' => \'80\'\n    \'SERVER_ADDR\' => \'127.0.0.1\'\n    \'SERVER_NAME\' => \'admin.chongloutest.com\'\n    \'SERVER_SOFTWARE\' => \'Apache/2.4.23 (Win32) OpenSSL/1.0.2j mod_fcgid/2.3.9\'\n    \'SERVER_SIGNATURE\' => \'\'\n    \'SystemRoot\' => \'C:\\\\Windows\'\n    \'HTTP_COOKIE\' => \'_csrf-backend=be936186111fc528528ba8c11fed906fac9c50d4f9b631b180c1e157263b6ec0a%3A2%3A%7Bi%3A0%3Bs%3A13%3A%22_csrf-backend%22%3Bi%3A1%3Bs%3A32%3A%22lb5HSww9jykg5Ji-INpAhoE8keZLHpwF%22%3B%7D\'\n    \'HTTP_ACCEPT_LANGUAGE\' => \'zh-CN,zh;q=0.9\'\n    \'HTTP_ACCEPT_ENCODING\' => \'gzip, deflate\'\n    \'HTTP_REFERER\' => \'http://admin.chongloutest.com/gii/default/view?id=giitool-crudall\'\n    \'HTTP_ACCEPT\' => \'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8\'\n    \'CONTENT_TYPE\' => \'application/x-www-form-urlencoded\'\n    \'HTTP_ORIGIN\' => \'http://admin.chongloutest.com\'\n    \'HTTP_USER_AGENT\' => \'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36\'\n    \'HTTP_UPGRADE_INSECURE_REQUESTS\' => \'1\'\n    \'HTTP_CACHE_CONTROL\' => \'max-age=0\'\n    \'CONTENT_LENGTH\' => \'2142\'\n    \'HTTP_CONNECTION\' => \'close\'\n    \'HTTP_HOST\' => \'admin.chongloutest.com\'\n    \'REDIRECT_STATUS\' => \'200\'\n    \'FCGI_ROLE\' => \'RESPONDER\'\n    \'PHP_SELF\' => \'/index.php\'\n    \'REQUEST_TIME_FLOAT\' => 1525620185.125\n    \'REQUEST_TIME\' => 1525620185\n]'],
          	['397','1','yii\\base\\UnknownPropertyException','1525620000','[127.0.0.1][-][-]','yii\\base\\UnknownPropertyException: Getting unknown property: lbmzorx\\giitool\\generators\\crudall\\Generator::modelClass in E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\Component.php:147\nStack trace:\n#0 E:\\www\\Yii\\chonglou_test\\vendor\\lbmzorx\\yii2-giitool\\src\\generators\\crudall\\default\\views\\_form.php(10): yii\\base\\Component->__get(\'modelClass\')\n#1 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\View.php(328): require(\'E:\\\\www\\\\Yii\\\\chon...\')\n#2 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\View.php(250): yii\\base\\View->renderPhpFile(\'E:\\\\www\\\\Yii\\\\chon...\', Array)\n#3 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2-gii\\Generator.php(317): yii\\base\\View->renderFile(\'E:\\\\www\\\\Yii\\\\chon...\', Array, Object(lbmzorx\\giitool\\generators\\crudall\\Generator))\n#4 E:\\www\\Yii\\chonglou_test\\vendor\\lbmzorx\\yii2-giitool\\src\\generators\\crudall\\Generator.php(223): yii\\gii\\Generator->render(\'views/_form.php\', Array)\n#5 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2-gii\\controllers\\DefaultController.php(61): lbmzorx\\giitool\\generators\\crudall\\Generator->generate()\n#6 [internal function]: yii\\gii\\controllers\\DefaultController->actionView(\'giitool-crudall\')\n#7 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)\n#8 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\Controller.php(156): yii\\base\\InlineAction->runWithParams(Array)\n#9 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\Module.php(523): yii\\base\\Controller->runAction(\'view\', Array)\n#10 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction(\'gii/default/vie...\', Array)\n#11 E:\\www\\Yii\\chonglou_test\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#12 E:\\www\\Yii\\chonglou_test\\backend\\web\\index.php(19): yii\\base\\Application->run()\n#13 {main}'],
          	['396','1','yii\\i18n\\PhpMessageSource::loadFallbackMessages','1525620000','[127.0.0.1][-][-]','The message file for category \'model\' does not exist: E:\\www\\Yii\\chonglou_test\\common/messages/zh-CN/model.php Fallback file does not exist as well: E:\\www\\Yii\\chonglou_test\\common/messages/zh/model.php'],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."log` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'maintain', $tables))  {
        $this->createTable('{{%maintain}}', [
              'id' => $this->primaryKey(),
              'options_id' => $this->integer(11)->notNull()->unsigned()->defaultValue('0')->comment('位置类型.0首页轮播,1侧栏1,2侧栏2'),
              'show_type' => $this->smallInteger(4)->notNull()->defaultValue(0)->comment('显示类型.0图片,2文字,3markdown'),
              'name' => $this->string(50)->notNull()->comment('名称'),
              'value' => $this->string(255)->notNull()->comment('值'),
              'sign' => $this->string(50)->notNull()->comment('标识'),
              'url' => $this->string(255)->notNull()->comment('URL'),
              'info' => $this->string(255)->notNull()->comment('备注'),
              'sort' => $this->integer(11)->notNull()->comment('排序'),
              'add_time' => $this->integer(11)->notNull()->defaultValue(0)->comment('添加时间'),
              'edit_time' => $this->integer(11)->notNull()->defaultValue(0)->comment('修改时间'),
              'status' => $this->smallInteger(4)->notNull()->defaultValue(1)->comment('状态.0禁用,1启用'),
        ], $tableOptions);
        $this->batchInsert('{{%maintain}}', ['id','options_id','show_type','name','value','sign','url','info','sort','add_time','edit_time','status'],
        [
          	['2','25','0','好文章','/upload/img/9f89537a5e40a04aba9a98f56b86222d.png','aasdfas','/article/default/index','阿隆索肯德基防空雷达数据','10','1522463042','1522467680','1'],
          	['1','0','0','asdfasfas','/upload/img/7930639c2d0c4e54ff99df7659df649d.png','asdfasfasdfdsaf','/askldfjka/asdfkaksl','asdfasdfdasfasdf','11','1522251818','1522515509','0'],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."maintain` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'menu', $tables))  {
        $this->createTable('{{%menu}}', [
              'id' => $this->primaryKey(),
              'app_type' => $this->smallInteger(3)->notNull()->unsigned()->defaultValue(0)->comment('菜单类型.0后台,1前台'),
              'position' => $this->smallInteger(4)->notNull()->defaultValue(0)->comment('位置。0左，1上'),
              'parent_id' => $this->integer(11)->notNull()->unsigned()->defaultValue('0')->comment('上级菜单id'),
              'name' => $this->string(255)->notNull()->comment('名称'),
              'name_en' => $this->string(255)->comment('英文名'),
              'url' => $this->string(255)->notNull()->comment('url地址'),
              'icon' => $this->string(255)->notNull()->defaultValue('')->comment('图标'),
              'sort' => $this->float()->notNull()->unsigned()->defaultValue(0)->comment('排序'),
              'target' => $this->string(255)->notNull()->defaultValue('0')->comment('打开方式._blank新窗口,_self本窗口'),
              'is_absolute_url' => $this->smallInteger(6)->notNull()->unsigned()->defaultValue(0)->comment('是否绝对地址'),
              'is_display' => $this->smallInteger(6)->notNull()->unsigned()->defaultValue(1)->comment('是否显示.0否,1是'),
              'add_time' => $this->integer(11)->notNull()->unsigned()->comment('创建时间'),
              'edit_time' => $this->integer(11)->notNull()->unsigned()->defaultValue('0')->comment('修改时间'),
              'top_id' => $this->integer(11)->notNull()->defaultValue(0)->comment('顶部菜单'),
              'module' => $this->string(100)->comment('模块'),
              'controller' => $this->string(100)->comment('控制器'),
              'action' => $this->string(100)->comment('方法'),
        ], $tableOptions);
        $this->batchInsert('{{%menu}}', ['id','app_type','position','parent_id','name','name_en','url','icon','sort','target','is_absolute_url','is_display','add_time','edit_time','top_id','module','controller','action'],
        [
          	['56','0','0','2','php信息','phpinfo','/system/info/index','fa fa-product-hunt','0','1','0','1','1523457872','1523632663','0','system','info','index'],
          	['55','0','0','2','通知','notice','/admin/message/index','fa fa-bell-o','0','0','0','1','1523451414','0','0','admin','message','index'],
          	['54','0','0','31','单页','Single Page','/article/single/index','fa fa-file-powerpoint-o','0','0','0','1','1523193072','0','0','article','single','index'],
          	['53','0','1','0','管理员','','/admin','fa fa-envelope-o','0','0','0','1','1522771586','0','0','admin','',''],
          	['52','0','0','49','权限','','/auth/permission','fa fa-toggle-on','0','0','0','1','1522161754','0','0','auth','permission','index'],
          	['51','0','0','49','角色','','/auth/role','fa fa-smile-o','0','0','0','1','1522161686','0','0','auth','role','index'],
          	['50','0','0','49','管理员','','/auth/admin','fa fa-user-circle','0','0','0','1','1522161618','1522161633','0','auth','admin','index'],
          	['49','0','0','0','权限','','/auth','fa fa-cogs','0','0','0','1','1522161245','0','0','auth','',''],
          	['47','0','0','45','系统日志','','/log/running','fa fa-bug','0','0','0','1','1522160396','1522475862','0','log','running','index'],
          	['46','0','0','45','管理员日志','','/log/admin-log','fa fa-user-circle','0','0','0','1','1522160321','0','0','log','admin-log','index'],
          	['45','0','0','0','日志','','/log','fa fa-copy','0','0','0','1','1522160183','0','0','log','',''],
          	['40','0','0','2','通知设置','','/system/toastr','fa fa-bell-o','0','0','0','0','1521549369','1523632691','0','system','toastr','index'],
          	['39','0','0','31','标签','','/article/tag/index','fa fa-tag','0','0','0','1','1521126891','0','0','article','tag','index'],
          	['38','0','0','31','分类','','/article/cate/index','fa fa-th','0','0','0','1','1521126691','1522475731','0','article','cate','index'],
          	['37','0','0','31','评论','','/article/commit','fa fa-comments-o','0','0','0','1','1521036315','1522475623','0','article','commit','index'],
          	['35','0','0','2','菜单','','/system/menu/index','fa fa-list-ol','0','0','0','1','1520949853','1522475437','0','system','menu','index'],
          	['32','0','0','31','文章','','/article/default/index','fa fa-file-text','0','0','0','1','1520874846','1522475552','0','article','default','index'],
          	['31','0','0','0','内容','','/article','fa fa-file-o','0','0','0','1','1520873439','1522475605','0','article','',''],
          	['30','0','0','22','警告','','log/waring','fa list','0','_blank','0','1','1519534765','1519534765','0','','',''],
          	['29','0','0','27','广告管理','','ad/index','fa fa-flag-checkered','0','','0','1','1505637000','1522475904','0','','',''],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."menu` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'migration', $tables))  {
        $this->createTable('{{%migration}}', [
              'version' => $this->string(180)->notNull()->comment(''),
              'apply_time' => $this->integer(11)->comment(''),
              'PRIMARY KEY ([[version]])',
        ], $tableOptions);
        $this->batchInsert('{{%migration}}', ['version','apply_time'],
        [
          	['m000000_000000_base','1514107193'],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."migration` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'movie_cate', $tables))  {
        $this->createTable('{{%movie_cate}}', [
              'id' => $this->integer(11)->notNull()->comment(''),
              'name' => $this->string(50)->notNull()->defaultValue('')->comment('名称'),
              'parent_id' => $this->integer(11)->notNull()->defaultValue(0)->comment('父级ID'),
              'add_time' => $this->integer(11)->notNull()->defaultValue(0)->comment('添加时间'),
              'edit_time' => $this->integer(11)->notNull()->defaultValue(0)->comment('修改时间'),
              'level' => $this->smallInteger(4)->notNull()->comment('级别'),
              'path' => $this->string(255)->notNull()->defaultValue('0')->comment('路径'),
              'PRIMARY KEY ([[id]])',
        ], $tableOptions);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."movie_cate` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'movie_info', $tables))  {
        $this->createTable('{{%movie_info}}', [
              'id' => $this->bigPrimaryKey(),
              'actor' => $this->string(100)->notNull()->defaultValue('')->comment('主演'),
              'director' => $this->string(50)->notNull()->defaultValue('')->comment('导演'),
              'name' => $this->string(50)->notNull()->defaultValue('')->unique()->comment('电影名称'),
              'content_id' => $this->bigInteger(20)->notNull()->comment('简介'),
              'cover' => $this->string(255)->notNull()->defaultValue('')->comment('封面'),
              'info' => $this->string(255)->notNull()->defaultValue('')->comment('信息'),
              'url' => $this->string(255)->notNull()->defaultValue('')->comment('链接'),
              'torrent' => $this->string(255)->notNull()->defaultValue('')->comment('u特链接'),
              'magic_link' => $this->string(255)->notNull()->defaultValue('')->comment('磁力链接'),
              'add_time' => $this->integer(11)->notNull()->defaultValue(0)->comment('添加时间'),
              'edit_time' => $this->integer(11)->notNull()->defaultValue(0)->comment('修改时间'),
              'online_time' => $this->integer(11)->notNull()->defaultValue(0)->comment('上映时间'),
              'cate_id' => $this->integer(11)->notNull()->comment('分类'),
              'sort' => $this->integer(11)->notNull()->defaultValue(0)->comment('排序'),
              'remain' => $this->smallInteger(4)->notNull()->defaultValue(0)->comment('提醒.0=未提醒,1=已经提醒.'),
              'auth' => $this->smallInteger(4)->notNull()->defaultValue(0)->comment('权限.0=所有人,1=登录,2=会员,3=管理员'),
              'tag' => $this->string(20)->notNull()->defaultValue('')->comment('标签'),
              'commit' => $this->integer(11)->notNull()->unsigned()->defaultValue('0')->comment('评论'),
              'view' => $this->integer(11)->notNull()->unsigned()->defaultValue('0')->comment('浏览'),
              'collection' => $this->integer(11)->notNull()->unsigned()->defaultValue('0')->comment('收藏'),
              'thumbup' => $this->integer(11)->notNull()->defaultValue(0)->comment('赞'),
              'level' => $this->smallInteger(4)->notNull()->defaultValue(0)->comment('级别.0=和谐,1=18以上'),
              'score' => $this->smallInteger(4)->notNull()->defaultValue(0)->comment('评分..0~10分'),
              'publish' => $this->smallInteger(4)->notNull()->defaultValue(1)->comment('发布.0=草稿,1=发布'),
              'status' => $this->smallInteger(4)->notNull()->defaultValue(0)->comment('状态值.0=待审核,1=审核通过,2=正在审核,3=审核不通过.'),
              'type' => $this->smallInteger(4)->notNull()->defaultValue(0)->comment('类型.0=电影,1=纪录片,2=动漫,3=电视剧.'),
              'seo_title' => $this->string(255)->notNull()->defaultValue('')->comment('seo标题'),
              'seo_keywords' => $this->string(255)->notNull()->defaultValue('')->comment('seo关键字'),
              'seo_description' => $this->string(255)->notNull()->defaultValue('')->comment('seo描述'),
              'flag_headline' => $this->smallInteger(3)->notNull()->unsigned()->defaultValue(0)->comment('头条.0=否,1=是'),
              'flag_recommend' => $this->smallInteger(3)->notNull()->unsigned()->defaultValue(0)->comment('推荐.0=否,1=是'),
              'flag_slide_show' => $this->smallInteger(3)->notNull()->unsigned()->defaultValue(0)->comment('幻灯.0=否,1=是'),
              'flag_special_recommend' => $this->smallInteger(3)->notNull()->unsigned()->defaultValue(0)->comment('特别推荐.0=否,1=是'),
              'flag_roll' => $this->smallInteger(3)->notNull()->unsigned()->defaultValue(0)->comment('滚动.0=否,1=是'),
              'flag_bold' => $this->smallInteger(3)->notNull()->unsigned()->defaultValue(0)->comment('加粗.0=否,1=是'),
              'flag_picture' => $this->smallInteger(3)->notNull()->unsigned()->defaultValue(0)->comment('图片.0=否,1=是'),
        ], $tableOptions);
        $this->batchInsert('{{%movie_info}}', ['id','actor','director','name','content_id','cover','info','url','torrent','magic_link','add_time','edit_time','online_time','cate_id','sort','remain','auth','tag','commit','view','collection','thumbup','level','score','publish','status','type','seo_title','seo_keywords','seo_description','flag_headline','flag_recommend','flag_slide_show','flag_special_recommend','flag_roll','flag_bold','flag_picture'],
        [
          	['1','asdfa','sdfasdf','dasfasf','1231','aasdf','asdf','safdas','fdasfasf','asdfasfds','1523802929','0','0','1231','0','0','0','asdfasfsa','0','0','0','0','0','0','1','0','0','','','','0','0','0','0','0','0','0'],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."movie_info` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'movie_info_content', $tables))  {
        $this->createTable('{{%movie_info_content}}', [
              'id' => $this->bigInteger(20)->notNull()->comment(''),
              'movie_info_id' => $this->bigInteger(20)->notNull()->comment(''),
              'content' => $this->text()->comment(''),
              'PRIMARY KEY ([[id]], [[movie_info_id]])',
        ], $tableOptions);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."movie_info_content` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'movie_info_copy', $tables))  {
        $this->createTable('{{%movie_info_copy}}', [
              'id' => $this->bigPrimaryKey(),
              'actor' => $this->string(100)->notNull()->defaultValue('')->comment('主演'),
              'director' => $this->string(50)->notNull()->defaultValue('')->comment('导演'),
              'name' => $this->string(50)->notNull()->defaultValue('')->unique()->comment('电影名称'),
              'content_id' => $this->bigInteger(20)->notNull()->comment('简介'),
              'cover' => $this->string(255)->notNull()->defaultValue('')->comment('封面'),
              'info' => $this->string(255)->notNull()->defaultValue('')->comment('信息'),
              'url' => $this->string(255)->notNull()->defaultValue('')->comment('链接'),
              'torrent' => $this->string(255)->notNull()->defaultValue('')->comment('u特链接'),
              'magic_link' => $this->string(255)->notNull()->defaultValue('')->comment('磁力链接'),
              'add_time' => $this->integer(11)->notNull()->defaultValue(0)->comment('添加时间'),
              'edit_time' => $this->integer(11)->notNull()->defaultValue(0)->comment('修改时间'),
              'online_time' => $this->integer(11)->notNull()->defaultValue(0)->comment('上映时间'),
              'cate_id' => $this->integer(11)->notNull()->comment('分类'),
              'sort' => $this->integer(11)->notNull()->defaultValue(0)->comment('排序'),
              'remain' => $this->smallInteger(4)->notNull()->defaultValue(0)->comment('提醒.0=未提醒,1=已经提醒.'),
              'auth' => $this->smallInteger(4)->notNull()->defaultValue(0)->comment('权限.0=所有人,1=登录,2=会员,3=管理员'),
              'tag' => $this->string(20)->notNull()->defaultValue('')->comment('标签'),
              'commit' => $this->integer(11)->notNull()->unsigned()->defaultValue('0')->comment('评论'),
              'view' => $this->integer(11)->notNull()->unsigned()->defaultValue('0')->comment('浏览'),
              'collection' => $this->integer(11)->notNull()->unsigned()->defaultValue('0')->comment('收藏'),
              'thumbup' => $this->integer(11)->notNull()->defaultValue(0)->comment('赞'),
              'level' => $this->smallInteger(4)->notNull()->defaultValue(0)->comment('级别.0=和谐,1=18以上'),
              'score' => $this->smallInteger(4)->notNull()->defaultValue(0)->comment('评分..0~10分'),
              'publish' => $this->smallInteger(4)->notNull()->defaultValue(1)->comment('发布.0=草稿,1=发布'),
              'status' => $this->smallInteger(4)->notNull()->defaultValue(0)->comment('状态值.0=待审核,1=审核通过,2=正在审核,3=审核不通过.'),
              'type' => $this->smallInteger(4)->notNull()->defaultValue(0)->comment('类型.0=电影,1=纪录片,2=动漫,3=电视剧.'),
              'seo_title' => $this->string(255)->notNull()->defaultValue('')->comment('seo标题'),
              'seo_keywords' => $this->string(255)->notNull()->defaultValue('')->comment('seo关键字'),
              'seo_description' => $this->string(255)->notNull()->defaultValue('')->comment('seo描述'),
              'flag_headline' => $this->smallInteger(3)->notNull()->unsigned()->defaultValue(0)->comment('头条.0=否,1=是'),
              'flag_recommend' => $this->smallInteger(3)->notNull()->unsigned()->defaultValue(0)->comment('推荐.0=否,1=是'),
              'flag_slide_show' => $this->smallInteger(3)->notNull()->unsigned()->defaultValue(0)->comment('幻灯.0=否,1=是'),
              'flag_special_recommend' => $this->smallInteger(3)->notNull()->unsigned()->defaultValue(0)->comment('特别推荐.0=否,1=是'),
              'flag_roll' => $this->smallInteger(3)->notNull()->unsigned()->defaultValue(0)->comment('滚动.0=否,1=是'),
              'flag_bold' => $this->smallInteger(3)->notNull()->unsigned()->defaultValue(0)->comment('加粗.0=否,1=是'),
              'flag_picture' => $this->smallInteger(3)->notNull()->unsigned()->defaultValue(0)->comment('图片.0=否,1=是'),
        ], $tableOptions);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."movie_info_copy` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'options', $tables))  {
        $this->createTable('{{%options}}', [
              'id' => $this->primaryKey(),
              'type' => $this->integer(11)->notNull()->unsigned()->defaultValue('0')->comment('类型.0系统,1自定义,2banner,3广告'),
              'name' => $this->string(255)->notNull()->comment('标识符'),
              'value' => $this->text()->notNull()->comment('值'),
              'input_type' => $this->smallInteger(6)->notNull()->unsigned()->defaultValue(1)->comment('输入框类型'),
              'autoload' => $this->smallInteger(6)->notNull()->unsigned()->defaultValue(1)->comment('自动加载.0否,1是'),
              'tips' => $this->string(255)->notNull()->defaultValue('')->comment('提示备注信息'),
              'sort' => $this->integer(11)->notNull()->unsigned()->defaultValue('0')->comment('排序'),
        ], $tableOptions);
        $this->batchInsert('{{%options}}', ['id','type','name','value','input_type','autoload','tips','sort'],
        [
          	['43','2','尾页','拉萨的空间放大圣诞快乐分','1','1','','0'],
          	['42','1','阿斯短发打岁发生','阿斯短发散发大赛法的撒','1','1','','0'],
          	['41','1','啊岁的发生发所得发','阿斯短发岁的法岁的法','1','1','','0'],
          	['40','1','阿斯短发岁的发送','阿斯短发的沙发上的发','1','1','啊岁的发生发所得发','0'],
          	['27','3','sidebar_right_2','{\"ad\":\"\\/uploads\\/setting\\/ad\\/5a291f9236479_22.jpg\",\"link\":\"\",\"target\":\"_blank\",\"desc\":\"\\u6700\\u597d\\u7684\\u8fd0\\u52a8\\u624b\\u8868\",\"created_at\":1512644498,\"updated_at\":1512647586}','1','1','网站右侧广告位2','0'],
          	['26','3','sidebar_right_1','{\"ad\":\"\\/uploads\\/setting\\/ad\\/5a292c0fda836_cms.jpg\",\"link\":\"http://www.feehi.com\",\"target\":\"_blank\",\"desc\":\"FeehiCMS\",\"created_at\":1512641320,\"updated_at\":1512647776}','1','1','网站右侧广告位1','0'],
          	['25','2','index','首页banner','1','1','首页banner','0'],
          	['24','1','email','admin@feehi.com','1','1','邮箱','0'],
          	['23','1','qq','1838889850阿斯蒂芬撒旦法','1','1','QQ号码','0'],
          	['22','1','wechat','飞得更高','1','1','微信','0'],
          	['21','1','facebook','http://www.facebook.com/liufee','1','1','facebook','0'],
          	['20','1','weibo','http://www.weibo.com/feeppp','1','1','新浪微博','0'],
          	['19','0','smtp_nickname','aslkdjfklsasdfsaasdfasf','1','0','','0'],
          	['18','0','smtp_encryption','fklsajkd','1','0','','0'],
          	['17','0','smtp_port','24','1','0','','0'],
          	['16','0','smtp_password','fklsajdfk','1','0','','0'],
          	['15','0','smtp_username','asdlkfk','1','0','','0'],
          	['14','0','smtp_host','alskdfk','1','0','','0'],
          	['13','0','website_url','www.chonglou.com','1','0','','0'],
          	['12','0','website_timezone','Asia/Shanghai','1','0','','0'],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."options` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'tag', $tables))  {
        $this->createTable('{{%tag}}', [
              'id' => $this->primaryKey(),
              'name' => $this->string(100)->comment('名称'),
              'frequence' => $this->integer(11)->comment('频率'),
              'content_type' => $this->smallInteger(4)->comment('标签类型'),
        ], $tableOptions);
        $this->batchInsert('{{%tag}}', ['id','name','frequence','content_type'],
        [
          	['1','撒旦法','',''],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."tag` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'user', $tables))  {
        $this->createTable('{{%user}}', [
              'id' => $this->bigPrimaryKey(),
              'name' => $this->string(50)->comment('名称'),
              'email' => $this->string(20)->comment('邮箱'),
              'mobile' => $this->string(20)->comment('手机号'),
              'auth_key' => $this->string(255)->comment('授权登录'),
              'password' => $this->string(255)->comment('密码'),
              'password_reset_token' => $this->string(255)->comment('密码重置口令'),
              'role_id' => $this->integer(11)->defaultValue(10)->comment('角色'),
              'head' => $this->string(255)->comment(''),
              'status' => $this->smallInteger(4)->comment('状态'),
              'add_time' => $this->integer(11)->comment('添加时间'),
              'edit_time' => $this->integer(11)->comment('编辑时间'),
        ], $tableOptions);
        $this->batchInsert('{{%user}}', ['id','name','email','mobile','auth_key','password','password_reset_token','role_id','head','status','add_time','edit_time'],
        [
          	['1','orx','lbmzorx@163.com','','R93myqD6Vv5Zk7c9Wj8RhRYbos3C-Lzw','$2y$13$X291dbSp32i9Re3tfsZS9O16h2.vL8L4.ho7wmA6RjwCAG70wIQrq','','10','','10','1517058710',''],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."user` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'user_action', $tables))  {
        $this->createTable('{{%user_action}}', [
              'id' => $this->primaryKey(),
              'user_id' => $this->integer(11)->notNull()->unsigned()->comment(''),
              'action' => $this->string(200)->comment('动作内容'),
              'action_id' => $this->integer(10)->unsigned()->comment('动作ID'),
              'action_type' => $this->smallInteger(4)->comment('动作类型'),
              'status' => $this->smallInteger(4)->comment('状态，0未读，1已读，2未知'),
              'add_time' => $this->integer(10)->unsigned()->comment('添加时间'),
        ], $tableOptions);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."user_action` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'user_info', $tables))  {
        $this->createTable('{{%user_info}}', [
              'id' => $this->primaryKey(),
              'user_id' => $this->integer(11)->comment(''),
              'sign' => $this->string(255)->comment(''),
        ], $tableOptions);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."user_info` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'user_message', $tables))  {
        $this->createTable('{{%user_message}}', [
              'id' => $this->primaryKey(),
              'content' => $this->text()->comment('消息内容'),
              'send_id' => $this->integer(11)->unsigned()->comment('发送者ID'),
              'to_id' => $this->integer(11)->unsigned()->comment('接收者ID'),
              'status' => $this->smallInteger(4)->comment('状态'),
              'add_time' => $this->integer(11)->unsigned()->comment('添加时间'),
        ], $tableOptions);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."user_message` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'user_news', $tables))  {
        $this->createTable('{{%user_news}}', [
              'id' => $this->primaryKey(),
              'user_id' => $this->integer(10)->unsigned()->comment(''),
              'news_count' => $this->integer(11)->comment('通知数量'),
        ], $tableOptions);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."user_news` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'user_score', $tables))  {
        $this->createTable('{{%user_score}}', [
              'id' => $this->primaryKey(),
              'user_id' => $this->integer(11)->unsigned()->comment(''),
              'wealth' => $this->bigInteger(20)->comment(''),
              'prestige' => $this->bigInteger(20)->comment(''),
              'score' => $this->bigInteger(20)->comment(''),
        ], $tableOptions);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."user_score` already exists!\n";
        }
        
    }

    public function safeDown()
    {
        $this->dropTable('{{%user_score}}');
        $this->dropTable('{{%user_news}}');
        $this->dropTable('{{%user_message}}');
        $this->dropTable('{{%user_info}}');
        $this->dropTable('{{%user_action}}');
        $this->dropTable('{{%user}}');
        $this->dropTable('{{%tag}}');
        $this->dropTable('{{%options}}');
        $this->dropTable('{{%movie_info_copy}}');
        $this->dropTable('{{%movie_info_content}}');
        $this->dropTable('{{%movie_info}}');
        $this->dropTable('{{%movie_cate}}');
        $this->dropTable('{{%migration}}');
        $this->dropTable('{{%menu}}');
        $this->dropTable('{{%maintain}}');
        $this->dropTable('{{%log}}');
        $this->dropTable('{{%layout}}');
        $this->dropTable('{{%img_upload}}');
        $this->dropTable('{{%auth_rule}}');
        $this->dropTable('{{%auth_item_child}}');
        $this->dropTable('{{%auth_item}}');
        $this->dropTable('{{%auth_assignment}}');
        $this->dropTable('{{%article_thumbup}}');
        $this->dropTable('{{%article_content}}');
        $this->dropTable('{{%article_commit}}');
        $this->dropTable('{{%article_collection}}');
        $this->dropTable('{{%article_cate}}');
        $this->dropTable('{{%article}}');
        $this->dropTable('{{%admin_message_log}}');
        $this->dropTable('{{%admin_message}}');
        $this->dropTable('{{%admin_log}}');
        $this->dropTable('{{%admin_info}}');
        $this->dropTable('{{%admin}}');
        $this->dropTable('{{%active}}');
    }
}
