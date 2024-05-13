<?php

use EncoreDigitalGroup\StdLib\Objects\Number;

test('toInt method converts a value to an integer', function () {
    $floatNumber = 3.14;

    $integerNumber = Number::toInt($floatNumber);

    expect(is_int($integerNumber))->toBeTrue()
        ->and($integerNumber)->toEqual(3);

});