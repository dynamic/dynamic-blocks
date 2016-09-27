<?php

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
        $extension = new ContentBlockDataExtension();
        $extension->updateCMSFields($fields);

        $this->assertInstanceOf('FieldList', $fields);
        $this->assertNotNull($fields->dataFieldByName('SlideshowBlock'));
    }
}