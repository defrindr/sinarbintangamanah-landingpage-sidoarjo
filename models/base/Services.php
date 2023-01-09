<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build
// Modified by Defri Indra
// 2021

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "services".
 *
 * @property string $image
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $link
 * @property integer $id
 * @property string $aliasModel
 */
abstract class Services extends \yii\db\ActiveRecord
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
        return 'services';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            // [
            //     'class' => \app\components\behaviors\UUIDBehavior::class,
            //     'model' => get_called_class(),
            //     'primaryKey' => 'id',
            // ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image', 'title', 'description', 'link'], 'required'],
            [['description'], 'string'],
            [['image'], 'string', 'max' => 250],
            [['title'], 'string', 'max' => 100],
            [['link'], 'string', 'max' => 255],
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
            'title' => Yii::t('models', 'Title'),
            'description' => Yii::t('models', 'Description'),
            'link' => Yii::t('models', 'Link'),
        ];
    }





    public function scenarios()
    {
        $parent = parent::scenarios();

        $columns = [
            'id',
            'image',
            'title',
            'description',
            'link',
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
        if(isset($parent['title'])) :
            unset($parent['title']);
            $parent['title'] = function($model) {
                return $model->title;
            };
        endif;
        if(isset($parent['description'])) :
            unset($parent['description']);
            $parent['description'] = function($model) {
                return $model->description;
            };
        endif;
        if(isset($parent['link'])) :
            unset($parent['link']);
            $parent['link'] = function($model) {
                return $model->link;
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
                "title" => $faker->sentence($nbWords = 6, $variableNbWords = true),
                "description" => $faker->paragraphs($nb = 3, $asText = true),
                "link" => $faker->text(),
                "id" => $faker->unique()->numberBetween($maxId, $maxId + $count),
            ];
        }
        return $data;
    }

}