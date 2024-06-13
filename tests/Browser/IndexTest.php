<?php

use Laravel\Dusk\Browser;

test('it has the correct title', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/')
            ->assertTitle('TTR Data: Challenge');
    });
});

test('it has the compare text', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/')
            ->assertSee('Compare New and Old Data through CSV files');
    });
});

test('it has the form with the correct attributes', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/')
            ->assertVisible('@form_compare')
            ->assertAttribute('@form_compare', 'action', route('compare'))
            ->assertAttribute('@form_compare', 'enctype', 'multipart/form-data')
            ->assertAttribute('@form_compare', 'method', 'POST');
    });
});

test('it has the token in the form', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/')
            ->assertInputPresent('_token')
            ->assertMissing('_token');
    });
});

test('it has the new data input with the correct attributes', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/')
            ->assertSee('New Data')
            ->assertVisible('@label_new_data')
            ->assertAttribute('@label_new_data', 'for', 'new_data')
            ->assertVisible('@new_data')
            ->assertAttribute('@new_data', 'accept', '.csv')
            ->assertAttribute('@new_data', 'id', 'new_data')
            ->assertAttribute('@new_data', 'name', 'new_data')
            ->assertAttribute('@new_data', 'required', 'true')
            ->assertAttribute('@new_data', 'type', 'file');
    });
});

test('it has the old data input with the correct attributes', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/')
            ->assertSee('Old Data')
            ->assertVisible('@label_old_data')
            ->assertAttribute('@label_old_data', 'for', 'old_data')
            ->assertVisible('@old_data')
            ->assertAttribute('@old_data', 'accept', '.csv')
            ->assertAttribute('@old_data', 'id', 'old_data')
            ->assertAttribute('@old_data', 'name', 'old_data')
            ->assertAttribute('@old_data', 'required', 'true')
            ->assertAttribute('@old_data', 'type', 'file');
    });
});

test('it has the submit button with the correct attributes', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/')
            ->assertVisible('@submit_compare')
            ->assertAttribute('@submit_compare', 'type', 'submit')
            ->assertInputValue('@submit_compare', 'Compare');
    });
});
