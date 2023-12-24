<?php

namespace App\Filament\Widgets;

use App\Models\Point;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Widgets\Widget;

class LogPoint extends Widget implements HasForms, HasActions
{
    use InteractsWithActions;
    use InteractsWithForms;

    protected static string $view = 'filament.widgets.log-point';

    public function createAction()
    {
        return CreateAction::make()
            ->model(Point::class)
            ->createAnother(false)
            ->form([
                Radio::make('joint')
                    ->options([
                        'none' => 'None',
                        'mild' => 'Mild',
                        'moderate' => 'Moderate',
                        'severe' => 'Severe',
                    ]),
                Radio::make('muscle')
                    ->options([
                        'none' => 'None',
                        'mild' => 'Mild',
                        'moderate' => 'Moderate',
                        'severe' => 'Severe',
                    ]),
                Textarea::make('notes'),
            ]);
    }
}
