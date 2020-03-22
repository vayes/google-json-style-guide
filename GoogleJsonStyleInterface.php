<?php

namespace Vayes\GoogleJsonStyleGuide;

interface GoogleJsonStyleInterface
{
    public function getApiVersion(): ?string;

    public function setApiVersion(?string $apiVersion): ApiResponse;

    public function getContext(): ?string;

    public function setContext(?string $context): ApiResponse;

    public function getId(): ?string;

    public function setId(?string $id): ApiResponse;

    public function getMethod(): ?string;

    public function setMethod(?string $method): ApiResponse;

    public function getParams(): ?ApiResponseParams;

    public function setParams(?ApiResponseParams $params): ApiResponse;

    public function getData(): ?ApiResponseData;

    public function setData(?ApiResponseData $data): ApiResponse;

    public function getError(): ?ApiResponseError;

    public function setError(?ApiResponseError $error): ApiResponse;

    public function normalize(ApiResponse $apiResponseObject): array;

    public function optimize(array $apiResponseArray): array;

    public function createResponseId(): string;
}
