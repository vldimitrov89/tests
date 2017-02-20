<?php
class ArraySearch 
{
    public static function countItems($arr, $item) 
    {
       $count = 0;

		foreach($arr as $i){
			if(is_array($i)){
				$count +=self::countItems($i,$item);
			}
			if($i==$item){
				$count++;
			}
		}

		return $count;
    }
}

$arr = [
    "apple",
    ["banana", "strawberry", "apple"]
];
echo ArraySearch::countItems($arr, "apple");