<?php

namespace Core;

class DataHolder
{
    /**
     * Constructor.
     * @param array|null $data
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->_setData($data);
        }
    }

    /**
     * Calls out when object property is set to some value.
     * @param $property_key
     * @param $value
     */
    public function __set($property_key, $value)
    {
        if ($method = $this->_getSetterMethod($property_key)) {
            $this->{$method}($value);
        }
    }

    /**
     * Calls out when object property is given only.
     * @param $property_key
     * @return mixed
     */
    public function __get($property_key)
    {
        if ($method = $this->_getGetterMethod($property_key)) {
            return $this->{$method}();
        }
    }

    /**
     * Checks if setter method exists.
     * @param $property_key
     * @return string|null
     */
    private function _getSetterMethod($property_key): ?string
    {
        $method = $this->_keyToMethod('set', $property_key);
        if (method_exists($this, $method)) {
            return $method;
        }

        return false;
    }

    /**
     * Checks if getter method exists.
     * @param $property_key
     * @return string|null
     */
    private function _getGetterMethod($property_key): ?string
    {
        $method = $this->_keyToMethod('get', $property_key);
        if (method_exists($this, $method)) {
            return $method;
        }

        return false;
    }

    /**
     * Generates method name from property name.
     * @param $prefix
     * @param $property_key
     * @return string
     */
    private function _keyToMethod($prefix, $property_key)
    {
        return $prefix . str_replace('_', '', $property_key);
    }

    /**
     * Metodas grazinantis parametro pavadinima pagal paduoto metodo pavadinima.
     * @param $prefix
     * @param $method
     * @return string
     */
    private function _methodToKey(string $prefix, string $method): string
    {
        $output = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $method));
        return str_replace($prefix . '_', '', $output);
    }


    /**
     * Metodas grazinantis visu properciu raktus,
     * Kuriuos galima nustatyti su aprasytais get'eriais.
     * @return array
     */
    private function _getPropertyKeys(): array
    {
        $keys = [];
        $class_methods = get_class_methods($this);

        foreach ($class_methods as $method) {
            if (preg_match('/^get/', $method)) {
                $keys[] = $this->_methodToKey('get', $method);
            }
        }

        return $keys;
    }

    /**
     * Metodas kvieciantis atitinkama set'eri, keikvienam paduoto $data masyvo indeksui.
     * @param array $data
     */
    public function _setData(array $data): void
    {
        foreach ($data as $property_key => $value) {
            $this->__set($property_key, $value);
        }
    }

    /**
     * Metodas grazinantis reiksmiu masyva is visu property.
     * @return array|null
     */
    public function _getData(): ?array
    {
        $results = [];

        foreach ($this->_getPropertyKeys() as $key) {
            $results[$key] = $this->__get($key);
        }

        return $results;
    }
}