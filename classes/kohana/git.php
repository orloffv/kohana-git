<?php defined('SYSPATH') or die('No direct script access.');

class Kohana_Git {

    private static $instance;
        
    /**
     * @return  Git
     */
    public static function factory($path = '') {
        
        $config = Kohana::$config->load('git');
        
        $path = is_null($path) ? $config->path : $path;
        
        return new Git::open($path);
    }

    /**
     * @return  Git
     */
    public static function instance($path = null)  {
        // если объект уже создан вернем ссылку на него
        if(!empty(self::$instance)) {
            return self::$instance;
        }  
        
        // если обхект еще не был создан, то создадим его
        self::$instance = self::factory($path);
                
        return self::$instance;
    }
    
}
