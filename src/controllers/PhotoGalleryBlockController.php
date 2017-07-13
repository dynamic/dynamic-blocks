<?php

namespace Dynamic\DynamicBlocks\Controller;

use SheaDawson\Blocks\Controllers\BlockController;
use SilverStripe\View\Requirements;

/**
 * Class PhotoGalleryBlock_Controller
 * @package Dynamic\DynamicBlocks\Controller
 */
class PhotoGalleryBlock_Controller extends BlockController
{
    /**
     *
     */
    public function init()
    {
        Requirements::css('dynamic-blocks/thirdparty/lightbox/lightbox.css');
        Requirements::javascript('dynamic-blocks/thirdparty/lightbox/lightbox.min.js');
    }
}