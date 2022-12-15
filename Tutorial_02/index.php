<h1 style="text-align:center;">Tutorial 02</h1>
<?php
$i = 1;
while($i <= 11){
  $j = 11;
  while ($j >= $i) {
    echo "&nbsp";
    $j--;
  }
  $k = 1;
  while ($k <= $i){
    echo "*";
    $k++;
  }
  echo "<br>";
  $i+=2;
}

$x = 9;
while ($x >=1){
  $j = 11;
  while ($j >= $x){
    echo "&nbsp";
    $j--;
  }
  $k = 1;
  while ( $k <= $x) {
    echo "*";
    $k++;
  }
  echo "<br>";
  $x-=2;
}
?>