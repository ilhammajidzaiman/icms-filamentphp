<?php

namespace App\Filament\Resources\Post\BlogArticleResource\Pages;

use App\Filament\Resources\Post\BlogArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBlogArticle extends ViewRecord
{
    protected static string $resource = BlogArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
