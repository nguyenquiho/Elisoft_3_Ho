<?php
class Department{
    function get_department(){
        global $link;
        $sql="SELECT `id`,`name` FROM `nn_department` where `active`=1 order by `order`";
        $rs_dep = mysqli_query($link, $sql);
        $data = [];
        while($row = mysqli_fetch_assoc($rs_dep))
        {
            $data[]=$row;
        }
        return $data;
    }
}
?>