<?php
class Products
{
    public static function sortByPriceAscending($jsonString)
    {

        $data = json_decode($jsonString);
        //var_dump($data);
        usort($data, function($a,$b) {
          if($a->price == $b->price) { 
          	return $a->name <=>$b->name;
          } 
          return $a->price<=>$b->price; 
      	});
        return json_encode($data);
    }

}

echo Products::sortByPriceAscending('[{"name":"eggs","price":1},{"name":"coffee","price":9.99},{"name":"rice","price":9.99}]');

