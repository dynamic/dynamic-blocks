<?php

class ContentBlockDataExtensionTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = 'jansa/tests/Fixtures.yml';

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture('ContentBlock', 'one');
        $fields = $object->getCMSFields();
        $extension = new ContentBlockDataExtension();
        $extension->updateCMSFields($fields);

        $this->assertInstanceOf('FieldList', $fields);
        $this->assertNotNull($fields->dataFieldByName('Image'));
    }
}