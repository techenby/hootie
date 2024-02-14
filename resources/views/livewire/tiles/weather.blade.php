<?php

use Livewire\Volt\Component;

new class extends Component {
    public $data;
}; ?>

<x-tile :width="$data['width']" :height="$data['height']">
    <p>Plainfield</p>
    <div class="w-full flex justify-between">
        <div class="text-xl">31°</div>
        <div>
            <p>H: 41°</p>
            <p>L: 28°</p>
        </div>
    </div>

    <table class="w-full">
        <tr>
            <th>Wed</th>
            <td>☀︎</td>
            <td>25</td>
            <td>45°</td>
        </tr>
        <tr>
            <th>Thu</th>
            <td>💨</td>
            <td>29</td>
            <td>43°</td>
        </tr>
        <tr>
            <th>Fri</th>
            <td>☁︎</td>
            <td>24</td>
            <td>35°</td>
        </tr>
        <tr>
            <th>Sat</th>
            <td>☀︎</td>
            <td>18</td>
            <td>33°</td>
        </tr>
    </table>
</x-tile>
