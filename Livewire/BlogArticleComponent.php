<?php

namespace Modules\Blog\Livewire;

use Livewire\Component;

class BlogArticleComponent extends Component
{
    public function render()
    {
        $component = setting(config('settings.blog.article.design'), 'blog-post.default');
        return view('template::' . $component);
    }
}
