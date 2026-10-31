<?php

use EncoreDigitalGroup\StdLib\Exceptions\AssertionFailedException;
use EncoreDigitalGroup\StdLib\Objects\Support\Assert;
use EncoreDigitalGroup\StdLib\Objects\Support\Traits\Assertable;
use EncoreDigitalGroup\StdLib\Support\Internal\Generators\AssertableGenerator;

class AssertableTestObject
{
    use Assertable;

    public function assertStringValue(mixed $value): void
    {
        $this->assertString($value);
    }

    public function assertCountValue(mixed $value, mixed $count): void
    {
        $this->assertCount($value, $count);
    }

    public function assertTrueValue(mixed $value): void
    {
        $this->assertTrue($value);
    }

    public function assertNullValue(mixed $value): void
    {
        $this->assertNull($value);
    }
}

test('Assertable is generated from concrete Assert methods', function () {
    $assertMethods = (new ReflectionClass(Assert::class))->getMethods();
    $expectedMethods = array_map(
        static fn (ReflectionMethod $method): string => 'assert' . ucfirst($method->getName()),
        array_filter(
            $assertMethods,
            static fn (ReflectionMethod $method): bool => $method->isPublic()
                && $method->isStatic()
                && $method->getDeclaringClass()->getName() === Assert::class
                && $method->getName() !== '__callStatic',
        ),
    );

    $traitMethods = array_map(
        static fn (ReflectionMethod $method): string => $method->getName(),
        (new ReflectionClass(Assertable::class))->getMethods(),
    );

    expect($traitMethods)->toEqualCanonicalizing($expectedMethods)
        ->and(AssertableGenerator::contents())->toBe(file_get_contents(__DIR__ . '/../../src/Objects/Support/Traits/Assertable.php'));
});

test('Assertable forwards generated assertion calls', function () {
    $assertable = new AssertableTestObject;

    $assertable->assertStringValue('value');
    $assertable->assertCountValue(['one', 'two'], 2);
    $assertable->assertTrueValue(true);
    $assertable->assertNullValue(null);

    expect(true)->toBeTrue();
});

test('Assertable forwards assertion failures', function () {
    (new AssertableTestObject)->assertStringValue(1);
})->throws(AssertionFailedException::class);
