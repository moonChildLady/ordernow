<html>
<head>
<?php
$cs = Yii::app()->clientScript;
$themePath = Yii::app()->theme->baseUrl;

/**
 * StyleSHeets
 */
$cs
    ->registerCssFile($themePath.'/assets/css/bootstrap.css')
    //->registerCssFile($themePath.'/assets/css/bootstrap-theme.css')
	->registerCssFile($themePath.'/assets/css/custom.css');

/**
 * JavaScripts
 */
$cs
    ->registerCoreScript('jquery',CClientScript::POS_END)
    ->registerCoreScript('jquery.ui',CClientScript::POS_END)
    ->registerScriptFile($themePath.'/assets/js/bootstrap.min.js',CClientScript::POS_END)
	->registerScriptFile($themePath.'/assets/js/jquery.validate.min.js',CClientScript::POS_END)
    ->registerScript('tooltip',
        "$('[data-toggle=\"tooltip\"]').tooltip();
        $('[data-toggle=\"popover\"]').tooltip()"
        ,CClientScript::POS_READY);

?>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
    <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/html5shiv.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/respond.min.js"></script>
<![endif]-->
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
<?php
$this->widget('bootstrap.widgets.BsNavbar', array(
    'collapse' => true,
    'brandLabel' => BsHtml::icon(BsHtml::GLYPHICON_HOME),
    'position' => BsHtml::NAVBAR_POSITION_FIXED_TOP,
    'brandUrl' => Yii::app()->homeUrl,
    'htmlOptions' => array(
        'containerOptions' => array(
            'fluid' => true
        ),
    ),
    'items' => array(
        array(
            'class' => 'bootstrap.widgets.BsNav',
            'type' => 'navbar',
            'activateParents' => true,
            'items' => array(
                array(
                    'label' => '海賊王 TREASURE CRUISE',
                    'url' => array(
                        '/site/index'
                    ),
                    
                )
            )
        ),
        array(
            'class' => 'bootstrap.widgets.BsNav',
            'type' => 'navbar',
            'activateParents' => true,
            'items' => array(
                array(
                    'label' => '最新資訊',
                    'url' => array(
                        '/news',
                        //'view' => '最新資訊'
                    )
                ),
                array(
                    'label' => '人物圖鑑',
                    'url' => array(
                        '/character'
                    )
                ),
                /*array(
                    'label' => 'Login',
                    'url' => array(
                        '/site/login'
                    ),
                    'pull' => BsHtml::NAVBAR_NAV_PULL_RIGHT,
                    'visible' => Yii::app()->user->isGuest
                ),
                array(
                    'label' => 'Logout (' . Yii::app()->user->name . ')',
                    'pull' => BsHtml::NAVBAR_NAV_PULL_RIGHT,
                    'url' => array(
                        '/site/logout'
                    ),
                    'visible' => !Yii::app()->user->isGuest
                )*/
            )/*,
            'htmlOptions' => array(
                'pull' => BsHtml::NAVBAR_NAV_PULL_RIGHT
            )*/
        )
        
    )
));
?>
<div class="container">
<?php echo $content; ?>
</div>
</body>
</html>