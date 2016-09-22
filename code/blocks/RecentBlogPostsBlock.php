<?php

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
     *
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab('Root.Main', array(
            NumericField::create('Limit'),
            DropdownField::create('BlogID', 'Featured Blog', Blog::get()->map())
                ->setEmptyString(''),
        ));

        return $fields;
    }
}