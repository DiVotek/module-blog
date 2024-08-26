<?php

namespace Modules\Blog\Admin\BlogArticleResource\Pages;

use Modules\Blog\Admin\BlogArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlogArticle extends EditRecord
{
    protected static string $resource = BlogArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ViewAction::make()->url(fn($record) => $record->route())->openUrlInNewTab(true),
        ];
    }
}
