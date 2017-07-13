<?php

namespace Dynamic\DynamicBlocks\Test;

use Dynamic\DynamicBlocks\Block\EmbedBlock;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

class EmbedBlockTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = 'dynamic-blocks/tests/Fixtures.yml';

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture(EmbedBlock::class, 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
        //$this->assertNotNull($fields->dataFieldByName('EmbeddedObject')); // todo readd once Linkable is SS4 compatible
    }
}
