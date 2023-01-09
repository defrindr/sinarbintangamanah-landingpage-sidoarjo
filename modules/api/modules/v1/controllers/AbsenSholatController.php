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

class AbsenSholatController extends \app\modules\api\controllers\BaseController
{
    use \app\traits\UploadFileTrait;
    use \app\traits\MessageTrait;

    public $modelClass = 'app\models\AbsenSholat';
    public $validation = null;

    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
    }

    public function verbs()
    {
        $parent = parent::verbs();
        $parent['absen'] = ['POST'];

        return $parent;
    }

    public function actionIndex(Request $request)
    {
        $select_fields = [];
        $filterCondition = null;
        $user = Yii::$app->user->identity;

        $filter = new ActiveDataFilter([
            'searchModel' => 'app\models\search\AbsenSholatSearch',
        ]);

        if ($filter->load($request->get())) {
            $filterCondition = $filter->build();
            if ($filterCondition === false) {
                return $filter;
            }
        }

        $query = $this->modelClass::find()->joinWith(['jadwalSholat', 'jadwalSholat.sholat']);
        if ($filterCondition !== null) {
            $query->andWhere($filterCondition);
        }

        if (!$request->get('fields')) {
            $select_fields = ['jadwal_sholat.id', 'tanggal', 'name', 'start_time', 'end_time'];
        }

        if (!$request->get('expand')) {
            $query->with([]);
        }

        if ($user && $user->role_id == Constant::ROLE_REGULER_USER) {
            $query->andWhere(['id_user' => $user->id]);
        }

        if (!$request->get('all')) {
            if (!$request->get('date')) {
                $query->andWhere(['tanggal' => date('Y-m-d')]);
            } else {
                $query->andWhere(['tanggal' => $request->get('date')]);
            }
        }

        if (!empty($select_fields)) {
            $query->select($select_fields);
        }

        return $this->dataProvider($query);
    }

    public function actionView($id, Request $request)
    {
        $query = $this->modelClass::find();
        $query->where(['id' => $id]);

        if (!$request->get('fields')) {
            $query->select(['id', 'tanggal', 'master_sholat.name']);
        }

        if (!$request->get('expand')) {
            $query->with([]);
        }

        return $this->dataProvider($query);
    }


    public function actionAbsen(Request $request, $id)
    {
        $user = Yii::$app->user->identity;
        $_m = $this->modelClass;
        $instance = UploadedFile::getInstanceByName('image');
        $location = $request->post('location');

        $model = $_m::findOne(['id' => $id, 'id_user' => $user->id]);
        if (!$model) {
            throw new HttpException(404, 'Data not found');
        } else if($model->status == $_m::STATUS_TIDAK_SHOLAT) {
            throw new HttpException(400, 'Anda sudah absen tidak sholat');
        } else if($model->status == $_m::STATUS_SHOLAT) {
            throw new HttpException(400, 'Anda sudah absen sholat');
        }

        $start_time = strtotime($model->jadwalSholat->tanggal . ' ' . $model->jadwalSholat->start_time);
        $end_time = strtotime($model->jadwalSholat->tanggal . ' ' . $model->jadwalSholat->end_time);

        if (time() < $start_time) {
            throw new \yii\web\HttpException(422, 'Belum waktunya absen');
        }

        if (time() > $end_time) {
            // update status
            $model->status = $_m::STATUS_TIDAK_SHOLAT;
            $model->save(false);
            throw new \yii\web\HttpException(422, 'Waktu absen sudah habis');
        }

        $model->scenario = $model::SCENARIO_SHOLAT;

        $response = $this->uploadFile($instance, 'absen_sholat');
        if (!$response->success) {
            throw new HttpException(400, $response->message);
        }

        $model->foto = $response->fileName;
        $model->status = $_m::STATUS_SHOLAT;
        $model->location = $location;

        if (!$model->validate()) {
            // delete file
            if ($model->foto) {
                $this->deleteFile($model->foto, 'absen_sholat');
            }
            throw new HttpException(422, $this->message422(
                Constant::flattenError($model->getErrors())
            ));
        }

        $model->save();

        return [
            'status' => true,
            'message' => 'Absen berhasil',
        ];
    }
}
