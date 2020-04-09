<?php
 function presentPrice($price) {
        // return gettype($price);
        // $priceInt = strpos($price,".") == false ? intval($price) : floatval($price);
        // todo $price is string here to we have to convert it into numeric
        // $newPrice = strpos($price,".") == false ? (int)$price : (float)$price;
       //$price = (double)$price;
        return "$".$price;
}

function setActiveCategory($categorySlug,$output = 'active') {
        return request()->category == $categorySlug ? $output : '';
}
