<?php

namespace BrainGames\Games\Even;

use function cli\line;
use function cli\prompt;

const MIN = 1;
const MAX = 999;

const ANSWER_YES = 'yes';
const ANSWER_NO = 'no';

const ROUNDS = 3;

function run(): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line('Answer "yes" if the number is even, otherwise answer "no".');

    $countCorrects = 0;
    while ($countCorrects < ROUNDS) {
        $number = getNumber();
        line("Question: %s", $number);

        $answer = prompt('Your answer');

        if (isEven($number)) {
            $correctAnswer = ANSWER_YES;
        } else {
            $correctAnswer = ANSWER_NO;
        }

        if ($answer === $correctAnswer) {
            $countCorrects++;
            line('Correct!');
        } else {
            $countCorrects = 0;
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line('Let\'s try again, %s!', $name);
        }
    }

    line("Congratulations, %s", $name);
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function getNumber(): int
{
    return random_int(MIN, MAX);
}
