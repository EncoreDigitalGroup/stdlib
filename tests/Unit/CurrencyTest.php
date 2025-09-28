<?php

use EncoreDigitalGroup\StdLib\Objects\Geography\Currency;

describe("Currency Tests", function (): void {
    describe('Currency enum basic methods', function () {
        test('code method returns correct ISO currency codes', function () {
            expect(Currency::UnitedStates->code())->toBe('USD')
                ->and(Currency::Eurozone->code())->toBe('EUR')
                ->and(Currency::Japan->code())->toBe('JPY')
                ->and(Currency::UnitedKingdom->code())->toBe('GBP');
        });

        test('symbol method returns correct currency symbols', function () {
            expect(Currency::UnitedStates->symbol())->toBe('$')
                ->and(Currency::Eurozone->symbol())->toBe('€')
                ->and(Currency::Japan->symbol())->toBe('¥')
                ->and(Currency::UnitedKingdom->symbol())->toBe('£');
        });

        test('local method returns correct local currency names', function () {
            expect(Currency::UnitedStates->local())->toBe('dollar')
                ->and(Currency::Eurozone->local())->toBe('euro')
                ->and(Currency::Japan->local())->toBe('yen')
                ->and(Currency::UnitedKingdom->local())->toBe('pound');
        });
    });

    describe('Currency instance format method', function () {
        test('formats basic amounts with default precision', function () {
            expect(Currency::UnitedStates->format(1000))->toBe('$10.00')
                ->and(Currency::Eurozone->format(1000))->toBe('€10.00')
                ->and(Currency::Japan->format(1000))->toBe('¥10.00')
                ->and(Currency::UnitedKingdom->format(1000))->toBe('£10.00');
        });

        test('formats amounts with custom precision', function () {
            expect(Currency::UnitedStates->format(1000, 0))->toBe('$10')
                ->and(Currency::UnitedStates->format(1000, 3))->toBe('$10.000')
                ->and(Currency::Japan->format(1000, 0))->toBe('¥10');
        });

        test('formats large amounts correctly', function () {
            expect(Currency::UnitedStates->format(1234567))->toBe('$12,345.67')
                ->and(Currency::Eurozone->format(1234567))->toBe('€12,345.67');
        });

        test('formats small amounts correctly', function () {
            expect(Currency::UnitedStates->format(1))->toBe('$0.01')
                ->and(Currency::UnitedStates->format(0))->toBe('$0.00');
        });

        test('handles different currency symbol placements', function () {
            expect(Currency::UnitedStates->format(100))->toBe('$1.00')
                ->and(Currency::Eurozone->format(100))->toBe('€1.00');
        });
    });

    describe('Currency static format method', function () {
        test('formats with custom symbol and default settings', function () {
            expect(Currency::format(1000, '$'))->toBe('$10.00')
                ->and(Currency::format(1000, '€'))->toBe('€10.00')
                ->and(Currency::format(1000, '£'))->toBe('£10.00');
        });

        test('formats with custom precision', function () {
            expect(Currency::format(1000, '$', 0))->toBe('$10')
                ->and(Currency::format(1000, '$', 3))->toBe('$10.000')
                ->and(Currency::format(1000, '$', 1))->toBe('$10.0');
        });

        test('formats with custom decimal separator', function () {
            expect(Currency::format(1000, '€', 2, ','))->toBe('€10,00')
                ->and(Currency::format(1500, '$', 2, ','))->toBe('$15,00');
        });

        test('formats with custom thousands separator', function () {
            expect(Currency::format(1000, '$', 2, '.', ' '))->toBe('$10.00')
                ->and(Currency::format(12345, '€', 2, ',', '.'))->toBe('€123,45');
        });

        test('formats with all custom parameters', function () {
            expect(Currency::format(12345, 'CHF', 1, ',', '.'))->toBe('CHF123,5')
                ->and(Currency::format(98765, 'kr', 0, '.', ' '))->toBe('kr988');
        });

        test('handles edge cases with zero amounts', function () {
            expect(Currency::format(0, '$'))->toBe('$0.00')
                ->and(Currency::format(0, '$', 0))->toBe('$0');
        });

        test('handles large numbers', function () {
            expect(Currency::format(1234567890, '$'))->toBe('$12,345,678.90')
                ->and(Currency::format(1000000, '€', 2, ',', '.'))->toBe('€10.000,00');
        });
    });

    describe('Currency format method error handling', function () {
        test('throws exception for unknown instance methods', function () {
            expect(fn() => Currency::UnitedStates->unknownMethod())
                ->toThrow(BadMethodCallException::class, 'Method unknownMethod does not exist on Currency enum');
        });

        test('throws exception for unknown static methods', function () {
            expect(fn() => Currency::unknownStaticMethod())
                ->toThrow(BadMethodCallException::class, 'Static method unknownStaticMethod does not exist on Currency enum');
        });
    });

    describe('Currency format real-world scenarios', function () {
        test('formats common financial amounts', function () {
            expect(Currency::UnitedStates->format(99))->toBe('$0.99')
                ->and(Currency::UnitedStates->format(9999))->toBe('$99.99')
                ->and(Currency::UnitedStates->format(10000))->toBe('$100.00')
                ->and(Currency::UnitedStates->format(1000000))->toBe('$10,000.00');
        });

        test('formats different currency styles', function () {
            expect(Currency::Brazil->format(1000))->toBe('R$10.00')
                ->and(Currency::SouthAfrica->format(1000))->toBe('R10.00')
                ->and(Currency::Poland->format(1000))->toBe('zł10.00')
                ->and(Currency::Thailand->format(1000))->toBe('฿10.00');
        });

        test('supports various precision requirements', function () {
            // No decimals for currencies like Japanese Yen
            expect(Currency::Japan->format(1000, 0))->toBe('¥10')
                // Standard 2 decimals for most currencies
                ->and(Currency::UnitedStates->format(1000, 2))->toBe('$10.00')
                // High precision for specialized use
                ->and(Currency::UnitedStates->format(1000, 8))->toBe('$10.00000000');
        });
    });
});

