<?php

namespace Vayes\GoogleJsonStyleGuide;

class ApiResponseData
{
    /**
     * @var int|null
     *
     * Represents the code for this response.
     * This property value will usually represent the HTTP response code.
     *
     * @example {"data": {"code": 201}
     * @author "Yahya Erturan <root@yahyaerturan.com>"
     */
    private $code;

    /**
     * @var string|null
     *
     * A human readable message providing more details about the response.
     *
     * @example {"data": {"message": "Your changes applied."}
     * @author "Yahya Erturan <root@yahyaerturan.com>"
     */
    private $message;

    /**
     * @var string|null
     *
     * The kind property serves as a guide to what type of information this particular object stores
     *
     * @example {"data": {"kind": "user"}}
     */
    private $kind;

    /**
     * @var string|null
     *
     * Represents the fields present in the response when doing a partial GET,
     * or the fields present in a request when doing a partial PATCH.
     * This property should only exist during a partial GET/PATCH, and should not be empty.
     *
     * @example {"data": {"fields": "author,id"}}
     */
    private $fields;

    /**
     * @var string|null
     *
     * Represents the etag for the response
     *
     * @example {"data": {"etag": "W/C0QBRXcycSp7ImA9WxRVFUk."}}
     */
    private $etag;

    /**
     * @var string|null
     *
     * A globally unique string used to reference the object.
     * The specific details of the id property are left up to the service.
     *
     * @example {"data": {"id": "bart"}}
     */
    private $id;

    /**
     * @var string|null
     *
     * @uses $data or any child element
     *
     * Indicates the language of the rest of the properties in this object.
     * This property mimics HTML's lang property and XML's xml:lang properties.
     * The value should be a language value as defined in BCP 47.
     *
     * @example {"data": {"items": [..], "lang":"en"}}
     * @example {"data": {"items": [{"lang":"en", "title":"Hello!"}, {"lang":"fr", "title":"Bonjour!"}]}
     */
    private $lang;

    /**
     * @var string|null
     *
     * Indicates the last date/time (RFC 3339) the item was updated, as defined by the service
     *
     * @example {"data": {"updated": "2007-11-06T16:34:41.000Z"}}
     */
    private $data;

    /**
     * @var bool|null
     *
     * @uses $data or any child element
     *
     * A marker element, that, when present, indicates the containing entry is deleted.
     * If deleted is present, its value must be true; a value of false can cause confusion and should be avoided.
     *
     * @example {"data": {"items":[{"title":"A deleted entry", "deleted": true}]}}
     */
    private $deleted;

    /**
     * @var int|null
     *
     * The number of items in this result set.
     * Should be equivalent to items.length, and is provided as a convenience property.
     *
     * @example Mostly
     * {"data": {"itemsPerPage": 10, "currentItemCount": 10}}
     * @example In the last page of pagination:
     * {"data": {"itemsPerPage": 10, "currentItemCount": 4}}
     */
    private $currentItemCount;

    /**
     * @var int|null
     *
     * The requested number of items in the result
     */
    private $itemsPerPage;

    /**
     * @var int|null
     *
     * The index of the first item in data.items.
     * For consistency, startIndex should be 1-based. For example, the first item in
     * the first set of items should have a startIndex of 1.
     * If the user requests the next set of data, the startIndex may be 10.
     */
    private $startIndex;

    /**
     * @var int|null
     *
     * The total number of items available in this set. For example, if a user has 100 blog posts,
     * the response may only contain 10 items, but the totalItems would be 100.
     */
    private $totalItems;

    /**
     * @var string|null
     *
     * A URI template indicating how users can calculate subsequent paging links.
     * The URI template also has some reserved variable names: {index} representing
     * the item number to load, and {pageIndex}, representing the page number to load.
     *
     * @example
     * "data": {
     *   "pagingLinkTemplate": "https://www.google.com/search/hl=en&q=chicago+style+pizza&start={index}&sa=N"
     * }
     */
    private $pagingLinkTemplate;

    /**
     * @var int|null
     *
     * The index of the current page of items. For consistency, pageIndex should be 1-based.
     * For example, the first page of items has a pageIndex of 1.
     * pageIndex can also be calculated from the item-based paging properties:
     *   pageIndex = floor(startIndex / itemsPerPage) + 1.
     */
    private $pageIndex;

    /**
     * @var int|null
     *
     * The total number of pages in the result set.
     * totalPages can also be calculated from the item-based paging properties above:
     *   totalPages = ceiling(totalItems / itemsPerPage).
     */
    private $totalPages;

    /**
     * @var string|null
     *
     * The self link can be used to retrieve the item's data.
     * For example, in a list of a user's Picasa album,
     * each album object in the items array could contain a selfLink
     * that can be used to retrieve data related to that particular album.
     *
     * @example {"data": {"self": { }, "selfLink": "https://www.google.com/feeds/album/1234"}}
     */
    private $selfLink;

    /**
     * @var string|null
     *
     * The edit link indicates where a user can send update or delete requests.
     * This is useful for REST-based APIs. This link need only be present if
     * the user can update/delete this item.
     *
     * @example {"data": {"edit": { }, "editLink": "https://www.google.com/feeds/album/1234/edit"}}
     */
    private $editLink;

    /**
     * @var string|null
     *
     * The next link indicates how more data can be retrieved.
     * It points to the location to load the next set of data.
     * It can be used in conjunction with the itemsPerPage,
     * startIndex and totalItems properties in order to page through data.
     *
     * @example {"data": {"next": { }, "nextLink": "https://www.google.com/feeds/album/1234/next"}}
     */
    private $nextLink;

    /**
     * @var string|null
     *
     * The previous link indicates how more data can be retrieved.
     * It points to the location to load the previous set of data.
     * It can be used in conjunction with the itemsPerPage,
     * startIndex and totalItems properties in order to page through data
     *
     * @example {"data": {"previous": { }, "previousLink": "https://www.google.com/feeds/album/1234/prev"}}
     */
    private $previousLink;

    /**
     * @var null|array
     *
     * The property name items is reserved to represent an array of items
     * (for example, photos in Picasa, videos in YouTube)
     */
    private $items;

    /**
     * @return int|null
     */
    public function getCode(): ?int
    {
        return $this->code;
    }

    /**
     * @param int|null $code
     * @return ApiResponseData
     */
    public function setCode(?int $code): ApiResponseData
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string|null $message
     * @return ApiResponseData
     */
    public function setMessage(?string $message): ApiResponseData
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getKind(): ?string
    {
        return $this->kind;
    }

    /**
     * @param string|null $kind
     * @return ApiResponseData
     */
    public function setKind(?string $kind): ApiResponseData
    {
        $this->kind = $kind;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFields(): ?string
    {
        return $this->fields;
    }

    /**
     * @param string|null $fields
     * @return ApiResponseData
     */
    public function setFields(?string $fields): ApiResponseData
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEtag(): ?string
    {
        return $this->etag;
    }

    /**
     * @param string|null $etag
     * @return ApiResponseData
     */
    public function setEtag(?string $etag): ApiResponseData
    {
        $this->etag = $etag;
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
     * @return ApiResponseData
     */
    public function setId(?string $id): ApiResponseData
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLang(): ?string
    {
        return $this->lang;
    }

    /**
     * @param string|null $lang
     * @return ApiResponseData
     */
    public function setLang(?string $lang): ApiResponseData
    {
        $this->lang = $lang;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getData(): ?string
    {
        return $this->data;
    }

    /**
     * @param string|null $data
     * @return ApiResponseData
     */
    public function setData(?string $data): ApiResponseData
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDeleted(): ?bool
    {
        return $this->deleted;
    }

    /**
     * @param bool|null $deleted
     * @return ApiResponseData
     */
    public function setDeleted(?bool $deleted): ApiResponseData
    {
        $this->deleted = $deleted;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCurrentItemCount(): ?int
    {
        return $this->currentItemCount;
    }

    /**
     * @param int|null $currentItemCount
     * @return ApiResponseData
     */
    public function setCurrentItemCount(?int $currentItemCount): ApiResponseData
    {
        $this->currentItemCount = $currentItemCount;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getItemsPerPage(): ?int
    {
        return $this->itemsPerPage;
    }

    /**
     * @param int|null $itemsPerPage
     * @return ApiResponseData
     */
    public function setItemsPerPage(?int $itemsPerPage): ApiResponseData
    {
        $this->itemsPerPage = $itemsPerPage;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getStartIndex(): ?int
    {
        return $this->startIndex;
    }

    /**
     * @param int|null $startIndex
     * @return ApiResponseData
     */
    public function setStartIndex(?int $startIndex): ApiResponseData
    {
        $this->startIndex = $startIndex;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTotalItems(): ?int
    {
        return $this->totalItems;
    }

    /**
     * @param int|null $totalItems
     * @return ApiResponseData
     */
    public function setTotalItems(?int $totalItems): ApiResponseData
    {
        $this->totalItems = $totalItems;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPagingLinkTemplate(): ?string
    {
        return $this->pagingLinkTemplate;
    }

    /**
     * @param string|null $pagingLinkTemplate
     * @return ApiResponseData
     */
    public function setPagingLinkTemplate(?string $pagingLinkTemplate): ApiResponseData
    {
        $this->pagingLinkTemplate = $pagingLinkTemplate;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPageIndex(): ?int
    {
        return $this->pageIndex;
    }

    /**
     * @param int|null $pageIndex
     * @return ApiResponseData
     */
    public function setPageIndex(?int $pageIndex): ApiResponseData
    {
        $this->pageIndex = $pageIndex;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTotalPages(): ?int
    {
        return $this->totalPages;
    }

    /**
     * @param int|null $totalPages
     * @return ApiResponseData
     */
    public function setTotalPages(?int $totalPages): ApiResponseData
    {
        $this->totalPages = $totalPages;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSelfLink(): ?string
    {
        return $this->selfLink;
    }

    /**
     * @param string|null $selfLink
     * @return ApiResponseData
     */
    public function setSelfLink(?string $selfLink): ApiResponseData
    {
        $this->selfLink = $selfLink;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEditLink(): ?string
    {
        return $this->editLink;
    }

    /**
     * @param string|null $editLink
     * @return ApiResponseData
     */
    public function setEditLink(?string $editLink): ApiResponseData
    {
        $this->editLink = $editLink;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNextLink(): ?string
    {
        return $this->nextLink;
    }

    /**
     * @param string|null $nextLink
     * @return ApiResponseData
     */
    public function setNextLink(?string $nextLink): ApiResponseData
    {
        $this->nextLink = $nextLink;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPreviousLink(): ?string
    {
        return $this->previousLink;
    }

    /**
     * @param string|null $previousLink
     * @return ApiResponseData
     */
    public function setPreviousLink(?string $previousLink): ApiResponseData
    {
        $this->previousLink = $previousLink;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getItems(): ?array
    {
        return $this->items;
    }

    /**
     * @param array|null $items
     */
    public function setItems(?array $items): void
    {
        if (true === empty($items)) {
            $this->items = [];
        } else {
            if (true === isMultidimensionalArray($items)) {
                $this->items = (array) $items;
            } else {
                $this->items[] = (array) $items;
            }
        }
    }
}
