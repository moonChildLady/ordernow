<?
	public static function CheckDevice()
	{
		$criteria = new CDbCriteria();
 		$criteria->condition = 'Enable = :Enable';
 		$criteria->params = array(':Enable' => 1);
		$checkdevice = DEVICE::model()->count($criteria);
		//$checkdevice = $checkdevice + 1;
		return $checkdevice;
	}
	public static function CheckLicense()
	{
		$criteria = new CDbCriteria();
 		$criteria->select = 'sum(Number) as totalcal';
		$checklicense = LICENSE::model()->find($criteria);
		return $checklicense->totalcal;
	}
	public static function CheckDevices($uuid)
	{
		$criteria = new CDbCriteria();
 		$criteria->condition = 'uuid = :uuid and Enable = :Enable';
 		$criteria->params = array(':Enable' => 1, ':uuid'=>$uuid);
		$checkdevice = DEVICE::model()->count($criteria);
		//$checkdevice = $checkdevice + 1;
		return $checkdevice;
	}