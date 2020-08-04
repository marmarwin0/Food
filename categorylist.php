<?php
    function getCategoryList(){
        $categoryList=array();
        $myfile=fopen('category.txt','r');
        while(!feof($myfile)){
            $acc=fgets($myfile);
            if($acc!=""){
                $s1=json_decode($acc);
                array_push($categoryList,$s1);
            }
        }    
        fclose($myfile);
        return $categoryList;
    }
?>