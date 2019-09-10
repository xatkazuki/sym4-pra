<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TaskManagementRepository")
 */
class TaskManagement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $status;

    /**
     * @ORM\Column(type="text")
     */
    private $task;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    public function getId()//: ?int
    {
        return $this->id;
    }

  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }
    public function getName()//: ?string
    {
        return $this->name;
    }

    public function setName($name)//: self
    {
        $this->name = $name;

        return $this;
    }

    public function getStatus()//: ?string
    {
        return $this->status;
    }

    public function setStatus($status)//: self
    {
        $this->status = $status;

        return $this;
    }

    public function getTask()//: ?string
    {
        return $this->task;
    }

    public function setTask($task)//: self
    {
        $this->task = $task;

        return $this;
    }

    public function getComment()//: ?string
    {
        return $this->comment;
    }

    public function setComment($comment)//: self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getCreatedAt()//: ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at)//: self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt()//: ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at)//: self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
