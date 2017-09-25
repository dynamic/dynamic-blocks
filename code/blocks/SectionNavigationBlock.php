<?php

/**
 * Class SectionNavigationBlock
 */
class SectionNavigationBlock extends Block
{

    /**
     * @var string
     */
    private static $singular_name = 'Section Navigation Block';

    /**
     * @var string
     */
    private static $plural_name = 'Section Navigation Blocks';

    /**
     * @return bool
     */
    public function getSectionNavigation()
    {
        if ($page = $this->getCurrentPage()) {
            return $page->Children() ? $page->Children() : $page->Parent()->Children();
        }

        return false;
    }

}