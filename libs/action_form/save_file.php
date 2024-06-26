<?php 
	session_start();
	include_once "../../config/define.php";
	include_once "../class/db.php";
	include_once "../class/minerva.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	$os = new minerva($dbc);
	
	function generatePhotoName($ext)
	{
		$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 10);
		$date = date('Y-m-d').'-'.time();
		$temp_name = 'Villa-form-'.$date.".$ext";//.'-'.$_FILES['img']['name'];//"Villa-form-Inspiringvilla-$randomString.$ext";//$randomString.$ext";
	
		if (file_exists("../../upload/villa_form" . $temp_name)) {
			generatePhotoName($ext);
		} else {
			return $temp_name;
		}
	}
	
	
	if (isset($_FILES['img']) && !empty($_FILES['img']['name'])) {
		$file_ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
		$new_file_name = generatePhotoName($file_ext);
		$path = "../../upload/villa_form/$new_file_name";
		$showcase_path = "upload/villa_form/$new_file_name";
		if (move_uploaded_file($_FILES['img']['tmp_name'], $path)) {
			$data['files'] = $showcase_path;
		} else {
			//$data['about_us'] = 'NULL';
		}
	} else {
		//$data['about_us'] = 'NULL';
	}
	
		$data = array(
			'files' => json_encode($showcase_path)
		);
		echo json_encode(array(
			'success'=>true,
			'file_path'=> $showcase_path,//upload/villa_form/$new_file_name",
			'file_name'=> $new_file_name
		));
		/*if($dbc->Update("yacth_cover",$data,"id=1")){
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	*/


	
?>
