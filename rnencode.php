<?php
//
// This is only a SKELETON file for the "Run Length Encoding" exercise. It's been provided as a
// convenience to get you started writing code faster.
//

function encode($input)
{
    return preg_replace_callback(
        '/(.)\\1+/',
        function ($matches) {
            return strlen($matches[0]).$matches[1];
        },
        $input
    );
}

function decode($input)
{
    return preg_replace_callback(
        '/(\d+)([^0-9])/',
        function ($matches) {
            return str_repeat($matches[2], $matches[1]);
        },
        $input
    );
}
$code = encode('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABBBBBBBAAAAAAAAAAAAAAAABCCCCCCCBAAAAAAAAAAAAAABCCCCCCCCCBAAAAAAAAAAAABDDDDDDDDDDDBAAAAAAAAAAABDCDCDCDCDCDBAAAAAAAAAAAABEEEEEEEEEBAAFAAAAAAAAAABEEGGEEEGGBAAFAAAAAAAAABEEEBHEEEBHBAAFAAAAAAAAABEEEEEEEEEEBAAFAAAAAAAAABBEEEEEEEEEBAAFAAAAAAAAAABEEEEEBBEEBAAFAAAAAAAAAABEEEEEEEEEBAAAAAAAAAAAAABEEEIIIIBBBBBBAAAAAAAAAABEEEEBBBJJJJJKBAAAAAAAAABEEEEEEEBBBBBBAAAAAAAAAABEEEEEEEEBAAAAAAAAAAAAAABEEEBBBBBAAAAAAAAAAAAAAABEEEBAAAAAAAAAAAAAAAAAAABEEEBAAAAAAAAAAAAA');
echo $code."<br>";
$decode = substr(trim( chunk_split(decode($code), 1, '-') ), 0, -1);
echo $decode;
