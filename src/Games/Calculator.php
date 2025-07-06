<?php

namespace Brain\Games\Games\Calculator;

use function Brain\Games\Engine\playGames;

use const Brain\Games\Engine\NUMBER_OF_ROUND;

const RULE_OF_ROUND = "What is the result of the expression?";

function Calculator(): void {
    $questionsAndResults = [];
    for ($i = 1; $i <= NUMBER_OF_ROUND; $i++) {
        list($qusetion, $result) = getRandomMathTasks();
        $questionsAndResults[$qusetion] = (string) $result;
    }
    playGames(RULE_OF_ROUND, $questionsAndResults);
}

function getRandomMathTasks(): array {
    $num1 = rand(1,20);
    $num2 = rand(1,20);
    $matOperator = ['+', '-', '*'];
    $random = $matOperator[array_rand($matOperator)];
    $qusetion = "$num1 $random $num2";
    $result = calculate($num1, $num2, $random);
    return [$qusetion, $result];
}

function calculate(int $num1, int $num2, string $matOperator): int {
    $result = null;
    switch ($matOperator) {
        case '+':
            $result = $num1 + $num2;
            break;
        case '-':
            $result = $num1 - $num2;
            break;
        case '*':
            $result = $num1 * $num2;
            break;
    }
    return $result;
}