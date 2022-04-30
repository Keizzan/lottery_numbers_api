<?php
		
// ##############################################################################
// #######             PROJECT NAME : Vue Random Numbers                  #######
// ##############################################################################
//                                Synopsis:
//  Api which genererate unique 5 random numbers betweeem 1-50 and outputs its as JSON

		$a = generate();
		$b = generate();			
		$c = generate();			
		$d = generate();			
		$e = generate();
			


function generate() {

	// declare variables
	// -----------------
		$min = 1; $max = 50;
		$count = 4;
		$arr = [];

	// loop until we select 5 random numbers - must be unique
	// -------------------------------------
		for ($i = 0; $i <= $count; $i++) {	

			$found = FALSE;

			While( !$found ) {
				
				$ran = random_int( $min , $max );
				if ( !in_array($ran, $arr, true) ) {
					$arr[$i] = $ran;
					$found = TRUE;
				}
				
			}
		}
		sort( $arr );
		return( $arr );
}
