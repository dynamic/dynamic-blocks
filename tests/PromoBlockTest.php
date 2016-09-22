<?php

class PromoBlockTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = 'jansa/tests/Fixtures.yml';

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = singleton('PromoBlock');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf('FieldList', $fields);
        $this->assertNull($fields->dataFieldByName('Promos'));

        $object = $this->objFromFixture('PromoBlock', 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf('FieldList', $fields);
        $this->assertNotNull($fields->dataFieldByName('Promos'));
    }

    public function testGetPromoList()
    {
        $object = $this->objFromFixture('PromoBlock', 'one');
        $this->assertInstanceOf("DataList", $object->getPromoList());
        $this->assertEquals($object->getPromoList(), $object->Promos()->sort('SortOrder'));
    }
}