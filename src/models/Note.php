<?php 

namespace models;

use models\AbstractModel;

class Note extends AbstractModel
{
    private string $title;
    private string $content;
    private string $slug;
    private string $image;
    protected string $table = 'notes';
    protected string $fields = 'title, slug, content, image';
    protected string $values = ':title, :slug, :content, :image';
    protected array $valuesBinded = [
        ':title' => '',
        ':slug' => '',
        ':content' => '', 
        ':image' => ''
    ];

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle($title): Note
    {
        $this->title = $title;
        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug($slug): Note
    {
        $this->slug = $slug;
        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent($content): Note
    {
        $this->content = $content;
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
        $this->valuesBinded[':slug'] = $this->slug;
        $this->valuesBinded[':content'] = $this->content;
        $this->valuesBinded[':image'] = $this->image;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
}
// Don't write any code below this line