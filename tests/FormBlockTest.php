<?php

namespace Dynamic\DynamicBlocks\Test;

use Dynamic\DynamicBlocks\Block\FormBlock;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;
use SilverStripe\Security\Member;

class FormBlockTest extends SapphireTest
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
        $object = singleton(FormBlock::class);
        $this->assertEquals('Form Blocks', $object->plural_name());
    }

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture(FormBlock::class, 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
    }

    /**
     *
     */
    public function testBlockForm()
    {
        if (class_exists('UserDefinedForm')) {
            $object = $this->objFromFixture(FormBlock::class, 'one');
            $form = $object->Form();
            $this->assertInstanceOf('UserDefinedForm', $form);
        }
    }

    /**
     *
     */
    public function testCanView()
    {
        $object = $this->objFromFixture(FormBlock::class, 'one');
        $admin = $this->objFromFixture(Member::class, 'admin');
        $member = $this->objFromFixture(Member::class, 'default');
        if (class_exists('UserDefinedForm')) {
            $this->assertTrue($object->canView($admin));
            $this->assertTrue($object->canView($member));
        } else {
            $this->assertFalse($object->canView($admin));
            $this->assertFalse($object->canView($member));
        }
    }

    /**
     *
     */
    public function testCanCreate()
    {
        $object = $this->objFromFixture(FormBlock::class, 'one');
        $admin = $this->objFromFixture(Member::class, 'admin');
        $member = $this->objFromFixture(Member::class, 'default');
        if (class_exists('UserDefinedForm')) {
            $this->assertTrue($object->canCreate($admin));
            $this->assertTrue($object->canCreate($member));
        } else {
            $this->assertFalse($object->canCreate($admin));
            $this->assertFalse($object->canCreate($member));
        }
    }
}