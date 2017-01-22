<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>在线教程~更多页面</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>  
<meta name="description" content="更多页面"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>  
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0"/>
<meta name="format-detection" content="telephone=no"/>
</head>
<body>
<a href="."><< 返回在线教程 </a><br><br>

<?php
function searchDir($path,&$data){
	if(is_dir($path)){
		$dp=dir($path);
		while($file=$dp->read()){
			if($file!='.'&& $file!='..'){
				searchDir($path.'/'.$file,$data);
			}
		}
		$dp->close();
	}
	if(is_file($path)){
		$data[]=$path;
	}
} 

function getDir($dir){
	$data=array();
	searchDir($dir,$data);
	return $data;
}

function showDir($dir)
{
	if (is_dir($dir)) {
		if ($dh = opendir($dir)) {
			while (($file = readdir($dh)) !== false) {
				#echo "filename: $file : filetype: " . filetype($dir . $file) . "\n";
				if ( strncmp($file, '.', 1)== 0 ) continue;
				printf("<a href=%s target=\"_blank\">%s</a><BR>", $file, $file);
			} 
			closedir($dh);
		}
	}	
}

#print_r(getDir('.'));
showDir('.');

?>

</body>
</html>