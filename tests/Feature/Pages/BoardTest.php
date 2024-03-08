<?php

use App\Models\Board;

it('can be viewed', function () {
    $board = Board::factory()->create([
        'tiles' => [
            [
                'data' => [
                    'type' => 'blade',
                    'width' => 1,
                    'height' => 1,
                    'timezone' => 'America/Chicago',
                ],
                'type' => 'clock-analog',
            ],
        ],
    ]);

    $this->get(route('boards.show', ['board' => $board, 'token' => $board->token]))
        ->assertOk()
        ->assertSee('clock');
});

it('cannot be viewed without token', function () {
    $board = Board::factory()->create();

    $this->get(route('boards.show', ['board' => $board]))
        ->assertStatus(404);
});

it('cannot be viewed if token does not match', function () {
    $board = Board::factory()->create([
        'token' => 'hootie',
    ]);

    $this->get(route('boards.show', ['board' => $board, 'token' => 'king']))
        ->assertStatus(404);
});
