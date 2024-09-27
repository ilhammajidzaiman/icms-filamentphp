<?php

namespace App\Filament\Widgets;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use App\Models\Post\BlogArticle;
use Filament\Widgets\ChartWidget;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;

class BlogArticleChart extends ChartWidget
{
    use HasWidgetShield;

    protected static ?string $heading = 'Post perbulan';
    protected int | string | array $columnSpan = 'full';
    protected static string $color = 'info';
    protected static ?string $maxHeight = '300px';
    protected static bool $isLazy = true;
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = Trend::model(BlogArticle::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();
        return [
            'datasets' => [
                [
                    'label' => 'Post',
                    // 'backgroundColor' => '#36A2EB',
                    // 'borderColor' => '#9BD0F5',
                    'fill' => 'start',
                    'data' => $data->map(fn(TrendValue $value) => $value->aggregate),
                ],
            ],
            // 'labels' => $data->map(fn (TrendValue $value) => $value->date),
            'labels' => ['Januari', 'Februari', 'Maret', 'April', 'Mai', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    public function getDescription(): ?string
    {
        return 'Statistik jumlah post artikel perbulan.';
    }
}
