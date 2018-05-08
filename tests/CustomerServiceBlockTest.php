<?php

namespace Dynamic\DynamicBlocks\Test;

use Dynamic\DynamicBlocks\Block\CustomerServiceBlock;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

class CustomerServiceBlockTest extends SapphireTest
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
        $object = singleton(CustomerServiceBlock::class);
        $this->assertEquals('Customer Service Blocks', $object->plural_name());
    }

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture(CustomerServiceBlock::class, 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
        //$this->assertNotNull($fields->dataFieldByName('Address')); // todo readd once Addressable is SS4 compatible
    }
}