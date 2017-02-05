<?php

class CallToActionBlockTest extends SapphireTest
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
        $object = singleton('CallToActionBlock');
        $this->assertEquals('Call To Action Blocks', $object->plural_name());
    }

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture('CallToActionBlock', 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf('FieldList', $fields);
        $this->assertNotNull($fields->dataFieldByName('BlockLinkID'));
    }

    /**
     *
     */
    public function testGetTitle()
    {
        $object = $this->objFromFixture('CallToActionBlock', 'one');
        $link = $object->BlockLink();
        $this->assertEquals($link->Title, $object->getTitle());
    }
}
