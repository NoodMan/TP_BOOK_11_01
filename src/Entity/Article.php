<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;



 /** @ORM\Entity
  * @ORM\Table(name="Article")*/

final class Article {

     /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * */
    private int $id; 

    /** @ORM\Column(length=255) */
    private string $title;

    /** @ORM\Column(length=255) */
    private string $contents;

    /** @ORM\Column(length=150) */
    private string $author;

    public function __construct(string $title, Member $author){ //parametre
        $this->title = $title;
        $this->author = $author; //propriete de l'objet (instance)
    }

    public function getID(): string{
        return $this->ID;
    }

    public function getTitle(): string{
        return $this->title;
    }

    public function setTitle(string $newTitle): self{
        return $this->title = $newTitle;
        return $this;
    }
    public function getContents(): string{
        return $this->contents;
    }

    public function setContents(string $newContents): self{
        return $this->contents = $newContents;
        return $this;
    }

    public function getAuthor(): Member{
        return $this->author;
    }

    public function setAuthor (Member $newAuthor): self{
        return $this->author = $newAuthor;
        return $this;
    }
}