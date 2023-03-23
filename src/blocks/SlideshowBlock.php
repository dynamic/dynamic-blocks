<?php

namespace Dynamic\DynamicBlocks\Block;

use Dynamic\DynamicBlocks\Controller\SlideshowBlock_Controller;
use SheaDawson\Blocks\Controllers\BlockController;
use SheaDawson\Blocks\Model\Block;
use SilverStripe\Core\Injector\Injector;

class SlideshowBlock extends Block
{
    /**
     * @return string
     */
    public function singular_name()
    {
        return _t('SlideshowBlock.SINGULARNAME', 'Slideshow Block');
    }

    /**
     * @return string
     */
    public function plural_name()
    {
        return _t('SlideshowBlock.PLURALNAME', 'Slideshow Blocks');
    }

    /**
     * @var string
     */
    private static $table_name = 'SlideshowBlock';

    /**
     * @return mixed|object|\SheaDawson\Blocks\Model\BlockController|Injector
     */
    public function getController()
    {
        $controller = Injector::inst()->create(SlideshowBlock_Controller::class, $this);
        $controller->init();

        return $controller;
    }
}
