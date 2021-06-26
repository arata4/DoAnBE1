<?php
class Pagination{
    public static $page=1;
    public static $perPage=6;
    public function __construct(){
        if(isset($_GET['page'])){
            self::$page=$_GET['page'];
        }
    }
    function pagination($url,$total){
        $totalLinks=ceil($total/self::$perPage);
        $link="";
        for($i=1;$i<=$totalLinks;$i++){
            $active = self::$page == $i ? "class='active'" : '';
            $link = $link . "<li $active><a href='$url&page=$i'> $i </a><li>";
        }
        return $link;
    }
}
    