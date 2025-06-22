<?php

namespace AhmadAldali\FilterLists\Traits;

trait JsonSerializableTrait
{
    /**
     * Decode a JSON string into a PHP object.
     *
     * @param string $json JSON string to decode
     * @return object|null Returns decoded object or null if JSON is invalid
     */
    public function decodeJsonToObject(string $json): ?object
    {
      $decoded = json_decode($json);

      if (json_last_error() !== JSON_ERROR_NONE) {
        // Optionally log or handle the error here
        return null;
      }

      return $decoded;
    }
}
