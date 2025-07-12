<?php

namespace Brain\Games\Games\Even;

use function Brain\Games\Engine\playGames;

use const Brain\Games\Engine\NUMBER_OF_ROUND;

const RULE_OF_GAME = 'Answer "yes" if the number is even, otherwise answer "no".';
function playParityCheck(): void
{
    $questionsAndResult = [];
    for( $i = 0; $i < NUMBER_OF_ROUND; $i++ ) {
        $question = rand(1, 100);
        isEven($question) ? $result = 'yes' : $result = 'no';
        $questionsAndResult[$question] = $result;
    }
    playGames(RULE_OF_GAME, $questionsAndResult);
}

function isEven(int $number): bool 
{
    return $number %2 === 0;
}
