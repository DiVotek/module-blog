<?php

namespace Modules\Blog\Livewire;

use Livewire\Component;
use Modules\Blog\Models\BlogArticle;
use Modules\Blog\Models\BlogCategory;

class BlogArticleComponent extends Component
{
    public $page;
    public $url;

    public function mount(BlogArticle $entity)
    {
        $this->page = $entity;
        $this->url = url()->current();
    }
    public function render()
    {
        $component = setting(config('settings.blog.article.design'), 'blog-post.default');
        return view('template::' . $component, [
            'categories' => BlogCategory::query()->get(),
        ]);
    }
}
