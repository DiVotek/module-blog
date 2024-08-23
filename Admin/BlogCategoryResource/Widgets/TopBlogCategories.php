<?php

namespace Modules\Blog\Admin\BlogCategoryResource\Widgets;

use App\Services\TableSchema;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Contracts\Support\Htmlable;
use Modules\Blog\Models\BlogCategory;
use Modules\Category\Models\Category;

class TopBlogCategories extends BaseWidget
{
    protected static ?int $sort = 5;

    protected function getTableHeading(): string|Htmlable|null
    {
        return __('Top blog categories');
    }

    public function table(Table $table): Table
    {
        $currentModel = BlogCategory::class;

        return $table
            ->searchable(false)
            ->query(function () use ($currentModel) {
                return $currentModel::query()->orderBy('views', 'desc')->take(5);
            })
            ->columns([
                TableSchema::getName(),
                TableSchema::getViews(),
            ])->actions([
                Action::make('View')
                    ->label(__('View'))
                    ->icon('heroicon-o-eye')
                    ->url(function ($record) {
                        $category = Category::find($record->parent_id);
                        if ($category) {
                            return '/' . $category->slug . '/' . $record->slug;
                        }

                        return '/' . $record->slug;
                    }),
            ])->paginated(false)->defaultPaginationPageOption(5);
    }
}
