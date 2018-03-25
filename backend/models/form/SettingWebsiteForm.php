<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-23 12:54
 */
namespace backend\models\form;


use yii;
class SettingWebsiteForm extends SettingOptionsForm
{
    public $website_title;

    public $website_email;

    public $website_language;

    public $website_icp;

    public $website_statics_script;

    public $website_status;

    public $website_timezone;

    public $website_comment;

    public $website_comment_need_verify;

    public $website_url;

    public $seo_keywords;

    public $seo_description;


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'website_title' => yii::t('app', 'Website Title'),
            'website_email' =>yii::t('app','Website Email'),
            'website_language' => yii::t('app', 'Website Language'),
            'website_icp' => yii::t('app', 'Icp Sn'),
            'website_statics_script' => yii::t('app', 'Statics Script'),
            'website_status' => yii::t('app', 'Website Status'),
            'website_timezone' => yii::t('app', 'Website Timezone'),
            'website_comment' => yii::t('app', 'Open Comment'),
            'website_comment_need_verify' => yii::t('app', 'Open Comment Verify'),
            'website_url' => yii::t('app', 'Website Url'),
            'seo_keywords' => yii::t('app', 'Seo Keywords'),
            'seo_description' => yii::t('app', 'Seo Description'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'website_title',
                    'website_email',
                    'website_language',
                    'website_icp',
                    'website_statics_script',
                    'website_timezone',
                    'website_url',
                    'seo_keywords',
                    'seo_description'
                ],
                'string'
            ],
            [['website_status', 'website_comment', 'website_comment_need_verify'], 'integer'],
        ];
    }

}