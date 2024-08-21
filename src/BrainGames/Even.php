<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function playGame()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, $name!");
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $correctAnswersCount = 0;
    $roundsToWin = 3;

    while ($correctAnswersCount < $roundsToWin) {
        $number = rand(1, 100);
        line("Question: $number");
        $userAnswer = prompt('Your answer');

        $correctAnswer = isEven($number) ? 'yes' : 'no';

        if ($userAnswer === $correctAnswer) {
            line('Correct!');
            $correctAnswersCount++;
        } else {
            line("'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, $name!");
            return;
        }
    }

    line("Congratulations, $name!");
}

function isEven($number)
{
    return $number % 2 === 0;
}
