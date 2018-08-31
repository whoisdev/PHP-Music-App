<?php
/*
    - This is the core library that will be used to get the URL 
    - and load the current view
*/
class Core{

    protected $currentController = 'pages';
    protected $currentMethod = 'index';

    public function __construct(){
        $url = $this->getUrl();
        /*
            - This will see if the requested file exists if not then 
            - the fallback is the pages class and index method
            - ucwords will capatlize the first word in the url
            - uset will set the array index to null
        */
        if(file_exists('../App/controllers/' . ucwords($url[0]) . '.php')){
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }
        /*
            - This will require the correct controller from the 
            - controllers folder
        */
        require_once '../App/controllers/' . $this->currentController . '.php';
        /* 
            - This will initilize the current controller 
            - For eg : if the url is /page/add
            - It will initilize $page = new page;
        */
        $this->currentController = new $this->currentController;
        /*
            - This will check if the url has another index required 
            - then it will check if the method exists if yes then 
            - set the currentMethod 
            - to the required one
        */
        if(isset($url[1])){
            if(method_exists($this->currentController,$url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }
        /*
            - If the url still has some values then add it 
            - to params otherwise 
            - store it as an empty array
        */
        $this->params = $url ? array_values($url) : [];
        /*
            - This is a callback which will be call the function
            - in array with the params as an paramteter to the functions 
            - For example if the URL is MVC/pages/add
            - Then the currentController is pages and the current method
            - is add and it will call the method add with $this->params
            - as a parameter
        */
        call_user_func_array([$this->currentController,$this->currentMethod],$this->params);

    }
/*
    - getUrl method will take URL and return an array of it 
    - ex: MVC/dev/singh
    - will return Array( [0] => dev [1] => singh )
*/
    public function getUrl(){
        if(isset($_GET['url'])){
            // Trim White Space
            $url = rtrim($_GET['url'],'/');

            // filter_var will remove everthing from the
            // URL that is not suppossed to be there
            $url = filter_var($url,FILTER_SANITIZE_URL);

            // This will convert the $url into an array
            $url = explode('/', $url);
            return $url;
        } 
    }

}

?>