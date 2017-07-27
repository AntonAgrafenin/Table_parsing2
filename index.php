<?php
header('Content-type: text/html; charset=utf-8');
require 'phpQuery.php';
require('config.php');

function print_arr($arr){
	echo '<pre>' . print_r($arr, true) . '</pre>';
}


?>

<h2>Теги для вставки.</h2>


<?php
$url = 'table2t.html';
$file = file_get_contents($url);

$doc = phpQuery::newDocument($file);


$links = $doc->find('tr');

$info1 = array();

    $i=0;
    foreach ($links as $l) {
 
       $pqLink = pq($l); //pq делает объект phpQuery

	   $s = $pqLink->html();
	
  
	  $info1[$i][0] = $s;
	  $info1[$i][1] = strlen($s);

      $i++;
    }
	
	//Выделили все td
	echo "=----- выделили все td ---------- \n";
	print_arr($info1);
	echo "=---------------\n ";
	
	$mastd = array();
		//Разбивка строки на подстроки
	//$info1
	
		for ($x=0; $x<count($info1); $x++){
		//echo $x;
		$temp = $info1[$x][0];
		
		$mastd[$x] = explode('<', $temp, -1);
		
		}
	

	

/* 	
	
	$tempmas =array();
	
	//for ($x=1; $x<10; $x++){ // для отладки
	for ($x=1; $x<count($mas2td); $x++){	

		if(count($mas2td[$x])>13){
			$tmpteg1 = $mas2td[$x][3];
			$domain1 = substr(strstr($tmpteg1, '>'), 1);
			$temptgp1 = strstr($tmpteg1, '>', true);
			$temptgp1 = $temptgp1. ">";
			$newtgp1 = $temptgp1 . '<span itemprop="EduCode">'. $domain1 .'</span>';
			
			$tempmas[$x][0] = $newtgp1;
			$mas2td[$x][3] = $newtgp1;
			
			
			
			$tmpteg2 = $mas2td[$x][6];
			$tmpteg2b = $mas2td[$x][7];
			$domain2 = substr(strstr($tmpteg2, '>'), 1);
			$temptgp2 = strstr($tmpteg2, '>', true);
			$temptgp2 = $temptgp2. ">";
			$newtgp2 = $temptgp2 . '<span itemprop="EduLevel">'. $domain2 .'</span>';
			$newtgp2b = $tmpteg2b;
			$tempmas[$x][1] = $newtgp2;
			$tempmas[$x][2] = $newtgp2b;
			
			$mas2td[$x][6] = $newtgp2;
			//$mas2td[$x][7] = $newtgp2b;
			
						
			$ncount = 10;

			$tegexist1 = strcmp(substr($mas2td[$x][$ncount], 0, 3), 'em');
			
			if($tegexist1==1) {
				$tmpteg3 = $mas2td[$x][$ncount];
				$tmpteg3b = $mas2td[$x][$ncount+1];
				$domain3 = substr(strstr($tmpteg3, '>'), 1);
				$temptgp3 = strstr($tmpteg3, '>', true);
				$temptgp3 = $temptgp3. ">";
				$num3 = $ncount;
				
				$ncount = $ncount+4;
			}
			else {
				
				$temptgp3 = "";
				$domain3 = "";
				$tmpteg3b ="";
				$num3 = $ncount;
				$ncount = $ncount+1;
			}
			

			
			$tegexist2 = strcmp(substr($mas2td[$x][$ncount], 0, 3), 'em');
			
			if($tegexist2==1) {
				$tmpteg4 = $mas2td[$x][$ncount];
				$tmpteg4b = $mas2td[$x][$ncount+1];
				$domain4 = substr(strstr($tmpteg4, '>'), 1);
				$temptgp4 = strstr($tmpteg4, '>', true);
				$temptgp4 = $temptgp4. ">";
				$num4 = $ncount;
				
				$ncount = $ncount+4;
			}
			else {
				
				$num4 = $ncount;
				$temptgp4 = "";
				$domain4 = "";
				$tmpteg4 ="";
				$tmpteg4b ="";
				$ncount = $ncount+2;
				
			}
			
			
			
			
			
			$tegexist3 = strcmp(substr($mas2td[$x][$ncount], 0, 3), 'em');
			
			if($tegexist3==1) {
				$tmpteg5 = $mas2td[$x][$ncount];
				$tmpteg5b = $mas2td[$x][$ncount+1];
				$domain5 = substr(strstr($tmpteg5, '>'), 1);
				$temptgp5 = strstr($tmpteg5, '>', true);
				$temptgp5 = $temptgp5. ">";
				$num5 = $ncount;
				
				$ncount = $ncount+3;
			}
			else {
				$num5 = $ncount;
				$temptgp5 = "";
				$domain5 = "";
				$tmpteg5 ="";
				$tmpteg5b ="";
				$ncount = $ncount+1;
			}
			
			
			$tmpteg6 = $mas2td[$x][$ncount];
			//$tmpteg6b = $mas2td[$x][$ncount+1];
			$domain6 = substr(strstr($tmpteg6, '>'), 1);
			$temptgp6 = strstr($tmpteg6, '>', true);
			$temptgp6 = $temptgp6. ">";
			$num6 = $ncount;
			$ncount = $ncount+3;
			
			//$ncount = 21 | 19;
			$tmpteg7 = $mas2td[$x][$ncount];
			$tmpteg7b = $mas2td[$x][$ncount+1];
			$domain7 = substr(strstr($tmpteg7, '>'), 1);
			$temptgp7 = strstr($tmpteg7, '>', true);
			$temptgp7 = $temptgp7. ">";
			$num7 = $ncount;
			$ncount = $ncount+2;
			
	
						

			if(! empty($temptgp3)){
				$newtgp3 = $temptgp3 . '<span itemprop = "EduForm"><span itemprop="LearningTerm">'. $domain3 .'</span></span>';
				$newtgp3b = $tmpteg3b;
				
				
				$tempmas[$x][3] = $newtgp3;
				$tempmas[$x][4] = $newtgp3b;
				
				$mas2td[$x][$num3] = $newtgp3;
				$mas2td[$x][$num3+1] = $newtgp3b;
	
			}else{
				$tempmas[$x][3] = "";
				$tempmas[$x][4] = "";

				$mas2td[$x][$num3] = "";
				$mas2td[$x][$num3+1] = "";
			}
			

			if(! empty($temptgp4)){
				$newtgp4 = $temptgp4 . '<span itemprop = "EduForm"><span itemprop="LearningTerm">'. $domain4 .'</span></span>';
				$newtgp4b = $tmpteg4b;
							
				$tempmas[$x][5] = $newtgp4;
				$tempmas[$x][6] = $newtgp4b;
				
				$mas2td[$x][$num4] = $newtgp4;
				$mas2td[$x][$num4+1] = $newtgp4b;

			}else{
				$tempmas[$x][5] = "";
				$tempmas[$x][6] = "";	
				
				$mas2td[$x][$num4] = "";
				$mas2td[$x][$num4+1] = "";
			}
			
			if(! empty($temptgp5)){
				$newtgp5 = $temptgp5 . '<span itemprop = "EduForm"><span itemprop="LearningTerm">'. $domain5 .'</span></span>';
				$newtgp5b = $tmpteg5b;
							
				$tempmas[$x][7] = $newtgp5;
				$tempmas[$x][8] = $newtgp5b;
				
				$mas2td[$x][$num5] = $newtgp5;
				$mas2td[$x][$num5+1] = $newtgp5b;
			}else{
				$tempmas[$x][7] = "";
				$tempmas[$x][8] = "";	
				
				$mas2td[$x][$num5] = "";
				$mas2td[$x][$num5+1] = "";
			}
			
				
			$newtgp6 = $temptgp6 . '<span itemprop="language">'. $domain6 .'</span>';
			//$newtgp6b = '<'. $tmpteg6b;
			
			$tempmas[$x][9] = $newtgp6;
			//$tempmas[10] = $newtgp6b;
			$mas2td[$x][$num6] = $newtgp6;
			
			
			
			
			$newtgp7 = $temptgp7 . '<span itemprop="DateEnd">'. $domain7 .'</span>';
			//$newtgp7b = '<'. $tmpteg7b;
			$newtgp7b = $tmpteg7b;

			
			$tempmas[$x][10] = $newtgp7;
			$tempmas[$x][11] = $newtgp7b;
			
			$mas2td[$x][$num7] = $newtgp7;
			$mas2td[$x][$num7+1] = $newtgp7b;			
			
		
		}
		
		
	}
	
	*/
	

		for ($x=0; $x<count($mastd); $x++){

		for ($y=1; $y<count($mastd[$x]); $y++){

		$mastd[$x][$y] = "<" . $mastd[$x][$y];
		
		
		}
		$mastd[$x][] = "</td>";
		
		}
	
	print_arr($mastd);
	
	echo "== test-srv -------------- \n<br>";
	
	for ($x=1; $x<count($mastd); $x++){

			if(count($mastd[$x])>6){
				
			$tmpteg1 = $mastd[$x][1];
			$domain1 = substr(strstr($tmpteg1, '>'), 1);
			$temptgp1 = strstr($tmpteg1, '>', true);
			$temptgp1 = $temptgp1. ">";
			$newtgp1 = $temptgp1 . $past_tegs[0][0] . $domain1 . $past_tegs[0][1];
			$mastd[$x][1] = $newtgp1;

			/*
			$tegexist1 = strcmp(substr($mas2td[$x][$ncount], 0, 3), 'em');
			
			if($tegexist1==1) {
				$tmpteg3 = $mas2td[$x][$ncount];
				$tmpteg3b = $mas2td[$x][$ncount+1];
				$domain3 = substr(strstr($tmpteg3, '>'), 1);
				$temptgp3 = strstr($tmpteg3, '>', true);
				$temptgp3 = $temptgp3. ">";
				$num3 = $ncount;
				
				$ncount = $ncount+4;
			}
			*/
			$tmpteg2 = $mastd[$x][5];
			$domain2 = substr(strstr($tmpteg2, '>'), 1);
			$temptgp2 = strstr($tmpteg2, '>', true);
			$temptgp2 = $temptgp2. ">";
			$newtgp2 = $temptgp2 . $past_tegs[1][0] . $domain2 . $past_tegs[1][1];
			$mastd[$x][5] = $newtgp2;

			$tmpteg3 = $mastd[$x][7];
			$domain3 = substr(strstr($tmpteg3, '>'), 1);
			$temptgp3 = strstr($tmpteg3, '>', true);
			$temptgp3 = $temptgp3. ">";
			$newtgp3 = $temptgp3 . $past_tegs[1][0] . $domain3 . $past_tegs[1][1];
			$mastd[$x][7] = $newtgp3;
			
			$tmpteg4 = $mastd[$x][9];
			$domain4 = substr(strstr($tmpteg4, '>'), 1);
			$temptgp4 = strstr($tmpteg4, '>', true);
			$temptgp4 = $temptgp4. ">";
			$newtgp4 = $temptgp4 . $past_tegs[1][0] . $domain4 . $past_tegs[1][1];
			$mastd[$x][9] = $newtgp4;
			
			$tmpteg5 = $mastd[$x][11];
			$domain5 = substr(strstr($tmpteg5, '>'), 1);
			$temptgp5 = strstr($tmpteg5, '>', true);
			$temptgp5 = $temptgp5. ">";
			$newtgp5 = $temptgp5 . $past_tegs[1][0] . $domain5 . $past_tegs[1][1];
			$mastd[$x][11] = $newtgp5;

			
			}	
			
	}
	
	print_arr($mastd);
	
	


	//object2file($mastd, 'table2t-new.html');
	
	
	
	function object2file($array, $filename)
{
    
    $f = fopen($filename, 'w');
	
	$str_head = "<table align=\"center\" border=\"1\"
		cellpadding=\"0\" cellspacing=\"0\" style=\"width: 80%;\" width=\"782\">\n
	<tbody>";
		
		fwrite($f, $str_head);
		
	$str_tab_head ="
		<tr>
			<td style=\"width:104px;\" rowspan=2>
				<p style=\"text-align: center;\">
					Наименование образовательной программы, специальности, направления подготовки</p>
			</td>
			<td style=\"width:44px;\" rowspan=2>
				<p style=\"text-align: center;\">
					Код</p>
			</td>
			<td style=\"width:416px;\" colspan=4>
				<p style=\"text-align: center;\">
					Количество вакантных мест для приема (перевода)</p>
			</td>
		</tr>
		<tr>
			<td style=\"width:104px;\">
				<p style=\"text-align: center;\">
					За счет бюджетных ассигнований федеральгого бюджета</p>
			</td>
			<td style=\"width:104px;\">
				<p style=\"text-align: center;\">
					За счет бюджетных ассигнований бюджетов субъекта Российской Федерации</p>
			</td>
			<td style=\"width:104px;\">
				<p style=\"text-align: center;\">
					За счет бюджетных ассигнований местных бюджетов</p>
			</td>
			<td style=\"width:104px;\">
				<p style=\"text-align: center;\">
					За счет средств физических и(или) юридических лиц</p>
			</td>
		</tr>
	";	
    fwrite($f, $str_tab_head);
		
	//for ($x=0; $x<50; $x++){//для отладки	
	for ($x=0; $x<count($array); $x++){

		fwrite($f, " <tr>\n");
		for ($y=1; $y<count($array[$x]); $y++){

		$str = $array[$x][$y] ."\n";
		
		fwrite($f, $str);
		}
		fwrite($f, " </tr>\n");
		fwrite($f, " \n\n");
		//fwrite($f, "\n");
		
	}
	
	$str_end ="</tbody>\n</table>";
	fwrite($f, $str_end);
	
	
    fclose($f);
}

	
	
	
	
	

