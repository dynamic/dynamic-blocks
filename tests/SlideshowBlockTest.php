1`<?php

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
        $object = singleton('SlideshowBlock');
        $this->assertEquals('Slideshow Blocks', $object->plural_name());
    }
}