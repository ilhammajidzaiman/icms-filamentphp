<?php

namespace App\Filament\Resources\Post\BlogArticles\Pages;

use App\Filament\Resources\Post\BlogArticles\BlogArticleResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewBlogArticle extends ViewRecord
{
    protected static string $resource = BlogArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
