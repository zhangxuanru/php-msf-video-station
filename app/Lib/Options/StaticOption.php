<?php
/**
 * 基类
 *
 * @author camera360_server@camera360.com
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */

namespace App\Lib\Options;
 
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
                     'owl-carousel/owl.carousel.css',
                     'owl-carousel/owl.theme.css',
                     'font-awesome-4.4.0/css/font-awesome.min.css'
                    ],
          'script' => [
                       'js/jquery-2.1.1.js',
                       'js/bootstrap.min.js', 
                       'owl-carousel/owl.carousel.js',
                       'js/search.js'
                      ]          
       ];
        $options = [
               'single.index' => [
                   'style'   => [],
                   'script'  => [
                       'js/play.js',
                       'js/comment.js'
                   ]
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
