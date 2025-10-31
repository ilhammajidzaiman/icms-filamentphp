<?php

namespace App\Filament\Resources\Post\BlogArticles\Pages;

use App\Filament\Resources\Post\BlogArticles\BlogArticleResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBlogArticle extends CreateRecord
{
    protected static string $resource = BlogArticleResource::class;
}
