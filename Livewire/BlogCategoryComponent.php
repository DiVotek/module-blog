<?php

namespace Modules\Blog\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Blog\Models\BlogArticle;
use Modules\Blog\Models\BlogCategory;

class BlogCategoryComponent extends Component
{
    use WithPagination;

    public $page;
    public $url;

    public function mount(BlogCategory $entity){
        $this->page = $entity;
        $this->url = url()->current();
    }

    public function render()
    {
        $component = setting(config('settings.blog.category.design'), 'blog-category.default');
        return view('template::' . $component,[
            'categories' => BlogCategory::query()->get(),
            'articles' => $this->page->articles()->paginate(12),
        ]);
    }
}
