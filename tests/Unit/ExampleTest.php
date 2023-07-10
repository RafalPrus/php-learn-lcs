<?php

test('example', function () {
    expect(true)->toBeFalse('Not false...');
});

test('my first test', function () {
    expect(false)->toBeTrue('Should be true... Is it?');
});

test('my first test of array', function () {
    expect([1, 2, 3])->toBeArray('Should be array... Is it?');
});



