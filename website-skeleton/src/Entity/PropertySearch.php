<?php

namespace App\Entity; 

class PropertySearch
{ 
    private $ref;

    public function getRef(): ?string
    {
        return $this->ref; 
    }

    public function setRef(string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }
}
