<?php

namespace Dynamic\DynamicBlocks\Test;

use Dynamic\FlexSlider\Model\SlideImage;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

class DynamicBlocksSlideImageDataExtensionTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = 'dynamic-blocks/tests/Fixtures.yml';

    /**
     *
     */
    public function testUpdateCMSFields()
    {
        $object = singleton(SlideImage::class);
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
        $this->assertNull($fields->dataFieldByName('SlideshowBlockID'));
    }
}