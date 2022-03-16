<?php

namespace App\Entity;

use App\Repository\InvoiceLineRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InvoiceLineRepository::class)]
class InvoiceLine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    #[ORM\Column(type: 'string')]
    private $description;

    public function getDescription(): ?string
    {
        return $this->description;
    }

    #[ORM\Column(type: 'integer')]
    private $quantity;

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    #[ORM\ManyToOne(targetEntity: Invoice::class, inversedBy: 'invoiceline')]
    #[ORM\JoinColumn(nullable: false)]
    private $invoice;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $amount;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private $vat;

    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    public function setInvoice(?Invoice $invoice): self
    {
        $this->invoice = $invoice;

        return $this;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(?string $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getVat(): ?string
    {
        return $this->vat;
    }

    public function setVat(?string $vat): self
    {
        $this->vat = $vat;

        return $this;
    }

}
