<?php

test('Array converts to short syntax without error', function () {
    $longSyntax = require 'tests/test_files/array_short_syntax_test/long_syntax.php';

    $longSyntax = var_export($longSyntax, true);
    $shortSyntax = arr_to_short_syntax($longSyntax);

    $tmp = "<?php\n\nreturn " . $shortSyntax . ";\n";

    file_put_contents('tests/test_files/array_short_syntax_test/tmp_short_syntax.php', $tmp);

    $shortSyntaxFile = require 'tests/test_files/array_short_syntax_test/short_syntax.php';
    $tmpSyntaxFile = require 'tests/test_files/array_short_syntax_test/tmp_short_syntax.php';

    $this->assertEquals($shortSyntaxFile, $tmpSyntaxFile);
});