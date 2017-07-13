<?php

namespace Dynamic\DynamicBlocks\Test;

use Dynamic\DynamicBlocks\Block\EmbedCodeBlock;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

class EmbedCodeBlockTest extends SapphireTest
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
        $object = singleton(EmbedCodeBlock::class);
        $this->assertEquals('Embed Code Blocks', $object->plural_name());
    }

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture(EmbedCodeBlock::class, 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
        $this->assertNotNull($fields->dataFieldByName('Code'));
    }

}