<?php

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
        $this->assertFalse($object->canView($admin));
        $member = $this->objFromFixture('Member', 'default');
        $this->assertFalse($object->canView($member));
    }

    /**
     *
     */
    public function testCanCreate()
    {
        $object = $this->objFromFixture('RecentBlogPostsBlock', 'one');
        $admin = $this->objFromFixture('Member', 'admin');
        $this->assertFalse($object->canCreate($admin));
        $member = $this->objFromFixture('Member', 'default');
        $this->assertFalse($object->canCreate($member));
    }
}