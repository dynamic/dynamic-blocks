<?php

if (!class_exists('Blog')) {
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
        'Blog' => 'Blog',
    );

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
        $fields = singleton('Block')->getCMSFields();

        $fields->addFieldsToTab('Root.Main', array(
            NumericField::create('Limit'),
        ));

        if (class_exists('Blog')) {
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
     * @return bool
     */
    public function canCreate($member = null)
    {
        if (!class_exists('Blog')) {
            return false;
        }
        return parent::canCreate();
    }

    /**
     * @param null $member
     * @return bool
     */
    public function canView($member = null)
    {
        if (!class_exists('Blog')) {
            return false;
        }
        return parent::canView();
    }
}