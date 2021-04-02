<?php
class Product
{

//Lấy 10 sản phẩm được quan tâm nhất
    function get_hot_product()
    {
        global $link;//$link = $_GLOBAL['link'];
        $sql = 'SELECT `id`, `name`, `price`, `img_url` 
			FROM `nn_product` 
			WHERE `active` = 1
			ORDER BY `view` desc
			LIMIT 0,10';
        $rs_hot = mysqli_query($link, $sql);
        // echo $sql;
        // die();
        $data = [];
        while($row = mysqli_fetch_assoc($rs_hot))
        {
            $data[]=$row;
        }
        return $data;
    }

//Lấy 20 sản phẩm moi nhất
    function get_new_product()
    {
        $link = $GLOBALS['link'];
        $sql = 'SELECT `id`, `name`, `price`, `img_url` 
			FROM `nn_product` 
			WHERE `active` = 1
			ORDER BY `id` desc
			LIMIT 0,20';
        $rs_new = mysqli_query($link, $sql);
        $data = [];
        while($row = mysqli_fetch_assoc($rs_new))
        {
            $data[]=$row;
        }
        return $data;
    }
    function get_data_to_paginate()
    {   
        $link = $GLOBALS['link'];
        if(isset($_GET['cid'])){
            $cid = $_GET['cid'];
            	//Tính tổng số trang
            $sql = "SELECT count(*) 
            FROM `nn_product` 
            WHERE `active` = 1 AND `category_id` = $cid";
            $rs = mysqli_query($link, $sql);
            $r = mysqli_fetch_row($rs);
            $noi = $r[0];//number of items
            $nop = ceil($noi/20);
        }
        else $nop = 0;
    $data = [];
    $data['noi'] = $noi;
    $data['nop'] = $nop;
    return $data;
    }

    function paginate_product(){
        if(empty($_GET['cid']))
		$cid = 1;
        else
            $cid = $_GET['cid'];
        
        if(empty($_GET['page']))
            $page = 1;
        else
            $page = $_GET['page'];
        
        if(empty($_GET['sort']))
            $sort = 0;
        else
            $sort = $_GET['sort'];
        
        $pos = ($page - 1) * 20;
        
        if($sort == 0)
            $order = '`id` ASC';
        if($sort == 1)
            $order = '`price` ASC';
        if($sort == 2)
            $order = '`price` DESC';
        if($sort == 3)
            $order = '`name` ASC';
        if($sort == 4)
            $order = '`name` DESC';
        
        
        //Lấy sản phẩm thuộc loại XY
        $sql = "SELECT `id`, `name`, `price`, `img_url` 
                FROM `nn_product` 
                WHERE `active` = 1 AND `category_id` = $cid
                ORDER BY $order
                LIMIT $pos,20";
        $link = $GLOBALS['link'];		
        $rs_product = mysqli_query($link, $sql);
        $data = [];
        while($row = mysqli_fetch_assoc($rs_product)){
            $data[]= $row;
        }
        return $data;
    }


    //get Product detail
    function get_product_detail(){
        if(isset($_REQUEST['id'])){
            $id = $_REQUEST['id'];
            $_SESSION['view'][] = $id;
            $flag = 0;
            foreach($_SESSION['view'] as $k=>$v){
                if($v == $id){
                    $flag++;
                }
            }
            if($flag == 1){
                $link = $GLOBALS['link'];
                $sql = 'UPDATE `nn_product` SET `view`=`view`+1 WHERE `id`='.$id;
                mysqli_query($link, $sql);
            }

            
            //Lay thong tin hien tai cua san pham
            $link = $GLOBALS['link'];
            $sql = 'SELECT `category_id`, `name`, `price`, `desc`, `detail`, `img_url`, `qty`, `view` 
                    FROM `nn_product` 
                    WHERE `id` = '.$id;
            $rs = mysqli_query($link, $sql);
            $row = mysqli_fetch_assoc($rs);

            return $row;
        }
        else $row = null;
        
    }

    //get product by type
    function get_new_product_by_cat($cat,$id)
    {
        //Lay 20 san pham moi nhat cung loai
        $link = $GLOBALS['link'];
        $sql = "SELECT `id`, `name`, `price`, `img_url` 
        FROM `nn_product` 
        WHERE `active` = 1 AND `category_id` = {$cat} AND `id` != {$id}
        ORDER BY `id` desc
        LIMIT 0,20";
        $rs_product = mysqli_query($link, $sql);
        $data = [];
        while($row = mysqli_fetch_assoc($rs_product)){
            $data[] = $row;
        }
        return $data;
    }

}
?>