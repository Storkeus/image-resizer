<?php namespace Page\App\Model;

interface ResizeImageStrategyInterface
{

    /**
     * @return bool true if success, false otherwise
    */
    public function resize(string $filePath, array $resizeParameters):void;


}

