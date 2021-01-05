<?php

declare(strict_types=1);

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\start;

const MIN = 5;
const MAX = 10;

const STEP_MIN = 1;
const STEP_MAX = 5;

const START_MIN = 1;
const START_MAX = 99;

const DESCRIPTION = 'What number is missing in the progression?';

function run(): void
{
    $game = function (): array {
        $progression = getProgression();
        $missedPos = getMissedPos($progression);

        $question = getQuestion($progression, $missedPos);
        $correctAnswer = getAnswer($progression, $missedPos);
        return [$question, $correctAnswer];
    };

    start($game, DESCRIPTION);
}

function getQuestion(array $progression, int $missedPos): string
{
    $progression[$missedPos] = '..';
    return implode(' ', $progression);
}

function getAnswer(array $progression, int $missedPos): string
{
    return (string) $progression[$missedPos];
}

function getProgression(): array
{
    $count = random_int(MIN, MAX);
    $step = random_int(STEP_MIN, STEP_MAX);

    $progression = [];
    $number = random_int(START_MIN, START_MAX);
    for ($i = 0; $i < $count; $i++) {
        $progression[] = $number;
        $number += $step;
    }

    return $progression;
}

function getMissedPos(array $progression): int
{
    return array_rand($progression);
}
