<?php

namespace Modules\Blog\Models;

use App\Models\StaticPage;
use App\Models\SystemPage;
use App\Traits\HasBreadcrumbs;
use App\Traits\HasRoute;
use App\Traits\HasSlug;
use App\Traits\HasSorting;
use App\Traits\HasStatus;
use App\Traits\HasTeam;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasTable;
use App\Traits\HasTemplate;
use App\Traits\HasTimestamps;
use App\Traits\HasTranslate;
use App\Traits\HasViews;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Seo\Traits\HasSeo;

class BlogCategory extends Model
{
    use HasTable;
    use HasTimestamps;
    use HasSorting;
    use HasStatus;
    use HasTimestamps;
    use HasSlug;
    use HasSeo;
    use HasTranslate;
    use HasRoute;
    use HasBreadcrumbs;
    use HasViews;
    use HasTemplate;
    use HasTeam;

    public static function getDb(): string
    {
        return 'blog_categories';
    }

    protected $fillable = [
        'name',
        'image',
    ];

    public function articles(): HasMany
    {
        return $this->hasMany(BlogArticle::class);
    }
    public function route(): string
    {
        return tRoute('blog-category', ['category' => $this->slug]);
    }

    public function getBreadcrumbs(): array
    {
        $page = StaticPage::query()->slug(blog_slug())->first();
        return [
            $page->name ?? 'Blog' => tRoute('slug',[
                'slug' => blog_slug()
            ]),
            $this->name => $this->route(),
        ];
    }
}
