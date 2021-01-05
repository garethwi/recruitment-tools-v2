<?php

namespace App\Http\Livewire;

use App\Models\PeopleDataLabs;
use App\Models\Prospect;
use Illuminate\Support\Arr;
use Livewire\Component;

class ShowProspectList extends Component
{
    public Prospect $prospect;
    public array $linkedInUrls = [];

    public function mount(string $list = null)
    {
        if ($list) {
            $this->prospect = Prospect::find($list);
        } else {
            $this->prospect = new Prospect();
        }
        $this->linkedInUrls = explode("\n", trim($this->prospect->linkedin_urls));
    }

    public function render()
    {
        return view('livewire.show-prospect-list');
    }

    public function export()
    {
        $profiles = PeopleDataLabs::whereIn('linkedin_url', $this->linkedInUrls)->get();
        $csv = [];
        $first = true;
        foreach ($profiles as $profile) {
            $line = $this->makeCsvLine($profile->data);
            if ($first) {
                $csv[] = $this->makeCsvLineString(array_keys($line));
                $first = false;
            }
            $csv[] = $this->makeCsvLineString($line);
        }
        return response()->streamDownload(function () use ($csv) {
            echo implode("\n", $csv);
        }, $this->prospect->name . '.csv');
    }

    protected function makeCsvLine($data): array
    {
        if (!is_array($data)) {
            $data = json_decode($data, true);
        }
        return [
            'first_name' => Arr::get($data, 'data.first_name', ''),
            'middle_initial' => Arr::get($data, 'data.middle_initial', ''),
            'middle_name' => Arr::get($data, 'data.middle_name', ''),
            'last_name' => Arr::get($data, 'data.last_name', ''),
            'gender' => Arr::get($data, 'data.gender', ''),
            'linkedin_url' => Arr::get($data, 'data.linkedin_url', ''),
            'work_email' => Arr::get($data, 'data.work_email', ''),
            'mobile_phone' => Arr::get($data, 'data.mobile_phone', ''),
            'industry' => Arr::get($data, 'data.industry', ''),
            'job_title' => Arr::get($data, 'data.job_title', ''),
            'job_title_role' => Arr::get($data, 'data.job_title_role', ''),
            'job_company_name' => Arr::get($data, 'data.job_company_name', ''),
            'job_company_website' => Arr::get($data, 'data.job_company_website', ''),
            'job_company_size' => Arr::get($data, 'data.job_company_size', ''),
            'job_company_industry' => Arr::get($data, 'data.job_company_industry', ''),
            'job_company_linkedin_url' => Arr::get($data, 'data.job_company_linkedin_url', ''),
            'job_company_location_name' => Arr::get($data, 'data.job_company_location_name', ''),
            'job_company_location_locality' => Arr::get($data, 'data.job_company_location_locality', ''),
            'job_company_location_region' => Arr::get($data, 'data.job_company_location_region', ''),
            'job_company_location_country' => Arr::get($data, 'data.job_company_location_country', ''),
            'job_company_location_continent' => Arr::get($data, 'data.job_company_location_continent', ''),
            'job_last_updated' => Arr::get($data, 'data.job_last_updated', ''),
            'job_start_date' => Arr::get($data, 'data.job_start_date', ''),
            'location_locality' => Arr::get($data, 'data.location_locality', ''),
            'location_region' => Arr::get($data, 'data.location_region', ''),
            'location_country' => Arr::get($data, 'data.location_country', ''),
            'location_continent' => Arr::get($data, 'data.location_continent', ''),
            'phone_numbers' => implode(",", Arr::get($data, 'data.phone_numbers', [])),
            'emails' => $this->makeEmails(Arr::get($data, 'data.emails', [])),
            'skills' => implode(",", Arr::get($data, 'data.skills', [])),
            'experience_1_company_name' => Arr::get($data, 'data.experience.0.company.name', ''),
            'experience_1_company_size' => Arr::get($data, 'data.experience.0.company.size', ''),
            'experience_1_company_id' => Arr::get($data, 'data.experience.0.company.id', ''),
            'experience_1_company_industry' => Arr::get($data, 'data.experience.0.company.industry', ''),
            'experience_1_company_location_locality' => Arr::get($data, 'data.experience.0.company.location.locality', ''),
            'experience_1_company_location_region' => Arr::get($data, 'data.experience.0.company.location.region', ''),
            'experience_1_company_location_country' => Arr::get($data, 'data.experience.0.company.location.country', ''),
            'experience_1_company_location_continent' => Arr::get($data, 'data.experience.0.company.location.continent', ''),
            'experience_1_company_website' => Arr::get($data, 'data.experience.0.company.website', ''),
            'experience_1_start_date' => Arr::get($data, 'data.experience.0.start_date', ''),
            'experience_1_end_date' => Arr::get($data, 'data.experience.0.end_date', ''),
            'experience_1_title_name' => Arr::get($data, 'data.experience.0.title.name', ''),
            'experience_1_title_role' => Arr::get($data, 'data.experience.0.title.role', ''),
            'experience_1_is_primary' => Arr::get($data, 'data.experience.0.is_primary', ''),

            'experience_2_company_name' => Arr::get($data, 'data.experience.1.company.name', ''),
            'experience_2_company_size' => Arr::get($data, 'data.experience.1.company.size', ''),
            'experience_2_company_id' => Arr::get($data, 'data.experience.1.company.id', ''),
            'experience_2_company_industry' => Arr::get($data, 'data.experience.1.company.industry', ''),
            'experience_2_company_location_locality' => Arr::get($data, 'data.experience.1.company.location.locality', ''),
            'experience_2_company_location_region' => Arr::get($data, 'data.experience.1.company.location.region', ''),
            'experience_2_company_location_country' => Arr::get($data, 'data.experience.1.company.location.country', ''),
            'experience_2_company_location_continent' => Arr::get($data, 'data.experience.1.company.location.continent', ''),
            'experience_2_company_website' => Arr::get($data, 'data.experience.1.company.website', ''),
            'experience_2_start_date' => Arr::get($data, 'data.experience.1.start_date', ''),
            'experience_2_end_date' => Arr::get($data, 'data.experience.1.end_date', ''),
            'experience_2_title_name' => Arr::get($data, 'data.experience.1.title.name', ''),
            'experience_2_title_role' => Arr::get($data, 'data.experience.1.title.role', ''),
            'experience_2_is_primary' => Arr::get($data, 'data.experience.1.is_primary', ''),

            'experience_3_company_name' => Arr::get($data, 'data.experience.2.company.name', ''),
            'experience_3_company_size' => Arr::get($data, 'data.experience.2.company.size', ''),
            'experience_3_company_id' => Arr::get($data, 'data.experience.2.company.id', ''),
            'experience_3_company_industry' => Arr::get($data, 'data.experience.2.company.industry', ''),
            'experience_3_company_location_locality' => Arr::get($data, 'data.experience.2.company.location.locality', ''),
            'experience_3_company_location_region' => Arr::get($data, 'data.experience.2.company.location.region', ''),
            'experience_3_company_location_country' => Arr::get($data, 'data.experience.2.company.location.country', ''),
            'experience_3_company_location_continent' => Arr::get($data, 'data.experience.2.company.location.continent', ''),
            'experience_3_company_website' => Arr::get($data, 'data.experience.2.company.website', ''),
            'experience_3_start_date' => Arr::get($data, 'data.experience.2.start_date', ''),
            'experience_3_end_date' => Arr::get($data, 'data.experience.2.end_date', ''),
            'experience_3_title_name' => Arr::get($data, 'data.experience.2.title.name', ''),
            'experience_3_title_role' => Arr::get($data, 'data.experience.2.title.role', ''),
            'experience_3_is_primary' => Arr::get($data, 'data.experience.2.is_primary', ''),
        ];
    }

    protected function makeCsvLineString(array $line): string
    {
        return '"' . implode('","', $line) . '"';
    }

    protected function makeEmails($emails): string
    {
        if (!$emails) {
            return '';
        }
        if (!is_array($emails)) {
            return '';
        }
        $return = [];
        foreach ($emails as $email) {
            $return[] = Arr::get($email, 'type', 'unknown') . ' :: ' . Arr::get($email, 'address', '');
        }
        return implode(',', $return);
    }
}
