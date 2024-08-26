<?php

namespace Modules\Blog\Components;

use App\View\Components\PageComponent;
use Modules\Blog\Models\BlogArticle;

class BlogArticlePage extends PageComponent
{
    public function __construct(BlogArticle $entity)
    {
        $component = 'blog::blog-article-component';
        $defaultTemplate = setting(config('settings.blog.article.template'), []);
        parent::__construct($entity, $component, defaultTemplate: $defaultTemplate);
    }
}
