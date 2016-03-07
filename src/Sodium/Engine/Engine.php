<?php

namespace Sodium\Engine;

use Sodium\Contract\Cog\CogInterface;
use Sodium\Contract\Processor\ProcessorInterface;
use Sodium\Engine\Processor\InputProcessor;
use Sodium\Engine\Processor\ModelProcessor;

class Engine
{
    protected $input;
    public $inputProcessor;
    public $modelProcessor;
    protected static $cogs = array();
    protected static $processors = array();
    protected static $cogMethods = array();
    protected static $cogGlobalObj;

    public function __construct($input)
    {
        $this->input = $input;
    }

    public static function attachProcessor($name, ProcessorInterface $processor)
    {
        self::$processors[$name] = $processor;
    }

    public function getProcessor($name)
    {
        return self::$processors[$name];
    }

    public function run()
    {
        $this->inputProcessor = $this->getProcessor('input');
        $this->modelProcessor = $this->getProcessor('model');
        $this->inputProcessor->process($this->modelProcessor->getRegisteredModels());

        return $this;
    }

    public function reset()
    {
        $this->inputProcessor->clear();

        return $this;
    }

    public function create($input)
    {
        $duplicate = clone $this;
        $duplicate->input = $input;
        $duplicate->inputProcessor = $duplicate->inputProcessor->clear()->initiate($input)->process($this->modelProcessor->getRegisteredModels());

        return $duplicate;
    }

    /* Cogs */

    public static function attachCog(CogInterface $cog, $global = false)
    {
        if ($global) {
            self::$cogGlobalObj = $cog;
        }
        self::$cogs[get_class($cog)] = $cog;
        self::$cogMethods[get_class($cog)] = get_class_methods($cog);
    }

    public static function detachCog($cog)
    {
        unset(self::$cogs[$cog]);
        unset(self::$cogMethods[$cog]);
    }

    /* Input */

    public function useInput($index = 0)
    {
        $this->inputProcessor->useInput($index);

        return $this->run();
    }

    public function pushInput($input)
    {
        $this->inputProcessor->pushInput($input);

        return $this->run();
    }

    public function __call($method, $args)
    {
        $args[0] = empty($args[0]) ? null : $args[0];
        foreach (self::$cogs as $cog) {
            if (in_array($method, self::$cogMethods[get_class($cog)])) {
                return $cog->setEngine($this)->$method($args[0]);
            }
        }

        return self::$cogGlobalObj->setEngine($this)->process($method, $args);
    }
}
