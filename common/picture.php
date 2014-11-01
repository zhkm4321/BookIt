<?php
class Picture{
	var $id;
	var $path;
	var $thumb_path;
	var $md5;
	var $model_id;
	var $link;
	
	function Picture($id=null,$path=null,$thumb_path=null,$md5=null,$model_id=null,$link=null){
		$this->id=$id;
		$this->path=$path;
		$this->thumb_path=$thumb_path;
		$this->md5=$md5;
		$this->model_id=$model_id;
		$this->link=$link;
	}
	
	function compareMd5($other_md5){
		if($this->md5==$other_md5){
			return true;
		}
		return false;
	}
}
?>