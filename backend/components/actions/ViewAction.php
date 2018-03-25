<?php
namespace backend\components\actions;


class ViewAction extends \yii\base\Action
{

    public $modelClass;
    public $viewFile = null;
    /**
     * view详情页
     *
     * @param $id
     * @return string
     */
    public function run($id)
    {
        /* @var $model \yii\db\ActiveRecord */
        $model = call_user_func([$this->modelClass, 'findOne'], $id);
        $this->viewFile === null && $this->viewFile = $this->id;
        return $this->controller->render($this->viewFile, [
            'model' => $model,
        ]);
    }

}