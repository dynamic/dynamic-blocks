<?php

if (!class_exists('Blog')) {
    return;
}

class RecentBlogPostsBlockTest extends SapphireTest
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
        $object = $this->objFromFixture('RecentBlogPostsBlock', 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf('FieldList', $fields);
        $this->assertNull($fields->dataFieldByName('SortOrder'));
    }

    /**
     *
     */
    public function testCanView()
    {
        $object = $this->objFromFixture('RecentBlogPostsBlock', 'one');
        $admin = $this->objFromFixture('Member', 'admin');
        $member = $this->objFromFixture('Member', 'default');
        if (class_exists('Blog')) {
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
        $object = $this->objFromFixture('RecentBlogPostsBlock', 'one');
        $admin = $this->objFromFixture('Member', 'admin');
        $member = $this->objFromFixture('Member', 'default');
        if (class_exists('Blog')) {
            $this->assertTrue($object->canCreate($admin));
            $this->assertTrue($object->canCreate($member));
        } else {
            $this->assertFalse($object->canCreate($admin));
            $this->assertFalse($object->canCreate($member));
        }
    }
}