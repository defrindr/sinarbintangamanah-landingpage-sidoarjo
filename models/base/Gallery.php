<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build
// Modified by Defri Indra
// 2021

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "gallery".
 *
 * @property string $image
 * @property string $caption
 * @property integer $id
 * @property string $aliasModel
 */
abstract class Gallery extends \yii\db\ActiveRecord
{
    /**
     * BaseModel rules. 
     **/
    use \app\traits\ModelTrait;

    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';
    public $_render = [];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['caption'], 'required'],
            [['image'], 'string', 'max' => 255],
            [['caption'], 'string', 'max' => 100],
            [['id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('models', 'ID'),
            'image' => Yii::t('models', 'Image'),
            'caption' => Yii::t('models', 'Caption'),
        ];
    }





    public function scenarios()
    {
        $parent = parent::scenarios();

        $columns = [
            'id',
            'image',
            'caption',
        ];

        $parent[static::SCENARIO_CREATE] = $columns;
        $parent[static::SCENARIO_UPDATE] = $columns;
        return $parent;
    }

    /**
     * @inheiritance
     */
    public function fields()
    {
        $parent = parent::fields();

        if(isset($parent['id'])) :
            unset($parent['id']);
            $parent['id'] = function($model) {
                return $model->id;
            };
        endif;
        if(isset($parent['image'])) :
            unset($parent['image']);
            $parent['image'] = function($model) {
                return \Yii::$app->formatter->asMyImage($model->image, false);
            };
        endif;
        if(isset($parent['caption'])) :
            unset($parent['caption']);
            $parent['caption'] = function($model) {
                return $model->caption;
            };
        endif;



        return $parent;
    }


    public static function faker($count = 10){
        $faker= \Faker\Factory::create();
        $faker->addProvider(new \app\components\faker\provider\MyImage($faker));
        $data = [];
        $maxId = static::find()->max('id');

        // relational data
        for ($i = 0; $i < $count; $i++) {
            $data[] = [ 
                "image" => "tmp/". $faker->myimage($dir = \Yii::getAlias('@webroot/uploads/tmp'), $width = 640, $height = 480, "cats", false),
                "caption" => $faker->text(),
                "id" => $faker->unique()->numberBetween($maxId, $maxId + $count),
            ];
        }
        return $data;
    }

}