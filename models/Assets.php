<?php

namespace app\models;

use Yii;
use \app\models\base\Assets as BaseAssets;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "assets".
 * Modified by Defri Indra M
 */
class Assets extends BaseAssets
{
    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
            ]
        );
    }

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                # custom validation rules
            ]
        );
    }


    public static function get($page, $position)
    {
        $model = self::find()
            ->where(['page' => $page, 'positiion' => $position, 'type' => 'IMAGE'])
            ->one();
        if ($model) {
            return $model->uri;
        }

        return "";
    }


    public static function text($page, $position)
    {
        $model = self::find()
            ->where(['page' => $page, 'positiion' => $position, 'type' => 'TEXT'])
            ->one();
        if ($model) {
            return $model->uri;
        }

        return "";
    }
}
