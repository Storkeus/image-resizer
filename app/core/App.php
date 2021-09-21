<?php namespace Page\App\Core;

class App
{
    
    protected $controller='Home';
    protected $method='index';
    protected $params=[];
    
    public function __construct()
    {
        $url=$this->parseUrl();
   
        
        if(!isset($url[0]))
        {
            $url[0]='';
        }
        
        $controllerAddressExploded=explode('_',$url[0]);
        
        $controllerAddress='';

        foreach($controllerAddressExploded as $controllerAddressPart){
            $controllerAddress.=ucfirst($controllerAddressPart);
        }
        
        if(file_exists('../app/controller/'.$controllerAddress.'.php'))
        {
            $this->controller=$controllerAddress;
            unset($url[0]);
        } 
        
        $controllerExploded=explode('/',$this->controller);
        $this->controller=end($controllerExploded);
        $controller='\Page\\App\\Controller\\'.$this->controller;
        $this->controller=new $controller;
        
        
        if(isset($url[1]))
        {
            $methodExploded=explode('-',$url[1]);
            
            $method='';
            foreach($methodExploded as $key=>$methodPart){
            
                if($key===0){
                    $method.=$methodPart;
                }else{
                    $method.=ucfirst($methodPart);
                }
            }

            $method=str_replace('-','_',$url[1]);
            
            if(method_exists($this->controller,$method))
            {
                $this->method=$method;
                unset($url[1]);
            }
        }
        
       $this->params= $url ? array_values($url): [];



       
       call_user_func_array([$this->controller, $this->method],$this->params);
    }
    
    public function parseUrl()
    {
        if(isset($_GET['url']))
        {
            $url=rtrim($_GET['url'],'/'); 
            $url=explode('/',$url);

            return $url;   
        }
    }
}
