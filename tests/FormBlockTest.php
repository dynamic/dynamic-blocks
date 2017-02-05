<?php

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
        $object = singleton('FormBlock');
        $this->assertEquals('Form Blocks', $object->plural_name());
    }

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture('FormBlock', 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf('FieldList', $fields);
    }

    /**
     *
     */
    public function testBlockForm()
    {
        if (class_exists('UserDefinedForm')) {
            $object = $this->objFromFixture('FormBlock', 'one');
            $form = $object->Form();
            $this->assertInstanceOf('UserDefinedForm', $form);
        }
    }

    /**
     *
     */
    public function testCanView()
    {
        $object = $this->objFromFixture('FormBlock', 'one');
        $admin = $this->objFromFixture('Member', 'admin');
        $member = $this->objFromFixture('Member', 'default');
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
        $object = $this->objFromFixture('FormBlock', 'one');
        $admin = $this->objFromFixture('Member', 'admin');
        $member = $this->objFromFixture('Member', 'default');
        if (class_exists('UserDefinedForm')) {
            $this->assertTrue($object->canCreate($admin));
            $this->assertTrue($object->canCreate($member));
        } else {
            $this->assertFalse($object->canCreate($admin));
            $this->assertFalse($object->canCreate($member));
        }
    }
}