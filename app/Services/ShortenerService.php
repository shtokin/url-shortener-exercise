<?php

namespace App\Services;


use App\Url;

class ShortenerService
{

    /**
     * Full URL
     * @var string
     */
    private $fullUrl = '';

    /**
     * Flag which means that there is no such url in DB
     *
     * @var bool
     */
    private $isNew = true;


    public function __construct($fullUrl = '')
    {
        $this->fullUrl = $fullUrl;
    }

    /**
     * Return isNew value.
     *
     * @return bool
     */
    public function isNew()
    {
        return $this->isNew;
    }

    /**
     * Return short url value for url given in constructor
     *
     * @return bool|string|string[]|null
     * @throws \Exception
     */
    public function getShort()
    {

        $existed = $this->searchExistedFull();
        if ($existed) {
            $this->isNew = false;
            return $existed;
        }

        $maxCount = 5;
        $counter = 0;
        do {
            $short = $this->generate($counter);
            $counter++;
        } while ($this->checkExistShort($short) && $counter < $maxCount);

        if ($counter == $maxCount) {
            throw new \Exception("Can't generate short url. Short url already exists.");
        }

        return $short;
    }

    /**
     * Search full url in DB if exists returns it's short value.
     * If not exists - returns false.
     *
     * @return bool|string
     */
    private function searchExistedFull()
    {
        $url = Url::where('full', $this->fullUrl)->first();
        if ($url) {
            return $url->short;
        } else {
            return false;
        }
    }

    /**
     * Generate short url slug, 6 chars length
     *
     * @param $modifier
     * @return string|string[]|null
     */
    private function generate($modifier)
    {
        $md5String = substr(md5($this->fullUrl . $modifier), 0, 6);

        $result = preg_replace_callback(
            '/[0-9]/',
            function ($matches) {
                $symbols = ['A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L', 'Z'];
                return $symbols[$matches[0]];
            },
            $md5String
        );

        return $result;
    }

    /**
     * Check if short ulr exists.
     *
     * @param $short
     * @return bool
     */
    private function checkExistShort($short)
    {

        if (Url::where('short', $short)->exists()) {
            return true;
        } else {
            return false;
        }
    }

}