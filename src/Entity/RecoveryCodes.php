<?php

namespace App\Entity;

use App\Repository\RecoveryCodesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecoveryCodesRepository::class)
 */
class RecoveryCodes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $recovery_code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRecoveryCode(): ?int
    {
        return $this->recovery_code;
    }

    public function setRecoveryCode(int $recovery_code): self
    {
        $this->recovery_code = $recovery_code;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
