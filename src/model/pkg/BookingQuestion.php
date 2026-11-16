<?php

namespace com\trip\tourop\model\pkg;

class BookingQuestion {
    /**
     * @var string|null
     */
    private ?string $code;

    /**
     * @var string|null
     */
    private ?string $name;

    /**
     * @var string|null
     */
    private ?string $answerType;

    /**
     * @var string|null
     */
    private ?string $description;

    /**
     * @var AllowedAnswer|null
     */
    private ?AllowedAnswer $allowedAnswer;

    public function getCode(): ?string {
        return $this->code;
    }

    public function setCode(?string $code): self {
        $this->code = $code;
        return $this;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function setName(?string $name): self {
        $this->name = $name;
        return $this;
    }

    public function getAnswerType(): ?string {
        return $this->answerType;
    }

    public function setAnswerType(?string $answerType): self {
        $this->answerType = $answerType;
        return $this;
    }

    public function getDescription(): ?string {
        return $this->description;
    }

    public function setDescription(?string $description): self {
        $this->description = $description;
        return $this;
    }

    public function getAllowedAnswer(): ?AllowedAnswer {
        return $this->allowedAnswer;
    }

    public function setAllowedAnswer(?AllowedAnswer $allowedAnswer): self {
        $this->allowedAnswer = $allowedAnswer;
        return $this;
    }
}

