<?php

function display_menu($_location,$is_boostrap = false){
    $output = '';
    $location = get_nav_menu_locations();
    // dd($location);
    if(isset($location['primary'])){
        $primary_menu = get_term( $location['primary']);
    }else{
        $primary_menu = null;
    }

    if($primary_menu != null){
        $primary_menu_items = wp_get_nav_menu_items($primary_menu->term_id);
    }
    else{
        $primary_menu_items = null;
    }
    
    $social_menu = get_term( $location['social']);
    $footer_menu = get_term( $location['footer']);
    //dd($menu);

    
    $social_menu_items = wp_get_nav_menu_items($social_menu->term_id);
    $footer_menu_items = wp_get_nav_menu_items($footer_menu->term_id);

    if($_location == 'primary' && $is_boostrap == true):
        if($is_boostrap == true):
            $output.='
            <div class="navbar-nav mr-auto">';
            if($primary_menu_items != null):
                foreach($primary_menu_items as $item){
                    $hasChild = false; 
                        if($item->menu_item_parent == 0){
                           foreach($primary_menu_items as $i){
                            if($i->menu_item_parent == $item->ID){
                                $hasChild = true;
                                break;
                            }
                           }
                           if($hasChild == false){
                            $output.='<a href="'.$item->url.'" class="nav-item nav-link active">'.$item->title.'</a>';
                            }else{ 
                                $output.='<div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">'.$item->title.'</a>
                                <div class="dropdown-menu">'; 
                                foreach($primary_menu_items as $i){
                                if($i->menu_item_parent == $item->ID){
                                    $output.='<a href="'.$i->url.'" class="dropdown-item">'.$i->title.'</a>';
                                }
                            }
                                 
                            $output.='</div>
                         </div>';
                            }
                        }
                   
                }
    
            else:
                $output.='<a href="" class="nav-item nav-link active">Home</a>';
            endif;
            $output.='</div>';
        endif;
    
    echo $output;
    endif;

    //social menu
    if($_location == 'social'):
        $output .= '
        <div class="social ml-auto">';
            foreach($social_menu_items as $item):
                $output .= '<a href="'.$item->url.'">'.$item->title.'</a>';
            endforeach;
    $output.='</div>';
    echo $output;
    endif;

    
    
}