<?php

namespace Dynamic\DynamicBlocks\Test;

use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

class DynamicBlocksSiteTreeDataExtensionTest extends SapphireTest
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
        $object = singleton(\Page::class);
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
    }
}
