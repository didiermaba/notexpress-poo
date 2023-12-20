<?php 

namespace models;

use models\AbstractModel;

class Note extends AbstractModel
{
    private int $id;
    private string $title;
    private string $content;
    private int $user_id;
    protected string $table = 'notes';
    protected string $fields = 'title, content, user_id';
    protected string $values = ':title, :content, :user_id';
    protected array $valuesBinded = [
        ':title' => '',
        ':content' => '',
        ':user_id' => ''
    ];

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of user_id
     */ 
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

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
        $this->valuesBinded[':title'] = $this->title;
        $this->valuesBinded[':content'] = $this->content;
        $this->valuesBinded[':user_id'] = $this->user_id;
    }
}
// Don't write any code below this line