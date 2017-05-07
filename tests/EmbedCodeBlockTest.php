<?php

class EmbedCodeBlockTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = 'dynamic-blocks/tests/Fixtures.yml';

    /**
     *
     */
    public function testGetPluralName()
    {
        $object = singleton('EmbedCodeBlock');
        $this->assertEquals('Embed Code Blocks', $object->plural_name());
    }

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture('EmbedCodeBlock', 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf('FieldList', $fields);
        $this->assertNotNull($fields->dataFieldByName('Code'));
    }

}