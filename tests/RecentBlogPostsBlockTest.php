<?php

namespace Dynamic\DynamicBlocks\Test;

use Dynamic\DynamicBlocks\Block\RecentBlogPostsBlock;
use SilverStripe\Blog\Model\Blog;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;
use SilverStripe\Security\Member;

if (!class_exists(Blog::class)) {
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
        $object = $this->objFromFixture(RecentBlogPostsBlock::class, 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
        $this->assertNull($fields->dataFieldByName('SortOrder'));
    }

    /**
     *
     */
    public function testCanView()
    {
        $object = $this->objFromFixture(RecentBlogPostsBlock::class, 'one');
        $admin = $this->objFromFixture(Member::class, 'admin');
        $member = $this->objFromFixture(Member::class, 'default');
        if (class_exists(Blog::class)) {
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
        $object = $this->objFromFixture(RecentBlogPostsBlock::class, 'one');
        $admin = $this->objFromFixture(Member::class, 'admin');
        $member = $this->objFromFixture(Member::class, 'default');
        if (class_exists(Blog::class)) {
            $this->assertTrue($object->canCreate($admin));
            $this->assertTrue($object->canCreate($member));
        } else {
            $this->assertFalse($object->canCreate($admin));
            $this->assertFalse($object->canCreate($member));
        }
    }
}