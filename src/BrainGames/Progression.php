<?php

namespace BrainGames\Progression;

use function cli\line;
use function cli\prompt;

function playProgression()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, $name!");
    line('What number is missing in the progression?');

    $correctAnswersCount = 0;
    $roundsToWin = 3;

    while ($correctAnswersCount < $roundsToWin) {
        $progression = generateProgression();
        $hiddenIndex = rand(0, count($progression) - 1);
        $correctAnswer = $progression[$hiddenIndex];
        $progression[$hiddenIndex] = '..';

        line('Question: ' . implode(' ', $progression));
        $userAnswer = prompt('Your answer');

        if ($userAnswer == $correctAnswer) {
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

function generateProgression()
{
    $start = rand(1, 10);
    $step = rand(2, 5);
    $length = rand(5, 10);

    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $start + $i * $step;
    }

    return $progression;
}
