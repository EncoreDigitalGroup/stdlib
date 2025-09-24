# Serializers Classes

The Serializers namespace provides a comprehensive object serialization system built on Symfony's Serializer component, with support for JSON and XML formats plus custom normalizers for common data types.

## AbstractSerializer Class

The `AbstractSerializer` class serves as the foundation for all serializer implementations, providing a consistent interface and shared functionality.

### Purpose

Base class that implements the template method pattern for serialization, handling normalizer management and providing a consistent API for concrete serializer implementations.

### Key Methods

#### Normalizer Management

- `setNormalizers(array $normalizers)` - Configure the complete set of normalizers
- `addNormalizer(NormalizerInterface $normalizer)` - Add a normalizer to the end of the chain
- `prependNormalizer(NormalizerInterface $normalizer)` - Add a normalizer to the beginning of the chain

#### Serialization Operations

- `serialize(object $object)` - Convert an object to its serialized string representation
- `deserialize(string $class, string $data)` - Convert serialized data back to an object instance

#### Template Methods

- `format()` - Abstract method that concrete classes implement to specify format (json, xml, etc.)
- `encoders()` - Abstract method that concrete classes implement to provide format-specific encoders

### Usage Scenarios

- Building custom serialization formats
- Creating standardized serialization workflows
- Implementing consistent object transformation
- API response formatting

### Architecture Benefits

- Consistent interface across different formats
- Extensible normalizer system
- Template method pattern ensures consistent behavior
- Built on Symfony's robust serialization framework

## JsonSerializer Class

The `JsonSerializer` class provides JSON serialization capabilities with configurable normalizers.

### Purpose

Complete JSON serialization solution for converting PHP objects to JSON and back, with support for custom data type handling through normalizers.

### Implementation Details

- Extends `AbstractSerializer`
- Uses Symfony's `JsonEncoder`
- Supports all JSON-compatible data types
- Configurable normalizer chain

### Usage Scenarios

- API response serialization
- Data persistence to JSON format
- Configuration object serialization
- Inter-service communication
- Frontend data exchange

### Features

- Pretty printing support (via Symfony encoder options)
- Custom normalizer support for complex types
- Proper handling of nested objects
- Laravel Collection serialization (with appropriate normalizer)
- Carbon date serialization (with appropriate normalizer)

## XmlSerializer Class

The `XmlSerializer` class provides XML serialization capabilities for applications requiring XML data exchange.

### Purpose

XML serialization solution for converting PHP objects to XML format, useful for legacy system integration and specific protocol requirements.

### Implementation Details

- Extends `AbstractSerializer`
- Uses Symfony's `XmlEncoder`
- Currently marked as experimental
- Supports configurable normalizers

### Usage Scenarios

- Legacy system integration
- SOAP web service communication
- XML-based configuration files
- Enterprise system data exchange
- XML API implementations

### Experimental Status

The XML serializer is marked as experimental, meaning:

- API may change in future versions
- Should be tested thoroughly before production use
- Feedback and bug reports are particularly valuable
- Additional features may be added based on usage patterns

## CarbonNormalizer Class

The `CarbonNormalizer` class provides specialized handling for Carbon date objects during serialization.

### Purpose

Ensures consistent date serialization/deserialization for both Carbon and Laravel Carbon instances, using W3C standard format for interoperability.

### Key Methods

#### Normalization

- `normalize()` - Converts Carbon objects to W3C standard string format
- `supportsNormalization()` - Checks if the data is a Carbon instance

#### Denormalization

- `denormalize()` - Creates Carbon instances from W3C formatted strings
- `supportsDenormalization()` - Validates target type is Carbon-compatible

### Usage Scenarios

- API date/time consistency
- Database date serialization
- Cross-system date exchange
- Frontend date handling
- Time zone aware serialization

### Date Format

Uses W3C standard format for maximum compatibility:

- ISO 8601 compliant
- Timezone information preserved
- Parseable by most date libraries
- Human-readable format

### Carbon Support

Handles both Carbon types:

- Original Carbon library instances
- Laravel's Illuminate Carbon instances
- Consistent behavior across both types

## LaravelCollectionNormalizer Class

The `LaravelCollectionNormalizer` class provides specialized handling for Laravel Collection objects.

### Purpose

Enables Laravel Collections to be properly serialized and reconstructed, maintaining collection functionality after deserialization.

### Key Methods

#### Normalization

- `normalize()` - Converts Laravel Collections to arrays for serialization
- `supportsNormalization()` - Identifies Laravel Collection instances

#### Denormalization

- `denormalize()` - Reconstructs Laravel Collections from array data
- `supportsDenormalization()` - Validates target type is Collection-compatible

### Usage Scenarios

- API responses containing collections
- Caching collection data
- Inter-service data transfer
- Database serialization
- Configuration object serialization

### Collection Preservation

- Maintains collection methods after deserialization
- Preserves nested collection structures
- Handles both typed and untyped collections
- Compatible with all Laravel Collection types

## Common Patterns

### Normalizer Chain Strategy

The serializer system uses a normalizer chain approach:

#### Order Matters

- Normalizers are checked in order
- First matching normalizer handles the data
- More specific normalizers should come first
- Generic normalizers come last

#### Custom Normalizers

- Easy to add domain-specific normalizers
- Can handle complex object relationships
- Support for conditional normalization
- Extensible for new data types

### Type Safety

All serializers provide type safety through:

- Interface-based contracts
- Type checking in normalizers
- Exception handling for invalid data
- Consistent error reporting

### Performance Considerations

#### Normalizer Efficiency

- Normalizers checked in order until match found
- Specific type checking minimizes overhead
- Caching of normalizer results where appropriate
- Efficient handling of nested structures

#### Memory Management

- Stream-based processing for large objects
- Lazy loading of normalizers
- Proper cleanup of temporary data
- Efficient handling of large collections

### Integration Benefits

#### Symfony Ecosystem

- Built on proven Symfony Serializer component
- Compatible with Symfony normalizers
- Access to Symfony's extensive serialization features
- Professional-grade serialization handling

#### Laravel Integration

- Seamless handling of Laravel Collections
- Carbon date object support
- Compatible with Laravel's data structures
- Works with Eloquent models (with appropriate normalizers)

### Error Handling

The serializer system provides robust error handling:

- Clear exception messages for serialization failures
- Type validation during deserialization
- Graceful handling of missing normalizers
- Detailed error context for debugging