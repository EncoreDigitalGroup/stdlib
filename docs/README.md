# EncoreDigitalGroup/StdLib Documentation

Welcome to the comprehensive developer documentation for EncoreDigitalGroup/StdLib, a collection of standardized PHP classes and utilities designed to enhance development
productivity and ensure consistency across projects.

## Overview

The stdlib provides object-oriented utilities that extend and enhance common PHP operations, with a focus on type safety, performance, and developer experience. All
classes are designed to integrate seamlessly with Laravel applications while remaining framework-agnostic where possible.

## Documentation Structure

### [Support/Types Classes](./support-types.md)

Enhanced type utility classes that extend Laravel's base functionality:

- **Str** - Advanced string manipulation and formatting
- **Arr** - Sophisticated array operations with structure preservation
- **Number** - Safe number operations with validation

### [HTTP Classes](./http.md)

HTTP-related utilities and constants for web applications:

- **Url** - Safe URL encoding/decoding operations
- **HttpMethod** - Type-safe HTTP method constants
- **HttpStatusCode** - Comprehensive HTTP status code constants
- **HttpStatusName** - Human-readable status descriptions

### [Filesystem Classes](./filesystem.md)

File and directory operations with robust error handling:

- **File** - Safe file operations with proper validation
- **Directory** - Advanced directory analysis and scanning
- **ExitCode** - Standardized CLI application exit codes

### [Geography Classes](./geography.md)

Comprehensive geographic data structures and utilities:

- **Country** - World countries enumeration with enhanced functionality
- **DivisionType** - Political division types (states, provinces, regions)
- **Canada/UnitedStates** - Specific country subdivision enums with abbreviations

### [Serializers Classes](./serializers.md)

Object serialization system built on Symfony components:

- **AbstractSerializer** - Base serialization functionality with normalizer management
- **JsonSerializer/XmlSerializer** - Format-specific serialization implementations
- **CarbonNormalizer** - Specialized Carbon date object handling
- **LaravelCollectionNormalizer** - Laravel Collection serialization support

### [Calendar Classes](./calendar.md)

Date and time utilities with type-safe operations:

- **DayOfWeek** - Type-safe day representation with flexible conversion
- **Month** - Month enumeration with navigation capabilities

### [Assertions](./assertions.md)

Runtime assertion utilities for verifying programming assumptions:

- **Assert** - Precondition, postcondition, and invariant verification with static analysis integration

### [Core Objects and Utilities](./core-objects.md)

Foundational classes providing system-wide functionality:

- **Once** - Memoization wrapper with version checking
- **Deferred** - Deferred execution capabilities
- **Enum** - Safe enum value extraction utilities
- **StaticCache** - Advanced static caching with partitioning
- **Php** - PHP version detection and comparison
- **Support Traits** - Reusable functionality enhancements

## Key Features

### Type Safety

- Extensive use of PHP 8.1+ enums and type declarations
- Safe conversion methods that validate input types
- Clear exception handling with meaningful error messages
- IDE-friendly interfaces with comprehensive autocompletion

### Laravel Integration

- Seamless compatibility with Laravel applications
- Extensions of familiar Laravel classes (Str, Arr, Number)
- Support for Laravel Collections and Carbon dates
- Integration with Laravel's service container and facades

### Performance Optimization

- Static caching capabilities for expensive operations
- Memory-efficient operations on large datasets
- Optimized algorithms for common operations
- Minimal overhead wrapper implementations

### Developer Experience

- Consistent API patterns across all classes
- Comprehensive error handling and validation
- Clear documentation and usage examples
- IDE autocompletion and static analysis support

## Architecture Principles

### Inheritance Strategy

Many stdlib classes extend their Laravel counterparts, providing:

- All existing Laravel functionality
- Additional stdlib-specific methods
- Seamless integration with existing code
- Drop-in replacement capability

### Error Handling

Robust error handling throughout the system:

- Custom exceptions for specific error types
- Meaningful error messages with context
- Validation before potentially failing operations
- Safe defaults and fallback behavior

### Version Safety

- Automatic dependency version checking
- Clear error messages for version mismatches
- Graceful degradation where possible
- Consistent version requirement handling

## Getting Started

### Installation

The stdlib is designed to be included as a Composer dependency in your PHP projects.

### Basic Usage Patterns

1. **Type-Safe Operations** - Use enum-based constants instead of magic strings/numbers
2. **Enhanced Laravel Methods** - Leverage stdlib extensions of Laravel classes
3. **Geographic Data** - Utilize comprehensive country and region enumerations
4. **Serialization** - Implement robust object serialization with custom normalizers
5. **Caching** - Optimize performance with static caching capabilities

### Integration Guidelines

- Follow existing patterns when extending stdlib functionality
- Use provided traits to enhance custom classes
- Leverage type-safe enums for constants and options
- Implement proper error handling using stdlib exceptions

## Support and Development

### Testing

All stdlib classes are thoroughly tested using PestPHP with comprehensive test coverage.

### Code Quality

The codebase maintains high quality standards through:

- PHPStan level 8 static analysis
- Custom PHP-CS-Fixer rules for consistent formatting
- Rector for code modernization and refactoring
- Comprehensive documentation for all public APIs

### Contributing

When contributing to the stdlib, follow the established patterns and maintain consistency with existing implementations.

---

*This documentation provides comprehensive coverage of all object classes in the EncoreDigitalGroup/StdLib package. For specific implementation details, refer to the
individual class documentation files.*