<?php namespace Page\App\Core;

class Controller
{
    private $data=[];
    
    protected function addData(string $key,$value):void
    {
        $this->data[$key]=$value;
    }
    
    protected function getData():array
    {
        return $this->data;
    }

    protected function view(string $view):void
    {
        $data=$this->getData();
        require_once $_SERVER['DOCUMENT_ROOT'].'/app/view/'.$view.'.php';
    }

    protected function module(string $module,array $data = []):void
    {
        require $_SERVER['DOCUMENT_ROOT'].'/app/view/'.$module.'/'.$module.'.php';
    }

}