1`<?php

class EmailSignupBlockTest extends SapphireTest
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
        $object = singleton('EmailSignupBlock');
        $this->assertEquals('Email Signup Blocks', $object->plural_name());
    }

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture('EmailSignupBlock', 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf('FieldList', $fields);
        $this->assertNotNull($fields->dataFieldByName('EmbedCode'));
    }
}