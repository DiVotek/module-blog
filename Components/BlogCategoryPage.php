<?php

namespace Modules\Blog\Components;

use App\View\Components\PageComponent;
use Modules\Blog\Models\BlogCategory;

class BlogCategoryPage extends PageComponent
{
    public function __construct(BlogCategory $entity)
    {
        $component = 'blog::blog-category-component';
        $defaultTemplate = setting(config('settings.blog.category.template'), []);
        parent::__construct($entity, $component, defaultTemplate: $defaultTemplate);
    }
}
