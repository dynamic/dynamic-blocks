<?php

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
}

class SlideshowBlock_Controller extends Block_Controller
{
    /**
     *
     */
    public function init()
    {
        $this->Data()->contentcontrollerInit();
    }
}