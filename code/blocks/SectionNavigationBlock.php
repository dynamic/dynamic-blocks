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
            if ($page->Children()->Count() > 0) {
                return $page->Children();
            } else if ($page->Parent()) {
                return $page->Parent()->Children();
            } else {
                return false;
            }
        }

        return false;
    }

}
