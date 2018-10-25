<?php
namespace App\Dto;
/**
 * Contacts page DTO.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class ContactsPage
{
    private $address;
    private $phone;
    private $email;
    public function __construct(string $address, string $phone, string $email)
    {
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
    }
    public function getAddress(): string
    {
        return $this->address;
    }
    public function getPhone(): string
    {
        return $this->phone;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
}