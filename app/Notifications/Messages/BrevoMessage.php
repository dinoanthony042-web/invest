<?php

namespace App\Notifications\Messages;

class BrevoMessage
{
    public string $subject;
    public string $html;
    public ?string $text = null;
    public array $to = [];
    public ?string $senderEmail = null;
    public ?string $senderName = null;
    public ?array $replyTo = null;
    public ?string $tag = null;

    public function __construct(string $subject, string $html)
    {
        $this->subject = $subject;
        $this->html = $html;
    }

    public static function create(string $subject, string $html): self
    {
        return new self($subject, $html);
    }

    public function to(string $email, string $name = null): self
    {
        $this->to[] = array_filter([
            'email' => $email,
            'name' => $name,
        ]);

        return $this;
    }

    public function text(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function sender(string $email, string $name = null): self
    {
        $this->senderEmail = $email;
        $this->senderName = $name;

        return $this;
    }

    public function replyTo(string $email, string $name = null): self
    {
        $this->replyTo = array_filter([
            'email' => $email,
            'name' => $name,
        ]);

        return $this;
    }

    public function tag(string $tag): self
    {
        $this->tag = $tag;

        return $this;
    }
}
