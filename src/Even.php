<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;


const NUMBER_OF_ROUND = 3;

const RULE_OF_GAME = 'Answer "yes" if the number is even, otherwise answer "no".';

function playGames(string $rulesOfTheGame, array $questionsAndResults): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($rulesOfTheGame);
    foreach ($questionsAndResults as $question => $result) {
        line('Question: %s', $question);
        $answer = prompt('Your answer');
        if ($result === $answer) {
            line('Correct!');
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$result'.");
            line("Let's try again, %s!", $name);
            return;
        }
    }
    line("Congratulations, %s!", $name);
}

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

function isEven(int $number): bool {
    return $number %2 === 0;
}

