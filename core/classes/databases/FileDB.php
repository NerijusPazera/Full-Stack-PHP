<?php

namespace Core\Databases;

class FileDB
{
    private $file_name;
    private $data;

    /**
     * Konstruktorius nustatantis $file_name (vieta kur bus issaugotas failas) pagal paduota parametra.
     * FileDB constructor.
     * @param $file_name
     */
    public function __construct($file_name)
    {
        $this->file_name = $file_name;
    }

    /**
     * Metodas nustatantis $data masyva, pagal gauta paramaetra.
     * @param $data_array
     */
    public function setData(array $data_array): void
    {
        $this->data = $data_array;
    }

    /**
     * Metodas issaugantis $data masyva i faila. (vieta nurodyta $file_name).
     * @return bool
     */
    public function save(): bool
    {
        $string = json_encode($this->data);
        $bytes_written = file_put_contents($this->file_name, $string);

        if ($bytes_written !== false) {
            return true;
        }

        return false;

    }

    /**
     * Metodas uzkraunantis masyva is failo i $data.
     */
    public function load(): void
    {
        if (file_exists($this->file_name)) {
            $data = file_get_contents($this->file_name);
            if ($data !== false) {
                $this->data = json_decode($data, true);
            }
        } else {
            $this->data = [];
        }
    }

    /**
     * Metodas grazinantis $data masyva.
     * @return array|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * Metodas sukuriantis tuscia masyva $table_name indeksu.
     * @param $table_name
     * @return bool
     */
    public function createTable(string $table_name): bool
    {
        if (!$this->tableExists($table_name)) {

            $this->data[$table_name] = [];

            return true;
        }

        return false;
    }

    /**
     * Metodas tikrinantis ar toks table jau egzistuoja.
     * @param string $table_name
     * @return bool
     */
    public function tableExists(string $table_name): bool
    {
        if (isset($this->data[$table_name])) {

            return true;
        }

        return false;
    }

    /**
     * Metodas istrinantis nurodyta table kartu su indeksu.
     * @param $table_name
     * @return bool
     */
    public function dropTable(string $table_name): bool
    {
        if ($this->tableExists($table_name)) {
            unset($this->data[$table_name]);

            return true;
        }

        return false;
    }

    /**
     * Metodas istrinanti table duomenis, bet ne visa table.
     * @param $table_name
     * @return bool
     */
    public function truncateTable(string $table_name): bool
    {
        if ($this->tableExists($table_name)) {
            $this->data[$table_name] = [];

            return true;
        }

        return false;
    }

    /**
     * metodas israsantis eilutes masyva ($row) i table.
     * @param string $table_name
     * @param array $row
     * @param null $row_id
     * @return bool|int
     */
    public function insertRow(string $table_name, array $row, $row_id = null)
    {
        if ($row_id == null) {
            $this->data[$table_name][] = $row;

            return array_key_last($this->data[$table_name]);

        } elseif (!$this->rowExists($table_name, $row_id)) {
            $this->data[$table_name][$row_id] = $row;

            return $row_id;
        }

        return false;
    }

    /**
     * Metodas patikrinantis ar table egzistuoja eilute su nurodytu indeksu.
     * @param string $table_name
     * @param $row_id
     * @return bool
     */
    public function rowExists(string $table_name, $row_id): bool
    {
        if (isset($this->data[$table_name][$row_id])) {

            return true;
        }

        return false;
    }

    /**
     * Metodas perasantis eilute indeksu $row_id i masyva $row.
     * @param string $table_name
     * @param $row_id
     * @param array $row
     * @return bool
     */
    public function updateRow(string $table_name, $row_id, array $row): bool
    {
        if ($this->rowExists($table_name, $row_id)) {
            $this->data[$table_name][$row_id] = $row;

            return true;
        }

        return false;
    }

    /**
     * Metodas istrinantis nurodyta ($row_id) eilute.
     * @param string $table_name
     * @param $row_id
     * @return bool
     */
    public function deleteRow(string $table_name, $row_id): bool
    {
        if ($this->rowExists($table_name, $row_id)) {
            unset($this->data[$table_name][$row_id]);

            return true;
        }

        return false;
    }

    /**
     * Metodas grazinantis nurodyta ($row_id) eilute.
     * @param string $table_name
     * @param $row_id
     * @return mixed
     */
    public function getRowById(string $table_name, $row_id)
    {
        if ($this->rowExists($table_name, $row_id)) {
            return $this->data[$table_name][$row_id];
        }

        return false;
    }

    /**
     * Metodas, grazinantis eiluciu masyva ($results), kurios atitinka nurodytus kriterijus ($conditions).
     * @param string $table_name
     * @param array $conditions
     * @return array
     */
    public function getRowsWhere(string $table_name, array $conditions = []): array
    {
        $results = [];

        foreach ($this->data[$table_name] as $row_id => $row) {
            $passed = true;

            foreach ($conditions as $condition_id => $condition_value) {
                if (!isset($row[$condition_id]) || $row[$condition_id] != $condition_value) {
                    $passed = false;
                    break;
                }
            }
            if ($passed) {
                $results[$row_id] = $row;
            }
        }

        return $results;
    }

    public function getRowWhere(string $table_name, array $conditions = []): array
    {
        $results = $this->getRowsWhere($table_name, $conditions);

        return reset($results);
    }

}

