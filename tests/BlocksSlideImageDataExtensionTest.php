<?php

namespace Dynamic\DynamicBlocks\Test;

use Dynamic\DynamicBlocks\ORM\DynamicContentBlockDataExtension;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;

class BlocksSlideImageDataExtensionTest extends DataExtension
{
    /**
     * @var string
     */
    protected static $fixture_file = 'dynamic-blocks/tests/Fixtures.yml';

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture('SlideImage', 'one');
        $fields = $object->getCMSFields();
        $extension = new DynamicContentBlockDataExtension();
        $extension->updateCMSFields($fields);

        $this->assertInstanceOf(FieldList::class, $fields);
        $this->assertNotNull($fields->dataFieldByName('SlideshowBlock'));
    }
}