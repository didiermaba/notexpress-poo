<?php 

namespace models;

use models\AbstractModel;

class Category extends AbstractModel
{
    private int $id;
    private string $name;
    private string $image;
    protected string $table = 'categories';
    protected string $fields = 'name, image';
    protected string $values = ':name, :image';
    protected array $valuesBinded = [
        ':name' => '',
        ':image' => ''
    ];

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

     /**
     * Method bindValues()
     * To bind values to the query
     * @param void
     * @return void
     */
    public function bindValues(): void
    {
        $this->valuesBinded[':name'] = $this->name;
        $this->valuesBinded[':image'] = $this->image;
    }
}
// Don't write any code below this line