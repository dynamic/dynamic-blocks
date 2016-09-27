<?php

class DynamicContentBlockDataExtensionTest extends SapphireTest
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
        $object = $this->objFromFixture('ContentBlock', 'one');
        $fields = $object->getCMSFields();
        $extension = new DynamicContentBlockDataExtension();
        $extension->updateCMSFields($fields);

        $this->assertInstanceOf('FieldList', $fields);
        $this->assertNotNull($fields->dataFieldByName('Image'));
    }
}