<?php

namespace app\modules\api\modules\v1\controllers;

/**
 * This is the class for REST controller "JadwalSholatController".
 * Modified by Defri Indra
 */

use app\components\Constant;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use Yii;
use yii\data\ActiveDataFilter;
use yii\web\HttpException;
use yii\web\Request;
use yii\web\UploadedFile;

class ExtractorController extends \app\modules\api\controllers\BaseController
{
    use \app\traits\UploadFileTrait;
    use \app\traits\MessageTrait;

    public $modelClass = 'app\models\AbsenSholat';
    public $validation = null;

    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
    }

    // remove auth
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        // except index
        unset($behaviors['authentication']);
        return $behaviors;
    }

    private function generatePlantUmlErd($tables)
    {
        $uml = "@startuml";
        
        foreach ($tables as $table) {
            $uml .= "\n\nentity " . $table['name'] . " {";
            foreach ($table['columns'] as $column) {
                $uml .= "\n\t" . $column['name'] . " : " . $column['type'];
            }
            $uml .= "\n}";
        }

        $uml .= "\n\n@enduml";

        return $uml;
    }

    public function actionIndex($table_schema = 'db_hpk')
    {
        $sql_tablelist = "SELECT distinct TABLE_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '$table_schema' ORDER BY TABLE_NAME, ORDINAL_POSITION";
        $table_names = Yii::$app->db->createCommand($sql_tablelist)->queryAll();

        $list = [];

        foreach ($table_names as $table_name) {
            // $table_name = $table_name['TABLE_NAME'];
            // $sql = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '$table_schema' AND TABLE_NAME = '$table_name' ORDER BY TABLE_NAME, ORDINAL_POSITION";
            // $columns = Yii::$app->db->createCommand($sql)->queryAll();

            // if (!isset($list[$table_name])) {
            //     $list[$table_name] = ['columns' => []];
            // }

            // foreach ($columns as $column) {
            //     $list[$table_name]['columns'][] = $column['COLUMN_NAME'];
            // }

            // get table relations with other tables
            // $sql = "SELECT TABLE_NAME, COLUMN_NAME, CONSTRAINT_NAME, REFERENCED_TABLE_NAME, REFERENCED_COLUMN_NAME FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE TABLE_SCHEMA = '$table_schema' AND TABLE_NAME = '$table_name[TABLE_NAME]' AND REFERENCED_TABLE_NAME IS NOT NULL";
            // $relations = Yii::$app->db->createCommand($sql)->queryAll();

            // if (!isset($list[$table_name['TABLE_NAME']])) {
            //     $list[$table_name['TABLE_NAME']] = ['relations' => []];
            // }

            // foreach ($relations as $relation) {
            //     $list[$table_name['TABLE_NAME']]['relations'][] = $relation;
            // }

            echo "create table " . $table_name['TABLE_NAME'] . " \n(\n);\n\n";
        }
    }
}
