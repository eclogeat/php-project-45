<?php

namespace BrainGames\Gcd;

use function cli\line;
use function cli\prompt;

function playGcd()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, $name!");
    line('Find the greatest common divisor of given numbers.');

    $correctAnswersCount = 0;
    $roundsToWin = 3;

    while ($correctAnswersCount < $roundsToWin) {
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);

        $correctAnswer = gcd($number1, $number2);

        line("Question: $number1 $number2");
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

function gcd($a, $b)
{
    while ($b != 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}
