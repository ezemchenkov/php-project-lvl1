<?php

declare(strict_types=1);

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\start;

const MIN = 1;
const MAX = 99;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function run(): void
{
    $game = function (): array {
        $num1 = random_int(MIN, MAX);
        $num2 = random_int(MIN, MAX);

        $question = getQuestion($num1, $num2);
        $correctAnswer = getAnswer($num1, $num2);
        return [$question, $correctAnswer];
    };

    start($game, DESCRIPTION);
}

function getQuestion(int $num1, int $num2): string
{
    return "{$num1} {$num2}";
}

function getAnswer(int $num1, int $num2): string
{
    return (string) gcd($num1, $num2);
}

function gcd(int $num1, int $num2): int
{
    while ($num1 !== 0 && $num2 !== 0) {
        if ($num1 > $num2) {
            $num1 %= $num2;
        } else {
            $num2 %= $num1;
        }
    }

    return $num1 + $num2;
}
