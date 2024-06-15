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
            ->assertSee('Compare Recent and Old Data through CSV files');
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

test('it has the recent data input with the correct attributes', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/')
            ->assertSee('Recent Data')
            ->assertVisible('@label_recent_data')
            ->assertAttribute('@label_recent_data', 'for', 'recent_data')
            ->assertVisible('@recent_data')
            ->assertAttribute('@recent_data', 'accept', '.csv')
            ->assertAttribute('@recent_data', 'id', 'recent_data')
            ->assertAttribute('@recent_data', 'name', 'recent_data')
            ->assertAttribute('@recent_data', 'required', 'true')
            ->assertAttribute('@recent_data', 'type', 'file');
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

test('it validates the data files as required', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/')
            ->script("document.querySelector('#form_compare').noValidate = true");

        $browser->press('@submit_compare')
            ->assertSee('The recent data field is required.')
            ->assertSee('The old data field is required.');
    });
});
