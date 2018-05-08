<?php

namespace Dynamic\DynamicBlocks\Test;

use Dynamic\DynamicBlocks\Block\CallToActionBlock;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

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
        $object = singleton(CallToActionBlock::class);
        $this->assertEquals('Call To Action Blocks', $object->plural_name());
    }

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture(CallToActionBlock::class, 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
        //$this->assertNotNull($fields->dataFieldByName('BlockLinkID')); // todo readd once Linkable is SS4 compatible
    }

    /**
     *
     */
    /* // todo readd once Linkable is SS4 compatible
    public function testGetTitle()
    {
        $object = $this->objFromFixture(CallToActionBlock::class, 'one');
        $link = $object->BlockLink();
        $this->assertEquals($link->Title, $object->getTitle());
    }
    */
}
