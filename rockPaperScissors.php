<?php

$weapons = ['pierre', 'papier', 'ciseaux'];
$prompt = "\e[1;33mEntrez votre nom: \e[0m";
echo $prompt;
$line = readline('');
(empty($line)) ? $username = 'player' : $username = $line;

$nbGames =0;
$scorePlayer = 0;
$scoreCPU = 0;
$keepPlaying = true;
$answerContinue = false;
$result = 0;

do {
    echo "\e[1;33mVos choix: pierre, papier, ciseaux: \e[0m" . PHP_EOL;
    $prompt = "\e[1;33mFaites votre choix: \e[0m";
    echo $prompt;
    $line = readline('');

    if (($line != 'pierre') && ($line != 'papier') && ($line != 'ciseaux')) {
        echo "\e[1;33mChoix Invalide.\e[0m" . PHP_EOL;
    }
    else {
        $cpu = $weapons[rand(0,2)];
        $result = testOpposition($line, $cpu);

        printDuel($line);
        printVS();
        printDuel($cpu);

        echo "\e[1;33mLe CPU a joué $cpu.\e[0m" . PHP_EOL;
        switch ($result) {
            case 0:
                echo "\e[1;33mEgalité.\e[0m" . PHP_EOL;
                break;
            case 1:
                $scorePlayer++;
                echo "\e[1;33mVictoire !!!!\e[0m" . PHP_EOL;
                break;
            case 2:
                $scoreCPU++;
                echo "\e[1;33mDéfaite.\e[0m" . PHP_EOL;
                break;
        }
        $nbGames++;
        echo "\e[1;33mNombre de parties: $nbGames. Score: $username: $scorePlayer  -  $scoreCPU :CPU\e[0m" . PHP_EOL;

        do {
            $prompt = "\e[1;33mVoulez-vous continuez y/n?: \e[0m";
            echo $prompt;
            $line = readline('');
            if ($line === 'y' || $line === 'n') $answerContinue = 1;
        } while(!$answerContinue);

        if ($line == 'n') $keepPlaying = false;
    }
}while($keepPlaying);

echo "\e[1;33mAu revoir.\e[0m" . PHP_EOL;

function testOpposition (string $player, string $cpu ) : int {

    // 0 tie
    // 1 player win
    // 2 cpu win
    switch ($player) {
        case 'pierre':
            switch ($cpu) {
                case 'papier':
                    return 2;
                    break;
                case 'ciseaux':
                    return 1;
                    break;
            }
            break;
        case 'papier':
            switch ($cpu) {
                case 'pierre':
                    return 1;
                    break;
                case 'ciseaux':
                    return 2;
                    break;
            }
            break;
        case 'ciseaux':
            switch ($cpu) {
                case 'pierre':
                    return 2;
                    break;
                case 'papier':
                    return 1;
                    break;
            }
            break;
        default:
            return 0;
            break;
    }
    return 0;
}

function printDuel (string $choice) {

    echo PHP_EOL;
    switch ($choice) {
        case 'pierre':
            echo PHP_EOL;
            echo "\e[0;31m    _______\e[0m" . PHP_EOL;
            echo "\e[0;31m---'   ____)\e[0m" . PHP_EOL;
            echo "\e[0;31m      (_____)\e[0m" . PHP_EOL;
            echo "\e[0;31m      (_____)\e[0m" . PHP_EOL;
            echo "\e[0;31m      (____)\e[0m" . PHP_EOL;
            echo "\e[0;31m---.__(___)\e[0m" . PHP_EOL;
            echo PHP_EOL;
            break;
        case 'papier':
            echo PHP_EOL;
            echo "\e[0;31m    _______\e[0m" . PHP_EOL;
            echo "\e[0;31m---'   ____)____\e[0m" . PHP_EOL;
            echo "\e[0;31m          ______)\e[0m" . PHP_EOL;
            echo "\e[0;31m          _______)\e[0m" . PHP_EOL;
            echo "\e[0;31m         _______)\e[0m" . PHP_EOL;
            echo "\e[0;31m---.__________)\e[0m" . PHP_EOL;
            echo PHP_EOL;
            break;
        case 'ciseaux':
            echo PHP_EOL;
            echo "\e[0;31m    _______\e[0m" . PHP_EOL;
            echo "\e[0;31m---'   ____)____\e[0m" . PHP_EOL;
            echo "\e[0;31m          ______)\e[0m" . PHP_EOL;
            echo "\e[0;31m       __________)\e[0m" . PHP_EOL;
            echo "\e[0;31m      (____)\e[0m" . PHP_EOL;
            echo "\e[0;31m---.__(___)\e[0m" . PHP_EOL;
            echo PHP_EOL;
            break;
        default:
            break;
    }
    echo PHP_EOL;
}

function printVS () {
    echo PHP_EOL;
    echo "\e[0;34m# #  ##     \e[0m" . PHP_EOL;
    echo "\e[0;34m# # #       \e[0m" . PHP_EOL;
    echo "\e[0;34m# #  #      \e[0m" . PHP_EOL;
    echo "\e[0;34m# #   #     \e[0m" . PHP_EOL;
    echo "\e[0;34m #  ##   #  \e[0m" . PHP_EOL;
    echo PHP_EOL;
    echo PHP_EOL;
}
