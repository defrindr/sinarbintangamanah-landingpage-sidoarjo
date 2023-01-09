<?php

namespace app\models;

use Yii;
use \app\models\base\Testimoni as BaseTestimoni;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "testimoni".
 * Modified by Defri Indra M
 */
class Testimoni extends BaseTestimoni
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
    
}
