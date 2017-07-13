<?php

namespace Dynamic\DynamicBlocks\Test;

use Dynamic\DynamicBlocks\Block\EmailSignupBlock;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

class EmailSignupBlockTest extends SapphireTest
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
        $object = singleton(EmailSignupBlock::class);
        $this->assertEquals('Email Signup Blocks', $object->plural_name());
    }

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture(EmailSignupBlock::class, 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
        $this->assertNotNull($fields->dataFieldByName('EmbedCode'));
    }
}