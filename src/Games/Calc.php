<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\start;

const MIN = 1;
const MAX = 99;
const OPERATORS = ['+', '-', '*'];

const DESCRIPTION = 'What is the result of the expression?';

function run(): void
{
    $game = function (): array {
        $num1 = random_int(MIN, MAX);
        $num2 = random_int(MIN, MAX);
        $operator = OPERATORS[array_rand(OPERATORS)];

        $question = getQuestion($num1, $num2, $operator);
        $correctAnswer = getAnswer($num1, $num2, $operator);
        return [$question, $correctAnswer];
    };

    start($game, DESCRIPTION);
}

function getQuestion(int $num1, int $num2, string $operator): string
{
    return "{$num1} {$operator} {$num2}";
}

function getAnswer(int $num1, int $num2, string $operator): string
{
    return (string) calculate($num1, $num2, $operator);
}

function calculate(int $num1, int $num2, string $operator): int
{
    $operations = [
        '+' => fn (int $num1, int $num2) => $num1 + $num2,
        '-' => fn (int $num1, int $num2) => $num1 - $num2,
        '*' => fn (int $num1, int $num2) => $num1 * $num2
    ];

    $handler = $operations[$operator];
    return $handler($num1, $num2);
}
