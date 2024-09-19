<?php

namespace Modules\Blog\Livewire;

use App\Models\StaticPage;
use App\Models\SystemPage;
use Livewire\Component;

class BlogComponent extends Component
{
    public StaticPage $page;
    public string $url;

    public function mount(StaticPage $entity)
    {
        $this->url = url()->current();
        $this->page = $entity;
    }
    public function render()
    {
        $page = SystemPage::query()->where('page_id', $this->page->id)->first();
        $design = 'blog.default';
        if ($page && $page->design) {
            $design = $page->design;
        }
        return view('template::' . $design, [
        ]);
    }
}
