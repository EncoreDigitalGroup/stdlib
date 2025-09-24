# HTTP Classes

The Http namespace provides utilities and constants for HTTP-related operations, ensuring type safety and consistency across web applications.

## Url Class

The `Url` class provides safe URL encoding and decoding operations with proper error handling.

### Purpose

Reliable URL manipulation utilities that handle edge cases and provide null-safe operations for web applications.

### Key Methods

#### URL Encoding/Decoding

- `encode(mixed $data)` - URL encodes data with proper type handling
- `decode(mixed $data)` - URL decodes data with null-safe operations

### Usage Scenarios

- Query parameter encoding for API requests
- URL-safe string conversion
- Form data preparation
- Search parameter handling
- Safe URL construction

### Features

- Handles mixed data types appropriately
- Null-safe operations prevent runtime errors
- Consistent encoding behavior across different input types

## HttpMethod Class

The `HttpMethod` class provides constants for standard HTTP methods, ensuring consistency and preventing typos in HTTP operations.

### Purpose

Type-safe HTTP method references that eliminate magic strings and provide IDE autocompletion support.

### Available Constants

- `GET` - HTTP GET method
- `POST` - HTTP POST method
- `PUT` - HTTP PUT method
- `PATCH` - HTTP PATCH method
- `DELETE` - HTTP DELETE method
- `HEAD` - HTTP HEAD method
- `OPTIONS` - HTTP OPTIONS method
- `TRACE` - HTTP TRACE method
- `CONNECT` - HTTP CONNECT method

### Usage Scenarios

- HTTP client configuration
- Route definition
- API endpoint documentation
- Request validation
- Method comparison operations

### Benefits

- IDE autocompletion support
- Prevents typos in HTTP method strings
- Centralized method definitions
- Type safety in method comparisons

## HttpStatusCode Class

The `HttpStatusCode` class provides constants for standard HTTP status codes with comprehensive coverage of common and specialized codes.

### Purpose

Type-safe HTTP status code references that eliminate magic numbers and provide consistent status code usage across applications.

### Key Status Code Categories

#### Success Codes (2xx)

- `OK` (200) - Standard success response
- `CREATED` (201) - Resource creation success
- `ACCEPTED` (202) - Request accepted for processing
- `NO_CONTENT` (204) - Success with no response body

#### Redirection Codes (3xx)

- `MOVED_PERMANENTLY` (301) - Permanent redirect
- `FOUND` (302) - Temporary redirect
- `NOT_MODIFIED` (304) - Resource not modified
- `PERMANENT_REDIRECT` (301) - Alias for moved permanently
- `TEMPORARY_REDIRECT` (302) - Alias for found

#### Client Error Codes (4xx)

- `BAD_REQUEST` (400) - Malformed request
- `UNAUTHORIZED` (401) - Authentication required
- `FORBIDDEN` (403) - Access denied
- `NOT_FOUND` (404) - Resource not found
- `METHOD_NOT_ALLOWED` (405) - HTTP method not supported
- `UNPROCESSABLE_ENTITY` (422) - Validation errors

#### Server Error Codes (5xx)

- `INTERNAL_SERVER_ERROR` (500) - General server error
- `NOT_IMPLEMENTED` (501) - Method not implemented
- `BAD_GATEWAY` (502) - Gateway error
- `SERVICE_UNAVAILABLE` (503) - Service temporarily unavailable

### Usage Scenarios

- API response status setting
- HTTP client response handling
- Error handling and logging
- Status code comparison operations
- API documentation and testing

### Features

- Comprehensive status code coverage
- Some constants provide aliases for different naming conventions
- Consistent numeric values following HTTP standards

## HttpStatusName Class

The `HttpStatusName` class provides human-readable string constants that correspond to HTTP status codes, designed to work alongside `HttpStatusCode`.

### Purpose

Display-friendly HTTP status descriptions for user interfaces, logging, and error messages.

### Key Features

- String constants matching `HttpStatusCode` values
- Human-readable status descriptions
- Consistent naming convention with status code class
- Suitable for user-facing messages

### Usage Scenarios

- Error message display
- API response documentation
- Logging and debugging
- User interface status indicators
- Error reporting systems

### Relationship with HttpStatusCode

The `HttpStatusName` class is designed as a companion to `HttpStatusCode`, providing descriptive names that correspond to the numeric codes. This allows for consistent
status handling across both programmatic operations and user-facing displays.

## Common Patterns

### Type Safety

All HTTP classes emphasize type safety by:

- Using constants instead of magic strings/numbers
- Providing consistent interfaces
- Enabling IDE autocompletion
- Preventing runtime errors from typos

### Standards Compliance

- HTTP methods follow RFC specifications
- Status codes adhere to HTTP/1.1 and HTTP/2 standards
- URL encoding follows web standards
- Consistent behavior across different environments

### Integration Benefits

- Seamless integration with HTTP clients (Guzzle, Laravel HTTP)
- Compatible with PSR-7 HTTP message interfaces
- Works with popular PHP frameworks
- Suitable for both client and server-side applications

### Error Prevention

- Eliminates magic strings and numbers
- Provides compile-time checking through constants
- Reduces debugging time from HTTP-related issues
- Enables static analysis tools to catch errors early