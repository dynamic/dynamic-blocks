<?php

namespace Dynamic\DynamicBlocks\Test;

use Dynamic\DynamicBlocks\Block\AccordionBlock;
use Dynamic\DynamicBlocks\Block\AccordionBlockController;
use SilverStripe\Core\Config\Config;
use SilverStripe\Dev\FunctionalTest;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

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
        $object = singleton(AccordionBlock::class);
        $this->assertEquals('Accordion Blocks', $object->plural_name());
    }

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture(AccordionBlock::class, 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
        $this->assertNotNull($fields->dataFieldByName('Panels'));
    }

    /**
     *
     */
    public function testGetPanelList()
    {
        $object = $this->objFromFixture(AccordionBlock::class, 'one');
        $panels = $object->Panels()->sort('Sort');
        $this->assertEquals($panels, $object->getPanelList());
    }
}

class AccordionBlockControllerTest extends FunctionalTest
{
    /**
     *
     */
    public function testAccordionClass()
    {
        $object = singleton(AccordionBlockController::class);
        $expected = Config::inst()->get(AccordionBlockController::class, 'accordion_class');
        $this->assertEquals($object->AccordionClass(), $expected);
    }
}
