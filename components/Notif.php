<?php

namespace app\components;

use app\modules\notification\models\Notification;
use yii\helpers\Url;

class Notif
{
    public static function notifList($listHtml = true)
    {
        $notifList = [];

        $user = \Yii::$app->user->identity;
        $belum_dilihat = 0;

        $notif = Notification::find()
            ->where(['user_id' => $user->id, 'read' => $belum_dilihat])
            ->select(['id', 'title'])
            ->orderBy(['id' => SORT_DESC])
            ->limit(20)
            ->asArray()
            ->all();
        $count = count($notif);
        $countnotif = Notification::find()->where(['user_id' => $user['id'], 'read' => $belum_dilihat])->count();
        if ($count > 0) {
            foreach ($notif as $n) {
                $id = $n['id'];
                array_push(
                    $notifList,
                    '<li style="padding:.5rem">
                        <a href="' . Url::to(["/notif?id=$id"]) . '">
                            <i class="fa fa-users text-aqua" style="margin-right:.5rem"></i>' . $n['title'] . '
                            <span class="label label-danger pull-right"></span>
                        </a>
                    </li>'
                );
            }
        }

        if ($listHtml) {
            echo '
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">' . $countnotif . '</span>
            </a>
            <ul class="dropdown-menu" style="padding:1rem;width:300px">
                <li class="header" style="margin-bottom:1rem">You have ' . $countnotif . ' notifications</li>
                <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                        ' . implode('', $notifList) . '
                    </ul>
                </li>
                <!-- <li class="footer"><a href="#">View all</a></li>-->
            </ul>
        ';
        } else {
            echo $countnotif;
        }
    }
}
