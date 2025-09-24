# Core Objects and Utilities

This documentation covers the core utility classes and support components that provide foundational functionality across the stdlib package.

## Enum Class

The `Enum` class provides utilities for working with PHP 8.1+ BackedEnum types safely.

### Purpose

Type-safe enum value extraction with validation, preventing runtime errors from incorrect enum type assumptions.

### Key Methods

#### Safe Value Extraction

- `string(BackedEnum $enum)` - Safely extracts string value from string-backed enums
- `int(BackedEnum $enum)` - Safely extracts integer value from integer-backed enums

### Usage Scenarios

- API response formatting where enum values need conversion
- Database storage of enum values
- Form handling with enum-backed fields
- Configuration processing with enum options
- Type-safe enum value access

### Type Safety Features

- Validates enum backing type before extraction
- Throws `InvalidArgumentException` for type mismatches
- Prevents runtime errors from assuming wrong backing type
- Clear error messages for debugging

### Integration Benefits

- Works with any PHP 8.1+ backed enum
- Compatible with custom enum classes
- Provides consistent interface across different enum types
- Enables safe enum handling in generic code

## StaticCache Class

The `StaticCache` class provides a sophisticated static caching system with partitioning and enable/disable capabilities.

### Purpose

High-performance static caching with advanced features like partitioning, conditional enabling, and flexible cache management.

### Key Methods

#### Basic Cache Operations

- `add(string $key, mixed $value, ?string $partition)` - Adds value to cache with optional partitioning
- `get(string $key, ?string $partition)` - Retrieves value from cache
- `remove(string $key, ?string $partition)` - Removes specific key from cache
- `contains(string $key, ?string $partition)` - Checks if key exists in cache

#### Advanced Operations

- `flush(?string $partition)` - Clears entire cache or specific partition
- `remember(string $key, callable $callback, ?string $partition)` - Cache-or-execute pattern
- `enable()` / `disable()` - Control cache functionality
- `enabled()` / `disabled()` - Check cache state

### Usage Scenarios

- Application-level caching for expensive operations
- Configuration caching across request boundaries
- Computed value storage for repeated calculations
- Temporary data storage during complex operations
- Performance optimization for frequently accessed data

### Advanced Features

#### Partitioning

- Organize cache entries into logical groups
- Selective cache clearing by partition
- Namespace isolation between different cache uses
- Better cache management and organization

#### Enable/Disable Control

- Runtime cache control for testing scenarios
- Conditional caching based on environment
- Performance debugging capabilities
- Development vs production behavior differences

#### Enum Key Support

- Support for enum-based cache keys
- Type-safe key generation
- Better code organization with meaningful key names

### Performance Considerations

- Static storage provides fastest access times
- Memory-based caching eliminates I/O overhead
- Partitioning prevents cache pollution
- Selective flushing maintains cache efficiency

## Php Class

The `Php` class provides utilities for PHP version checking and compatibility management.

### Purpose

Reliable PHP version detection and comparison for feature detection and compatibility checking.

### Key Methods

#### Version Comparison

- `greaterThanOrEqual(string $version)` - Checks if current PHP version is greater than or equal to specified version
- `lessThanOrEqual(string $version)` - Checks if current PHP version is less than or equal to specified version
- `greaterThan(string $version)` - Strict greater than comparison
- `lessThan(string $version)` - Strict less than comparison
- `equalTo(string $version)` - Exact version matching

### Usage Scenarios

- Feature detection based on PHP version
- Compatibility checking before using language features
- Conditional code execution based on PHP capabilities
- Library compatibility validation
- Deployment environment verification

### Version-Dependent Development

- Enable modern PHP features conditionally
- Maintain backward compatibility
- Provide fallbacks for older PHP versions
- Validate runtime environment capabilities

## Support Traits

The stdlib provides several traits that enhance class functionality across the system.

### HasEnumValue Trait

Enhances PHP enums with additional functionality for UI generation and data handling.

#### Key Methods

- `values()` - Extract all enum values as array
- `titleCasedValues()` - Get formatted title-case values for display
- `from()` - Safe enum creation that returns null instead of throwing exceptions
- `options(array $include = [], array $exclude = [])` - Generate filtered select options
- `name()` - Get formatted display name

#### Usage Scenarios

- Form select option generation
- Enum value validation and conversion
- UI component data preparation
- API response formatting
- Display name generation

### StaticCacheEnabled Trait

Provides enable/disable functionality for static cache implementations.

#### Key Methods

- `enable()` / `disable()` - Control cache state
- `enabled()` / `disabled()` - Check current state

### Macroable Trait

Enables dynamic method addition to classes, marked as experimental.

#### Key Features

- Dynamic method registration
- Static and instance method support
- Eloquent model integration
- Closure binding capabilities
- Method existence checking

## Common Patterns

### Wrapper Strategy

Many core classes follow a wrapper pattern:

- Provide enhanced interfaces over Laravel functionality
- Add version checking and validation
- Maintain compatibility while adding features
- Enable consistent error handling

### Version Safety

Core classes emphasize version safety:

- Automatic dependency version checking
- Clear error messages for version mismatches
- Graceful degradation where possible
- Consistent version requirement handling

### Performance Focus

Core utilities are designed for performance:

- Static caching for frequently accessed data
- Minimal overhead wrapper implementations
- Efficient version checking strategies
- Memory-conscious data structures

### Type Safety

All core classes prioritize type safety:

- Strong typing in method signatures
- Runtime type validation where needed
- Clear exception handling for type errors
- IDE-friendly interfaces for autocompletion