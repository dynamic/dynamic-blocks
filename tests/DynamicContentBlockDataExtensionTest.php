<?php

namespace Dynamic\DynamicBlocks\Test;

use Dynamic\DynamicBlocks\ORM\DynamicContentBlockDataExtension;
use SheaDawson\Blocks\Model\ContentBlock;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

class DynamicContentBlockDataExtensionTest extends SapphireTest
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
        $object = $this->objFromFixture(ContentBlock::class, 'one');
        $fields = $object->getCMSFields();
        $extension = new DynamicContentBlockDataExtension();
        $extension->updateCMSFields($fields);

        $this->assertInstanceOf(FieldList::class, $fields);
        $this->assertNotNull($fields->dataFieldByName('Image'));
    }
}