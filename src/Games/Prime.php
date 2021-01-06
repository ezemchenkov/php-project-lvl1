<?php

declare(strict_types=1);

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\start;

const MIN = 1;
const MAX = 999;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function run(): void
{
    $game = function (): array {
        $question = getQuestion();
        $correctAnswer = getAnswer($question);
        return [$question, $correctAnswer];
    };

    start($game, DESCRIPTION);
}

function getQuestion(): int
{
    return random_int(MIN, MAX);
}

function getAnswer(int $number): string
{
    return isPrime($number) ? 'yes' : 'no';
}

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }

    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}
