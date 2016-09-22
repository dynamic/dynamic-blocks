<?php

class RelatedArticlesBlock extends Block
{
    /**
     * @var string
     */
    private static $singular_name = 'Related Articles Block';

    /**
     * @var string
     */
    private static $plural_name = 'Related Articles Blocks';

    public function getArticles($page = null)
    {
        if (!$page) {
            $page = $this->getCurrentPage();
        }
        if ($page->Classname == 'WorkPage') {
            return $page->Articles()->sort('Created DESC')->limit(4);
        }
    }
}