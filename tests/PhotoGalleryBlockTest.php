<?php

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
        $object = singleton('PhotoGalleryBlock');
        $this->assertEquals('Photo Gallery Blocks', $object->plural_name());
    }

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = singleton('PhotoGalleryBlock');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf('FieldList', $fields);
        $this->assertNull($fields->dataFieldByName('Images'));

        $object = $this->objFromFixture('PhotoGalleryBlock', 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf('FieldList', $fields);
        $this->assertNotNull($fields->dataFieldByName('Images'));
    }
}
