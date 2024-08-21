<?php

namespace BrainGames\Calc;

use function cli\line;
use function cli\prompt;

function playCalc()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, $name!");
    line('What is the result of the expression?');

    $correctAnswersCount = 0;
    $roundsToWin = 3;

    $operations = ['+', '-', '*'];

    while ($correctAnswersCount < $roundsToWin) {
        $number1 = rand(1, 20);
        $number2 = rand(1, 20);
        $operation = $operations[array_rand($operations)];

        $question = "$number1 $operation $number2";
        $correctAnswer = calculate($number1, $number2, $operation);

        line("Question: $question");
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

function calculate($number1, $number2, $operation)
{
    switch ($operation) {
        case '+':
            return $number1 + $number2;
        case '-':
            return $number1 - $number2;
        case '*':
            return $number1 * $number2;
        default:
            throw new \Exception('Unknown operation: ' . $operation);
    }
}
