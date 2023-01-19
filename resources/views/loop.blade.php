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


<?php 
    function test(){
        $arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100];
        echo $arr[1];
    }

echo test();

echo trans('messages.welcome');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>{{trans('messages.welcome')}}</h1>

</body>
</html>