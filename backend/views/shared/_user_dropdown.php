<?php if (!Yii::$app->user->isGuest): ?>

    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="/img/user/user2-160x160.jpg" class="user-image" alt="<?= Yii::t('app', 'User Image') ?>"/>
        <span class="hidden-xs"><?= Yii::$app->user->identity->username ?></span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <img src="/img/user/user2-160x160.jpg" class="img-circle" alt="User Image" />
            <p>
                Administrator
                <small>Member since <?= Yii::$app->formatter->asDate(new \DateTime()) ?></small>
            </p>
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat"><?= Yii::t('app', 'Profile') ?></a>
            </div>
            <div class="pull-right">
                <?= yii\helpers\Html::a(Yii::t('app', 'Sign out'), ['site/logout'], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']); ?>
            </div>
        </li>
    </ul>

<?php endif; ?>
