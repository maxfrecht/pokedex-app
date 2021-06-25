<?php

class Pokemon
{
    private string $name;
    private string $sprite;
    private string $artwork;
    private int $order;
    private array $types;
    private array $baseStats;
    private array $abilities;

    /**
     * @return array
     */
    public function getAbilities(): array
    {
        return $this->abilities;
    }

    /**
     * @param array $abilities
     */
    public function setAbilities(array $abilities): void
    {
        $this->abilities = $abilities;
    }

    /**
     * Pokemon constructor.
     * @param string $name
     * @param string $sprite
     * @param string $artwork
     * @param int $order
     * @param array $types
     */
    public function __construct(string $name, string $sprite, string $artwork, int $order, array $types, array $baseStats, array $abilities)
    {
        $this->name = $name;
        $this->sprite = $sprite;
        $this->artwork = $artwork;
        $this->order = $order;
        $this->types = $types;
        $this->baseStats = $baseStats;
        $this->abilities = $abilities;
    }

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
     * @return string
     */
    public function getSprite(): string
    {
        return $this->sprite;
    }

    /**
     * @param string $sprite
     */
    public function setSprite(string $sprite): void
    {
        $this->sprite = $sprite;
    }

    /**
     * @return string
     */
    public function getArtwork(): string
    {
        return $this->artwork;
    }

    /**
     * @param string $artwork
     */
    public function setArtwork(string $artwork): void
    {
        $this->artwork = $artwork;
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @param int $order
     */
    public function setOrder(int $order): void
    {
        $this->order = $order;
    }

    /**
     * @return array
     */
    public function getTypes(): array
    {
        return $this->types;
    }

    /**
     * @param array $types
     */
    public function setTypes(array $types): void
    {
        $this->types = $types;
    }

    /**
     * @return array
     */
    public function getBaseStats(): array
    {
        return $this->baseStats;
    }

    /**
     * @param array $baseStats
     */
    public function setBaseStats(array $baseStats): void
    {
        $this->baseStats = $baseStats;
    }

}