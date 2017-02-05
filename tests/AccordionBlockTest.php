1`<?php

class AccordionBlockTest extends SapphireTest
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
        $object = singleton('AccordionBlock');
        $this->assertEquals('Accordion Blocks', $object->plural_name());
    }

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture('AccordionBlock', 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf('FieldList', $fields);
        $this->assertNotNull($fields->dataFieldByName('Panels'));
    }

    /**
     *
     */
    public function testGetPanelList()
    {
        $object = $this->objFromFixture('AccordionBlock', 'one');
        $panels = $object->Panels()->sort('Sort');
        $this->assertEquals($panels, $object->getPanelList());
    }
}

class AccordionBlock_ControllerTest extends FunctionalTest
{
    /**
     *
     */
    public function testAccordionClass()
    {
        $object = singleton('AccordionBlock_Controller');
        $expected = Config::inst()->get('AccordionBlock_Controller', 'accordion_class');
        $this->assertEquals($object->AccordionClass(), $expected);
    }
}
