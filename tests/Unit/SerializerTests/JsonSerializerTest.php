<?php


use EncoreDigitalGroup\StdLib\Objects\Serializers\Attributes\MapInputName;
use EncoreDigitalGroup\StdLib\Objects\Serializers\Attributes\MapName;
use EncoreDigitalGroup\StdLib\Objects\Serializers\Attributes\MapOutputName;
use EncoreDigitalGroup\StdLib\Objects\Serializers\JsonSerializer;
use EncoreDigitalGroup\StdLib\Objects\Serializers\Mappers\ProvidedNameMapper;
use EncoreDigitalGroup\StdLib\Objects\Serializers\Mappers\SnakeCaseMapper;

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

class MapNameTestObject
{
    public function __construct(
        #[MapName(SnakeCaseMapper::class)]
        public string $firstName,
        #[MapName(SnakeCaseMapper::class)]
        public string $lastName,
        public int    $age
    ) {}
}

class MapInputOutputTestObject
{
    public function __construct(
        #[MapInputName('first_name')]
        #[MapOutputName('full_name')]
        public string $name,
        public int    $age
    ) {}
}

class ProvidedNameTestObject
{
    public function __construct(
        #[MapName(new ProvidedNameMapper('custom_field_name'))]
        public string $fieldName,
        public string $otherField
    ) {}
}

class MapNameInputOutputTestObject
{
    public function __construct(
        #[MapName(input: 'input_name', output: 'output_name')]
        public string $name,
        #[MapName(input: SnakeCaseMapper::class)]
        public string $firstName,
        public int    $age
    ) {}
}

#[MapName(SnakeCaseMapper::class)]
class ClassLevelMapNameObject
{
    public function __construct(
        public string $firstName,
        public string $lastName,
        public int    $userAge
    ) {}
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

    test('JsonSerializer uses MapName attributes for serialization', function () {
        $object = new MapNameTestObject('John', 'Doe', 30);
        $json = JsonSerializer::serialize($object);

        expect($json)->toBeJson()
            ->and(json_decode($json, true))->toMatchArray([
                'first_name' => 'John',
                'last_name' => 'Doe',
                'age' => 30,
            ]);
    });

    test('JsonSerializer uses MapName attributes for deserialization', function () {
        $json = '{"first_name":"John","last_name":"Doe","age":30}';
        $object = JsonSerializer::deserialize(MapNameTestObject::class, $json);

        expect($object)->toBeInstanceOf(MapNameTestObject::class)
            ->and($object->firstName)->toBe('John')
            ->and($object->lastName)->toBe('Doe')
            ->and($object->age)->toBe(30);
    });

    test('JsonSerializer uses separate MapInputName and MapOutputName attributes', function () {
        $object = new MapInputOutputTestObject('John Doe', 30);
        $json = JsonSerializer::serialize($object);

        expect($json)->toBeJson()
            ->and(json_decode($json, true))->toMatchArray([
                'full_name' => 'John Doe',
                'age' => 30,
            ]);

        $inputJson = '{"first_name":"Jane Smith","age":25}';
        $deserializedObject = JsonSerializer::deserialize(MapInputOutputTestObject::class, $inputJson);

        expect($deserializedObject)->toBeInstanceOf(MapInputOutputTestObject::class)
            ->and($deserializedObject->name)->toBe('Jane Smith')
            ->and($deserializedObject->age)->toBe(25);
    });

    test('JsonSerializer uses ProvidedNameMapper for custom field names', function () {
        $object = new ProvidedNameTestObject('test value', 'other value');
        $json = JsonSerializer::serialize($object);

        expect($json)->toBeJson()
            ->and(json_decode($json, true))->toMatchArray([
                'custom_field_name' => 'test value',
                'otherField' => 'other value',
            ]);

        $inputJson = '{"custom_field_name":"new value","otherField":"other new value"}';
        $deserializedObject = JsonSerializer::deserialize(ProvidedNameTestObject::class, $inputJson);

        expect($deserializedObject)->toBeInstanceOf(ProvidedNameTestObject::class)
            ->and($deserializedObject->fieldName)->toBe('new value')
            ->and($deserializedObject->otherField)->toBe('other new value');
    });

    test('JsonSerializer uses class-level MapName attributes', function () {
        $object = new ClassLevelMapNameObject('John', 'Doe', 30);
        $json = JsonSerializer::serialize($object);

        expect($json)->toBeJson()
            ->and(json_decode($json, true))->toMatchArray([
                'first_name' => 'John',
                'last_name' => 'Doe',
                'user_age' => 30,
            ]);

        $inputJson = '{"first_name":"Jane","last_name":"Smith","user_age":25}';
        $deserializedObject = JsonSerializer::deserialize(ClassLevelMapNameObject::class, $inputJson);

        expect($deserializedObject)->toBeInstanceOf(ClassLevelMapNameObject::class)
            ->and($deserializedObject->firstName)->toBe('Jane')
            ->and($deserializedObject->lastName)->toBe('Smith')
            ->and($deserializedObject->userAge)->toBe(25);
    });

    test('JsonSerializer uses MapName with input and output parameters', function () {
        $object = new MapNameInputOutputTestObject('John Doe', 'Jane', 30);
        $json = JsonSerializer::serialize($object);

        expect($json)->toBeJson()
            ->and(json_decode($json, true))->toMatchArray([
                'output_name' => 'John Doe',
                'first_name' => 'Jane',
                'age' => 30,
            ]);

        $inputJson = '{"input_name":"Jane Smith","first_name":"Mary","age":25}';
        $deserializedObject = JsonSerializer::deserialize(MapNameInputOutputTestObject::class, $inputJson);

        expect($deserializedObject)->toBeInstanceOf(MapNameInputOutputTestObject::class)
            ->and($deserializedObject->name)->toBe('Jane Smith')
            ->and($deserializedObject->firstName)->toBe('Mary')
            ->and($deserializedObject->age)->toBe(25);
    });

    test('JsonSerializer falls back to Symfony serializer when no MapName attributes are present', function () {
        $object = new TestObject('John Doe', 30);
        $json = JsonSerializer::serialize($object);

        expect($json)->toBeJson()
            ->and(json_decode($json, true))->toMatchArray([
                'name' => 'John Doe',
                'age' => 30,
            ]);

        $deserializedObject = JsonSerializer::deserialize(TestObject::class, $json);
        expect($deserializedObject)->toBeInstanceOf(TestObject::class)
            ->and($deserializedObject->name)->toBe('John Doe')
            ->and($deserializedObject->age)->toBe(30);
    });
});