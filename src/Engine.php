<?php

declare(strict_types=1);

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS = 3;

function start(callable $game, string $description): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line($description);

    $corrects = 0;
    while ($corrects < ROUNDS) {
        [$question, $correctAnswer] = $game();
        line("Question: %s", $question);
        $answer = prompt('Your answer');

        if ($answer === $correctAnswer) {
            line('Correct!');
            $corrects++;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line('Let\'s try again, %s!', $name);
            $corrects = 0;
        }
    }

    line("Congratulations, %s!", $name);
}
