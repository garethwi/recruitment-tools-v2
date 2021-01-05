<?php

namespace App\Repositories;

use App\Models\PeopleDataLabs;

class PeopleDataLabsRepository
{
    public static function save(string $linkedInUrl, array $data): PeopleDataLabs
    {
        $peopleDataLabs = PeopleDataLabs::whereLinkedinUrl($linkedInUrl)->first();
        if (!$peopleDataLabs) {
            $peopleDataLabs = new PeopleDataLabs();
            $peopleDataLabs->linkedin_url = $linkedInUrl;
        }
        $peopleDataLabs->data = json_encode($data);
        $peopleDataLabs->status = static::setStatus($data);
        $peopleDataLabs->save();
        return $peopleDataLabs;
    }

    protected static function setStatus(array $data): string
    {
        if (isset($data['data'])) {
            return 'success';
        }
        return 'failed';
    }
}
