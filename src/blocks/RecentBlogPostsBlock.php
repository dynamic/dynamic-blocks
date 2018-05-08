<?php

namespace Dynamic\DynamicBlocks\Block;

use SheaDawson\Blocks\Model\Block;
use SilverStripe\Blog\Model\Blog;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\NumericField;

if (!class_exists(Blog::class)) {
    return;
}

/**
 * Class RecentBlogPostsBlock
 */
class RecentBlogPostsBlock extends Block
{
    /**
     * @var string
     */
    private static $singular_name = 'Recent Blog Posts Block';

    /**
     * @var string
     */
    private static $plural_name = 'Recent Blog Posts Blocks';

    /**
     * @var array
     */
    private static $db = array(
        'Limit' => 'Int',
    );

    /**
     * @var array
     */
    private static $has_one = array(
        'Blog' => Blog::class,
    );

    /**
     * @var string
     */
    private static $table_name = 'RecentBlogPostsBlock';

    /**
     * @var array
     */
    private static $defaults = array(
        'Limit' => 3,
    );

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = singleton(Block::class)->getCMSFields();

        $fields->addFieldsToTab('Root.Main', array(
            NumericField::create('Limit'),
        ));

        if (class_exists(Blog::class)) {
            $fields->addFieldToTab(
                'Root.Main',
                DropdownField::create('BlogID', 'Featured Blog', Blog::get()->map())
                    ->setEmptyString('')
            );
        }

        return $fields;
    }

    /**
     * @param null $member
     * @param array $context
     * @return bool
     */
    public function canCreate($member = NULL, $context = [])
    {
        if (!class_exists(Blog::class)) {
            return false;
        }
        return parent::canCreate();
    }

    /**
     * @param null $member
     * @param array $context
     * @return bool
     */
    public function canView($member = NULL, $context = [])
    {
        if (!class_exists(Blog::class)) {
            return false;
        }
        return parent::canView();
    }
}