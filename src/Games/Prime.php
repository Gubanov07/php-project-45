<?php

namespace Brain\Games\Games\Prime;

use function Brain\Games\Engine\playGames;

use const Brain\Games\Engine\NUMBER_OF_ROUND;

const RULE_OF_GAME = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function PrimeNumber(): void
{
    $questionsAndResults = [];
    for ($i = 0; $i < NUMBER_OF_ROUND; $i++) {
        $question = rand(2, 100);
        isPrime($question) ? $result = 'yes' : $result = 'no';
        $questionsAndResults[$question] = $result;
    }
    playGames(RULE_OF_GAME, $questionsAndResults);
}

function isPrime(int $number): bool {
    if ($number < 2) {
        return false;
    }
    for($i = 2; $i <=sqrt($number); $i++) {
            if ($number % $i == 0) {
                return false;
        }
    }
    return true;
}