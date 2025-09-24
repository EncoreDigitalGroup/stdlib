# Filesystem Classes

The Filesystem namespace provides utilities for safe file and directory operations, along with standardized exit codes for CLI applications.

## File Class

The `File` class provides safe file system operations with comprehensive error handling and validation.

### Purpose

Safe file operations that handle common edge cases, provide proper error handling, and throw meaningful exceptions when operations fail.

### Key Methods

#### File Reading

- `content(string $path)` - Reads file content with proper error handling and validation

#### File Management

- `delete(string $path)` - Deletes a file with existence checking before removal
- `copy(string $source, string $destination)` - Copies files with source validation and proper error handling

### Usage Scenarios

- Configuration file reading
- Template file processing
- Asset file management
- Backup file operations
- File cleanup operations

### Error Handling

The class uses custom exceptions to provide clear error messages:

- Throws `FileNotFoundException` when attempting to read or copy non-existent files
- Provides meaningful error context for debugging
- Handles file system permission issues gracefully

### Safety Features

- Validates file existence before operations
- Prevents operations on non-existent source files
- Provides proper error messages for failed operations
- Ensures data integrity during copy operations

## Directory Class

The `Directory` class provides comprehensive directory operations including analysis, scanning, and content hashing functionality.

### Purpose

Advanced directory operations that go beyond basic file system functions, with focus on directory analysis, recursive operations, and content integrity checking.

### Key Methods

#### Directory Information

- `current()` - Retrieves the current working directory

#### Content Analysis

- `hash(string $dir)` - Generates an MD5 hash of all directory contents, useful for detecting changes
- `scan(string $dir)` - Manually scans directory contents recursively
- `scanRecursive(string $path)` - Uses SPL iterators for efficient recursive directory scanning

### Usage Scenarios

- Directory change detection
- Content integrity verification
- File system monitoring
- Backup validation
- Directory comparison operations
- File listing for processing

### Scanning Strategies

The class provides two different scanning approaches:

#### Manual Scanning (`scan()`)

- Custom implementation for specific use cases
- Provides fine-grained control over scanning behavior
- Suitable for specialized filtering requirements

#### SPL Iterator Scanning (`scanRecursive()`)

- Uses PHP's built-in SPL iterators for efficiency
- Better performance on large directory structures
- Standard PHP approach for recursive operations

### Hash Functionality

The `hash()` method provides:

- MD5 hash generation of directory contents
- Useful for detecting directory changes
- Content integrity verification
- Backup validation workflows

### Dependencies

- Utilizes `Arr` utility class for array operations
- Uses custom `DirectoryNotFoundException` for proper error handling
- Integrates with other filesystem utilities

## ExitCode Class

The `ExitCode` class provides standardized exit codes for CLI applications and system operations.

### Purpose

Consistent exit code standards that follow Unix conventions while also providing HTTP-status-based codes for web-related CLI tools.

### Exit Code Categories

#### Success Codes

- `SUCCESS` (0) - Operation completed successfully

#### General Error Codes

- `GENERAL_ERROR` (1) - General catchall error
- `MISUSE_OF_SHELL_BUILTINS` (2) - Incorrect shell builtin usage
- `COMMAND_NOT_FOUND` (127) - Command not found
- `INVALID_ARGUMENT` (128) - Invalid argument to exit

#### HTTP-Status-Based Codes

The class also provides exit codes that correspond to HTTP status codes for web-related CLI applications:

- Maps to `HttpStatusCode` constants for consistency
- Enables unified error handling across web and CLI contexts
- Provides semantic meaning for different failure types

### Usage Scenarios

- CLI application error reporting
- Script exit status standardization
- Process monitoring and alerting
- Automated deployment scripts
- System administration tools

### Integration Benefits

- Follows Unix exit code conventions
- Provides HTTP status integration for web tools
- Enables consistent error reporting across applications
- Supports automated monitoring systems

### Best Practices

- Use `SUCCESS` for successful operations
- Choose specific error codes over `GENERAL_ERROR` when possible
- Document expected exit codes in CLI application help
- Use HTTP-based codes for web-related CLI tools

## Common Patterns

### Error Handling Strategy

All filesystem classes follow consistent error handling patterns:

- Custom exceptions for specific error types
- Meaningful error messages with context
- Validation before operations
- Safe defaults and fallback behavior

### Safety First Approach

The filesystem classes prioritize safety by:

- Validating inputs before operations
- Checking file/directory existence
- Providing proper error contexts
- Using exception handling for error conditions

### Performance Considerations

- Multiple scanning strategies for different use cases
- Efficient use of PHP built-in functions
- Proper memory management for large directories
- Optimized hash generation algorithms

### Integration Features

- Works seamlessly with other stdlib classes
- Uses consistent exception hierarchy
- Integrates with HTTP status codes where appropriate
- Follows Laravel filesystem patterns where applicable