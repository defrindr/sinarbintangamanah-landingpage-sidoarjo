<?php

namespace app\models;

use Yii;
use \app\models\base\Gallery as BaseGallery;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "gallery".
 * Modified by Defri Indra M
 */
class Gallery extends BaseGallery
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

    public function getImageUrl()
    {
        $url = $this->image;

        if (substr($url, 0, 4) != 'http') {
            $url = Yii::$app->formatter->asMyImage($url, false);
        }

        return $url;
    }
}
