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

    public function find(string $slug): ?Note
    {
        $query = $this->pdo->prepare(
            "SELECT * FROM {$this->table} WHERE slug = '{$slug}'"
        );
        $query->execute();
        $result = $query->fetch();
        // $this->hydrate($result);
        if ($result) {
            $note = new Note();
            $note->hydrate($result);
            return $note;
        } else {
            return null;
        }
    }

    public function findAll(): array
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table}");
        $query->execute();
        $results=$query->fetchAll();
        return $results;
        // $this->hydrate($results);
    }

    /**
     * Method hydrate()
     * To hydrate the object with the data from the database
     * @param array $data
     * @return void
     */
    public function hydrate(array $data): void
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if(method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    } 

    public function create(): void
    {
        $query = $this->pdo->prepare(
            "INSERT INTO {$this->table} ({$this->fields}) VALUES ({$this->values})"
        );
        $query->execute($this->valuesBinded);
    }

    public function update($slug): void
    {
        $query = $this->pdo->prepare(
            "UPDATE {$this->table} SET {$this->fields} WHERE slug = '{$slug}'"
        );
        $query->execute();
    }

    public function delete(string $slug, ?string $relation): void
    {
        if($relation) {
            $relationLower = strtolower($relation);
            $query = $this->pdo->prepare(
                "DELETE FROM {$this->table} WHERE {$relationLower} = {$slug}"
            );
            $query->execute();
        } else {
            $query = $this->pdo->prepare(
                "DELETE FROM {$this->table} WHERE id = {$slug}"
            );
            $query->execute();
        }
    }
}
// Don't write any code below this line