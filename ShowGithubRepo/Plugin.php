<?php
/**
 * 一个简洁好看的Github项目展示下载插件
 * 
 * @package ShowGithubRepo
 * @author Loststar
 * @version 1.0.1-Alpha
 * @link http://techair.cc
 */

class ShowGithubRepo_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        Typecho_Plugin::factory('Widget_Abstract_Contents')->contentEx = array('ShowGithubRepo_Plugin', 'parse');
        Typecho_Plugin::factory('Widget_Archive')->header = array('ShowGithubRepo_Plugin', 'footer');
    }
    
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){}
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form){}
    
    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}
    
    
    /**
     * 输出尾部js
     * 
     * @access public
     * @param unknown $header
     * @return unknown
     */
    public static function footer() {
        echo '<script src="http://cdn.bootcss.com/github-repo-widget/e23d85ab8f/jquery.githubRepoWidget.min.js"></script>';
        
   }

/**
     * 插件实现方法
     * 
     * @access public
     * @return void
     */
    public static function parse($text, $widget, $lastResult)
    {
                $text = empty($lastResult) ? $text : $lastResult;
        	
        if ($widget instanceof Widget_Archive) {
   
            $text = preg_replace("/<(repo)>(.*?)<\/\\1>/is", 
            "<div class=\"github-widget\" data-repo=\"\\2\"></div>",
            $text);
        }
        
        return $text;
    }
}
