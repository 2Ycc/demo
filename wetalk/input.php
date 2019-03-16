<?php


class input{

    //设定函数，判断内容、用户名是否为空
    function check( $content ){
        if( $content ==''){
            return false;
        }
        return true;
    }
}

?>