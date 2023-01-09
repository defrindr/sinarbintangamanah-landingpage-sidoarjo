<?php

namespace app\modules\api\modules\v1\controllers;

/**
 * This is the class for REST controller "UserController".
 */

use Yii;
use yii\web\HttpException;
use yii\web\Request;
use yii\web\Response;
use yii\web\UploadedFile;

class AuthController extends \yii\rest\ActiveController
{
    use \app\traits\MessageTrait;
    use \app\traits\UploadFileTrait;

    public $modelClass = 'app\models\User';

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        return array_merge([
            'authentication' => [
                'class' => \app\components\CustomAuth::class,
                'only' => ['view', 'update'],
            ]
        ], $behaviors);
    }

    function verbs()
    {
        return [
            'view' => ['GET', 'HEAD'],
            'register' => ['POST'],
            'login' => ['POST'],
            'update' => ['PUT', 'PATCH'],
        ];
    }

    public function actionRegister()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;


        $user = new \app\models\User;
        $user->scenario = \app\models\User::SCENARIO_REGISTER_APP;

        $request = \yii::$app->request->post();
        $user->load($request, '');

        $user->phone = \app\components\Constant::purifyPhone($user->phone);
        $user->role_id = \app\models\User::ROLE_USER_REGULER; // role
        if ($user->validate()) {
            $user->password = \Yii::$app->security->generatePasswordHash($user->password);
            $generate_random_string = (new \app\helpers\SsoTokenHelper)->generateToken();
            $user->secret_token = $generate_random_string;
            $user->save();

            return [
                'success' => true,
                'message' => Yii::t("action_message", "Berhasil melakukan registrasi"),
                'token' => $user->secret_token
            ];
        } else {
            throw new HttpException(422, $this->message422(
                \app\components\Constant::flattenError(
                    $user->getErrors()
                )
            ));
        }
    }

    public function actionUpdate()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $request = Yii::$app->request->bodyParams;

        $user = \app\models\User::findOne(["id" => Yii::$app->user->id]);
        $photo_url = $user->photo_url;
        $user->scenario = $user::SCENARIO_UPDATE;
        $user->load($request);

        $user->phone = \app\components\Constant::purifyPhone($user->phone);
        $image = UploadedFile::getInstanceByName("photo_url");
        if ($image) {
            $response = $this->uploadImage($image, "user");
            if ($response->success == false) throw new HttpException(419, $this->messageImageFailedUpload());
            $user->photo_url = $response->fileName;
        } else {
            $user->photo_url = $photo_url;
        }

        if ($user->validate()) {
            $password = $request["User"]['password'];
            if ($password) $user->password = \Yii::$app->security->generatePasswordHash($user->password);

            $user->save();

            return [
                "success" => true,
                "message" => Yii::t("action_message", "Profil berhasil diubah"),
                "data" => $user,
            ];
        }

        throw new HttpException(422, $this->message422(
            \app\components\Constant::flattenError(
                $user->getErrors()
            )
        ));
    }

    public function actionView()
    {
        $user = \app\models\User::findOne(["id" => Yii::$app->user->id]);
        if ($user == null) throw new HttpException(404, $this->message404());

        return [
            "success" => true,
            "message" => $this->messageFetchSuccess(),
            "data" => $user,
        ];
    }

    public function actionLogin(Request $request)
    {
        $grant_type = $request->post('grant_type');

        switch ($grant_type) {
            case 'password':
                return $this->_password($request);
                break;
            case 'refresh_token':
                return $this->_refreshToken($request);
                break;
            default:
                throw new HttpException(400, Yii::t("action_message", "Grant type tidak ditemukan"));
                break;
        }
    }


    private function _refreshToken(Request $request)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $refresh_token = $request->post('refresh_token');

        try {
            $user = \app\models\User::findOne(['refresh_token' => $refresh_token]);
            if (!$user) throw new HttpException(400, Yii::t("action_message", "Refresh token tidak ditemukan"));
            $user->scenario = $user::SCENARIO_UPDATE;

            $token = (new \app\helpers\SsoTokenHelper)->generateToken();
            $user->secret_token = $token;
            $user->refresh_token = Yii::$app->security->generateRandomString(50);

            if (!$user->validate())
                throw new HttpException(422, $this->message422(
                    \app\components\Constant::flattenError(
                        $user->getErrors()
                    )
                ));

            $user->save();

            return $this->_loginResponse($token, $user, Yii::t("action_message", "Refresh token berhasil"));
        } catch (\Exception $e) {
            throw new HttpException($e->statusCode ?? 500, $e->getMessage());
        }
    }

    private function _password(Request $request)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $username = $request->post('username');
        $password = $request->post('password');
        $fcm_token = $request->post('fcm_token');

        try {
            $user = \app\models\User::findByUsername($username);

            if (!isset($user)) goto end;

            if (\Yii::$app->security->validatePassword($password, $user->password) == false)
                throw new HttpException(400, Yii::t("action_message", "User tidak dapat ditemukan"));

            $user->scenario = $user::SCENARIO_UPDATE;

            $token = (new \app\helpers\SsoTokenHelper)->generateToken();
            $user->secret_token = $token;
            $user->refresh_token = Yii::$app->security->generateRandomString(50);

            if ($fcm_token) $user->fcm_token = $fcm_token;

            if (!$user->validate())
                throw new HttpException(422, $this->message422(
                    \app\components\Constant::flattenError(
                        $user->getErrors()
                    )
                ));

            $user->save();

            return $this->_loginResponse($token, $user, Yii::t("action_message", "Login Berhasil"));
        } catch (\Exception $e) {
            throw new HttpException($e->statusCode ?? 500, $e->getMessage());
        }

        end:
        throw new HttpException(400, Yii::t("action_message", "Login gagal"));
    }

    private function _loginResponse($token, $user, $message)
    {
        return (object) [
            "success" => true,
            "message" => $message,
            "data" => [
                "token" => $token,
                "refresh_token" => $user['refresh_token'],
                "user" => $user
            ]
        ];
    }
}
