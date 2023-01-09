<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build
// Modified by Defri Indra
// 2021

namespace app\modules\websetting\models\base;

use Yii;

/**
 * This is the base-model class for table "web_config".
 *
 * @property integer $id
 * @property integer $group_id
 * @property string $name
 * @property string $value
 * @property string $default
 * @property integer $active
 *
 * @property \app\modules\websetting\models\WebConfigGroup $group
 * @property string $aliasModel
 */
abstract class WebConfig extends \yii\db\ActiveRecord
{
    use \app\traits\ModelTrait;

    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';
    public $_render = [];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'web_config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id', 'active'], 'integer'],
            [['name'], 'required'],
            [['value', 'default'], 'string'],
            [['name'], 'string', 'max' => 200],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\modules\websetting\models\WebConfigGroup::class, 'targetAttribute' => ['group_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('models', 'ID'),
            'group_id' => Yii::t('models', 'Group'),
            'name' => Yii::t('models', 'Name'),
            'value' => Yii::t('models', 'Value'),
            'default' => Yii::t('models', 'Default'),
            'active' => Yii::t('models', 'Active'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(\app\modules\websetting\models\WebConfigGroup::class, ['id' => 'group_id']);
    }





    public function scenarios()
    {
        $parent = parent::scenarios();

        $columns = [
            'id',
            'group_id',
            'name',
            'value',
            'default',
            'active',
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

        if (isset($parent['id'])) :
            unset($parent['id']);
            $parent['id'] = function ($model) {
                return $model->id;
            };
        endif;
        if (isset($parent['group_id'])) :
            unset($parent['group_id']);
            $parent['group_id'] = function ($model) {
                return $model->group_id;
            };
            $parent['_group'] = function ($model) {
                $rel = $model->group;
                if ($rel) :
                    return $rel;
                endif;
                return null;
            };
        endif;
        if (isset($parent['name'])) :
            unset($parent['name']);
            $parent['name'] = function ($model) {
                return $model->name;
            };
        endif;
        if (isset($parent['value'])) :
            unset($parent['value']);
            $parent['value'] = function ($model) {
                return $model->value;
            };
        endif;
        if (isset($parent['default'])) :
            unset($parent['default']);
            $parent['default'] = function ($model) {
                return $model->default;
            };
        endif;
        if (isset($parent['active'])) :
            unset($parent['active']);
            $parent['active'] = function ($model) {
                return $model->active;
            };
        endif;



        return $parent;
    }


    public function faker()
    {
        $faker = \Faker\Factory::create();
        $data = [
            "id" => $faker->unique()->randomNumber(11),
            "group_id" => \app\components\Constant::getRandomFrom(\app\components\Constant::getIDs(\app\modules\websetting\models\WebConfigGroup::find()->select('id')->all(), 'id')),
            "name" => $faker->name,
            "value" => $faker->randomNumber(),
            "default" => $faker->randomNumber(),
            "active" => $faker->randomNumber(),
        ];
        return $data;
    }
}