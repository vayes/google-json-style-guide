<?php

namespace Vayes\GoogleJsonStyleGuide;

use Vayes\Serializer\Facade\Normalizer;

class ApiResponse implements GoogleJsonStyleInterface
{
    /**
     * @var string|null
     *
     * Represents the desired version of the service Apifier in a request
     */
    private $apiVersion;

    /**
     * @var string|null
     *
     * Client sets this value and server echos data in the response
     */
    private $context;

    /**
     * @var string|null
     *
     * A server supplied identifier for the response.
     * (regardless of whether the response is a success or an error)
     */
    private $id;

    /**
     * @var string|null
     *
     * Represents the operation to perform, or that was performed, on the data
     *
     * @example "people.get"
     */
    private $method;

    /**
     * @var ApiResponseParams|null
     *
     * This object serves as a map of input parameters to send to an RPC request
     */
    private $params;

    /**
     * @var ApiResponseData|null
     *
     * Container for all the data from a response.
     * A JSON response should contain either a data object or an error object, but not both.
     * If both data and error are present, the error object takes precedence.
     */
    private $data;

    /**
     * @var ApiResponseError|null
     *
     * Container for all the data from a response.
     * A JSON response should contain either a data object or an error object, but not both.
     * If both data and error are present, the error object takes precedence.
     */
    private $error;

    public function __construct()
    {
        $this->error = new ApiResponseError();
        $this->data = new ApiResponseData();
        $this->params = new ApiResponseParams();

        $this->setApiVersion('1.0');
        $this->setId($this->createResponseId());
    }

    /**
     * @return string|null
     */
    public function getApiVersion(): ?string
    {
        return $this->apiVersion;
    }

    /**
     * @param string|null $apiVersion
     * @return ApiResponse
     */
    public function setApiVersion(?string $apiVersion): ApiResponse
    {
        $this->apiVersion = $apiVersion;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContext(): ?string
    {
        return $this->context;
    }

    /**
     * @param string|null $context
     * @return ApiResponse
     */
    public function setContext(?string $context): ApiResponse
    {
        $this->context = $context;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     * @return ApiResponse
     */
    public function setId(?string $id): ApiResponse
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMethod(): ?string
    {
        return $this->method;
    }

    /**
     * @param string|null $method
     * @return ApiResponse
     */
    public function setMethod(?string $method): ApiResponse
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return ApiResponseParams|null
     */
    public function getParams(): ?ApiResponseParams
    {
        return $this->params;
    }

    /**
     * @param ApiResponseParams|null $params
     * @return ApiResponse
     */
    public function setParams(?ApiResponseParams $params): ApiResponse
    {
        $this->params = $params;
        return $this;
    }

    /**
     * @return ApiResponseData|null
     */
    public function getData(): ?ApiResponseData
    {
        return $this->data;
    }

    /**
     * @param ApiResponseData|null $data
     * @return ApiResponse
     */
    public function setData(?ApiResponseData $data): ApiResponse
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return ApiResponseError|null
     */
    public function getError(): ?ApiResponseError
    {
        return $this->error;
    }

    /**
     * @param ApiResponseError|null $error
     * @return ApiResponse
     */
    public function setError(?ApiResponseError $error): ApiResponse
    {
        $this->error = $error;
        return $this;
    }

    private function getTopLevelProperties()
    {
        return [
            'api_version',
            'context',
            'id',
            'method',
            'params',
            'data',
            'error',
        ];
    }

    /**
     * @param ApiResponse $apiResponseObject
     * @return array
     * @throws \BadMethodCallException
     */
    public function normalize(ApiResponse $apiResponseObject): array
    {
        return $this->optimize(Normalizer::normalize($apiResponseObject));
    }

    /**
     * Sets some default values and trims unused keys
     *
     * @param array $apiResponseArray
     * @return array
     */
    public function optimize(array $apiResponseArray): array
    {
        if (false === empty($apiResponseArray['error'])) {
            if (null !== $apiResponseArray['error']['errors']) {
                foreach ($apiResponseArray['error']['errors'] as $errorIndex => $error) {
                    foreach ($error as $propName => $propValue) {
                        if (null === $propValue) {
                            unset($apiResponseArray['error']['errors'][$errorIndex][$propName]);
                        }
                    }
                }
            }

            foreach ($apiResponseArray['error'] as $propName => $propValue) {
                if (null === $propValue) {
                    unset($apiResponseArray['error'][$propName]);
                }
            }
        }

        if (false === empty($apiResponseArray['data'])) {
            // Auto fill some "null" fields if items are set
            if (false === empty($apiResponseArray['data']['items'])) {
                if (false === isset($apiResponseArray['data']['total_pages'])
                        || null === $apiResponseArray['data']['total_pages']
                ) {
                    $apiResponseArray['data']['total_pages'] = 1;
                }

                if (false === isset($apiResponseArray['data']['total_items'])
                    || null === $apiResponseArray['data']['total_items']
                ) {
                    $apiResponseArray['data']['total_items'] = \count($apiResponseArray['data']['items']);
                }

                if (false === isset($apiResponseArray['data']['current_item_count'])
                    || null === $apiResponseArray['data']['current_item_count']
                ) {
                    $apiResponseArray['data']['current_item_count'] = $apiResponseArray['data']['total_items'];
                }

                if (false === isset($apiResponseArray['data']['page_index'])
                    || null === $apiResponseArray['data']['page_index']
                ) {
                    $apiResponseArray['data']['page_index'] = 1;
                }
            }

            foreach ($apiResponseArray['data'] as $propName => $propValue) {
                if (null === $propValue) {
                    unset($apiResponseArray['data'][$propName]);
                }
            }
        }

        if (false === empty($apiResponseArray['params'])) {
            foreach ($apiResponseArray['params'] as $propName => $propValue) {
                if (null === $propValue) {
                    unset($apiResponseArray['params'][$propName]);
                }
            }
        }

        foreach ($this->getTopLevelProperties() as $propName) {
            if (true === isset($apiResponseArray[$propName])
                && null === $apiResponseArray[$propName]
            ) {
                unset($apiResponseArray[$propName]);
            }

            if (\in_array($propName, ['error', 'data', 'params'], true)) {
                if (true === empty($apiResponseArray[$propName])) {
                    unset($apiResponseArray[$propName]);
                }
            }
        }

        return $apiResponseArray;
    }

    /**
     * @return string
     */
    public function createResponseId(): string
    {
        return md5(time()) . '-' . rand(1, 100);
    }
}
