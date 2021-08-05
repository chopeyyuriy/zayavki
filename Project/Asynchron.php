<?php

namespace Project;


use Symfony\Component\Process\Process;

class Asynchron
{
    /**
     * Asynchron constructor.
     * @param array $scripts
     * @param callable|null $callbackFunction
     */
    public function __construct(array $scripts, ?callable $callbackFunction = null)
    {
        foreach ($scripts as $script) {
            $this->initProcess($script, $callbackFunction);
        }

        while (true) {
            sleep(1);

            $this->checkFinish();
        }
    }

    /**
     * @param $script
     * @param callable|null $callbackFunction
     * @return Process
     */
    private function initProcess($script, ?callable $callbackFunction): Process
    {
        $process = new Process(['php', $script]);
        $process->start($callbackFunction);

        $this->pullProccess[$process->getPid() . ':' . $script] = $process;

        return $process;
    }

    private function checkFinish(): void
    {
        if (empty($this->pullProccess)) {
            return;
        }

        foreach ($this->pullProccess as $nameProcess => $process) {
            if ($process instanceof Process && $process->isTerminated()) {
                echo $nameProcess . ' ' . $process->getOutput();
                unset($this->pullProccess[$nameProcess]);
            }

        }

    }
}