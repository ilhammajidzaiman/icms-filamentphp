<?php

namespace App\Filament\Resources\Post\BlogCategories\Pages;

use App\Filament\Resources\Post\BlogCategories\BlogCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBlogCategory extends CreateRecord
{
    protected static string $resource = BlogCategoryResource::class;
}
