<?php

class RecentBlogPostsBlockTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = 'jansa/tests/Fixtures.yml';

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture('RecentBlogPostsBlock', 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf('FieldList', $fields);
        $this->assertNotNull($fields->dataFieldByName('BlogID'));
    }
}