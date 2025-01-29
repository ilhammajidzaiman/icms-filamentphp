<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Actions;
use Filament\Resources\Components\Tab;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\UserResource\Widgets\UserOverview;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            UserOverview::class,
        ];
    }

    public function getTabs(): array
    {
        $tabs = ['all' => Tab::make('Semua')
            ->icon('heroicon-o-bars-3'),];
        // $data = Model::get();
        // foreach ($data as $item) :
        //     $id = $item->id;
        //     $name = $item->name;
        //     $slug = str($name)->slug()->toString();
        //     $tabs[$slug] = Tab::make($name)
        //         ->badge(Model::query()
        //             ->where('id', $id)
        //             ->count())
        //         ->modifyQueryUsing(
        //             fn(Builder $query) => $query
        //                 ->where('id', $id)
        //         );
        // endforeach;
        return $tabs;
    }
}
