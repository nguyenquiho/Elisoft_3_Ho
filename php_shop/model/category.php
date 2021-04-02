<?php
class Category{
    function get_category(){
        global $link;
        $sql='SELECT `id`,`name`,`department_id` FROM `nn_category` where `active`=1 ORDER By `order`';
        $rs_cat=mysqli_query($link,$sql);
        $data = [];
        while($row = mysqli_fetch_assoc($rs_cat))
        {
            $data[]=$row;
        }
        return $data;
    }
}
?>