<?php

namespace Dynamic\DynamicBlocks\Controller;

use SheaDawson\Blocks\Controllers\BlockController;

/**
 * Class SlideshowBlock_Controller
 * @package Dynamic\DynamicBlocks\Controller
 */
class SlideshowBlock_Controller extends BlockController
{
    /**
     *
     */
    public function init()
    {
        $this->Data()->contentcontrollerInit();
    }
}