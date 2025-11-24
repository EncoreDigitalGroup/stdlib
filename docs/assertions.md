# Assertions

The `Assert` class provides runtime assertion utilities for verifying preconditions, postconditions, and invariants in your code. Unlike validation, assertions verify assumptions that **must** be true for the program to continue safely.

## Purpose

Runtime verification of programming assumptions with static analysis integration. When assertions fail, they indicate bugs that should be fixed rather than conditions that should be handled gracefully.

## Key Methods

### Boolean Assertions

- `true(mixed $value)` - Asserts that a value is boolean true
- `false(mixed $value)` - Asserts that a value is boolean false

### Null Assertions

- `notNull(mixed $value)` - Asserts that a value is not null

### Type Assertions

- `string(mixed $value)` - Asserts that a value is a string

## Usage Scenarios

### Precondition Verification

Verify function inputs meet required assumptions:

```php
public function processUser(?User $user): void
{
    Assert::notNull($user);
    // $user is guaranteed non-null here
    $user->doSomething();
}
```

### Type Narrowing with Static Analysis

Use assertions to help static analysis tools understand type guarantees:

```php
function handleValue(mixed $value): void
{
    Assert::string($value);
    // PHPStan now knows $value is string
    echo strtoupper($value);
}
```

### Postcondition Verification

Verify function outputs meet expected conditions:

```php
public function findUser(int $id): User
{
    $user = $this->repository->find($id);
    Assert::notNull($user);
    return $user;
}
```

### Invariant Checking

Verify state consistency during complex operations:

```php
public function transfer(Account $from, Account $to, int $amount): void
{
    $totalBefore = $from->balance + $to->balance;

    $from->withdraw($amount);
    $to->deposit($amount);

    $totalAfter = $from->balance + $to->balance;
    Assert::true($totalBefore === $totalAfter);
}
```

## When to Use Assertions

### Use Assertions For:

- **Programming errors** - Violations of assumed contracts or invariants
- **Developer mistakes** - Incorrect API usage or invalid state
- **Type narrowing** - Helping static analysis understand guarantees
- **Defensive programming** - Fail fast when assumptions are violated
- **Development debugging** - Catching bugs early in development

### Don't Use Assertions For:

- **User input validation** - Use validation classes instead
- **Expected error conditions** - Use proper error handling
- **Business logic validation** - Use domain-specific validation
- **Recoverable errors** - Use exceptions meant to be caught
- **Production-only checks** - Assertions should be permanent

## Exception Handling

### Should You Catch Assertion Exceptions?

**Generally, no.** Assertion failures indicate programming errors that should halt execution:

```php
// DON'T catch assertion failures
try {
    Assert::notNull($user);
    $user->doSomething();
} catch (AssertionFailedException $e) {
    // This masks a bug that should be fixed
}
```

When an assertion fails, the program should crash with a clear error message indicating what assumption was violated. This helps developers identify and fix bugs quickly.

### Exception Details

- Throws: `AssertionFailedException`
- Exit code: `ExitCode::GENERAL_ERROR`
- Message: Descriptive text indicating which assertion failed

### When Catching Is Acceptable

Only catch assertion exceptions in specific scenarios:

- **Testing** - Verify that assertions work correctly
- **Framework-level error handling** - Global exception handlers that log and report
- **Development tools** - IDE integrations or debugging utilities

```php
// Acceptable in tests
test('throws when value is null', function () {
    expect(fn() => Assert::notNull(null))
        ->toThrow(AssertionFailedException::class);
});
```

## Static Analysis Integration

All assertion methods include PHPStan annotations for type narrowing:

- `@phpstan-assert true $value` - Narrows to boolean true
- `@phpstan-assert false $value` - Narrows to boolean false
- `@phpstan-assert !null $value` - Narrows to non-null
- `@phpstan-assert string $value` - Narrows to string type

This enables static analysis tools to understand the guarantees provided by assertions:

```php
function example(mixed $value): void
{
    Assert::string($value);
    // No PHPStan error: $value is known to be string
    echo strtoupper($value);
}
```

## Assertions vs Validation

### Assertions

- Verify **programming assumptions**
- Should **never** fail in correct code
- Indicate **bugs** when they fail
- **Not** meant to be caught
- Used for **development** and **debugging**

### Validation

- Verify **user input** or **external data**
- **Expected** to fail sometimes
- Indicate **invalid input** when they fail
- **Meant** to be caught and handled
- Used for **business logic** and **security**

## Best Practices

### Write Clear Assertion Messages

Boolean assertions check the type first and provide specific error messages:

```php
Assert::true($value);
// "Failed to assert true: value is not a boolean."
// or "Failed to assert true."
```

### Fail Fast

Place assertions early in functions to catch violations immediately:

```php
public function process(mixed $data): void
{
    Assert::string($data); // Fail fast
    // Rest of function knows $data is string
}
```

### Use Appropriate Assertion Types

Choose the most specific assertion for your needs:

```php
// Good: Specific assertion
Assert::string($value);

// Bad: Too generic
Assert::true(is_string($value));
```

### Don't Assert Expected Conditions

Only assert conditions that indicate bugs:

```php
// Bad: User input validation should not use assertions
Assert::true($email !== '');

// Good: Use proper validation
if ($email === '') {
    throw new ValidationException('Email is required');
}
```

## Performance Considerations

- Assertions execute on every call in all environments
- No performance overhead for assertion checking
- Failed assertions halt execution immediately
- Consider the cost of complex assertion conditions

## Common Patterns

### Guard Clauses with Assertions

```php
public function updateUser(?User $user): void
{
    Assert::notNull($user);
    // Guaranteed non-null, continue safely
    $user->update(['last_seen' => now()]);
}
```

### Type-Safe Conversions

```php
public function formatName(mixed $name): string
{
    Assert::string($name);
    return Str::title($name);
}
```

### Invariant Maintenance

```php
public function setBalance(int $balance): void
{
    $this->balance = $balance;
    Assert::true($this->balance >= 0);
}
```

## Related Components

- `AssertionFailedException` - Exception thrown on assertion failures
- `ExitCode` - Provides exit code constants including `GENERAL_ERROR`
- PHPStan - Static analysis tool that understands assertion annotations