<?php

namespace Dynamic\DynamicBlocks\Test;

use Dynamic\DynamicBlocks\Block\PageSectionBlock;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

/**
 * Class PageSectionBlockTest
 */
class PageSectionBlockTest extends SapphireTest
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
        $object = singleton(PageSectionBlock::class);
        $this->assertEquals('Page Sections Blocks', $object->plural_name());
    }

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture(PageSectionBlock::class, 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
        $this->assertNotNull($fields->dataFieldByName('Sections'));
    }

    /**
     *
     */
    public function testGetPageSections()
    {
        $object = $this->objFromFixture(PageSectionBlock::class, 'one');
        $expected = $object->Sections()->sort('SortOrder');
        $this->assertEquals($expected, $object->getPageSections());
    }

}