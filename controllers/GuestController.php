<?php

namespace app\controllers;

use app\models\Gallery;
use app\models\Services;
use app\models\Testimoni;
use app\models\Whywe;
use Yii;
use yii\web\Controller;

class GuestController extends Controller
{
    // change the layout
    public $layout = '../guest-layout/guest';


    public function actionIndex()
    {
        $services = Services::find()->all();
        $whywes = Whywe::find()->all();
        return $this->render('index', compact('services', 'whywes'));
    }

    public function actionService()
    {
        $services = Services::find()->all();
        return $this->render('service', compact('services'));
    }

    public function actionGallery()
    {
        $galleries = Gallery::find()->orderBy('id DESC')->all();
        return $this->render('gallery', compact('galleries'));
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionBooking()
    {
        $model = new \app\models\BookingData();
        return $this->render('booking', compact('model'));
    }


    public function actionTestimoniAction()
    {
        try {
            //code...
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $model = new \app\models\Testimoni();
            $request = Yii::$app->request->post();

            $data = [
                'name' => $request['nama'] ?? null,
                'text' => $request['testimoni'] ?? null,
                'created_at' => $request['tanggal'] ?? null,
            ];

            $model->load($data, '');

            if ($model->validate() == false) {
                return [
                    'success' => false,
                    'message' => 'Data gagal disimpan',
                ];
            }

            if ($model->save() == false) {
                return [
                    'success' => false,
                    'message' => 'Data gagal disimpan',
                ];
            }

            return [
                'success' => true,
                'message' => 'Data berhasil disimpan',
            ];
        } catch (\Throwable $th) {
            return [
                'success' => false,
                'message' => 'Data gagal disimpan',
            ];
        }
    }

    public function actionBookingAction()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = new \app\models\BookingData();
        $model->load(Yii::$app->request->post(), '');

        $jam_kedatangan = Yii::$app->request->post('jam_kedatangan');

        if (count($jam_kedatangan) == 0) {
            return [
                'success' => false,
                'message' => 'Data gagal disimpan',
            ];
        }

        $model->jam_kedatangan = implode(',', $jam_kedatangan);

        $model->creatad_at = date('Y-m-d H:i:s');

        if ($model->validate() == false) {
            return [
                'success' => false,
                'message' => 'Data gagal disimpan',
            ];
        }

        if ($model->save() == false) {
            return [
                'success' => false,
                'message' => 'Data gagal disimpan',
            ];
        }

        return [
            'success' => true,
            'message' => 'Data berhasil disimpan',
        ];
    }
}
