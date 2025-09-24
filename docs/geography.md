# Geography Classes

The Geography namespace provides comprehensive geographic data structures and utilities for handling countries, political divisions, and regional information in
applications.

## Country Enum

The `Country` enum provides a comprehensive list of world countries as a string-backed enum with enhanced functionality.

### Purpose

Type-safe country selection and validation with comprehensive coverage of all recognized world countries, providing consistent country data across applications.

### Key Features

#### Comprehensive Coverage

- Contains 196+ countries with standardized naming
- Uses underscore-separated values for consistency
- Covers all major world countries and territories

#### Enhanced Functionality

The enum uses the `HasEnumValue` trait, providing:

- `values()` - Extract all country values as an array
- `titleCasedValues()` - Get formatted display names
- `from()` - Safe enum creation with null returns instead of exceptions
- `options()` - Generate select options with filtering capabilities
- `name()` - Get formatted display names

### Usage Scenarios

- Country selection dropdowns in forms
- Address validation systems
- Geographic data validation
- Internationalization support
- User profile country selection
- Shipping and billing address forms

### Data Format

Countries are stored with underscore-separated values that can be easily converted to display format:

- Enum values use consistent formatting
- Display names automatically generated from values
- Support for title case conversion
- Proper handling of multi-word country names

## DivisionType Enum

The `DivisionType` enum defines the types of political divisions used by different countries, providing context-aware division terminology.

### Purpose

Determines the appropriate political subdivision terminology (state, province, region) based on the country context, ensuring correct usage in forms and displays.

### Available Types

- `State` - Used primarily by the United States
- `Province` - Used by countries like Canada
- `Region` - Used by various other countries

### Key Methods

#### Context-Aware Division Selection

- `country(Country $country)` - Returns the appropriate division type for a given country using match expressions

### Usage Scenarios

- Dynamic form field labeling
- Address form customization based on country selection
- Proper terminology in shipping forms
- Internationalized address validation
- Geographic data entry interfaces

### Smart Country Mapping

The class provides intelligent mapping based on country:

- United States → State
- Canada → Province
- Other countries → Region (as default)
- Extensible for additional country-specific mappings

## Canada Enum

The `Canada` enum provides comprehensive coverage of Canadian provinces and territories with official abbreviations.

### Purpose

Type-safe Canadian province and territory selection with official abbreviation support for address validation and form processing.

### Coverage

#### Provinces (10)

All Canadian provinces with their standard names and abbreviations

#### Territories (3)

All Canadian territories including northern territories

### Key Methods

#### Official Abbreviations

- `abbreviated()` - Returns official province/territory abbreviations as used by Canada Post and government systems

### Usage Scenarios

- Canadian address forms
- Shipping calculation systems
- Tax calculation based on province
- Canadian user registration
- Geographic filtering for Canadian users
- Postal code validation

### Data Accuracy

- Uses official provincial/territorial names
- Provides Canada Post approved abbreviations
- Consistent formatting across all entries
- Proper handling of bilingual names where applicable

## UnitedStates Enum

The `UnitedStates` enum provides comprehensive coverage of all US states with official abbreviations.

### Purpose

Type-safe US state selection with official USPS abbreviation support for address validation and form processing.

### Coverage

#### Complete State Coverage

All 50 US states with standardized naming and official abbreviations

### Key Methods

#### Official Abbreviations

- `abbreviated()` - Returns official USPS state abbreviations

### Usage Scenarios

- US address forms
- State tax calculations
- Shipping rate determination
- Geographic filtering for US users
- ZIP code validation
- State-specific feature toggling

### Data Standards

- Follows USPS official state names
- Uses standard USPS abbreviations
- Consistent formatting across all states
- Proper alphabetical ordering

## Common Patterns

### Enum Enhancement Strategy

All geography enums utilize the `HasEnumValue` trait, providing:

#### Consistent API

- Standardized methods across all geographic enums
- Uniform display formatting capabilities
- Consistent null-safe creation methods
- Shared filtering and option generation

#### UI Integration

- Easy dropdown/select option generation
- Filtering capabilities for subset selection
- Display name formatting
- Type-safe value handling

### Type Safety Benefits

Geographic enums provide:

- Compile-time validation of country/division values
- IDE autocompletion support
- Prevention of typos in geographic data
- Consistent data formats across applications

### Internationalization Support

The geography classes support internationalization by:

- Providing machine-readable identifiers
- Supporting display name customization
- Enabling easy integration with translation systems
- Maintaining data consistency across locales

### Address Form Integration

These classes are designed specifically for address form scenarios:

- Dynamic form field adjustment based on country
- Proper terminology usage (state vs province)
- Official abbreviation support for data storage
- Validation support for geographic data

### Extensibility

The geographic system is designed for extension:

- Easy addition of new countries or divisions
- Consistent patterns for new geographic entities
- Trait-based enhancement system
- Integration with custom validation rules