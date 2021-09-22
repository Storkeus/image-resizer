<?php

namespace Page\App\Model;

use Exception;

class PercentResizeImageStrategy implements ResizeImageStrategyInterface
{

    /**
     * Resizes images by given percent
     */
    public function resize(string $filePath, array $resizeParameters): void
    {

        if (!isset($resizeParameters['percent-change'])) {
            throw new Exception('Lack of parameter: percent-change');
        }

        $percentChange = $resizeParameters['percent-change'];

        $image = new \Gumlet\ImageResize($filePath);
        $image->scale($percentChange, true);
        $image->save($filePath);
    }
}
