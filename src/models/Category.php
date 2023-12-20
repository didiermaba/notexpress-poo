<?php 

namespace models;

use models\Model;

class Category extends AbstractModel
{
    private int $id;
    private string $name;
    protected string $table = 'categories';

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
}
// Don't write any code below this line