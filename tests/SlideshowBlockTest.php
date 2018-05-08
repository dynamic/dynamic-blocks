<?php

namespace Dynamic\DynamicBlocks\Test;

use Dynamic\DynamicBlocks\Block\SlideshowBlock;
use SilverStripe\Dev\SapphireTest;

class SlideshowBlockTest extends SapphireTest
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
        $object = singleton(SlideshowBlock::class);
        $this->assertEquals('Slideshow Blocks', $object->plural_name());
    }
}