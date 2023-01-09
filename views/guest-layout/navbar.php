<!--Navbar Start-->
<nav class="navbar navbar-expand-lg navbar-custom fixed-top" id="navbar">
    <div class="container">
        <!-- LOGO -->
        <a class="navbar-brand logo" href="index-1.html">
            <img src="<?= \app\models\Assets::get('COMMON', 'LOGO') ?>" alt="" class="logo-dark" height="50" />
            <img src="<?= \app\models\Assets::get('COMMON', 'LOGO') ?>" alt="" class="logo-light" height="50" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <i data-feather="menu"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ms-auto navbar-center" id="navbar-navlist">
                <li class="nav-item">
                    <a href="<?= \yii\helpers\Url::to(['/guest/index']) ?>" class="nav-link
                    <?php if ($this->context->id == 'guest' && $this->context->action->id == 'index') : ?>
                        active
                    <?php endif; ?>
                    ">Home</a>
                </li>
                <li class="nav-item">
                    <a href="<?= \yii\helpers\Url::to(['/guest/service']) ?>" class="nav-link
                    <?php if ($this->context->id == 'guest' && $this->context->action->id == 'service') : ?>
                        active
                    <?php endif; ?>
                    ">Services</a>
                </li>
                <li class="nav-item">
                    <a href="<?= \yii\helpers\Url::to(['/guest/gallery']) ?>" class="nav-link
                    <?php if ($this->context->id == 'guest' && $this->context->action->id == 'gallery') : ?>
                        active
                    <?php endif; ?>
                    ">Gallery</a>
                </li>
                <li class="nav-item">
                    <a href="<?= \yii\helpers\Url::to(['/guest/about']) ?>" class="nav-link
                    <?php if ($this->context->id == 'guest' && $this->context->action->id == 'about') : ?>
                        active
                    <?php endif; ?>
                    ">About</a>
                </li>
            </ul>
            <a href="<?= \yii\helpers\Url::to(['/guest/booking']) ?>" class="btn btn-sm rounded-pill nav-btn ms-lg-3">BOOK NOW</a>
        </div>
    </div><!-- end container -->
</nav><!-- Navbar End -->