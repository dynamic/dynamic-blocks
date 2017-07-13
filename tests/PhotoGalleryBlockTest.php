<?php

namespace Dynamic\DynamicBlocks\Test;

use Dynamic\DynamicBlocks\Block\PhotoGalleryBlock;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

class PhotoGalleryBlockTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = 'dynamic-blocks/tests/Fixtures.yml';

    /**
     *
     */
    public function testPluralName()
    {
        $object = singleton(PhotoGalleryBlock::class);
        $this->assertEquals('Photo Gallery Blocks', $object->plural_name());
    }

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = singleton(PhotoGalleryBlock::class);
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
        $this->assertNull($fields->dataFieldByName('Images'));

        $object = $this->objFromFixture(PhotoGalleryBlock::class, 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
        $this->assertNotNull($fields->dataFieldByName('Images'));
    }
}
