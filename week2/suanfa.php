<?php 
/*
1．编写一个程序，传入n与m两个参数，生成1~n的编号，从开头的编号开始数，数到m将对应的元素删除，接下来从下一个元素开始数，数到m就删除，求最后剩下的数字

*/

function get_last($n,$m)
{
     $boys = range(1,$n);
     // print_r($boys);die;
     $k = 0;
     $len = count($boys);
     while (count($boys)>1) {
     	 for ($i=0; $i <$len; $i++) { 
     	 	  if (!isset($boys[$i])) {	
     	 	  	 continue;
     	 	  }
     	 	  if ($k == $m) {
     	 	  	 unset($boys[$i]);
     	 	  	 $k = 0;
     	 	  }
     	 	  $k++;
     	 }
     }
     print_r($boys);
}
// get_last(6,3);

/*
2．编写一个程序，给定任意长度的数组，数组内包含n个数字，要求将数组分为三组，每组的和尽量相近：
*/



function fenzu($arr)
{
     rsort($arr);
     $array = [
        0=>[array_shift($arr)],
        1=>[array_shift($arr)],
        2=>[array_shift($arr)]
     ];

     for ($i=0; $i <count($arr) ; $i++) { 
     	 $array[2][] = $arr[$i];
     	 $sum = array_sum($array[2]);
     	 if ($sum > array_sum($array[0])) {
     	 	  $array = [
                  $array[2],
                  $array[0],
                  $array[1]
     	 	  ];
     	 }
     	 elseif ($sum > array_sum($array[1])) {
     	 	 $array = [
                 $array[0],
                 $array[2],
                 $array[1]
     	 	 ];
     	 }
     }
     print_r($array);
}

// fenzu([1,2,3,4,5,6]);


/*
4．银行有四个柜台，给定两个数组包含客户到达银行的时间与办理业务所需要的时间：
	$active_time =  [9.01, 9.10, 9.20, 9.21, 9.22];
	$process_time = [0.30, 0.18, 0.22, 0.47, 0.11];
	假设银行9点开始办理业务，假设客户不会因为失去耐心走掉
	使用算法计算出每一个用户的平均等待时间


*/
function bank($active_time,$process_time)
{

	$windows = [];
	$wait_time = 0;
	$len = count($active_time);
    for ($i=0; $i <$len; $i++) { 
    	if(count($windows)<4)
    	{
    		$windows[] = $active_time[$i] + $process_time[$i];
    		continue;
    	}
    	sort($windows);
    	$min = $windows[0];
    	array_shift($windows);
    	if ($min > $active_time[$i]) {
    		$wait_time += $min-$active_time[$i];
    		$new_time = $min + $process_time[$i];
    	}
    	else
    	{
    		$new_time = $active_time[$i] + $process_time[$i];
    	}
    	$windows[] = $new_time;
    }
    print_r($wait_time/$len);

}
// bank([9.01, 9.10, 9.20, 9.21, 9.22],[0.30, 0.18, 0.22, 0.47, 0.11]);
















 ?>