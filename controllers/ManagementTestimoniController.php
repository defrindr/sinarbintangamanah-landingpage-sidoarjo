<?php

namespace app\controllers;

/**
 * This is the class for controller "ManagementTestimoniController".
 * Modified by Defri Indra
 */
class ManagementTestimoniController extends \app\controllers\base\ManagementTestimoniController
{

    public function actionToggle($id)
    {
        $model = $this->findModel($id);
        $model->show = $model->show == 1 ? 0 : 1;
        $model->save();
        return $this->redirect(['index']);
    }
}
