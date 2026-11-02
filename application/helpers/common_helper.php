<?php
/*
		Generate Random String
		@param	INT		Length of the string to be generated
	*/

function fecha_spanish($date)
{
	$date = substr($date, 0, 10);
	$date = explode("-", $date);
	$month = "Enero,Febrero,Marzo,Abril,Mayo,Junio,Julio,Agosto,Setiembre,Octubre,Noviembre,Diciembre";
	$month = explode(",", $month);
	foreach ($month as $key => $value) {
		if (($key + 1) == (int)$date[1]) {
			$m = $value;
		}
	}
	//$y=substr($date[0],2);
	$y = $date[0];
	$d = $date[2];
	$date = $d . " de " . $m . " del " . $y;
	return $date;
}


function random_str($length = "8")
{
	srand((float)microtime() * 1000000);
	$vowels = array("a", "e", "i", "o", "u");
	$cons = array(
		"b", "c", "d", "g", "h", "j", "k", "l", "m", "n", "p", "r", "s", "t", "u", "v", "w", "tr",
		"cr", "br", "fr", "th", "dr", "ch", "ph", "wr", "st", "sp", "sw", "pr", "sl", "cl"
	);
	$num_vowels = count($vowels);
	$num_cons = count($cons);
	$password = "";
	for ($i = 0; $i < $length; $i++) {
		$password .= $cons[rand(0, $num_cons - 1)] . $vowels[rand(0, $num_vowels - 1)];
	}

	return substr($password, 0, $length);
}

function get_us_states_list()
{

	$states_list = array(
		'AL' => "Alabama",
		'AK' => "Alaska",
		'AZ' => "Arizona",
		'AR' => "Arkansas",
		'CA' => "California",
		'CO' => "Colorado",
		'CT' => "Connecticut",
		'DE' => "Delaware",
		'DC' => "District Of Columbia",
		'FL' => "Florida",
		'GA' => "Georgia",
		'HI' => "Hawaii",
		'ID' => "Idaho",
		'IL' => "Illinois",
		'IN' => "Indiana",
		'IA' => "Iowa",
		'KS' => "Kansas",
		'KY' => "Kentucky",
		'LA' => "Louisiana",
		'ME' => "Maine",
		'MD' => "Maryland",
		'MA' => "Massachusetts",
		'MI' => "Michigan",
		'MN' => "Minnesota",
		'MS' => "Mississippi",
		'MO' => "Missouri",
		'MT' => "Montana",
		'NE' => "Nebraska",
		'NV' => "Nevada",
		'NH' => "New Hampshire",
		'NJ' => "New Jersey",
		'NM' => "New Mexico",
		'NY' => "New York",
		'NC' => "North Carolina",
		'ND' => "North Dakota",
		'OH' => "Ohio",
		'OK' => "Oklahoma",
		'OR' => "Oregon",
		'PA' => "Pennsylvania",
		'RI' => "Rhode Island",
		'SC' => "South Carolina",
		'SD' => "South Dakota",
		'TN' => "Tennessee",
		'TX' => "Texas",
		'UT' => "Utah",
		'VT' => "Vermont",
		'VA' => "Virginia",
		'WA' => "Washington",
		'WV' => "West Virginia",
		'WI' => "Wisconsin",
		'WY' => "Wyoming"
	);

	return $states_list;
}

function clean_filename($str = "")
{
	$filters = array("!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "-", "+", "|", "\\", "/", "[", "]", "~", " ", "'");

	$str = str_replace($filters, "_", $str);

	return $str;
}


function UnixTime($datetime = "0000-00-00 00:00:00")
{


	$datetime_exlode = explode(" ", $datetime);

	$date_part = $datetime_exlode[0];

	$date_arr = explode("-", $date_part);


	$time_part = $datetime_exlode[1];
	$time_arr = explode(":", $time_part);

	//echo "<br /> $datetime <br/> $time_arr[0], $time_arr[1], $time_arr[2], $date_arr[1], $date_arr[0], $date_arr[2] <br/>";

	return mktime($time_arr[0], $time_arr[1], $time_arr[2], $date_arr[1], $date_arr[2], $date_arr[0]);
}

function RelativeTime($timestamp)
{
	$difference = time() - $timestamp;
	$periods = array("sec", "min", "hour", "day", "week", "month", "years", "decade");
	$lengths = array("60", "60", "24", "7", "4.35", "12", "10");

	if ($difference > 0) {
		$ending = "ago";
	} else {
		$difference = -$difference;
		$ending = "to go";
	}

	for ($j = 0; $difference >= $lengths[$j]; $j++) {
		$difference /= $lengths[$j];
	}

	$difference = round($difference);

	if ($difference != 1) {
		$periods[$j] .= "s";
	}
	return $difference . $periods[$j] . $ending;
}

function get_advert_content()
{
	$CI = &get_instance();

	$CI->load->model("pages_model");

	$result = $CI->pages_model->get_advert();

	return $result['content'];
}

function get_day($day = 0)
{

	switch ($day) {

		case 1:
			return "Monday";
			break;

		case 2:
			return "Tuesday";
			break;
		case 3:
			return "Wednesday";
			break;
		case 4:
			return "Thrusday";
			break;
		case 5:
			return "Friday";
			break;
		case 6:
			return "Saturday";
			break;
		case 7:
			return "Sunday";
			break;
	}
}



function categorize_array($categories = array(), $parent_category_id = 0)
{
	$tempArr = array();

	foreach ($categories as $key => $catg) {
		if ($catg->parent_id == $parent_category_id) {
			$tempArr[$catg->category_id] = $catg;
		}
	}

	$finalArr = $tempArr;

	foreach ($tempArr as $key => $arr) {

		foreach ($categories as $cat) {

			if ($arr->category_id == $cat->parent_id) {
				$cat->sub_categories = array();

				$cat->sub_categories = categorize_array($categories, $cat->category_id);

				if (!isset($finalArr[$key]->sub_categories)) {
					$finalArr[$key]->sub_categories = array();
				}

				$finalArr[$key]->sub_categories[] = $cat;
			}
		}
	}

	//	debug($finalArr);

	return $finalArr;
}

function generate_selectbox_from_array($categories, $checked_id = -1)
{
	$str = "";

	if (isset($categories->sub_categories)) {
		foreach ($categories->sub_categories as $sub_catg) {

			if ($sub_catg->is_category == 1) {
				$str .= '<optgroup label="' . $sub_catg->category_name . '">';
			} else {
				$sel = "";
				if ($checked_id == $sub_catg->category_id) {
					$sel = 'selected="selected"';
				}

				$str .= '<option ' . $sel . ' value="' . $sub_catg->category_id . '">' . $sub_catg->category_name . '</option>';
			}

			if (isset($sub_catg->sub_categories) && !empty($sub_catg->sub_categories)) {
				foreach ($sub_catg->sub_categories as $subCat) {
					$sel = "";
					if ($checked_id == $subCat->category_id) {
						$sel = 'selected="selected"';
					}
					$str .= '<option ' . $sel . ' value="' . $subCat->category_id . '">' . $subCat->category_name . '</option>';
				}
			}

			if ($sub_catg->is_category == 1) {
				$str .= '</optgroup>';
			}
		}
	}

	return $str;
}

function generate_selectbox_from_array_side($categories, $checked_id = -1)
{
	$str = "";

	if (isset($categories->sub_categories)) {
		foreach ($categories->sub_categories as $sub_catg) {



			if ($sub_catg->is_category == 1) {
				$str .= '<optgroup label="' . $sub_catg->category_name . '">';
			} else {
				$sel = "";
				/*if ( $checked_id == $sub_catg->category_id ) {
						$sel = 'selected="selected"';
					}*/
				if (isset($_GET['category_' . $categories->category_id]) && $_GET['category_' . $categories->category_id] == $sub_catg->category_id) {


					$sel = 'selected="selected"';
				}
				$str .= '<option ' . $sel . ' value="' . $sub_catg->category_id . '">' . $sub_catg->category_name . '</option>';
			}

			if (isset($sub_catg->sub_categories) && !empty($sub_catg->sub_categories)) {
				foreach ($sub_catg->sub_categories as $subCat) {
					$sel = "";
					if ($checked_id == $subCat->category_id) {
						$sel = 'selected="selected"';
					}

					$str .= '<option ' . $sel . ' value="' . $subCat->category_id . '">' . $subCat->category_name . '</option>';
				}
			}

			if ($sub_catg->is_category == 1) {
				$str .= '</optgroup>';
			}
		}
	}

	return $str;
}

/*
	* Generate Pagination
	*/

function generate_pagination($total_rows, $url, $limit, $page, $extraparams = "")
{


	$adjacents = 3;
	$total_pages = $total_rows;
	$targetpage = $url;
	$pre_str = '?';

	if (strpos($targetpage, '?')) {
		$pre_str = '&';
	}

	//$limit = 2; 								//how many items to show per page
	$params = "";

	if ($extraparams != "") {
		$params = $extraparams;
	}

	//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages / $limit);		//lastpage is = total pages / items per page, rounded up.

	$lpm1 = $lastpage - 1;

	$pagination = "";

	if ($lastpage > 1) {
		$pagination .= '<ul class="page-list" style="width: 570px;">';
		//previous button
		if ($page > 1)
			$pagination .= "<li><a href='" . $targetpage . $pre_str . "page=" . $prev . $params . "'>&lt;&lt; previous</a></li>";
		else
			$pagination .= "<li><a class=\"disabled\">&lt;&lt; previous</a></li>";

		//pages

		//not enough pages to bother breaking it up
		if ($lastpage < 7 + ($adjacents * 2)) {
			for ($counter = 1; $counter <= $lastpage; $counter++) {
				if ($counter == $page)
					$pagination .= "<li class='active'><a>$counter</a></li>";
				else
					$pagination .= "<li><a href='" . $targetpage . $pre_str . "page=" . $counter . $params . "'>$counter</a></li>";
			}
		}

		//enough pages to hide some 
		elseif ($lastpage > 5 + ($adjacents * 2)) {
			//close to beginning; only hide later pages
			if ($page < 1 + ($adjacents * 2)) {
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
					if ($counter == $page)
						$pagination .= "<li class='active'><a href='" . $targetpage . $pre_str . "page=" . $prev . $params . "'>$counter</a></li>";
					else
						$pagination .= "<li><a href='" . $targetpage . $pre_str . "page=" . $counter . $params . "'>$counter</a></li>";
				}

				$pagination .= "<li style='background-color: #fff;border: 0px solid #fff;'>...</li>";
				$pagination .= "<li><a href='" . $targetpage . $pre_str . "page=" . $lpm1 . $params . "'>$lpm1</a></li>";
				$pagination .= "<li><a href='" . $targetpage . $pre_str . "page=" . $lastpage . $params . "'>$lastpage</a></li>";
			}

			//in middle; hide some front and some back
			elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
				$pagination .= "<li><a href='" . $targetpage . $pre_str . "page=1" . $params . "'>1</a></li>";
				$pagination .= "<li><a href='" . $targetpage . $pre_str . "page=2" . $params . "'>2</a></li>";
				//$pagination.= "<li style='background-color: #fff;border: 0px solid #fff;'>...</li>";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
					if ($counter == $page)
						$pagination .= "<li class='active'><a class=\"current\">$counter</a></li>";
					else
						$pagination .= "<li><a href='" . $targetpage . $pre_str . "page=" . $counter . $params . "'>$counter</a></li>";
				}

				$pagination .= "<li style='background-color: #fff;border: 0px solid #fff;'>...</li>";
				$pagination .= "<li><a href='" . $targetpage . $pre_str . "page=" . $lpm1 . $params . "'>$lpm1</a></li>";
				$pagination .= "<li><a href='" . $targetpage . $pre_str . "page=" . $lastpage . $params . "'>$lastpage</a></li>";
			}

			//close to end; only hide early pages
			else {
				$pagination .= "<li><a href='" . $targetpage . $pre_str . "page=1" . $params . "'>1</a></li>";
				$pagination .= "<li><a href='" . $targetpage . $pre_str . "page=2" . $params . "'>2</a></li>";
				$pagination .= "<li style='background-color: #fff;border: 0px solid #fff;'>...</li>";

				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
					if ($counter == $page)
						$pagination .= "<li class='active'><a class=\"current\">$counter</a></li>";
					else
						$pagination .= "<li><a href='" . $targetpage . $pre_str . "page=" . $counter . $params . "'>$counter</a></li>";
				}
			}
		}

		//next button

		if ($page < $counter - 1)
			$pagination .= "<li><a href='" . $targetpage . $pre_str . "page=" . $next . $params . "'>next &gt;&gt;</a></li>";
		else
			$pagination .= "<li><a class=\"disabled\">next &gt;&gt;</a></li>";

		$pagination .= "</ul>\n";
	}

	echo $pagination;
}



function distance_haversine($lat1, $lon1, $lat2, $lon2)
{
	$delta_lat = $lat2 - $lat1;
	$delta_lon = $lon2 - $lon1;
	$earth_radius = 3960.00; # in miles
	$alpha    = $delta_lat / 2;
	$beta     = $delta_lon / 2;
	$a        = sin(deg2rad($alpha)) * sin(deg2rad($alpha)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin(deg2rad($beta)) * sin(deg2rad($beta));
	$c        = asin(min(1, sqrt($a)));
	$distance = 2 * $earth_radius * $c;
	$distance = round($distance, 4);

	return $distance;
}

function remove_accents($string)
{
	if (!preg_match('/[\x80-\xff]/', $string))
		return $string;
	if (seems_utf8($string)) {
		$chars = array(
			chr(195) . chr(128) => 'A', chr(195) . chr(129) => 'A',
			chr(195) . chr(130) => 'A', chr(195) . chr(131) => 'A',
			chr(195) . chr(132) => 'A', chr(195) . chr(133) => 'A',
			chr(195) . chr(135) => 'C', chr(195) . chr(136) => 'E',
			chr(195) . chr(137) => 'E', chr(195) . chr(138) => 'E',
			chr(195) . chr(139) => 'E', chr(195) . chr(140) => 'I',
			chr(195) . chr(141) => 'I', chr(195) . chr(142) => 'I',
			chr(195) . chr(143) => 'I', chr(195) . chr(145) => 'N',
			chr(195) . chr(146) => 'O', chr(195) . chr(147) => 'O',
			chr(195) . chr(148) => 'O', chr(195) . chr(149) => 'O',
			chr(195) . chr(150) => 'O', chr(195) . chr(153) => 'U',
			chr(195) . chr(154) => 'U', chr(195) . chr(155) => 'U',
			chr(195) . chr(156) => 'U', chr(195) . chr(157) => 'Y',
			chr(195) . chr(159) => 's', chr(195) . chr(160) => 'a',
			chr(195) . chr(161) => 'a', chr(195) . chr(162) => 'a',
			chr(195) . chr(163) => 'a', chr(195) . chr(164) => 'a',
			chr(195) . chr(165) => 'a', chr(195) . chr(167) => 'c',
			chr(195) . chr(168) => 'e', chr(195) . chr(169) => 'e',
			chr(195) . chr(170) => 'e', chr(195) . chr(171) => 'e',
			chr(195) . chr(172) => 'i', chr(195) . chr(173) => 'i',
			chr(195) . chr(174) => 'i', chr(195) . chr(175) => 'i',
			chr(195) . chr(177) => 'n', chr(195) . chr(178) => 'o',
			chr(195) . chr(179) => 'o', chr(195) . chr(180) => 'o',
			chr(195) . chr(181) => 'o', chr(195) . chr(182) => 'o',
			chr(195) . chr(182) => 'o', chr(195) . chr(185) => 'u',
			chr(195) . chr(186) => 'u', chr(195) . chr(187) => 'u',
			chr(195) . chr(188) => 'u', chr(195) . chr(189) => 'y',
			chr(195) . chr(191) => 'y',
			chr(196) . chr(128) => 'A', chr(196) . chr(129) => 'a',
			chr(196) . chr(130) => 'A', chr(196) . chr(131) => 'a',
			chr(196) . chr(132) => 'A', chr(196) . chr(133) => 'a',
			chr(196) . chr(134) => 'C', chr(196) . chr(135) => 'c',
			chr(196) . chr(136) => 'C', chr(196) . chr(137) => 'c',
			chr(196) . chr(138) => 'C', chr(196) . chr(139) => 'c',
			chr(196) . chr(140) => 'C', chr(196) . chr(141) => 'c',
			chr(196) . chr(142) => 'D', chr(196) . chr(143) => 'd',
			chr(196) . chr(144) => 'D', chr(196) . chr(145) => 'd',
			chr(196) . chr(146) => 'E', chr(196) . chr(147) => 'e',
			chr(196) . chr(148) => 'E', chr(196) . chr(149) => 'e',
			chr(196) . chr(150) => 'E', chr(196) . chr(151) => 'e',
			chr(196) . chr(152) => 'E', chr(196) . chr(153) => 'e',
			chr(196) . chr(154) => 'E', chr(196) . chr(155) => 'e',
			chr(196) . chr(156) => 'G', chr(196) . chr(157) => 'g',
			chr(196) . chr(158) => 'G', chr(196) . chr(159) => 'g',
			chr(196) . chr(160) => 'G', chr(196) . chr(161) => 'g',
			chr(196) . chr(162) => 'G', chr(196) . chr(163) => 'g',
			chr(196) . chr(164) => 'H', chr(196) . chr(165) => 'h',
			chr(196) . chr(166) => 'H', chr(196) . chr(167) => 'h',
			chr(196) . chr(168) => 'I', chr(196) . chr(169) => 'i',
			chr(196) . chr(170) => 'I', chr(196) . chr(171) => 'i',
			chr(196) . chr(172) => 'I', chr(196) . chr(173) => 'i',
			chr(196) . chr(174) => 'I', chr(196) . chr(175) => 'i',
			chr(196) . chr(176) => 'I', chr(196) . chr(177) => 'i',
			chr(196) . chr(178) => 'IJ', chr(196) . chr(179) => 'ij',
			chr(196) . chr(180) => 'J', chr(196) . chr(181) => 'j',
			chr(196) . chr(182) => 'K', chr(196) . chr(183) => 'k',
			chr(196) . chr(184) => 'k', chr(196) . chr(185) => 'L',
			chr(196) . chr(186) => 'l', chr(196) . chr(187) => 'L',
			chr(196) . chr(188) => 'l', chr(196) . chr(189) => 'L',
			chr(196) . chr(190) => 'l', chr(196) . chr(191) => 'L',
			chr(197) . chr(128) => 'l', chr(197) . chr(129) => 'L',
			chr(197) . chr(130) => 'l', chr(197) . chr(131) => 'N',
			chr(197) . chr(132) => 'n', chr(197) . chr(133) => 'N',
			chr(197) . chr(134) => 'n', chr(197) . chr(135) => 'N',
			chr(197) . chr(136) => 'n', chr(197) . chr(137) => 'N',
			chr(197) . chr(138) => 'n', chr(197) . chr(139) => 'N',
			chr(197) . chr(140) => 'O', chr(197) . chr(141) => 'o',
			chr(197) . chr(142) => 'O', chr(197) . chr(143) => 'o',
			chr(197) . chr(144) => 'O', chr(197) . chr(145) => 'o',
			chr(197) . chr(146) => 'OE', chr(197) . chr(147) => 'oe',
			chr(197) . chr(148) => 'R', chr(197) . chr(149) => 'r',
			chr(197) . chr(150) => 'R', chr(197) . chr(151) => 'r',
			chr(197) . chr(152) => 'R', chr(197) . chr(153) => 'r',
			chr(197) . chr(154) => 'S', chr(197) . chr(155) => 's',
			chr(197) . chr(156) => 'S', chr(197) . chr(157) => 's',
			chr(197) . chr(158) => 'S', chr(197) . chr(159) => 's',
			chr(197) . chr(160) => 'S', chr(197) . chr(161) => 's',
			chr(197) . chr(162) => 'T', chr(197) . chr(163) => 't',
			chr(197) . chr(164) => 'T', chr(197) . chr(165) => 't',
			chr(197) . chr(166) => 'T', chr(197) . chr(167) => 't',
			chr(197) . chr(168) => 'U', chr(197) . chr(169) => 'u',
			chr(197) . chr(170) => 'U', chr(197) . chr(171) => 'u',
			chr(197) . chr(172) => 'U', chr(197) . chr(173) => 'u',
			chr(197) . chr(174) => 'U', chr(197) . chr(175) => 'u',
			chr(197) . chr(176) => 'U', chr(197) . chr(177) => 'u',
			chr(197) . chr(178) => 'U', chr(197) . chr(179) => 'u',
			chr(197) . chr(180) => 'W', chr(197) . chr(181) => 'w',
			chr(197) . chr(182) => 'Y', chr(197) . chr(183) => 'y',
			chr(197) . chr(184) => 'Y', chr(197) . chr(185) => 'Z',
			chr(197) . chr(186) => 'z', chr(197) . chr(187) => 'Z',
			chr(197) . chr(188) => 'z', chr(197) . chr(189) => 'Z',
			chr(197) . chr(190) => 'z', chr(197) . chr(191) => 's',
			chr(226) . chr(130) . chr(172) => 'E',
			chr(194) . chr(163) => ''
		);
		$string = strtr($string, $chars);
	} else {
		// Assume ISO-8859-1 if not UTF-8
		$chars['in'] = chr(128) . chr(131) . chr(138) . chr(142) . chr(154) . chr(158)
			. chr(159) . chr(162) . chr(165) . chr(181) . chr(192) . chr(193) . chr(194)
			. chr(195) . chr(196) . chr(197) . chr(199) . chr(200) . chr(201) . chr(202)
			. chr(203) . chr(204) . chr(205) . chr(206) . chr(207) . chr(209) . chr(210)
			. chr(211) . chr(212) . chr(213) . chr(214) . chr(216) . chr(217) . chr(218)
			. chr(219) . chr(220) . chr(221) . chr(224) . chr(225) . chr(226) . chr(227)
			. chr(228) . chr(229) . chr(231) . chr(232) . chr(233) . chr(234) . chr(235)
			. chr(236) . chr(237) . chr(238) . chr(239) . chr(241) . chr(242) . chr(243)
			. chr(244) . chr(245) . chr(246) . chr(248) . chr(249) . chr(250) . chr(251)
			. chr(252) . chr(253) . chr(255);
		$chars['out'] = "EfSZszYcYuAAAAAACEEEEIIIINOOOOOOUUUUYaaaaaaceeeeiiiinoooooouuuuyy";
		$string = strtr($string, $chars['in'], $chars['out']);
		$double_chars['in'] = array(chr(140), chr(156), chr(198), chr(208), chr(222), chr(223), chr(230), chr(240), chr(254));
		$double_chars['out'] = array('OE', 'oe', 'AE', 'DH', 'TH', 'ss', 'ae', 'dh', 'th');
		$string = str_replace($double_chars['in'], $double_chars['out'], $string);
	}
	return $string;
}


function tep_not_null($value)
{
	if (is_array($value)) {
		if (sizeof($value) > 0) {
			return true;
		} else {
			return false;
		}
	} else {
		if ((is_string($value) || is_int($value)) && ($value != '') && ($value != 'NULL') && (strlen(trim($value)) > 0)) {
			return true;
		} else {
			return false;
		}
	}
}

function ToMoney($amount, $separator = true, $simple = false)
{
	return (true === $separator ?
			(false === $simple ?
				number_format((float)$amount, 2, '.', ',') :
				str_replace('.00', '', ToMoney($amount))) : (false === $simple ?
				number_format((float)$amount, 2, '.', '') :
				str_replace('.00', '', ToMoney($amount, false))));
}

function safename($title)
{
	// reemplazamos todos los caracteres no deseados de una cadena por "-" ;
	$title = remove_accents($title);
	$title = str_replace("&", "and", $title);
	$arrStupid = array(
		'feat.', 'feat', '.com', '(tm)', ' ', '*', "'s",  '"', ",", ":", ";", "@", "#", "(", ")", "?", "栢", "!", "_",
		"$", "+", "=", "|", "'", '/', "~", "`s", "`", "\\", "^", "[", "]", "{", "}", "<", ">", "%", "™"
	);

	$title = htmlentities($title);
	$title = preg_replace('/&([a-zA-Z])(.*?);/', '$1', $title); // get rid of bogus characters
	$title = strtolower("$title");
	$title = str_replace(".", "", $title);
	$title = str_replace($arrStupid, "-", $title);
	$flag = 1;
	while ($flag) {
		$newtitle = str_replace("--", "-", $title);
		if ($title != $newtitle) {
			$flag = 1;
		} else $flag = 0;
		$title = $newtitle;
	}
	$len = strlen($title);
	if ($title[$len - 1] == "-") {
		$title = substr($title, 0, $len - 1);
	}
	return $title;
}

function get_values($p_id, $sp_id, $att_id, $counter)
{
	//echo $counter;
	$CI = &get_Instance();
	$CI->load->model("admin/admin_model");
	$result = $CI->admin_model->get_values($p_id, $sp_id, $att_id);
	$str = '';
	$str .= '<select name="value_array[]"   id="value_array_' . $counter . '"   class="input-xlarge text">';
	if ($result) {
		foreach ($result as $r) {
			$str .= "<option value=" . $r['val_id'] . ">" . $r['value_name'] . "</option>";
		}
	} else {

		$str .= '<option value="0">No Value Assigned</option>';
	}
	$str .= '</select>';
	echo $str;
}


function get_attr_pricing($qty = 0, $p_id = 0, $sp_id = 0, $comb = "")
{

	$CI = &get_Instance();
	$CI->load->model("admin/common_model");
	$result = $CI->common_model->get_attr_pricing($qty, $p_id, $sp_id, $comb);
	$str = "";
	foreach ($result as $row) {
		$str .= '<td><a href="' . base_url() . 'cart/basket/' . $row["pricing_id"] . '" class="price">' . CURRENCY . $row["price"] . '</a></td>';
	}
	return  $str;
}


function get_credit_card()
{

	$credit_card_list = array(
		"vis"  => "Visa",
		"mcd"  => "Mastercard",
		"dis" => "Discover",
		"amx" => "AMEX",

	);

	return $credit_card_list;
}


function get_month_list()
{

	$months = array(
		"1"  => "01-Jan",
		"2"  => "02-Feb",
		"3" => "03-Mar",
		"4" => "04-Apr",
		"5"  => "05-May",
		"6"  => "06-Jun",
		"7" => "07-Jul",
		"8" => "08-Aug",
		"9"  => "09-Sep",
		"10"  => "10-Oct",
		"11" => "11-Nov",
		"12" => "12-Dec"
	);

	return $months;
}
function get_date_list()
{

	$date = array();
	for ($i = 1; $i <= 31; $i++) {
		$date[$i] = $i;
	}
	return $date;
}
function get_year_list()
{

	$year = array();
	for ($i = 2013; $i <= 2030; $i++) {
		$year[$i] = $i;
	}
	return $year;
}
