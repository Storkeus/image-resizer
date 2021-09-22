<?php

namespace Page\App\Controller;

use Exception;
use Page\App\Model\ImageLoader;
use Page\App\Model\ImagePacker;
use Page\App\Model\PercentResizeImageStrategy;
use Page\App\Model\SpecificSizeResizeImageStrategy;

class Image extends \Page\App\Core\Controller
{

    public function index()
    {
        try {
            $requestMethod = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_SPECIAL_CHARS);
            if ($requestMethod !== 'POST') {
                throw new Exception('Wrong request method.');
            }

            if(!isset($_FILES['images'])||empty($_FILES['images']))
            {
                throw new Exception('Ther are no images to process.');
            }


            $resizeMethod=filter_input(INPUT_POST,'resize-method',FILTER_DEFAULT);
            $width=filter_input(INPUT_POST,'width',FILTER_DEFAULT);
            $height=filter_input(INPUT_POST,'height',FILTER_DEFAULT);
            $percentChange=filter_input(INPUT_POST,'percent-change-value',FILTER_DEFAULT);
            $resizeParameters=['width'=>$width,'height'=>$height,'percent-change'=>$percentChange];

            $files=$_FILES['images'];

            $imageLoader = new ImageLoader($files);
            $imageDirectory=$imageLoader->getDirectory();


            

            $resizeStrategy = null;
            switch ($resizeMethod) {
                case 'percent-change':
                    $resizeStrategy = new PercentResizeImageStrategy();
                    break;
                case 'specific-size':
                    $resizeStrategy = new SpecificSizeResizeImageStrategy();
                    break;
            }



            foreach ($files['name'] as $fileName) {
                $filePath="{$imageDirectory}/{$fileName}";
                $resizeStrategy->resize($filePath, $resizeParameters);
            }

            $imagePacker=new ImagePacker($imageDirectory);
            $zipFilePath=$imagePacker->getZip();
     
            if(!is_file($zipFilePath))
            {
                throw new Exception("Error during zip creation");
            }    

            header("Content-Type: application/zip");
            header("Content-Disposition: attachment; filename=images.zip");
            header("Content-Length: " . filesize($zipFilePath));
            readfile($zipFilePath);
            exit();


        } catch (Exception $exception) {
            http_response_code(400);
            exit($exception->getMessage());
        }
    }
}
