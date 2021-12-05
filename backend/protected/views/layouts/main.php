<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				//array('label'=>'Admin', 'url'=>array('/Admin/admin'),'active'=>Yii::app()->controller->id == 'admin'),
				array('label'=>'License', 'url'=>array('/license/admin'),'active'=>Yii::app()->controller->id == 'license'),
				array('label'=>'Device', 'url'=>array('/device/admin'),'active'=>Yii::app()->controller->id == 'device'),
				array('label'=>'Device Type', 'url'=>array('/devicetype/admin'),'active'=>Yii::app()->controller->id == 'devicetype'),
				array('label'=>'Table', 'url'=>array('/table/admin'),'active'=>Yii::app()->controller->id == 'table'),
				//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Category', 'url'=>array('/cat/admin'),'active'=>Yii::app()->controller->id == 'cat'),
				array('label'=>'Type', 'url'=>array('/type/admin'),'active'=>Yii::app()->controller->id == 'type'),
				array('label'=>'Food', 'url'=>array('/food/admin'),'active'=>Yii::app()->controller->id == 'food'),
				array('label'=>'Price', 'url'=>array('/price/admin'),'active'=>Yii::app()->controller->id == 'price'),
				array('label'=>'Profile', 'url'=>array('/typecat/admin'),'active'=>Yii::app()->controller->id == 'typecat'),
				array('label'=>'Invoice', 'url'=>array('/invoice/admin'),'active'=>Yii::app()->controller->id == 'invoice'),
				array('label'=>'Source', 'url'=>array('/source/admin'),'active'=>Yii::app()->controller->id == 'source'),
				//array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
