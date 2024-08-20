<?php

/**
 * This file contains the Cli class and related functions for the Brain Game project.
 *
 * @category BrainGame
 * @package  Hexlet\Code
 * @author   eclogeat <eclogeat@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://github.com/eclogeat/php-project-45
 */

namespace Hexlet\Code;

require_once __DIR__ . "/../vendor/autoload.php";

use function cli\line;
use function cli\prompt;

/**
 * Greets the user and asks for their name.
 *
 * @return void
 */
function greetings()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
