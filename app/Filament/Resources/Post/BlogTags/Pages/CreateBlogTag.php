<?php

namespace App\Filament\Resources\Post\BlogTags\Pages;

use App\Filament\Resources\Post\BlogTags\BlogTagResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBlogTag extends CreateRecord
{
    protected static string $resource = BlogTagResource::class;
}
