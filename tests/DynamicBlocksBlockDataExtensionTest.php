<?php

/**
 * Class DynamicBlocksBlockDataExtensionTest
 */
class DynamicBlocksBlockDataExtensionTest extends SapphireTest
{

    /**
     *
     */
    public function testUpdateCMSFields()
    {
        $block = Injector::inst()->get('Block');
        $this->assertInstanceOf('TextField', $block->getCMSFields()->dataFieldByName('Name'));
    }

}