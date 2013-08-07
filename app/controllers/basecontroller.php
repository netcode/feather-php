<?php
class baseController extends controller_core{
	public function getLivePath($trailing = '/'){
		return 'http://mubasher.dev'.$trailing;
	}
	public function fixImg($img,$source){
		switch($source){
			case '3':
				$img = 'http://almasryalyoum.com/'.$img;
				return str_replace('http://almasryalyoum.com/http://almasryalyoum.com/','http://almasryalyoum.com/',$img);
				break;
			case '2':
				return str_replace('http://youm7.com/http://www.youm7.com/', 'http://www.youm7.com/', $img);
				break;
			case '7':
				return str_replace('http://shorouknews.com/http://shorouknews.com/', 'http://shorouknews.com/', $img);
				break;
			case '6':
				return str_replace('http://www.alwafd.org/http://www.alwafd.org/', 'http://www.alwafd.org/', $img);
				break;
			case '4':
				return str_replace('http://elbadil.com/http://elbadil.com/', 'http://elbadil.com/', $img);
				break;

				
			default:
				return $img;
		}

	}

	public function isRated($id){
		if($_COOKIE['vncdhrpta88']){
			$voting = unserialize($_COOKIE['vncdhrpta88']);
		}else{
			$voting = array();
		}
		
		$id = (int)$id;
		if(in_array($id, $voting)){
			return true;
		}else{
			return false;
		}
	}

	public function shortStory($string,$chars = 300){
		// strip tags to avoid breaking any html
		$string = strip_tags( htmlspecialchars_decode($string));
		//strip english images
		$string = preg_replace('/[a-zA-z0-9]+\.jpg/',  '' , $string);
		if (strlen($string) > $chars) {
		    // truncate string
		    $stringCut = substr($string, 0, $chars);
		    // make sure it ends in a word so assassinate doesn't become ass...
		    $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
		}
		return $string;
	}

	public function getSlug($string){
		$bad = array(",","_","'","<",">","|","=","+",";","`","~","[","]",":",'"');
		$string = str_replace($bad," ",$string);
		return str_replace(" ", "-", $string);
	}

	function dateICanRead($date){
		$timestamp = @strtotime($date);
		//$timestamp = @strtotime("-13 hours");
		$diff = time() - $timestamp;
		$day_diff = floor($diff / 86400);		
		
		$res = ($diff < 60 )? "منذ ثوان":"0";		
		$res = ($diff < 120 && !$res)? "منذ دقيقة":$res;
		$res = ($diff < 180 && !$res)? "منذ دقيقتان":$res;
		$res = ($diff < 3600 &&  !$res)? ' منذ ' . ( ( ($diff / 60) <= 10 ) ? floor($diff / 60).' دقائق ' :  floor($diff / 60)." دقيقة" ):$res;
		$res = ($diff < 7200 &&  !$res)? "منذ ساعة":$res;
		$res = ($diff < 10800 &&  !$res)? "منذ ساعتان":$res;
		$res = ($diff < 86400 &&  !$res)? ' منذ '. ( ( ($diff / 3600) <= 10 ) ? floor($diff / 3600).' ساعات ' :  floor($diff / 3600)." ساعة " ):$res;
		$res = ($diff < 172800 &&  !$res)?'منذ أمس':$res;
		$res = ($diff < 259200 &&  !$res)?'منذ يومان':$res;
		$res = ($diff < 604800 && !$res)?'منذ'. (floor($diff / 86400 )) . 'ايام': $res;
		$res = (!$res)?$date:$res;
		return $res;		
	} 

}