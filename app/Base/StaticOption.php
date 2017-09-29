<?php
/**
 * 基类
 *
 * @author camera360_server@camera360.com
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */

namespace App\Base;
 
/**
 * Class Child
 * @package PG\MSF\Base
 */
class StaticOption
{  

    public static function options($page='')
    { 
       $common = [
         'style' => [
                     'css/bootstrap.min.css',
                     'css/style.css',
                     'css/owl.carousel.css',
                     'css/owl.theme.css',
                     'css/css/font-awesome.min.css'
                    ],
          'script' => [
                       'js/jquery-2.1.1.js',
                       'js/bootstrap.min.js',
                       'js/owl.carousel.js'
                      ]          
       ];
       
       $info = [
               'index.index' => [
                   'style'   => [],
                   'script'  => [] 
               ],  
        ];   

       $static = isset($options[$page]) ? $options[$page] : []; 
       return array_merge_recursive($common,$static); 
    } 

    
 

    
    /**
     * 销毁,解除引用
     */
    public function destroy()
    {

    }

}
