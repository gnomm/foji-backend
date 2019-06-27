<?php
use yii\helpers\Html;
use frontend\assets\AppAsset;
use frontend\widgets\LoginFormWidget;
use frontend\widgets\UserDataWidget;
AppAsset::register($this);
/* @var $this yii\web\View */
/* @var $content string */
?>

<?php $this->beginPage() ?>
    <!doctype html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <div class="wrapper">
        <div class="content">
            <header class="header not-main-page">
                <div class="container">
                    <div class="btn-mobile-menu">
                        <svg class="btn-mobile-menu-icon not-main-page" viewBox="0 0 23 16"
                             fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="23" height="2"/>
                            <rect y="7" width="23" height="2"/>
                            <rect y="14" width="23" height="2"/>
                        </svg>
                    </div>
                    <?= Html::a('<svg class="not-main-page" viewBox="0 0 43 28" xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M0.0398167 0H29.5484V3.68968H3.76489V9.10918H10.6178V12.7944H3.76489V21.355H0L0.0398167 0Z"/>
                            <path
                                    d="M21.3463 6.3751C22.377 6.34982 23.4022 6.53352 24.3599 6.91514C25.3177 7.29676 26.1883 7.86839 26.9192 8.59556C27.6501 9.32274 28.2262 10.1904 28.6127 11.1462C28.9992 12.102 29.1881 13.1262 29.1681 14.1571C29.1948 15.1886 29.0115 16.2149 28.6293 17.1734C28.2472 18.132 27.6742 19.0029 26.9452 19.7332C26.2161 20.4635 25.3462 21.0379 24.3883 21.4217C23.4304 21.8054 22.4045 21.9905 21.3729 21.9656C20.3414 21.9899 19.3158 21.8044 18.3581 21.4204C17.4005 21.0364 16.5309 20.4619 15.802 19.7317C15.073 19.0016 14.5 18.131 14.1177 17.1727C13.7353 16.2144 13.5516 15.1885 13.5776 14.1571C13.5566 13.1305 13.7431 12.1102 14.1259 11.1574C14.5087 10.2046 15.0799 9.33897 15.8054 8.61229C16.5308 7.88561 17.3955 7.31289 18.3476 6.92847C19.2997 6.54404 20.3197 6.35582 21.3463 6.3751ZM21.3729 18.5811C21.9576 18.5951 22.5392 18.4902 23.0822 18.2728C23.6253 18.0554 24.1186 17.73 24.5322 17.3164C24.9458 16.9028 25.2712 16.4095 25.4886 15.8664C25.706 15.3234 25.8109 14.7418 25.7969 14.1571C25.7969 12.9837 25.3308 11.8584 24.5011 11.0288C23.6715 10.1991 22.5462 9.73298 21.3729 9.73298C20.1995 9.73298 19.0742 10.1991 18.2446 11.0288C17.4149 11.8584 16.9488 12.9837 16.9488 14.1571C16.9316 14.7427 17.0344 15.3256 17.2506 15.8701C17.4669 16.4146 17.7922 16.9092 18.2064 17.3235C18.6207 17.7377 19.1153 18.063 19.6598 18.2793C20.2043 18.4955 20.7872 18.5983 21.3729 18.5811Z"/>
                            <path
                                    d="M32.6143 6.81751H36.3217V21.5408C36.3217 26.5312 32.1498 28 30.128 28L0 27.9735V24.4076H29.6413C30.6943 24.4076 32.6187 23.2308 32.6187 20.8109L32.6143 6.81751ZM32.6143 0H36.3217V3.74277H32.6143V0Z"/>
                            <path
                                    d="M39.3745 0H43.0863V3.74277H39.3745V0ZM39.3745 6.79981H43.0863V21.1736H39.3745V6.79981Z"/>
                        </svg>', ['/'], ['class' => 'logo']) ?>

                    <nav class="mobile-menu">
                        <header class="mobile-menu-header">
                            <div class="btn-mobile-menu">
                                <svg class="btn-mobile-menu-icon not-main-page" viewBox="0 0 23 16"
                                     fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="23" height="2"/>
                                    <rect y="7" width="23" height="2"/>
                                    <rect y="14" width="23" height="2"/>
                                </svg>
                            </div>
                            <div class="btn-mobile-menu-close">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L21 21" stroke="black" stroke-width="2"/>
                                    <path d="M21 1L1 21" stroke="black" stroke-width="2"/>
                                </svg>
                            </div>
                        </header>
                        <?= Html::a('Фотопроекты', ['/'], ['class' => 'menu-link not-main-page']) ?>
                        <?= Html::a('Прошедшие', ['/past'], ['class' => 'menu-link not-main-page']) ?>
                        <?= Html::a('О нас', ['/about'], ['class' => 'menu-link not-main-page']) ?>
                        <?= Html::a('Обратная связь', ['/feedback'], ['class' => 'menu-link not-main-page']) ?>
                        <?php if (!Yii::$app->user->isGuest): ?>
                            <?= Html::a('Личный кабинет', ['/lk', 'id' => Yii::$app->user->id], ['class' => 'menu-link not-main-page']) ?>
                        <?php endif; ?>
                    </nav>
                    <nav class="menu">
                        <?= Html::a('Фотопроекты', ['/'], ['class' => 'menu-link main-menu-link not-main-page']) ?>
                        <?= Html::a('Прошедшие', ['/past'], ['class' => 'menu-link main-menu-link not-main-page']) ?>
                        <?= Html::a('О нас', ['/about'], ['class' => 'menu-link main-menu-link not-main-page']) ?>
                        <?= Html::a('Обратная связь', ['/feedback'], ['class' => 'menu-link main-menu-link not-main-page']) ?>
                    </nav>
                    <?php if (Yii::$app->user->isGuest): ?>
                        <nav class="menu-auth">
                            <a class="menu-auth-icon" href="#">
                                <svg class="menu-auth-user not-main-page" viewBox="0 0 19 19" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M2.29013 18.6243C2.27873 18.4723 2.27303 18.3203 2.27303 18.1664C2.27303 14.3987 5.65693 11.3359 9.81793 11.3359C13.9789 11.3359 17.3628 14.4006 17.3628 18.1664C17.3628 18.3203 17.3571 18.4723 17.3457 18.6243H18.6301C18.6396 18.4723 18.6434 18.3203 18.6434 18.1664C18.6434 17.0625 18.4059 15.9909 17.9404 14.9839C17.492 14.0149 16.8517 13.1466 16.0366 12.4018C14.7446 11.2219 13.1258 10.4543 11.3702 10.1693C13.4659 9.50427 14.9897 7.53017 14.9897 5.20457C14.9897 2.33937 12.6698 0.00427246 9.81793 0.00427246C6.96603 0.00427246 4.64613 2.33937 4.64613 5.20837C4.64613 7.53397 6.16993 9.50807 8.26563 10.1731C6.50813 10.4581 4.88933 11.2257 3.59923 12.4056C2.78413 13.1504 2.14383 14.0187 1.69543 14.9877C1.22803 15.9947 0.992432 17.0663 0.992432 18.1702C0.992432 18.3241 0.996232 18.4761 1.00573 18.6281L2.29013 18.6243ZM5.96663 5.20837C5.96663 3.07087 7.69373 1.33237 9.81793 1.33237C11.9421 1.33237 13.6692 3.07087 13.6692 5.20837C13.6692 7.34587 11.9421 9.08437 9.81793 9.08437C7.69373 9.08437 5.96663 7.34397 5.96663 5.20837Z"
                                    />
                                </svg>
                            </a>
                            <svg class="menu-auth-user not-main-page" viewBox="0 0 19 19" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M2.29013 18.6243C2.27873 18.4723 2.27303 18.3203 2.27303 18.1664C2.27303 14.3987 5.65693 11.3359 9.81793 11.3359C13.9789 11.3359 17.3628 14.4006 17.3628 18.1664C17.3628 18.3203 17.3571 18.4723 17.3457 18.6243H18.6301C18.6396 18.4723 18.6434 18.3203 18.6434 18.1664C18.6434 17.0625 18.4059 15.9909 17.9404 14.9839C17.492 14.0149 16.8517 13.1466 16.0366 12.4018C14.7446 11.2219 13.1258 10.4543 11.3702 10.1693C13.4659 9.50427 14.9897 7.53017 14.9897 5.20457C14.9897 2.33937 12.6698 0.00427246 9.81793 0.00427246C6.96603 0.00427246 4.64613 2.33937 4.64613 5.20837C4.64613 7.53397 6.16993 9.50807 8.26563 10.1731C6.50813 10.4581 4.88933 11.2257 3.59923 12.4056C2.78413 13.1504 2.14383 14.0187 1.69543 14.9877C1.22803 15.9947 0.992432 17.0663 0.992432 18.1702C0.992432 18.3241 0.996232 18.4761 1.00573 18.6281L2.29013 18.6243ZM5.96663 5.20837C5.96663 3.07087 7.69373 1.33237 9.81793 1.33237C11.9421 1.33237 13.6692 3.07087 13.6692 5.20837C13.6692 7.34587 11.9421 9.08437 9.81793 9.08437C7.69373 9.08437 5.96663 7.34397 5.96663 5.20837Z"
                                />
                            </svg>
                            <p class="menu-auth-link not-main-page sign-in">
                                Вход
                            </p>
                            <svg class="menu-auth-line not-main-page" viewBox="0 0 2 32" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <line x1="0.75" y1="3.27835e-08" x2="0.749999" y2="32" strokeWidth="1.5"/>
                            </svg>
                            <a href="#" class="menu-auth-link not-main-page">
                                Регистрация
                            </a>
                        </nav>
                    <?php endif; ?>
                    <?php if (!Yii::$app->user->isGuest): ?>
                        <?= UserDataWidget::widget() ?>
                        <?= Html::a(
                            'Выход',
                            ['site/logout'],
                            ['data-method' => 'post']
                        ) ?>
                    <?php endif; ?>
                </div>
            </header>
            <?= $content ?>
        </div>
        <footer class="footer">
            <div class="container">
                <nav class="menu menu-main">
                    <?= Html::a('Текущие фотопроекты', ['/'], ['class' => 'menu-link additional_text']) ?>
                    <?= Html::a('Прошедшие фотопроекты', ['/past'], ['class' => 'menu-link additional_text']) ?>
                    <?= Html::a('О нас', ['/about'], ['class' => 'menu-link additional_text']) ?>
                    <?= Html::a('Обратная связь', ['/feedback'], ['class' => 'menu-link additional_text']) ?>
                </nav>
                <nav class="menu menu-conditions">
                    <?= Html::a('Условия обработки и использования персональных данных', ['/'], ['class' => 'menu-link additional_text']) ?>
                    <?= Html::a('Условия испотльзования сервиса', ['/'], ['class' => 'menu-link additional_text']) ?>
                    <?= Html::a('Условия использования сервиса для организаторов', ['/'], ['class' => 'menu-link additional_text']) ?>
                </nav>
                <div class="social">
                    <p class="additional_text">Мы в соцсетях:</p>
                    <div class="social-icon">
                        <a href="#">
                            <svg class="icon" viewBox="0 -2 25 25" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M2.5 0C1.12524 0 0 1.12524 0 2.5V18.5C0 19.8748 1.12524 21 2.5 21H18.5C19.8748 21 21 19.8748 21 18.5V2.5C21 1.12524 19.8748 0 18.5 0H2.5ZM2.5 1H18.5C19.3342 1 20 1.66576 20 2.5V18.5C20 19.3342 19.3342 20 18.5 20H2.5C1.66576 20 1 19.3342 1 18.5V2.5C1 1.66576 1.66576 1 2.5 1ZM9.69824 5.99609C9.1695 5.99488 8.69803 6.02443 8.27637 6.23145C8.27604 6.23177 8.27572 6.2321 8.27539 6.23242C8.06982 6.3337 7.92494 6.46235 7.80957 6.61523C7.75189 6.69168 7.69279 6.7603 7.66113 6.93457C7.6453 7.0217 7.63641 7.16291 7.72754 7.31543C7.81867 7.46795 8.0019 7.55468 8.11914 7.57031C8.20058 7.58115 8.38441 7.6594 8.40137 7.68262C8.40169 7.68327 8.40202 7.68392 8.40234 7.68457C8.40247 7.68474 8.47363 7.87057 8.49414 8.03613C8.51465 8.20169 8.51367 8.33594 8.51367 8.33594C8.51346 8.34929 8.51379 8.36265 8.51465 8.37598C8.51465 8.37598 8.54361 8.80976 8.52441 9.25781C8.51676 9.43639 8.49367 9.59526 8.46973 9.7373C8.29167 9.54072 8.02931 9.18473 7.65039 8.52832C7.23005 7.79972 6.89551 7.14648 6.89551 7.14648C6.87794 7.08957 6.8158 6.91251 6.57324 6.73438C6.30808 6.53894 6.05176 6.50977 6.05176 6.50977C6.0196 6.50332 5.9869 6.50005 5.9541 6.5L3.9834 6.50098C3.9834 6.50098 3.86524 6.49414 3.72363 6.51367C3.58203 6.5332 3.36879 6.5491 3.16309 6.79297C3.16276 6.79329 3.16243 6.79362 3.16211 6.79395C2.97827 7.01361 2.98939 7.25641 3.01172 7.39355C3.03405 7.5307 3.08398 7.63477 3.08398 7.63477C3.08495 7.63672 3.08592 7.63868 3.08691 7.64062C3.08691 7.64062 4.69886 11.0297 6.52051 13.0254C7.84335 14.4744 9.20112 14.499 10.3213 14.499H11.1572C11.3706 14.499 11.5637 14.4907 11.7773 14.3662C11.991 14.2417 12.1348 13.9387 12.1348 13.7285C12.1348 13.5083 12.1677 13.3351 12.208 13.2461C12.2364 13.1835 12.2589 13.161 12.2939 13.1426C12.3014 13.1473 12.2966 13.1445 12.3174 13.1592C12.4006 13.2177 12.5381 13.3511 12.6875 13.5176C12.9864 13.8504 13.3256 14.307 13.7812 14.6201C14.1077 14.8446 14.416 14.9443 14.6504 14.9805C14.7973 15.0031 14.9113 14.9988 14.9922 14.9922L16.8594 15C16.8705 15 16.8815 14.9997 16.8926 14.999C16.8926 14.999 17.2143 15.0028 17.5488 14.8027C17.7161 14.7027 17.9134 14.5131 17.9775 14.2363C18.0417 13.9596 17.9611 13.6729 17.8037 13.4111C17.8037 13.4108 17.8037 13.4105 17.8037 13.4102C17.831 13.4555 17.779 13.3624 17.7256 13.2754C17.6722 13.1884 17.5947 13.0712 17.4834 12.9258C17.2608 12.6349 16.9043 12.228 16.3281 11.6914C16.3278 11.6914 16.3275 11.6914 16.3271 11.6914C16.0345 11.4191 15.8369 11.2263 15.7559 11.1191C15.6749 11.012 15.7014 11.0683 15.707 11.041C15.7182 10.9865 16.0695 10.4798 16.7842 9.52539C17.2186 8.94444 17.5235 8.50829 17.7246 8.14551C17.9257 7.78273 18.0707 7.46855 17.9697 7.08398C17.9694 7.08333 17.9691 7.08268 17.9688 7.08203C17.9239 6.91322 17.8015 6.75762 17.6758 6.67285C17.5501 6.58808 17.4309 6.55493 17.3242 6.53418C17.1109 6.49269 16.9248 6.5 16.752 6.5C16.3896 6.5 14.7817 6.5127 14.6494 6.5127C14.493 6.5127 14.2345 6.58382 14.1201 6.65234C13.8326 6.82539 13.75 7.05273 13.75 7.05273C13.7448 7.06234 13.7399 7.07211 13.7354 7.08203C13.7354 7.08203 13.4037 7.81749 12.9766 8.54395C12.5439 9.28081 12.2242 9.63225 12.0312 9.79492C12.0259 9.76599 12.0269 9.78948 12.0234 9.74902C12.0061 9.54325 12.0254 9.25891 12.0254 8.98145C12.0254 8.23419 12.0887 7.7112 12.0547 7.24902C12.0377 7.01794 11.9949 6.77964 11.8428 6.56055C11.6907 6.34145 11.4376 6.19911 11.1875 6.13867C11.0374 6.10247 10.8664 6.00832 10.2471 6.00195C10.2467 6.00195 10.2464 6.00195 10.2461 6.00195C10.0567 6.00006 9.87449 5.9965 9.69824 5.99609ZM10.2363 7.00195C10.7843 7.00758 10.6478 7.03775 10.9521 7.11133C11.0465 7.13413 11.0237 7.134 11.0215 7.13086C11.0193 7.12771 11.047 7.17926 11.0576 7.32324C11.0788 7.61119 11.0254 8.1837 11.0254 8.98145C11.0254 9.19898 10.9991 9.50941 11.0264 9.83301C11.0536 10.1566 11.1338 10.5719 11.5205 10.8223C11.7038 10.9411 11.9166 10.9486 12.0986 10.9033C12.2806 10.8581 12.4458 10.7638 12.6191 10.625C12.9659 10.3473 13.3527 9.87873 13.8389 9.05078C14.2933 8.27793 14.6238 7.54199 14.6348 7.51758C14.6369 7.51586 14.6391 7.51467 14.6416 7.5127C14.6478 7.51276 14.6414 7.5127 14.6494 7.5127C14.8361 7.5127 16.4143 7.5 16.752 7.5C16.8308 7.5 16.8595 7.50475 16.9219 7.50684C16.9049 7.56347 16.9238 7.52735 16.8496 7.66113C16.6941 7.94173 16.4075 8.35873 15.9834 8.92578C15.2866 9.85635 14.8547 10.221 14.7275 10.8389C14.664 11.1478 14.7831 11.4903 14.958 11.7217C15.1329 11.9531 15.3536 12.1514 15.6465 12.4238C16.1888 12.9288 16.5069 13.2956 16.6895 13.5342C16.7807 13.6535 16.8383 13.7396 16.874 13.7979C16.9098 13.8561 16.9009 13.85 16.9473 13.9268C16.9778 13.9779 16.9665 13.9467 16.9717 13.9619C16.9117 13.9788 16.8391 13.9992 16.835 14L14.9961 13.9922C14.963 13.9922 14.9299 13.9954 14.8975 14.002C14.8975 14.002 14.9021 14.0074 14.8037 13.9922C14.7053 13.977 14.5489 13.9344 14.3477 13.7959C14.1048 13.629 13.7648 13.2206 13.4316 12.8496C13.2651 12.6641 13.099 12.486 12.8926 12.3408C12.6862 12.1957 12.3774 12.0592 12.0439 12.1641C11.6978 12.2727 11.4284 12.5429 11.2969 12.833C11.199 13.049 11.191 13.2746 11.1758 13.499C11.1592 13.5003 11.1783 13.499 11.1572 13.499H10.3213C9.18546 13.499 8.37895 13.5776 7.25879 12.3506C5.75204 10.6999 4.37156 7.95351 4.14648 7.50098L5.88086 7.5C5.91134 7.5117 5.97659 7.5362 5.98047 7.53906C5.98112 7.53972 5.98177 7.54037 5.98242 7.54102C5.91902 7.49468 5.98535 7.55957 5.98535 7.55957C5.99147 7.57454 5.99832 7.58921 6.00586 7.60352C6.00586 7.60352 6.34952 8.27492 6.78418 9.02832C7.21054 9.76691 7.52123 10.2283 7.82129 10.5332C7.97132 10.6856 8.12277 10.8079 8.3252 10.877C8.52762 10.946 8.789 10.9207 8.96484 10.8242C9.32406 10.6276 9.37232 10.3376 9.43066 10.084C9.48909 9.83006 9.51235 9.55957 9.52344 9.30078C9.54496 8.79848 9.51452 8.36376 9.5127 8.33691C9.51281 8.3275 9.51509 8.14622 9.48633 7.91406C9.45688 7.67634 9.42403 7.38568 9.20898 7.09277L9.20801 7.0918C9.20651 7.08975 9.20463 7.08989 9.20312 7.08789C9.4875 7.04711 9.73083 6.9969 10.2363 7.00195ZM14.6475 7.49219L14.6406 7.50781C14.6396 7.50842 14.6399 7.50709 14.6387 7.50781C14.6408 7.50378 14.6475 7.49219 14.6475 7.49219Z"
                                />
                            </svg>
                        </a>
                        <a href="#">
                            <svg class="icon" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M8 1.5C4.41624 1.5 1.5 4.41624 1.5 8V17C1.5 20.5838 4.41624 23.5 8 23.5H17C20.5838 23.5 23.5 20.5838 23.5 17V8C23.5 4.41624 20.5838 1.5 17 1.5H8ZM8 2.5H17C20.0432 2.5 22.5 4.95676 22.5 8V17C22.5 20.0432 20.0432 22.5 17 22.5H8C4.95676 22.5 2.5 20.0432 2.5 17V8C2.5 4.95676 4.95676 2.5 8 2.5ZM18.5 5.5C18.2348 5.5 17.9804 5.60536 17.7929 5.79289C17.6054 5.98043 17.5 6.23478 17.5 6.5C17.5 6.76522 17.6054 7.01957 17.7929 7.20711C17.9804 7.39464 18.2348 7.5 18.5 7.5C18.7652 7.5 19.0196 7.39464 19.2071 7.20711C19.3946 7.01957 19.5 6.76522 19.5 6.5C19.5 6.23478 19.3946 5.98043 19.2071 5.79289C19.0196 5.60536 18.7652 5.5 18.5 5.5ZM12.5 7C9.46836 7 7 9.46836 7 12.5C7 15.5316 9.46836 18 12.5 18C15.5316 18 18 15.5316 18 12.5C18 9.46836 15.5316 7 12.5 7ZM12.5 8C14.9912 8 17 10.0088 17 12.5C17 14.9912 14.9912 17 12.5 17C10.0088 17 8 14.9912 8 12.5C8 10.0088 10.0088 8 12.5 8Z"
                                />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="contact">
                    <a class="phone" href="tel:+79876543210">+7 (987) 654 32 10</a>
                    <p class="copyright additional_text">&#169; Все права защищены</p>
                </div>
            </div>
        </footer>
    </div>
    <?= LoginFormWidget::widget() ?>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>