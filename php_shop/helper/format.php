<?php
class Format{
    public function format_date($date){
        return date('F j, Y, g:i a',strtotime($date));
    }

    public function validate($data){
        $data = trim($data);
        $data = addslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
?>