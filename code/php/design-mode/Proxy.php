<?php

/**
 * Record类
 */
class Record
{
    /**
     * @var array|null
     */
    protected $data;

    /**
     * @param null $data
     */
    public function __construct($data = null)
    {
        $this->data = (array) $data;
    }

    /**
     * magic setter
     *
     * @param string $name
     * @param mixed  $value
     *
     * @return void
     */
    public function __set($name, $value)
    {
        $this->data[(string) $name] = $value;
    }

    /**
     * magic getter
     *
     * @param string $name
     *
     * @return mixed|null
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[(string) $name];
        } else {
            return null;
        }
    }
}

/**
 * RecordProxy类
 */
class RecordProxy extends Record
{
    /**
     * @var bool
     */
    protected $isDirty = false;

    /**
     * @var bool
     */
    protected $isInitialized = false;

    /**
     * @param array $data
     */
    public function __construct($data)
    {
        parent::__construct($data);

        // when the record has data, mark it as initialized
        // since Record will hold our business logic, we don't want to
        // implement this behaviour there, but instead in a new proxy class
        // that extends the Record class
        if (null !== $data) {
            $this->isInitialized = true;
            $this->isDirty = true;
        }
    }

    /**
     * magic setter
     *
     * @param string $name
     * @param mixed  $value
     *
     * @return void
     */
    public function __set($name, $value)
    {
        $this->isDirty = true;
        parent::__set($name, $value);
    }
}

class ProxyTest
{
    public function testSetAttribute(){
        $data = [];
        $proxy = new RecordProxy($data);
        $proxy->xyz = false;
    }
}