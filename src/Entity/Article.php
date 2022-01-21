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

    /** 
     * @ORM\ManyToOne(targetEntity="Member")
     * @ORM\JoinColumn (name="FK_id_member", referencedColumnName="id")
    */
    private User | Admin $author;

    public function __construct(string $title, User | Admin $author, string $content){ //parametre
        $this->title = $title;
        $this->author = $author; //propriete de l'objet (instance)
        $this->contents = $content;
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

