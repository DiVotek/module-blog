<?php

namespace Modules\Blog\Livewire;

use Livewire\Component;

class BlogCategoryComponent extends Component
{
    public function render()
    {
        $component = setting(config('settings.blog.category.design'), 'blog-category.default');
        return view('template::' . $component);
    }
}
