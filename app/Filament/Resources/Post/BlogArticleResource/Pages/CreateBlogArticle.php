<?php

namespace App\Filament\Resources\Post\BlogArticleResource\Pages;

use App\Filament\Resources\Post\BlogArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBlogArticle extends CreateRecord
{
    protected static string $resource = BlogArticleResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->user()->id;
        $data['visitor'] = 0;
        return $data;
    }
}
