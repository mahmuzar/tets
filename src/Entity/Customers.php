<?php

namespace App\Entity;

use App\Repository\CustomersRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use DateTime;

/**
 * @ORM\Entity(repositoryClass=CustomersRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Customers {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
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

    public function getId(): ?int {
        return $this->id;
    }

    public function getPhone(): ?string {
        return $this->phone;
    }

    public function setPhone(string $phone): self {
        $this->phone = $phone;

        return $this;
    }

    public function getComment(): ?string {
        return $this->comment;
    }

    public function setComment(string $comment): self {
        $this->comment = $comment;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function setTimestamps() {
        if (empty($this->created_at)) {
            $this->created_at = new DateTime();
            $this->updated_at = new DateTime('00-00-00 00:00:00');
        } else {
            $this->updated_at = new DateTime();
        }
    }

}
