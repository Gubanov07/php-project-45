<?php

namespace Brain\Games\Games\Progression;

use function Brain\Games\Engine\playGames;

use const Brain\Games\Engine\NUMBER_OF_ROUND;

const RULE_OF_GAME = 'What number is missing in the progression?';

function playProgression(): void
{
    $questionsAndResults = [];
    for ($i = 1; $i <= NUMBER_OF_ROUND; $i++) {
        $length = rand(5, 10);
        $first = rand(1, 100);
        $step = rand(1, 10);
        $hiddenPos = rand(0, ($length - 1));
        $progression = genProgression($length, $first, $step);
        list($question, $result) = makeQuestion($progression, $hiddenPos);
        $questionsAndResults[$question] = (string) $result;
    }
    playGames(RULE_OF_GAME, $questionsAndResults);
}

function genProgression(int $length, int $first, int $step): array
{
    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[$i] = $first + $i * $step;
    }
    return $progression;
}

function makeQuestion(array $progression, int $hiddenPos): array
{
    $question = '';
    $result = $progression[$hiddenPos];
    for ($i = 0; $i < count($progression); $i++) {
        $hiddenPos !== $i ? $question .= "$progression[$i] " : $question .= '.. ';
    }
    return [$question, $result];
}
