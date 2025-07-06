<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const NUMBER_OF_ROUND = 3;

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