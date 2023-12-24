<?php

use App\Filament\Resources\PointResource;
use App\Filament\Resources\PointResource\Pages\CreatePoint;
use App\Filament\Resources\PointResource\Pages\EditPoint;
use App\Models\Point;
use App\Models\User;
use Illuminate\Support\Facades\Http;

use function Pest\Laravel\{actingAs};
use function Pest\Livewire\livewire;
use function PHPUnit\Framework\assertEquals;

it('can view all points', function () {
    $user = User::factory()->create();

    actingAs($user)
        ->get(PointResource::getUrl('index'))
        ->assertStatus(200);
});

it('can view point create form', function () {
    $user = User::factory()->create();

    actingAs($user)
        ->get(PointResource::getUrl('create'))
        ->assertStatus(200);
});

it('can view point edit form', function () {
    $user = User::factory()->create();
    $point = Point::factory()->create();

    actingAs($user)
        ->get(PointResource::getUrl('edit', ['record' => $point]))
        ->assertStatus(200);
});

it('can store point', function () {
    Http::fake([
        '*' => Http::response([
            'lat' => 41.6322,
            'lon' => -88.212,
            'timezone' => 'America/Chicago',
            'timezone_offset' => -21600,
            'current' => [
                'dt' => 1703441924,
                'sunrise' => 1703423857,
                'sunset' => 1703456815,
                'temp' => 51.21,
                'feels_like' => 50.59,
                'pressure' => 1020,
                'humidity' => 97,
                'dew_point' => 50.38,
                'uvi' => 1.2,
                'clouds' => 100,
                'visibility' => 3219,
                'wind_speed' => 12.66,
                'wind_deg' => 150,
                'weather' => [
                    [
                        'id' => 701,
                        'main' => 'Mist',
                        'description' => 'mist',
                        'icon' => '50d',
                    ],
                ],
            ],
        ]),
    ]);

    $user = User::factory()->create();

    actingAs($user)
        ->livewire(CreatePoint::class)
        ->fillForm([
            'joint_pain' => 'none',
            'muscle_pain' => 'mild',
            'took_meds' => true,
            'notes' => 'no notes',
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Point::class, [
        'user_id' => $user->id,
        'joint_pain' => 'none',
        'muscle_pain' => 'mild',
        'took_meds' => true,
        'notes' => 'no notes',
        'today_temp' => 51.21,
        'today_weather' => 'mist',
        'yesterday_temp' => 51.21,
        'yesterday_weather' => 'mist',
    ]);
});

it('can edit point', function () {
    $point = Point::factory()->create([
        'yesterday_temp' => 50,
        'today_temp' => 30,
        'yesterday_weather' => 'sunny',
        'today_weather' => 'cloudy',
        'joint_pain' => 'mild',
        'muscle_pain' => 'moderate',
        'took_meds' => true,
    ]);

    livewire(EditPoint::class, ['record' => $point->getRouteKey()])
        ->assertFormSet([
            'joint_pain' => $point->joint_pain,
            'muscle_pain' => $point->muscle_pain,
            'took_meds' => $point->took_meds,
            'notes' => $point->notes,
        ])
        ->fillForm([
            'joint_pain' => 'none',
            'muscle_pain' => 'mild',
            'took_meds' => true,
            'notes' => 'no notes',
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    tap($point->fresh(), function ($point) {
        assertEquals(50, $point->yesterday_temp);
        assertEquals(30, $point->today_temp);
        assertEquals('sunny', $point->yesterday_weather);
        assertEquals('cloudy', $point->today_weather);
        assertEquals('none', $point->joint_pain);
        assertEquals('mild', $point->muscle_pain);
        assertEquals(true, $point->took_meds);
        assertEquals('no notes', $point->notes);
    });
});
