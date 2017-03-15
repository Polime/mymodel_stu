<?php 
  $A = array('4','6','12','13','19','25','32');
  echo "数组A为：";
  foreach ($A as $key => $value) {
    echo "$value&nbsp;";
  }
  echo "<br>";
  echo "数组B为：";
  $B=0;
  for ($n=0; $n < 17; $n++) {
    $B = 2*$n;
    if ($B==$value) {
      echo "$B&nbsp;";
    }
  }
 ?>