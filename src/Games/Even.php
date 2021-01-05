<?php

declare(strict_types=1);

namespace BrainGames\Games\Even;

use function BrainGames\Engine\start;

const MIN = 1;
const MAX = 999;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

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
    return $number % 2 === 0 ? 'yes' : 'no';
}
