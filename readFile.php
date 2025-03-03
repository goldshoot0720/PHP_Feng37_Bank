<?php
$handle = fopen("bank_savings.txt", "r");
$bank_savings = [0,0,0,0,0,0,0];
$i = 0;
if ($handle) {
	while (($line = fgets($handle)) !== false) {
        	$bank_savings[$i] = $line;
		echo "<script>bank_savings[$i] = $bank_savings[$i];</script>";
		$i++;
		if ( $i > 6 )
			break;	
    	}
	fclose($handle);
}
?>
