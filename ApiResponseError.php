<?php

namespace Vayes\GoogleJsonStyleGuide;

class ApiResponseError
{
    /**
     * @var int|null
     *
     * Represents the code for this error.
     * This property value will usually represent the HTTP response code.
     * If there are multiple errors, code will be the error code for the first error.
     *
     * @example {"error": {"code": 401}
     */
    private $code;

    /**
     * @var string|null
     *
     * A human readable message providing more details about the error.
     * If there are multiple errors, message will be the message for the first error.
     *
     * @example {"error": {"message": "You don't have sufficient right to access here"}
     */
    private $message;

    /**
     * @var null|array
     *
     * Container for any additional information regarding the error.
     * If the service returns multiple errors, each element in the errors array represents a different error.
     *
     * @example {"error": {"errors": [...]}}
     */
    private $errors;

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(?int $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getErrors(): ?array
    {
        return $this->errors;
    }

    public function addError(ApiResponseErrorErrors $error): self
    {
        if (empty($this->errors)) {
            $this->errors = [];
        }

        $this->errors[] = $error;

        return $this;
    }
}
