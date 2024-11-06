<?php

namespace EncoreDigitalGroup\StdLib\Objects;

use EncoreDigitalGroup\StdLib\Exceptions\NullExceptions\ArgumentNullException;
use Illuminate\Support\Arr as ArraySupport;
use TypeError;

/** @api */
class Arr extends ArraySupport
{

    /** @deprecated use Arr::toShort() instead. */
    public static function convertToShortSyntax(array|string $code): array|string
    {
        return static::toShort($code);
    }

    public static function toShort(array|string $code): array|string
    {
        // Regular expression to match long array syntax
        $pattern = '/array\s*\(([^()]*(?:(?R)[^()]*)*)\)/m';

        // Callback function to replace long array syntax with short array syntax
        $callback = function ($matches): string {
            // Recursively convert nested arrays
            $innerArray = $matches[1];
            $convertedInnerArray = self::toShort($innerArray);

            // Handle proper formatting of nested arrays
            $convertedInnerArray = preg_replace('/\n\s*/', ' ', $convertedInnerArray);

            if (!is_string($convertedInnerArray)) {
                throw new TypeError(str_concat_space('Expected string, got ', get_type($convertedInnerArray)));
            }

            return "[\n    " . $convertedInnerArray . "\n]";
        };

        /**
         * Replace all instances of long array syntax with short array syntax
         */
        $convertedCode = preg_replace_callback($pattern, $callback, $code);

        /** Ensure array brackets are properly placed on the same line as the key. This regex searches for an
         * opening square bracket '[' followed by one or more whitespace characters '\s+' and replaces it with
         * the same opening bracket '[' followed by a new line '\n', ensuring the array's opening bracket appears
         * on its own line.
         */
        $convertedCode = preg_replace('/\[\s+/', "[\n", $convertedCode ?? '');

        /**
         * Ensure array brackets are properly placed on the same line as the key (closing brackets). This regex searches
         * for a closing square bracket ']' followed by one or more whitespace characters '\s+' and replaces it with just
         * the closing bracket ']', ensuring that the array's closing bracket is placed correctly without extra whitespace.
         */
        $convertedCode = preg_replace('/\]\s+/', '] ', $convertedCode ?? '');

        /**
         * Ensure array brackets are properly placed on the same line as the key (opening brackets in nested arrays). This regex
         * searches for a comma ',' followed by one or more whitespace characters '\s+' and an opening square bracket '[' and
         * replaces it with just a comma ',' followed by a space and an opening bracket '[', ensuring proper spacing between the
         * comma and the opening bracket in nested arrays.
         */
        $convertedCode = preg_replace('/,\s+\[/', ', [', $convertedCode ?? '');

        /**
         * Add new lines after commas that are outside of array values. This regex searches for a comma ',' followed by zero or
         * more whitespace characters '\s*' and a closing square bracket ']' and replaces it with just a comma ',' followed by a
         * new line '\n' and a closing bracket ']', ensuring that a new line is triggered before the closing bracket ']'.
         */
        $convertedCode = preg_replace('/,\s*\]/', ",\n]", $convertedCode ?? '');

        /**
         * Format array keys to ensure brackets are on the same line. This regex matches and captures an opening square bracket '\['
         * followed by zero or more whitespace characters '\s*', then captures any characters that are not commas, closing or opening
         * square brackets '([^,\]\[]+?)', and finally captures a closing square bracket '\]'. It replaces the matches with the captured
         * groups, ensuring the brackets are not separated by whitespace.
         */
        $convertedCode = preg_replace('/(\[)\s*([^,\]\[]+?)\s*(\])/', '$1$2$3', $convertedCode ?? '');

        /**
         * Add new lines after closing brackets of arrays. This regex searches for a closing bracket ']' followed by zero or more whitespace
         * characters '\s*' and a comma ',' and replaces it with just the closing bracket ']' followed by a new line '\n', ensuring each array
         * element is on a new line.
         */
        $convertedCode = preg_replace('/\]\s*,/', "],\n", $convertedCode ?? '');

        /**
         * Replace every occurrence of a comma ',' in the $convertedCode string with a comma followed by a newline ",\n".
         */
        $convertedCode = preg_replace('/,/', ",\n", $convertedCode ?? '');

        /**
         * Add indentation for nested arrays. This regex searches for a comma ',' followed by zero or more whitespace characters '\s*', a new line
         * '\n', zero or more whitespace characters '\s*', and an opening square bracket '[' and replaces it with a comma ',' followed by a new line
         * '\n' and indentation '    ' equivalent to four spaces and an opening square bracket '['.
         */
        $convertedCode = preg_replace('/,\s*\n\s*\[/', ",\n    [", $convertedCode ?? '');

        /**
         * Add a new line after the closing bracket of the entire array declaration. This regex searches for a closing bracket ']' followed by zero or
         * more whitespace characters '\s*' and a semicolon ';' and replaces it with just the closing bracket ']' followed by a semicolon ';' and a new
         * line '\n'.
         */
        $convertedCode = preg_replace('/\]\s*;/', '];', $convertedCode ?? '');

        $convertedCode = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $convertedCode ?? '');

        if (is_null($convertedCode) || empty($convertedCode)) {
            throw new ArgumentNullException('convertedCode');
        }

        return $convertedCode;
    }
}
