<?php
    echo "<table>";
    for($i=0; $i < 8; $i++){
        echo "<tr>";
        for($j=0; $j < 8; $j++){
            if($i % 2 == 0){
                if($j % 2 == 0){
                    echo '<td style="background-color: pink; width: 10px; height:10px"></td>';
                } else {
                    echo '<td style="background-color: black; width: 10px; height:10px"></td>'; 
                }
            } else {
                if($j % 2 == 0){
                    echo '<td style="background-color: black; width: 10px; height:10px"></td>';
                } else {
                    echo '<td style="background-color: pink; width: 10px; height:10px"></td>'; 
                } 
            }
        }
        echo "</tr>";
    }
    echo "<table>"
?>


<?php
// PHP program to count number
// of on offs to display digits
// of a number.
 
function countOnOff($n)
{
    // store the led lights required
    // to display a particular number.
    $Led = array(6, 2, 5, 5, 4,
                 5, 6, 3, 7, 5 );
 
    $len = strlen($n);
    // compute the change in led
    // and keep on adding the change
    $sum = $Led[$n[0] - '0'];
    for ($i = 1; $i < $len; $i++)
    {
        $sum = $sum + abs($Led[$n[$i] - '0'] -
                          $Led[$n[$i - 1] - '0']);
    }
 
    return $sum;
}
 
// Driver code
$n = "082";
echo countOnOff($n);
 
// This code is contributed
// by Akanksha Rai
?>