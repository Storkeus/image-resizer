<?php

namespace Page\App\Model;

use Exception;
use Page\App\Core\Sys;
use ZipArchive;

class ImagePacker
{
    private $directory;
    private $zipPath;

    public function __construct(string $directory)
    {
        $this->directory = $directory;
        $this->createZip();
    }


    private function createZip()
    {
        $zip = new ZipArchive;
        $tempFileName = tempnam(Sys::getRoot().'/app/tmp', '');

        if ($zip->open($tempFileName, ZipArchive::OVERWRITE) === TRUE) {
            if ($handle = opendir($this->directory)) {
        
                // Add all files inside the directory
                while (false !== ($entry = readdir($handle))) {
                    if ($entry != "." && $entry != ".." && !is_dir($this->directory . $entry)) {
                        if(!$zip->addFile($this->directory .'/'. $entry,$entry))
                        {
                            throw new Exception("Error while adding file to zip archive");
                        }
                    }
                }
                closedir($handle);
            }
            $zip->close();
        }

     
        $this->zipPath = $tempFileName;

    }

    public function getZip()
    {
        return $this->zipPath;
    }
}
