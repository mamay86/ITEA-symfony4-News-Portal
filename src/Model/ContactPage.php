<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Model;

/**
 * Home page DTO.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class ContactPage
{
    private $phone;
    private $email;
    private $address;
    private $formTitle;
    private $formName;
    private $formEmail;
    private $formComment;
    private $formButton;
    public function __construct(
        string $phone,
        string $email,
        string $address,
        string $formTitle,
        string $formName,
        string $formEmail,
        string $formComment,
        string $formButton
    ) {
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
        $this->formTitle = $formTitle;
        $this->formName = $formName;
        $this->formEmail = $formEmail;
        $this->formComment = $formComment;
        $this->formButton = $formButton;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getFormTitle(): string
    {
        return $this->formTitle;
    }

    /**
     * @return string
     */
    public function getFormName(): string
    {
        return $this->formName;
    }

    /**
     * @return string
     */
    public function getFormEmail(): string
    {
        return $this->formEmail;
    }

    /**
     * @return string
     */
    public function getFormComment(): string
    {
        return $this->formComment;
    }

    /**
     * @return string
     */
    public function getFormButton(): string
    {
        return $this->formButton;
    }

}
