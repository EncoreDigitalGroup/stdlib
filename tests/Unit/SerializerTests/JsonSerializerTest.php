<?php

use EncoreDigitalGroup\StdLib\Objects\Serializers\JsonSerializer;

class TestObject
{
    public string $name;
    public int $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
}

describe("JsonSerializer Tests", function () {
    test('JsonSerializer can serialize an object', function () {
        $object = new TestObject('John Doe', 30);
        $json = JsonSerializer::serialize($object);

        expect($json)->toBeJson()
            ->and(json_decode($json, true))->toMatchArray([
                'name' => 'John Doe',
                'age' => 30,
            ]);
    });

    test('JsonSerializer can deserialize a JSON string', function () {
        $json = '{"name":"John Doe","age":30}';
        $object = JsonSerializer::deserialize(TestObject::class, $json);

        expect($object)->toBeInstanceOf(TestObject::class)
            ->and($object->name)->toBe('John Doe')
            ->and($object->age)->toBe(30);
    });
});