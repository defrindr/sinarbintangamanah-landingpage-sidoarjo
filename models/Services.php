<?php

namespace app\models;

use Yii;
use \app\models\base\Services as BaseServices;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "services".
 * Modified by Defri Indra M
 */
class Services extends BaseServices
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
