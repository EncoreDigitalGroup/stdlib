# Calendar Classes

The Calendar namespace provides date and time utilities with focus on days of the week and month operations, offering type-safe alternatives to numeric date handling.

## DayOfWeek Enum

The `DayOfWeek` enum provides a type-safe representation of days of the week with conversion utilities.

### Purpose

Eliminates magic numbers in date calculations and provides consistent day-of-week handling with flexible integer conversion options.

### Available Days

- `Sunday` through `Saturday` - Complete week coverage with string-backed enum values

### Key Methods

#### Integer Conversion

- `toInt(bool $zero = true)` - Converts day to integer representation
  - When `$zero = true` (default): Sunday = 0, Monday = 1, ... Saturday = 6
  - When `$zero = false`: Sunday = 1, Monday = 2, ... Saturday = 7

### Usage Scenarios

- Calendar application development
- Date calculation and manipulation
- Scheduling system implementation
- Business hour calculations
- Weekly recurring event handling
- Date validation and formatting

### Conversion Flexibility

The dual conversion system accommodates different standards:

#### Zero-Based (Default)

- Compatible with PHP's `date('w')` function
- Common in programming contexts
- JavaScript Date.getDay() compatible

#### One-Based

- Compatible with ISO 8601 standard (where Monday = 1)
- Database systems that use 1-7 for days
- Some international date standards

### Integration Benefits

- Type-safe day comparisons
- IDE autocompletion for days
- Prevention of invalid day values
- Clear code intention

## Month Enum

The `Month` enum provides comprehensive month handling with navigation capabilities and integer conversion.

### Purpose

Type-safe month operations with built-in navigation methods, eliminating the complexity of month calculations and wraparound handling.

### Available Months

- `January` through `December` - Complete year coverage with string-backed enum values

### Key Methods

#### Integer Conversion

- `toInt()` - Returns the month number (1-12) following standard calendar numbering

#### Month Navigation

- `next()` - Returns the next month with automatic year wraparound (December → January)
- `previous()` - Returns the previous month with automatic year wraparound (January → December)

### Usage Scenarios

- Calendar navigation interfaces
- Date range calculations
- Monthly report generation
- Billing cycle management
- Seasonal calculation systems
- Financial period handling

### Navigation Features

#### Automatic Wraparound

The navigation methods handle year boundaries automatically:

- `December.next()` returns `January`
- `January.previous()` returns `December`
- No need for manual boundary checking
- Consistent behavior across all months

#### Chain Operations

Navigation methods can be chained for complex calculations:

- Multiple month advancement/retreat
- Seasonal calculations
- Quarter navigation
- Period-based operations

### Calendar Integration

The month enum integrates seamlessly with:

- PHP's built-in date functions
- Calendar libraries
- Date calculation utilities
- Database date operations

### Type Safety Benefits

- Eliminates magic numbers (1-12)
- Prevents invalid month values
- Clear method intentions
- Compile-time validation

## Common Patterns

### Enum-Based Date Handling

Both calendar enums follow consistent patterns:

#### String-Backed Design

- Human-readable enum values
- Easy debugging and logging
- Clear code intention
- Database storage friendly

#### Integer Conversion

- Consistent `toInt()` methods
- Standard calendar numbering
- Database compatibility
- Calculation support

### Navigation Consistency

Calendar enums provide consistent navigation patterns:

- Automatic boundary handling
- Predictable wraparound behavior
- Method chaining support
- No special case handling required

### Integration Strategy

#### PHP Date Functions

Calendar enums work seamlessly with PHP's date functions:

- Compatible with `mktime()` parameters
- Works with `DateTime` objects
- Integrates with `date()` formatting
- Supports `strtotime()` operations

#### Database Integration

- Integer conversion for database storage
- String values for human-readable storage
- Compatible with date column types
- Supports date range queries

### Performance Considerations

#### Memory Efficiency

- Enum instances are singleton-like
- Minimal memory overhead
- Efficient comparison operations
- Fast navigation methods

#### Calculation Speed

- Simple arithmetic operations
- No complex date library dependencies
- Efficient modular arithmetic for wraparound
- Optimized for frequent operations

### Usage Best Practices

#### Type Safety

- Use enum values instead of integers where possible
- Leverage IDE autocompletion
- Validate enum inputs at boundaries
- Use type hints in method signatures

#### Navigation

- Prefer enum navigation methods over manual calculation
- Use method chaining for complex navigation
- Let the enum handle boundary conditions
- Trust automatic wraparound behavior

#### Integration

- Convert to integers only when interfacing with external systems
- Use string values for logging and debugging
- Leverage enum equality for comparisons
- Combine with other date utilities as needed