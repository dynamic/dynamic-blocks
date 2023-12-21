<?php

namespace Dynamic\DynamicBlocks\Controller;

use SheaDawson\Blocks\Controllers\BlockController;
use SilverStripe\Core\Config\Config;
use SilverStripe\View\Requirements;

/**
 * Class AccordionBlockController
 * @package Dynamic\DynamicBlocks\Controller
 */
class AccordionBlockController extends BlockController
{
    /**
     * @var string
     */
    private static $accordion_class = 'accordion-block';

    /**
     *
     */
    public function init()
    {
        $class = $this->AccordionClass();
        Requirements::javascript(THIRDPARTY_DIR . '/jquery-ui/jquery-ui.js');
        Requirements::customScript('
            $(function() {
                $( ".' . $class . '" ).accordion({
                    header: ".accord-header",
                    collapsible: true, heightStyle: "content"
                });
            });
        ', 'DynamicAccordionBlock');
    }

    /**
     * @return array
     */
    public function AccordionClass()
    {
        return Config::inst()->get(static::class, 'accordion_class');
    }
}
