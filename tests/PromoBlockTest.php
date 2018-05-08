<?php

namespace Dynamic\DynamicBlocks\Test;

use Dynamic\DynamicBlocks\Block\PromoBlock;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataList;

class PromoBlockTest extends SapphireTest
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
        $object = singleton(PromoBlock::class);
        $this->assertEquals('Promos Blocks', $object->plural_name());
    }

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = singleton(PromoBlock::class);
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
        $this->assertNull($fields->dataFieldByName('Promos'));

        $object = $this->objFromFixture(PromoBlock::class, 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
        $this->assertNotNull($fields->dataFieldByName('Promos'));
    }

    public function testGetPromoList()
    {
        $object = $this->objFromFixture(PromoBlock::class, 'one');
        $this->assertInstanceOf(DataList::class, $object->getPromoList());
        $this->assertEquals($object->getPromoList(), $object->Promos()->sort('SortOrder'));
    }
}