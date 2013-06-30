<?php
namespace Services\Utilities;
class Tools {
	
	public static function truncate($string,$length){
		if(strlen($string)>$length){
			return substr($string,0,$length).'...';
		}
		else{
			return $string;
		}
	}


	public static function slugify($text)
	{
		// replace non letter or digits by -
		$text = preg_replace('#[^\\pL\d]+#u', '-', $text);

		// trim
		$text = trim($text, '-');

		// transliterate
		if (function_exists('iconv')) {
			$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
		}

		// lowercase
		$text = strtolower($text);

		// remove unwanted characters
		$text = preg_replace('#[^-\w]+#', '', $text);

		if (empty($text)) {
			return 'n-a';
		}

		return $text;
	}

	protected function truncatePreserveWords($h, $n, $w = 5, $tag = 'b')
   	{
        $n = explode(" ", trim(strip_tags($n))); //needles words

	    for($a=0;$a<count($n);$a++){
		    if(strpos($n[$a],$h)!=FALSE) continue;
		    else if($a == count($n)-1){
			    if(strlen($h)<500) return $h;
			    else return substr($h,0,500).'...';
		    }
	    }


        $b = explode(" ", trim(strip_tags($h))); //haystack words
        $c = array(); //array of words to keep/remove
        for ($j = 0; $j < count($b); $j++) $c[$j] = false;
        for ($i = 0; $i < count($b); $i++)
            for ($k = 0; $k < count($n); $k++)
                if (stristr($b[$i], $n[$k])) {
                    $b[$i] = preg_replace("/" . $n[$k] . "/i", "<$tag>\\0</$tag>", $b[$i]);
                    for ($j = max($i - $w, 0); $j < min($i + $w, count($b)); $j++) $c[$j] = true;
                }
        $o = ""; // reassembly words to keep
        for ($j = 0; $j < count($b); $j++) if ($c[$j]) $o .= " " . $b[$j]; else $o .= ".";
        return preg_replace("/\.{3,}/i", "...", $o);
    }

}