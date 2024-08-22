<?php

namespace BrainGames\Prime;

use function cli\line;
use function cli\prompt;

function playPrime()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, $name!");
    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    $correctAnswersCount = 0;
    $roundsToWin = 3;

    while ($correctAnswersCount < $roundsToWin) {
        $number = rand(1, 100);

        $correctAnswer = isPrime($number) ? 'yes' : 'no';

        line("Question: $number");
        $userAnswer = prompt('Your answer');

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

function isPrime($number)
{
    if ($number < 2) {
        return false;
    }

    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}
