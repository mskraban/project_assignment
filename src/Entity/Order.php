<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderRepository::class)
 * @ORM\Table(name="`order`")
 */
class Order
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }


    private $sendTo;
    /**
     *@var string
     * @ORM\Column(type="string", length=255)
     */
    private $reciever;
    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $message;
    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $sender;
    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $membership;
    /**
     *@var string
     * @ORM\Column(type="string", length=255)
     */
    private $senderSelect;
    /**
     *@var string
     * @ORM\Column(type="string", length=255)
     */



    public function getSendTo(): ?string
    {
        return $this->sendTo;
    }


    public function setSendTo(string $sendTo): self
    {
        $this->sendTo = $sendTo;

        return $this;
    }

    public function getReciever(): ?string
    {
        return $this->reciever;
    }

    public function setReciever(string $reciever): self
    {
        $this->reciever = $reciever;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getSender(): ?string
    {
        return $this->sender;
    }

    public function setSender(string $sender): self
    {
        $this->sender = $sender;

        return $this;
    }

    public function getMembership(): ?string
    {
        return $this->membership;
    }

    public function setMembership(string $membership): self
    {
        $this->membership = $membership;

        return $this;
    }

    public function getSenderSelect(): ?string
    {
        return $this->senderSelect;
    }

    public function setSenderSelect(string $senderSelect): self
    {
        $this->senderSelect = $senderSelect;

        return $this;
    }
}
