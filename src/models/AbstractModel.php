<?php 

namespace models;

use utilities\Database;

abstract class AbstractModel
{
    protected $pdo;
    protected string $table;
    protected string $fields;
    protected string $values;
    protected array $valuesBinded;

    public function __construct()
    {
        $this->pdo = (new Database())->getPdo();
    }

    // Methods

    /**
     * Method create()
     * To add a new element in the database
     * @param void
     * @return void
     */
    public function create(): void
    {
        $query = $this->pdo->prepare(
            "INSERT INTO {$this->table} ({$this->fields}) VALUES ({$this->values})"
        );
        $query->execute($this->valuesBinded);
    }

    /**
     * Method edit()
     * To edit an element already in the database
     * @param int $id
     * @return void
     */
    public function edit($id): void
    {
        $query = $this->pdo->prepare(
            "UPDATE {$this->table} SET {$this->fields} WHERE id = {$id}"
        );
        $query->execute();
    }

    /**
     * Methods delete()
     * To delete a new element in the database
     * @param int $id
     * @param ?string $relation
     * @return void
     */
    public function delete(int $id, ?string $relation): void
    {
        if($relation) {
            $relationLower = strtolower($relation);
            $query = $this->pdo->prepare(
                "DELETE FROM {$this->table} WHERE {$relationLower} = {$id}"
            );
            $query->execute();
        } else {
            $query = $this->pdo->prepare(
                "DELETE FROM {$this->table} WHERE id = {$id}"
            );
            $query->execute();
        }
    }
}
// Don't write any code below this line