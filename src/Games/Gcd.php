<?php

namespace Brain\Games\Games\Gcd;

use function Brain\Games\Engine\playGames;

use const Brain\Games\Engine\NUMBER_OF_ROUND;

const RULE_OF_GAME = 'Find the greatest common divisor of given numbers.';

function playGamesGcd(): void
{
    $questionsAndResults = [];
    for ($i = 0; $i < NUMBER_OF_ROUND; $i++) {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $question = "$num1 $num2";
        $result = isGCD($num1, $num2);
        $questionsAndResults[$question] = (string) $result;
    }
    playGames(RULE_OF_GAME, $questionsAndResults);
}
function isGCD(int $num1, int $num2): int
{
    while ($num2 !== 0) {
        $temp = $num1 % $num2;
        $num1 = $num2;
        $num2 = $temp;
    }
    return $num1;
}
