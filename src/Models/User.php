<?php
class User
{

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private DateTime $createdAt;
    private DateTime $last_connected_at;

    /**
     * User constructor.
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     */
    public function __construct(int $id, string $firstName, string $lastName, string $email)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->createdAt = new DateTime();
        $this->last_connected_at = new DateTime();
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     */
    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return DateTime
     */
    public function getLastConnectedAt(): DateTime
    {
        return $this->last_connected_at;
    }

    /**
     * @param DateTime $last_connected_at
     */
    public function setLastConnectedAt(DateTime $last_connected_at): void
    {
        $this->last_connected_at = $last_connected_at;
    }

}