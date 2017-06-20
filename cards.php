<?php
include 'connect.php';

//$upfile = fopen('users.csv', 'r') or die ("can't open file");

//echo "<table border=1>";
//echo "<tr><th>Account Name</th><th>PAN</th></tr>";

echo "Account Name,Account Number,PAN,Expiry\n";
//	
	//while ($line = fgets($upfile)) {
		
		$data=mysqli_query($db,"select * from users");
		
		
		while ($row=mysqli_fetch_array($data)) {
   // $line = explode(",", $line);

    $name = $row["name"];
    $number = rtrim($row["mobile"]);

    if($number != "" && $number != null) {
        if(substr($number, 0,1) != "0") $number = "0".$number;
        $acc_number = substr($number, 1);
//         print $acc_number ."\n";
        $pan = completed_number( $acc_number, 16);
        $pan = trim($pan);
        // print $pan ."\n";
$expiry=date("m-y",strtotime("+ 5 years"));
//        echo "$name,$number,$pan,$expiry\n";
        echo "$name,$pan\n";
    }

}

//echo "</table>";



function validLuhn($number) {
    for ($sum = 0, $i = strlen($number) - 1; $i >= 0; $i--) {
        $digit = (int) $number[$i];
        $sum += (($i % 2) === 0) ? array_sum(str_split($digit * 2)) : $digit;
    }
    return (($sum % 10) === 0);
}

/**
 * Validating a credit card is a three
 * step process:
 * Step 1: Check the pattern for a match
 *         with a major card brand.
 * Step 2: Check using the Luhn algorithm.
 * Step 3: Check using a merchant gateway.
 *
 * This function attempts to validate a credit
 * card number using the "Luhn algorithm".
 *
 * @param string $cardNumber Credit card number.
 * @return bool true or false
 */
function cc_validate_checksum($cardNumber) {

    $cardNumber = preg_replace('/\D/', '', $cardNumber);

    // Determine the string length
    $cardLength = strlen($cardNumber);

    // Determine the string's remainder
    $cardCheck = $cardLength % 2;

    // Break up the card number into individual
    // digits and combine total.
    $combineTotal = 0;
    $cur = 0;
    $breakCard = str_split($cardNumber);
    foreach ($breakCard as $digit) {

        // Multiply alternate digits by two
        if ($cur % 2 == $cardCheck) {
            // If the multiplied digits is greater
            // than 9, subtract 9.
            $digit *= 2;
            if ($digit > 9) {
                $digit -= 9;
            }
        }

        // Total up the digits
        $combineTotal += $digit;
        $cur++;

    }

    // If the combined total's modulus 10 is equal to 0,
    // we know that the the number could be valid,
    // pending confirmation from a payment gateway
    // that the number exists.
    return ($combineTotal % 10 == 0) ? true : false;

}


function completed_number($acc_number, $length) {

    $ccnumber = 637654;

    # generate digits

        $ccnumber .= $acc_number;

    # Calculate sum

    $sum = 0;
    $pos = 0;

    $reversedCCnumber = strrev( $ccnumber );

    while ( $pos < $length - 1 ) {

        $odd = $reversedCCnumber[ $pos ] * 2;
        if ( $odd > 9 ) {
            $odd -= 9;
        }

        $sum += $odd;

        if ( $pos != ($length - 2) ) {

            $sum += $reversedCCnumber[ $pos +1 ];
        }
        $pos += 2;
    }

    # Calculate check digit

    $checkdigit = (( floor($sum/10) + 1) * 10 - $sum) % 10;
    $ccnumber .= $checkdigit;

    return $ccnumber;
}

$db=NULL;
?>
