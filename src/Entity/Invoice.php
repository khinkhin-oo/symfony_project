<?php

namespace App\Entity;

use App\Repository\InvoiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InvoiceRepository::class)]
class Invoice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    #[ORM\Column(type: 'datetime')]
    private $invoice_date;


    public function getInvoiceDate(): ?int
    {
        return $this->invoice_date;
    }

     #[ORM\Column(type: 'integer')]
    private $invoice_number;

    public function getInvoiceNumber(): ?int
    {
        return $this->invoice_number;
    }

    #[ORM\Column(type: 'integer')]
    private $customer_id;

    #[ORM\OneToMany(mappedBy: 'invoice', targetEntity: InvoiceLine::class)]
    private $invoiceline;

    public function __construct()
    {
        $this->invoiceline = new ArrayCollection();
    }

    public function getCustomerId(): ?int
    {
        return $this->$customer_id;
    }

    /**
     * @return Collection<int, InvoiceLine>
     */
    public function getInvoiceline(): Collection
    {
        return $this->invoiceline;
    }

    public function addInvoiceline(InvoiceLine $invoiceline): self
    {
        if (!$this->invoiceline->contains($invoiceline)) {
            $this->invoiceline[] = $invoiceline;
            $invoiceline->setInvoice($this);
        }

        return $this;
    }

    public function removeInvoiceline(InvoiceLine $invoiceline): self
    {
        if ($this->invoiceline->removeElement($invoiceline)) {
            // set the owning side to null (unless already changed)
            if ($invoiceline->getInvoice() === $this) {
                $invoiceline->setInvoice(null);
            }
        }

        return $this;
    }

}
