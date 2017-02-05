1`<?php

class DynamicBlocksSiteTreeDataExtensionTest extends SapphireTest
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
        $object = singleton('Page');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf('FieldList', $fields);
    }
}
