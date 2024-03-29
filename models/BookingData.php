<?php

namespace app\models;

use Yii;
use \app\models\base\BookingData as BaseBookingData;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "booking_data".
 * Modified by Defri Indra M
 */
class BookingData extends BaseBookingData
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
