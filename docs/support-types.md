# Support/Types Classes

The Support/Types namespace provides enhanced type utility classes that extend Laravel's base functionality with additional methods tailored for common development
scenarios.

## Str Class

The `Str` class extends Laravel's `Illuminate\Support\Str` class, providing all base Laravel string functionality plus additional utility methods.

### Purpose

Enhanced string manipulation operations beyond Laravel's base functionality, with a focus on formatting, validation, and type-safe conversions.

### Key Methods

#### Basic Utilities

- `guid()` - Generates a UUID as a string
- `empty()` - Returns an empty string constant
- `space()` - Returns a single space character
- `toString(mixed $value)` - Performs type-safe string conversion

#### Text Formatting

- `maxLength(string $value, ?int $length = null)` - Truncates strings to maximum length (default: 100 characters)
- `conjunctions(string $value)` - Formats conjunctions by converting "And" → "and", "Or" → "or", "Of" → "of"
- `formattedTitleCase(string $value)` - Applies title case while removing underscores and formatting conjunctions

### Usage Scenarios

- String truncation with consistent length limits
- Text formatting for display purposes
- Title case formatting with proper conjunction handling
- UUID generation for unique identifiers
- Type-safe string conversions

## Arr Class

The `Arr` class extends Laravel's `Illuminate\Support\Arr` class, providing all base Laravel array functionality plus advanced manipulation methods.

### Purpose

Advanced array operations that maintain array structure integrity while providing powerful manipulation capabilities.

### Key Methods

#### Basic Utilities

- `empty()` - Returns an empty array constant

#### Array Manipulation

- `renameKey(array $array, string $oldKey, string $newKey)` - Renames an array key while preserving the original order of elements
- `addAfter(array $array, string $afterKey, string $newKey, mixed $newValue)` - Inserts a new key-value pair after a specified existing key

### Usage Scenarios

- Maintaining array order during key modifications
- Dynamic array structure manipulation
- Form field reordering and insertion
- Configuration array modifications

## Number Class

The `Number` class extends Laravel's `Illuminate\Support\Number` class, providing all base Laravel number functionality plus type-safe validation and conversion methods.

### Purpose

Safe number operations with built-in validation to prevent type conversion errors and ensure data integrity.

### Key Methods

#### Type Conversion

- `toInt(mixed $value)` - Performs type-safe integer conversion
- `validate(mixed $value)` - Validates whether a value can be safely converted to an integer

### Usage Scenarios

- Safe type conversion in user input processing
- Data validation before mathematical operations
- Form input sanitization
- API data type validation

## Common Patterns

### Inheritance Strategy

All Support/Types classes extend their Laravel counterparts, meaning you get:

- All existing Laravel functionality
- Additional stdlib-specific methods
- Seamless integration with existing Laravel code
- Drop-in replacement capability

### Type Safety

These classes emphasize type safety by:

- Providing validation methods before conversions
- Using nullable return types where appropriate
- Throwing appropriate exceptions for invalid operations
- Maintaining consistent behavior across different input types

### Performance Considerations

- Built on top of Laravel's optimized implementations
- Additional methods maintain Laravel's performance characteristics
- String operations use efficient PHP built-in functions
- Array operations preserve memory efficiency where possible