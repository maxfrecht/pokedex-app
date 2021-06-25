<?php


class Abilities
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function isHidden(): bool
    {
        return $this->isHidden;
    }

    /**
     * @param bool $isHidden
     */
    public function setIsHidden(bool $isHidden): void
    {
        $this->isHidden = $isHidden;
    }

    /**
     * @return string
     */
    public function getEffect(): string
    {
        return $this->effect;
    }

    /**
     * @param string $effect
     */
    public function setEffect(string $effect): void
    {
        $this->effect = $effect;
    }
    private string $name;
    private bool $isHidden;
    private string $effect;

    /**
     * Abilities constructor.
     * @param string $name
     * @param bool $isHidden
     * @param string $effect
     */
    public function __construct(string $name, bool $isHidden, string $effect)
    {
        $this->name = $name;
        $this->isHidden = $isHidden;
        $this->effect = $effect;
    }
}