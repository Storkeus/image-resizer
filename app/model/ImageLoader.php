<?php

namespace Page\App\Model;

use Exception;
use Page\App\Core\Sys;

class ImageLoader
{
    private $directory;


    public function __construct(array $files)
    {
        $this->load($files);
    }

    public function __destruct()
    {
        // $this->deleteFiles($this->directory);
    }

    private function deleteFiles($target)
    {

        if (is_dir($target)) {
            $files = glob($target . '*', GLOB_MARK);

            foreach ($files as $file) {
                $this->deleteFiles($file);
            }

            if(is_file($target))
            {
                rmdir($target);
            }
        } elseif (is_file($target)) {
            unlink($target);
        }
    }

    private function validateFiles(array $files): bool
    {

        foreach ($files['tmp_name'] as $key => $file) {
            $fileSize = filesize($file);
            $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
            $fileType = finfo_file($fileInfo, $file);

            $allowedTypes = [
                'image/png' => 'png',
                'image/jpeg' => 'jpg'
            ];


            if ($fileSize === 0 || !in_array($fileType, array_keys($allowedTypes))) {
                return false;
            }
        }
        return true;
    }

    /**
     * Loades images
     * @param array file list from $_FILES
     * @return string path to folder with resized images
     */
    private function load(array $files): void
    {

        if (!$this->validateFiles($files)) {
            throw new Exception("Uploaded files are invalid.");
        }

        //create temporary directory 
        $directory = tempnam(Sys::getRoot() . '/app/tmp', '');
        if (file_exists($directory)) {
            unlink($directory);
        }
        mkdir($directory,0775);

        for ($i = 0; $i < sizeof($files['name']); $i++) {
            $tmpName = $files['tmp_name'][$i];
            $name = $files['name'][$i];
            $filePath = "{$directory}/{$name}";
            
           move_uploaded_file($tmpName, $filePath);
        }

        $this->directory = $directory;
    }

    public function getDirectory()
    {
        return $this->directory;
    }
}
