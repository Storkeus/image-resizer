<?php

namespace Page\App\Model;

use Exception;

class SpecificSizeResizeImageStrategy implements ResizeImageStrategyInterface
{
    private $requiredParameters = ['width', 'height'];

    private function checkRequiredParameters($parameters)
    {
        foreach ($this->requiredParameters as $requiredParameter) {
            if (!in_array($requiredParameter, array_keys($parameters))) {
                return false;
            }
        }
        return true;
    }

    /**
     * Resizes images to specific size
     */
    public function resize(string $filePath, array $resizeParameters): void
    {


        if (!$this->checkRequiredParameters($resizeParameters)) {
            throw new Exception('Lack of parameters');
        }

        $width = $resizeParameters['width'];
        $height = $resizeParameters['height'];

        $image = new \Gumlet\ImageResize($filePath);
        $image->resizeToBestFit($width, $height);
        $image->save($filePath);
    }
}
