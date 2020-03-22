<?php

namespace Vayes\GoogleJsonStyleGuide;

class ApiResponseErrorErrors
{
    /**
     * @var string|null
     *
     * Unique identifier for the service raising this error.
     * This helps distinguish service-specific errors (i.e. error inserting an event in a calendar)
     * from general protocol errors (i.e. file not found).
     *
     * @example {"error":{"errors": [{"domain": "Calendar"}]}}
     */
    private $domain;

    /**
     * @var string|null
     *
     * Unique identifier for this error.
     * Different from the error.code property in that this is not an http response code.
     *
     * @example {"error":{"errors": [{"reason": "ResourceNotFoundException"}]}}
     */
    private $reason;

    /**
     * @var string|null
     *
     * A human readable message providing more details about the error.
     * If there is only one error, this field will match error.message.
     *
     * @example {"error":{
     *     "code": 404,
     *     "message": "File Not Found",
     *     "errors": [{"message": "File Not Found"}]
     * }}
     */
    private $message;

    /**
     * @var string|null
     *
     * The location of the error (the interpretation of its value depends on locationType)
     *
     * @example {"error":{"errors": [{"location": ""}]}}
     */
    private $location;

    /**
     * @var string|null
     *
     * Indicates how the location property should be interpreted
     *
     * @example {"error":{"errors": [{"locationType": ""}]}}
     */
    private $locationType;

    /**
     * @var string|null
     *                  A URI for a help text that might shed some more light on the error
     *
     * @example {"error":{"errors": [{"extendedHelper": "http://url.to.more.details.example.com/"}]}}
     */
    private $extendedHelp;

    /**
     * @var string|null
     *
     * A URI for a report form used by the service to collect data about the error condition.
     * This URI should be preloaded with parameters describing the request.
     *
     * @example {"error":{"errors": [{"sendReport": "https://report.example.com/"}]}}
     */
    private $sendReport;

    public function getDomain(): ?string
    {
        return $this->domain;
    }

    public function setDomain(?string $domain): self
    {
        $this->domain = $domain;

        return $this;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function setReason(?string $reason): self
    {
        $this->reason = $reason;

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

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getLocationType(): ?string
    {
        return $this->locationType;
    }

    public function setLocationType(?string $locationType): self
    {
        $this->locationType = $locationType;

        return $this;
    }

    public function getExtendedHelp(): ?string
    {
        return $this->extendedHelp;
    }

    public function setExtendedHelp(?string $extendedHelp): self
    {
        $this->extendedHelp = $extendedHelp;

        return $this;
    }

    public function getSendReport(): ?string
    {
        return $this->sendReport;
    }

    public function setSendReport(?string $sendReport): self
    {
        $this->sendReport = $sendReport;

        return $this;
    }
}
