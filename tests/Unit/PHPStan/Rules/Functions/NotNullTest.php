<?php

use EncoreDigitalGroup\StdLib\Support\PHPStan\Rules\Functions\NotNull;
use PHPStan\Reflection\FunctionReflection;
use PHPStan\Analyser\Scope;
use PhpParser\Node;
use PHPStan\Type\BooleanType;

test('NotNull supports the not_null function', function () {
    $functionReflection = Mockery::mock(FunctionReflection::class);
    $functionReflection->shouldReceive('getName')->andReturn('not_null');

    $notNull = new NotNull();
    expect($notNull->isFunctionSupported($functionReflection))->toBeTrue();
});

test('NotNull does not support other functions', function () {
    $functionReflection = Mockery::mock(FunctionReflection::class);
    $functionReflection->shouldReceive('getName')->andReturn('other_function');

    $notNull = new NotNull();
    expect($notNull->isFunctionSupported($functionReflection))->toBeFalse();
});

it('returns BooleanType from function call', function () {
    $functionReflection = Mockery::mock(FunctionReflection::class);
    $functionCall = Mockery::mock(Node\Expr\FuncCall::class);
    $scope = Mockery::mock(Scope::class);

    $notNull = new NotNull();
    $type = $notNull->getTypeFromFunctionCall($functionReflection, $functionCall, $scope);

    expect($type)->toBeInstanceOf(BooleanType::class);
});