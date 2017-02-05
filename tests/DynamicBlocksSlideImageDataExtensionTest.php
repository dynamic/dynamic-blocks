<?php

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
        $object = singleton('SlideImage');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf('FieldList', $fields);
        $this->assertNull($fields->dataFieldByName('SlideshowBlockID'));
    }
}