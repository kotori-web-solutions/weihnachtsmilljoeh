<?php 

/**
 * weihnachtsmilljoeh.php
 *
 * Competing in MinD Milljoeh's Christmas 2021 Brain Teaser
 *
 * PHP version 7.4.0
 *
 * @author     Maren Arnhold <info@kotori.de>
 * @version    1.0
 * @link       https://github.com/kotori-web-solutions/weihnachtsmilljoeh
 *
 * Requires php_gmp extension 
 * 
 */
 
namespace Kotori; 
 
require("num2text.php");
 
class Weihnachtsmilljoeh 
{
	
	protected int $upperthreshold = 1;
	protected int $highscore = 0;


	public function __construct($n){
		
		if ($n > 0) { $this->upperthreshold = $n; };
		
	}


	function factorisePrime($n,$max,&$arr){
			
		if ((int)gmp_nextprime($n) <= $max) { $arr[] = $this->factorisePrime((int)gmp_nextprime($n),$max,$arr)." "; };	
		
		if ($n == 1) { $arr[] = 1; };
		
		return $n;
	
	}
	

	function outputFormatted($os, $osn, $or, $opa, $opb){
		
		$points = ($opa+$opb);
		
		if ($this->highscore < ($opa+$opb)) { 
		
			$this->highscore = ($opa+$opb); 
			$points = "***".($opa+$opb).", neuer Highscore.***";
			
		};
		
		echo $osn." = ".$or." ____ ".$os." (".mb_strlen($os)." Buchstaben). ____ Punktwert: ".$points."\r\n";
		
		
	}
	

	function calculateAddition($n){

		for ($j=1;$j<=$n;$j++){

			$op_string = num2text((int)$n)."plus".num2text((int)$j);			
			$op_string_numeric = $n." + ".$j;			
			$op_result = $n + $j;		
			
			if (mb_strlen($op_string) == $op_result) { $this->outputFormatted($op_string,$op_string_numeric,$op_result,(int)$n,(int)$j); };

		}
	
	}
	
	
	function calculateSubtraction($n){
		
		for ($j=1;$j<$n;$j++){

			$op_string = num2text($n)."minus".num2text($j);
			$op_string_numeric = $n." - ".$j;
			$op_result = $n - $j;
			
			if (mb_strlen($op_string) == $op_result) { $this->outputFormatted($op_string,$op_string_numeric,$op_result,(int)$n,(int)$j); };
						
		}		
		
	}
	
	
	function calculateDivision($n){
		
		$primearray = [$n];
		$this->factorisePrime(1,$n,$primearray);
		$primearray = array_unique(array_map('intval',$primearray));
			
		foreach ($primearray as $pa){
			
			$op_string = num2text($n)."geteiltdurch".num2text((int)$pa);		
			$op_string_numeric = $n." / ".(int)$pa;		
			$op_result = $n / (int)$pa;
			
			if ($op_result == floor($op_result)) { 	
			
				if (mb_strlen($op_string) == $op_result) { $this->outputFormatted($op_string,$op_string_numeric,$op_result,(int)$n,(int)$pa); };
				
			};
		
		}		
		
	}
	
	
	function calculateMultiplication($n){
				
		for ($j=1;$j<=$n;$j++){

			$op_string = num2text($n)."mal".num2text($j);
			$op_string_numeric = $n." * ".$j;
			$op_result = $n * $j;
			
			if (mb_strlen($op_string) == $op_result) { $this->outputFormatted($op_string,$op_string_numeric,$op_result,(int)$n,(int)$j); };
			
		}			
			
	}


	public function calculate(){
		
		for ($i=1;$i<=$this->upperthreshold;$i++){
			
			$this->calculateAddition($i);			
			$this->calculateSubtraction($i);
			$this->calculateDivision($i);
			$this->calculateMultiplication($i);
						
		};
		
	}

}


