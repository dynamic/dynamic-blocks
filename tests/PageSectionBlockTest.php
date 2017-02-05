<?php

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
        $object = singleton('PageSectionBlock');
        $this->assertEquals('Page Sections Blocks', $object->plural_name());
    }

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture('PageSectionBlock', 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf('FieldList', $fields);
        $this->assertNotNull($fields->dataFieldByName('Sections'));
    }

    /**
     *
     */
    public function testGetPageSections()
    {
        $object = $this->objFromFixture('PageSectionBlock', 'one');
        $expected = $object->Sections()->sort('SortOrder');
        $this->assertEquals($expected, $object->getPageSections());
    }

}