<?php

use yii\helpers\Html;

\app\assets\AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="utf-8" /><?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="SBA" />
    <meta name="keywords" content="SBA" />
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="<?= isset(Yii::$app->params['app']['logo']) ? Yii::$app->params['app']['logo'] : Yii::$app->params['app']['defaultImage'] ?>" />
    <script>
        var baseUrl = "<?= Yii::$app->urlManager->baseUrl ?>";
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <?php $this->head() ?>
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-offset="20">
    <?php $this->beginBody() ?>
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
    </div>

    <?= $this->render('navbar') ?>
    <?= $content ?>

    <?= $this->render('testimoni') ?>
    <?= $this->render('footer') ?>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>