<?php

namespace App\ExternalServices;

use App\Models\PeopleDataLabs;
use App\Repositories\PeopleDataLabsRepository;
use Illuminate\Support\Facades\Http;

class PeopleDataLabsSearcher
{
    public static function search(string $linkedInUrl): PeopleDataLabs
    {
        $response = Http::get(static::makeUrl(config('apis.people_data_labs'), $linkedInUrl));
        return PeopleDataLabsRepository::save(
            $linkedInUrl,
            $response->json()
        );
    }

    protected static function makeUrl(string $apiKey, string $linkedinUrl): string
    {
        return "https://api.peopledatalabs.com/v5/person/enrich?pretty=true&api_key={$apiKey}&profile={$linkedinUrl}";
    }
}
