<?php
namespace app;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];

    public Database $database; // ? is for nullabe type
    
    
    public function __construct()
    {
        
        $this->database = new Database();
    }

    public function get($url, $fn)
    {
        // set function for url
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn)
    {
        // set function for url
        $this->postRoutes[$url] = $fn;
    }

    public function resolve()
    {
        //var_dump($_SERVER);
        // check for method
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        //var_dump($method);
        // resolve url from SUPER GOLBAL
        $currurl = $_SERVER['PATH_INFO'] ?? '/';
        //var_dump($currurl);


        if ($method === 'get') {
            $fn = $this->getRoutes[$currurl] ?? null;
        } else {
            $fn = $this->postRoutes[$currurl] ?? null;
        }
        if (!$fn) {
            echo 'Page not found';
            exit;
        }
        /* echo '<pre>';
        var_dump($fn);
        echo '<pre>'; 
 */
        // run function
        echo call_user_func($fn, $this);
        
    }

    public function renderView($view, $params = [])
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
 
        ob_start(); // start clollect output
        
        include __DIR__."/views/$view.php";
        $content = ob_get_clean(); // save output to $content to use next
        include __DIR__."/views/_layout.php";
    }
}